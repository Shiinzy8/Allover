<?php


namespace App\L\Example;


use Exception;

 /**
 * Class AbstractView
 * @package App\L\Example
 */
abstract class AbstractView
{
    public $content;
    protected $_template;

    /**
     * AbstractView constructor.
     * @param $template
     * @throws Exception
     */
    public function __construct($template = null)
    {
        if ($template !== null) {
            $this->setTemplate($template);
        }
    }

    /**
     * @param $template
     * @throws Exception
     */
    public function setTemplate($template)
    {
        $template = TEMPLATE . '/templates' . DIRECTORY_SEPARATOR . $template;

        if (!file_exists($template)) {
            throw new Exception('Invalid template');
        }

        $this->_template = $template;
    }

    /**
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->_template;
    }

    /**
     * @return false|string
     */
    protected function _render()
    {
        if ($this->_template !== null) {
            extract(['content' => $this->content]);
            ob_start(); // write all in buffer
            include($this->_template); // include file of template
            return ob_get_clean(); // return everything from buffer
        }
    }

    /**
     * @param AbstractView $view
     * @return mixed
     */
    abstract public function addView(AbstractView $view);

    /**
     * @param array $views
     * @return mixed
     */
    abstract public function addViews(array $views);

    /**
     * @return mixed
     */
    abstract public function render();
}