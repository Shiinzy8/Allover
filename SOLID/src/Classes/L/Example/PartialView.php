<?php


namespace App\L\Example;


use Exception;

class PartialView extends AbstractView
{

    /**
     * @param AbstractView $view
     * @return mixed
     * @throws Exception
     */
    public function addView(AbstractView $view)
    {
        throw new Exception("Error add view");
    }

    /**
     * @param array $views
     * @return mixed
     * @throws Exception
     */
    public function addViews(array $views)
    {
        throw new Exception("Error add views");
    }

    /**
     * @return mixed
     */
    public function render()
    {
        return $this->_render();
    }
}