#!/usr/bin/env php
<?php

use Symfony\Component\Console\Application;

require __DIR__ . '/../app/bootstrap.php';

$application = $container[Application::class];
$application->run();
