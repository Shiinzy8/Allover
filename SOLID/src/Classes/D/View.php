<?php


namespace App\D;


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
        return $doctor . '<br/>' . $patient . '<br/>' . $data;
    }
}