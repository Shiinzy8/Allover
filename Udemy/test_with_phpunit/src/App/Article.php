<?php

namespace App;

class Article
{
    /**
     * @var string
     */
    public $title;

    public function getSlug()
    {
        $slug = $this->title;

        $slug = str_replace(" ", "_", $slug);
        
        return $slug;
    }
}