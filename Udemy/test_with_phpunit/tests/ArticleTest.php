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

    // public function testSlugHasSpacesReplaceByUnderscores()
    // {
    //     $this->article->title = "An example article";

    //     $this->assertEquals($this->article->getSlug(), "An_example_article");
    // }

    // public function testSlugHasWhitespaceReplacedBySingleUnderscore()
    // {
    //     $this->article->title = "An       example     \n        article";

    //     $this->assertEquals($this->article->getSlug(), "An_example_article");
    // }

    // public function testSlugDoesNotStartOrEndWithAnUnderscore()
    // {
    //     $this->article->title = "           An       example     \n        article ";

    //     $this->assertEquals($this->article->getSlug(), "An_example_article");
    // }

    // public function testSlugDoesNotHaveAnyNonWordCharacters()
    // {
    //     $this->article->title = "           A$#n       ex%#()#ample     \n        a!@rticle ";

    //     $this->assertEquals($this->article->getSlug(), "An_example_article");   
    // }

    /**
     * dataprovider function must be public and with any name
     * the connection established with annotation @dataProvider
     */
    public function titleProvider() 
    {
        $slug = "An_example_article";

        // with this result we will see only index of a set with problem
        // return [
        //     ["An example article", $slug],
        //     ["An       example     \n        article", $slug],
        //     ["           An       example     \n        article ", $slug],
        //     ["           A$#n       ex%#()#ample     \n        a!@rticle ", $slug],
        //     ["           A$#n       ex%#()#ample     \n        a!@rticle ", "An_example_article_"],
        // ];

        // with this result we will see whole names of an index
        return [
            "First" => ["An example article", $slug],
            "Second" => ["An       example     \n        article", $slug],
            "Third" => ["           An       example     \n        article ", $slug],
            "Fourth" => ["           A$#n       ex%#()#ample     \n        a!@rticle ", $slug],
            "Fifth" => ["           A$#n       ex%#()#ample     \n        a!@rticle ", "An_example_article_"],
        ];
    }

    /**
     * @dataProvider titleProvider
     */
    public function testSlug($title, $slug)
    {
        $this->article->title = $title;

        // as a result we will see 6 assertions
        $this->assertEquals($this->article->getSlug(), $slug);
    }
}