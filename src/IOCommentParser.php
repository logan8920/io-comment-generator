<?php

namespace logan8920\IOCommentParser;

use logan8920\IOCommentParser\PlaceholderMapping;
use logan8920\IOCommentParser\templates\PositiveCommentTemplate;
use logan8920\IOCommentParser\templates\NegitiveCommentTemplate;
use logan8920\IOCommentParser\templates\ReferredCommentTemplate;

class IOCommentParser
{
    protected static array $parseData = [];
    protected static ?string $comment = null;
    protected static string $company;

    public static function setData(array|string $data, string $company): self
    {
        self::$company = $company;
        self::$parseData = self::parseInput($data);

        return new self();
    }

    private static function parseInput(array|string $data): array
    {
        if (is_string($data)) {
            $data = json_decode($data, true);
            if (!is_array($data)) {
                throw new \Exception("Invalid JSON input", 422);
            }
        }

        $parsed = [];
        foreach ($data as $key => $value) {
            if (is_string($value) && self::isJson($value)) {

                $json = json_decode($value, true);
                foreach ($json as $k => $v) {
                    $parsed['{' . $k . '}'] = $v;
                }
            } else {
                $parsed[$key] = $value;
            }
        }

        return $parsed;
    }

    private static function isJson(string $string): bool
    {
        if (is_numeric($string))
            return false;
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
    }

    public static function makeIOComment(): self
    {
        $type = self::findLeadType();
        // print_r($type);
        match ($type) {
            'positive' => self::$comment = self::makeComment(PositiveCommentTemplate::get()),
            'negative' => self::$comment = self::makeComment(NegitiveCommentTemplate::get()),
            'referred' => self::$comment = self::makeComment(ReferredCommentTemplate::get()),
            default => self::$comment = null,
        };

        return new self();
    }

    public static function getComment(): ?string
    {
        return self::$comment;
    }

    private static function findLeadType(): string
    {
        $type = self::$parseData['fv_status'] ?? null;

        if (!$type) {
            throw new \Exception("Lead type not found", 422);
        }

        return match (strtolower(trim($type))) {
            'success', '1', 'positive' => 'positive',
            'failure', '0', 'negative' => 'negative',
            'referred', 'refer to credit' => 'referred',
            default => 'negative',
        };
    }

    private static function makeComment(array $templates): string
    {
        $mapper = PlaceholderMapping::setData(self::$company, self::$parseData);

        $placeholders = $mapper->getPlaceholder();
        $values = $mapper->getFilterData();

        $best = [
            'percentage' => 0,
            'comment' => ''
        ];

        foreach ($templates as $template) {

            // extract placeholders from template
            $tplPlaceholders = self::extractPlaceholders($template);

            // total placeholders in template
            $total = count($tplPlaceholders);
            if ($total === 0) {
                continue;
            }

            // matched placeholders
            $matched = array_intersect($tplPlaceholders, array_keys($values));

            // calculate percentage
            $percentage = (count($matched) / $total) * 100;
            // echo "$percentage\n";
            // skip if less than 75%
            if ($percentage < 50) {
                continue;
            }

            // replace placeholders
            $comment = str_replace(
                array_keys($placeholders),
                array_values($values),
                $template
            );

            // remove unreplaced placeholders
            $comment = preg_replace('/\{[^}]+\}/', '', $comment);

            // keep best percentage match
            if ($percentage > $best['percentage']) {
                $best = [
                    'percentage' => $percentage,
                    'comment' => trim($comment)
                ];
            }
        }

        return $best['comment'];
    }


    private static function extractPlaceholders(string $template): array
    {
        preg_match_all('/\{[^}]+\}/', $template, $matches);
        return $matches[0] ?? [];
    }
}
