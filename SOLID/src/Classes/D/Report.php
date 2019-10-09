<?php


namespace App\D;


/**
 * Class Report
 * @package App\O
 */
class Report implements IReport
{
    private $view;

    /**
     * Report constructor.
     * @param View $view
     */
    public function __construct($view)
    {
        // в конструктор тоже можно добавить тип интерфейс как аргумент
        // тогда мы еще больше уменьшим зависимость от деталей
        $this->view = $view;
    }

    /**
     * @return mixed
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @param mixed $view
     */
    public function setView($view)
    {
        $this->view = $view;
    }

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

    // такой подход плохой, здесь две задачи возврат данных
    // и их вывод
    // для солид лучше это разнести на два метода
    // public function renderReport() {
    //     echo $this->getDoctor().'<br/>'.$this->getPatient().'<br/>'.$this->getData();
    // }

    /**
     * @return string
     */
    public function getAllData() : string
    {
        return $this->getView()->getAllData(
            $this->getDoctor(),
            $this->getPatient(),
            $this->getData()
        );
    }

    // этот метод тоже нарушает принцип единой ответственности
    // можно сохранять различными способами
    // в различные расположения
    // его надо вынести в отдельный класс
    // это будет соответствовать принципу open-close
    // public function save() {
    //     $filename = 'report'.$this->getDoctor().'-'.$this->getPatient.'.txt';
    //     file_put_contents($filename, $this->getAllData());
    // }
}