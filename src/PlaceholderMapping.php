<?php

namespace logan8920\IOCommentParser;

class PlaceholderMapping
{
    private string $companyName;
    private array $rawData = [];
    private array $placeholders = [];
    private array $filterData = [];

    public static function setData(string $company, array $data): self
    {
        $instance = new self();
        $instance->companyName = $company;
        $instance->rawData = self::removeBlankKeys($data);
        $instance->build();

        return $instance;
    }

    private function build(): void
    {
        $company = $this->companyName;
        $data = $this->rawData;

        $mapping = [

            '{address}' => 'address',
            '{field_visit_time}' => 'field_visit_time',
            '{finding}' => 'finding',
            '{customer_name}' => 'customer_name',
            '{nature_of_business}' => 'nature_of_business',
            '{business_years}' => 'num_of_yrs',
            '{employee_seen}' => 'no_emp_seen',
            '{premise_area}' => 'premise_area',
            '{residence_type}' => 'residence_type',
            '{relation_person_available}' => 'relation_person_available',
            '{person_available_name}' => 'person_available_name',
            '{monthly_rent}' => 'monthly_rent',
            '{other_details}' => 'other_details',

            '{qr_observed}' => function () use (&$data, $company) {

                foreach (array_keys($data) as $key) {
                    if (stripos($key, $company) !== false) {
                        return strtoupper($company) . ' QR CODE WAS OBSERVED';
                    }
                }

                return null;
            },
        ];

        foreach ($mapping as $placeholder => $source) {

            if (is_callable($source)) {
                $value = $source();
            } else {
                $value = $data[$source] ?? null;
            }

            if ($value !== null && trim((string) $value) !== '') {
                $this->placeholders[$placeholder] = $placeholder;
                $this->filterData[$placeholder] = $value;
            }
        }
    }

    public function getPlaceholder(): array
    {
        return $this->placeholders;
    }

    public function getFilterData(): array
    {
        return $this->filterData;
    }

    protected static function removeBlankKeys(array $data): array
    {
        return array_filter($data, function ($value) {
            if (is_array($value)) {
                return !empty($value);
            }
            return $value !== null && trim((string) $value) !== '';
        });
    }
}
