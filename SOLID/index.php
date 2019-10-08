<?php

use App\O\FileSave;
use App\O\Report as AppReport;
use App\O\ReportRepository;
use App\S\HtmlTemplate;
use App\S\Report;

require "vendor/autoload.php";

// $report = new Report();
// $template = new HtmlTemplate();

// $template->render($report->getAllData());

$report = new AppReport();
$repository = new ReportRepository($report, new FileSave('file.txt'));