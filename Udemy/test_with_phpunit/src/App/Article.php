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

        // $slug = str_replace(" ", "_", $slug);
        $slug = preg_replace('/\s+/', '_', $slug);
        $slug = trim($slug, '_');
        
        return $slug;
    }
}