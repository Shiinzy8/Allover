<?php

use App\O\FileSave;
use App\O\Report as AppReport;
use App\O\ReportRepository;
use App\S\HtmlTemplate;
use App\S\Report;

require "vendor/autoload.php";

// S
// $report = new Report();
// $template = new HtmlTemplate();
// $template->render($report->getAllData());

// O
//$report = new AppReport();
//$repository = new ReportRepository($report, new FileSave('file.txt'));


// L
//$rect = new \App\L\Rectangle();
//$rect->setHeight(10);
//$rect->setWidth(5);
//
//echo $rect->area();
//
//$rect = new \App\L\Square();
//$rect->setHeight(10);
//$rect->setWidth(5);
//
//echo $rect->area();

define("TEMPLATE", __DIR__);
$layout = new \App\L\Example\CompositeView();
$header = new \App\L\Example\PartialView('header.php');
$header->content = "Header content";
$body = new \App\L\Example\PartialView('body.php');
$body->content = "Body content";
$footer = new \App\L\Example\PartialView('footer.php');
$footer->content = "Footer content";

$layout->addViews([$header, $body, $footer]);

echo $layout->render();