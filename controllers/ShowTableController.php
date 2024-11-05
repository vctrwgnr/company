<?php

class showTableController extends BaseController
{

    public function __construct(string $area)
    {
        parent::__construct($area);
        $this->view = 'table';
    }

    public function invoke(array $getData, array $postData): array
    {
        try {
            $array = TableHelper::getAllObjectsByArea($this->area);
        } catch (Error $e) {
            throw new Exception($e);
        }
        return $array;
    }

}