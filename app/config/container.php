<?php

use GuzzleHttp\Client;
use HappyHourReminder\Adapter\MailAdapter;
use HappyHourReminder\Client\GuzzleHttpClient;
use HappyHourReminder\Command\RemindCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\DomCrawler\Crawler;

$c = new Pimple\Container();

$c[Crawler::class] = function () {
    return new Crawler();
};

$c[Client::class] = function () {
    return new Client();
};

$c[PHPMailer::class] = function () {
    return new PHPMailer();
};

$c[GuzzleHttpClient::class] = function ($c) {
    return new GuzzleHttpClient($c[Client::class], $c[Crawler::class]);
};

$c[MailAdapter::class] = function ($c) {
    return new MailAdapter($c[PHPMailer::class]);
};

$c[RemindCommand::class] = function ($c) {
    return new RemindCommand($c[MailAdapter::class], $c[GuzzleHttpClient::class]);
};

$c[Application::class] = function ($c) {
    $application = new Application();
    $application->add($c[RemindCommand::class]);

    return new Application();
};

return $c;