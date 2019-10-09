<?php


namespace App\L\Example;


/**
 * Class CompositeView
 * @package App\L\Example
 */
class CompositeView extends AbstractView
{

    protected $_views = array();

    /**
     * @param AbstractView $view
     * @return mixed
     */
    public function addView(AbstractView $view)
    {
        $this->_views[] = $view;
        return $this;
    }

    /**
     * @param array $views
     * @return mixed
     */
    public function addViews(array $views)
    {
        foreach ($views as $view) {
            $this->addView($view);
        }
    }

    /**
     * @return mixed
     */
    public function render()
    {
        $output = "";
        if (!empty($this->_views)) {
            foreach ($this->_views as $view) {
                $output .= $view->render();
            }
        }

        return $output . $this->_render();
    }
}