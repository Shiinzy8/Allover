<?php


namespace App\S;


class Report
{
    public function getDoctor()
    {
        return "Doctor";
    }

    public function getPatient()
    {
        return "Patient";
    }

    public function getData()
    {
        return "Data";
    }

    // такой подход плохой, здесь две задачи возврат данных
    // и их вывод
    // для солид лучше это разнести на два метода
    // public function renderReport() {
    //     echo $this->getDoctor().'<br/>'.$this->getPatient().'<br/>'.$this->getData();
    // }

    public function getAllData()
    {
        return $this->getDoctor() . '<br/>' . $this->getPatient() . '<br/>' . $this->getData();
    }

    // этот метод тоже нарушает принцип единой ответственности
    // можно сохранять различными способами
    // в различные расположения
    // его надо вынести в отдельный класс
    // public function save() {
    //     $filename = 'report'.$this->getDoctor().'-'.$this->getPatient.'.txt';
    //     file_put_contents($filename, $this->getAllData());
    // }
}