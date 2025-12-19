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

    /**
     * Core builder
     */
    private function build(): void
    {
        $data = $this->rawData;

        $mapping = [

            // common
            '{address}' => 'address',
            '{field_visit_time}' => 'dateadded',
            '{finding}' => 'finding',
            '{customer_name}' => 'customer_name',
            '{call_response}' => 'call_response',
            '{age_person_available}' => 'age_person_available',
            '{call_remarks}' => 'call_remarks',
            '{contacted_person_discussion}' => 'contacted_person_discussion',
            '{occupancy_rented}' => 'occupancy_rented',
            '{customer_reaction}' => 'customer_reaction',
            '{reason_for_no_availability}' => 'reason_for_no_availability',
            '{relation_person_available}' => 'relation_person_available',
            '{person_available_name}' => 'person_available_name',
            '{other_details}' => 'other_details',
            '{final_remark}' => 'final_remark',
            '{third_party_confirmation}' => 'third_party_confirmation',
            '{business_years}' => 'num_of_yrs',

            // business
            '{qr_observed}' => 'qr_observed',
            '{nature_of_business}' => 'nature_of_business',
            '{office_type}' => 'office_type',
            '{monthly_rent}' => 'monthly_rent',
            '{employee_seen}' => 'no_emp_seen',
            '{premise_area}' => 'premise_area',
            '{premise_type}' => 'premise_type',
            '{business_board_seen}' => 'business_board_seen',
            '{type_of_setup}' => 'type_of_setup',
            '{other_business}' => 'other_business',
            '{stock_seen}' => 'stock_seen',
            '{emp_strength}' => 'emp_strength',
            '{merchant_name}' => 'merchant_name',
            '{merchant_dba_name}' => 'merchant_dba_name',
            '{level_of_stock}' => 'level_of_stock',
            '{mswipe_terminal_seen}' => 'mswipe_terminal_seen',
            '{merchant_neighbour_name}' => 'merchant_neighbour_name',
            '{merchant_neighbour_feedback}' => 'merchant_neighbour_feedback',
            '{board_sighted}' => 'board_sighted',

            // residential
            '{residence_type}' => 'residence_type',
            '{name_plate}' => 'name_plate',
            '{emp_designation}' => 'emp_designation',
            '{duartion_occupancy}' => 'duartion_occupancy',
            '{premise_size}' => 'premise_size',
        ];

        foreach ($mapping as $placeholder => $sourceKey) {

            $value = $this->resolveMappedValue($data, $sourceKey);

            // Special fallbacks
            if ($sourceKey === 'finding' && $value === null) {
                $value = "Case " . ($data['fv_status'] ?? '');
            }

            if ($sourceKey === 'qr_observed') {
                $value = $this->resolveQrObserved($data);
            }

            if ($sourceKey === 'nature_of_business' && $value === null) {
                $value = $this->resolveMappedValue($data, 'merchant_dba_name')
                    ?? 'No Business Name Found';
            }

            if ($value !== null && trim((string)$value) !== '') {
                $this->placeholders[$placeholder] = $placeholder;
                $this->filterData[$placeholder] = $value;
            }
        }
    }

    /**
     * 🔑 UNIVERSAL RESOLVER (APPLIED TO ALL KEYS)
     */
    private function resolveMappedValue(array $data, string $mappedKey): mixed
    {
        // Direct hit
        if (isset($data[$mappedKey]) && trim((string)$data[$mappedKey]) !== '') {
            return $data[$mappedKey];
        }

        $normalizedMapped = $this->normalizeKey($mappedKey);

        foreach ($data as $key => $value) {

            if (trim((string)$value) === '') {
                continue;
            }

            $normalizedKey = $this->normalizeKey($key);

            // Whole-key semantic match (NO word splitting)
            if (
                str_contains($normalizedKey, $normalizedMapped) ||
                str_contains($normalizedMapped, $normalizedKey)
            ) {
                return $value;
            }

            // Similarity fallback
            similar_text($normalizedMapped, $normalizedKey, $percent);
            if ($percent >= 75) {
                return $value;
            }
        }

        return null;
    }

    /**
     * Normalize keys without breaking words
     */
    private function normalizeKey(string $key): string
    {
        $key = strtolower($key);
        $key = str_replace(['_', '-', ' '], '', $key);
        return rtrim($key, 's'); // plural normalization
    }

    /**
     * QR observed logic
     */
    private function resolveQrObserved(array $data): ?string
    {
        foreach ($data as $key => $value) {
            if (
                stripos($key, $this->companyName) !== false &&
                (stripos($key, 'qr') !== false || stripos($key, 'terminal') !== false)
            ) {
                return str_contains(strtolower($value), 'seen')
                    ? strtoupper($this->companyName) . ' QR CODE WAS SEEN'
                    : $value;
            }
        }
        return null;
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
            return $value !== null && trim((string)$value) !== '';
        });
    }
}
