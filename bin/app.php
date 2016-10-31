#!/usr/bin/env php
<?php

use Symfony\Component\Console\Application;

require __DIR__ . '/../app/bootstrap.php';

/** @var Application $application */
$application = $container[Application::class];
$application->run();
