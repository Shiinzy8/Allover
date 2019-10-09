<?php


namespace App\O;


/**
 * Class Report
 * @package App\O
 */
class Report
{
    /**
     * @return string
     */
    public function getDoctor()
    {
        return "Doctor";
    }

    /**
     * @return string
     */
    public function getPatient()
    {
        return "Patient";
    }

    /**
     * @return string
     */
    public function getData()
    {
        return "Data";
    }

    /**
     * @return string
     */
    public function getAllData()
    {
        return $this->getDoctor() . PHP_EOL . $this->getPatient() . PHP_EOL . $this->getData();
    }
}