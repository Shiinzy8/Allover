<?php


namespace App\L;


/**
 * Class Square
 * @package App\L
 */
class Square extends Rectangle
{
    /**
     * @param mixed $width
     */
    public function setWidth($width)
    {
        $this->height = $width;
        $this->width = $width;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
        $this->width = $height;
    }
}