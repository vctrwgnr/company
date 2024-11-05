<?php

/**
 * Class FilterData
 *
 * Extract POST data and match it against predefined attributes
 */
class FilterData
{
    private array $data;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * filter
     *
     * @return array
     */
    public function filter(): array
    {
        $area = $this->data['area'];

        // Define attribute arrays for different areas
        $attributesMap = [
            'employee' => ['firstName', 'lastName', 'gender', 'salary', 'area', 'action'],
            'car' => ['licensePlate', 'manufacturer', 'type', 'area', 'action']
        ];

        // Check if area exists in the attributes map
        if (!isset($attributesMap[$area])) {
            return []; // Return empty if no matching area is found
        }

        $areaAttributes = $attributesMap[$area];

        $sanitizedData = [];
        foreach ($areaAttributes as $attribute) {
            $sanitizedData[$attribute] = $this->data[$attribute];
        }

        // If no data matches an empty array is returned
        return $sanitizedData;
    }
}
