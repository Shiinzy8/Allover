<?php


namespace App\L;


class Square extends Rectangle
{
    public function setWidth($width)
    {
        $this->height = $width;
        $this->width = $width;
    }

    public function setHeight($height)
    {
        $this->height = $height;
        $this->width = $height;
    }
}