<?php


require "vendor/autoload.php";


$principle = "D";

switch ($principle) {
    case "S":
        $report = new \App\S\Report(); // предоставляет доступ к данным отчета

        $htmlTemplate = new \App\S\HtmlTemplate(); // htmlTemplate занимается только выводом данных
        $htmlTemplate->render($report->getAllData());

        $phpTemplate = new \App\S\PhpTemplate(); // phpTemplate занимается только выводом данных
        $phpTemplate->render($report->getAllData());

        break;
    case "O":
        $report = new \App\O\Report();

        $repository = new \App\O\ReportRepository($report, new \App\O\FileSave('file.txt'));
        $repository->save();

        break;
    case "L":
        $rect = new \App\L\Rectangle(10,5);
        $rect->setHeight(10);
        $rect->setWidth(5);

        echo $rect->area() . PHP_EOL;

        $rect = new \App\L\Square(10,10);
        $rect->setHeight(10);
        $rect->setWidth(5);

        echo $rect->area() . PHP_EOL;

        define("TEMPLATE", __DIR__);

        $layout = new \App\L\Example\CompositeView();

        $header1 = new \App\L\Example\PartialView('header.php');
        $header1->content = "Header one content";

        $header2 = new \App\L\Example\PartialView('header.php');
        $header2->content = "Header two content";

        $body = new \App\L\Example\PartialView('body.php');
        $body->content = "Body content";

        $footer = new \App\L\Example\PartialView('footer.php');
        $footer->content = "Footer content";

        $layout->addViews([$header1, $header2, $body, $footer]);

        echo $layout->render() . PHP_EOL;

        break;
    case "I":
        $orderBad = new \App\I\Bad_example\Order();
        echo $orderBad->getPaymentMethod() . PHP_EOL;

        // здесь ошибка в том, что в QuickOrder мы реализовываем методы которые нам не нужны
        $quickOrderBad = new \App\I\Bad_example\QuickOrder();
//        echo $quickOrderBad->getPaymentMethod() . PHP_EOL;

        $orderGood = new \App\I\Good_example\Order();
        echo $orderGood->getPayment() . PHP_EOL;

        // из-за того что мы создали много интерфейсов для $quickOrderGood нет метода getPayment()
        $quickOrderGood = new \App\I\Good_example\QuickOrder();
        echo $quickOrderGood->getClientInfo() . PHP_EOL;
        break;
    case "D":
        $view = new \App\D\View();
        $saver = new \App\D\FileSave(__DIR__ . DIRECTORY_SEPARATOR . 'file.txt');
        $report = new \App\D\Report($view);

        // главное здесь то что конструктор принимает на вход классы которые реализуют интерефейсы
        // в данном случае что б saver реализовывал метод save, а как конкретно какой то класс это сделает нам все равно
        // аналогичная ситуация и с report, важно что б он хоть как то реализовывал метод getAllData
        $reportRepository = new \App\D\ReportRepository($report, $saver);
        $reportRepository->save();
        break;
    default:

        break;
}