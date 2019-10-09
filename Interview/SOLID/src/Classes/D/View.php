<?php


namespace App\D;


/**
 * Class View
 * @package App\D
 */
class View
{
    /**
     * @param $doctor
     * @param $patient
     * @param $data
     * @return string
     */
    public function getAllData($doctor, $patient, $data)
    {
        return $doctor . '_D' . PHP_EOL . $patient . '_D' . PHP_EOL . $data . '_D' . PHP_EOL;
    }
}