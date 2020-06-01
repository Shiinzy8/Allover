<?php

namespace App\Twig;

use App\Service\MarkdownHelper;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    /**
     * @var MarkdownHelper
     */
    private $helper;

    public function __construct(MarkdownHelper $helper)
    {

        $this->helper = $helper;
    }

    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
//            new TwigFilter('filter_name', [$this, 'doSomething']),
            new TwigFilter('cached_markdown', [$this, 'processMarkdown'], ['is_sage' => ['html']]),
        ];
    }

    public function processMarkdown($value)
    {
//        return strtoupper($value);
        return $this->helper->parse($value);
    }

//    public function getFunctions(): array
//    {
//        return [
//            new TwigFunction('function_name', [$this, 'doSomething']),
//        ];
//    }

    public function doSomething($value)
    {
        // ...
    }
}
