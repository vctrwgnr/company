<?php

class updateController extends BaseController
{
    public function __construct(string $area)
    {
        parent::__construct($area);
        $view = 'table';

    }

    public function invoke($getData, $postData): array
    {
        try {
            $this->view = 'table';
            if ($this->area === 'employee') {
                (new Employee($postData['id'], $postData['firstName'], $postData['lastName'],
                    $postData['gender'], $postData['salary']))->update();
            } elseif ($this->area === 'car') {
                (new Car($postData['id'], $postData['numberPlate'], $postData['maker'],
                    $postData['type']))->update();
            } elseif ($this->area === 'rental') {
                (new Rental($postData['id'], $postData['employeeId'], $postData['carId'],
                    $postData['startDate'], $postData['endDate']))->update();
            }
        } catch (Error $e) {
            throw new Exception($e);

        }
        return TableHelper::getAllObjectsByArea($this->area);
    }

}