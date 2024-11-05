<?php

class InsertController extends BaseController
{
    /**
     * @param string $area
     * @param string $view
     */
    public function __construct(string $area)
    {
        parent::__construct($area);
        $this->view = 'table';
    }

    public function invoke($getData, $postData): array
    {
        try {
            if ($this->area === 'employee') {
                $postData = (new FilterData($postData))->filter();
                $object = (new Employee())->insert($postData['firstName'], $postData['lastName'],
                    $postData['gender'], $postData['salary']);
            } elseif ($this->area === 'car') {
                $object = (new Car())->insert($postData['numberPlate'], $postData['maker'],
                    $postData['type']);
            } elseif ($this->area === 'rental') {
                $object = (new Rental())->insert($postData['employeeId'], $postData['carId'],
                    $postData['startDate'], $postData['endDate']);
            }
        } catch (Error $e) {
            throw new Exception($e);
        }

        return TableHelper::getAllObjectsByArea($this->area);
    }

}