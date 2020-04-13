<?php

use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    protected $article;

    protected function setUp(): void
    {
        $this->article = new App\Article;
    }

    public function testTitleIsEmptyByDefault() 
    {
        $this->assertEmpty($this->article->title);
    }

    public function testSlugIsEmptyWithNoTitle()
    {
        // this method doing boolean comparesson
        // $this->assertEquals($article->getSlug(), "");

        $this->assertSame($this->article->getSlug(), "");
    }

    public function testSlugHasSpacesReplaceByUnderscores()
    {
        $this->article->title = "An example article";

        $this->assertEquals($this->article->getSlug(), "An_example_article");
    }

    public function testSlugHasWhitespaceReplacedBySingleUnderscore()
    {
        $this->article->title = "An       example     \n        article";

        $this->assertEquals($this->article->getSlug(), "An_example_article");
    }

    public function testSlugDoesNotStartOrEndWithAnUnderscore()
    {
        $this->article->title = "           An       example     \n        article ";

        $this->assertEquals($this->article->getSlug(), "An_example_article");
    }
}