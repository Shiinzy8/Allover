<?php

namespace App\D;

/**
 * Class FileSave
 * @package App\O
 */
class FileSave implements Saver
{
    /**
     * @var
     */
    private $filePath;

    /**
     * FileSave constructor.
     * @param $filePath
     */
    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * @param $data
     */
    public function save($data)
    {
        file_put_contents($this->filePath, $data);
    }
}