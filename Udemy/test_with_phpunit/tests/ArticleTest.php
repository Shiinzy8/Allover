<?php

use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    protected article;

    protected function setUp(): void
    {
        $article = new App\Article;
    }

    public function testTitleIsEmptyByDefault() 
    {
        $article = new App\Article;

        $this->assertEmpty($article->title);
    }

    public function testSlugIsEmptyWithNoTitle()
    {
        $article = new App\Article;

        // this method doing boolean comparesson
        // $this->assertEquals($article->getSlug(), "");

        $this->assertSame($article->getSlug(), "");
    }

    public function testSlugHasSpacesReplaceByUnderscores()
    {

    }
}