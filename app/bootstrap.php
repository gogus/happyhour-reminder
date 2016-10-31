<?php

require __DIR__ . '/../vendor/autoload.php';

$container = require(__DIR__ . '/config/container.php');

$dotEnv = new Dotenv\Dotenv(__DIR__ . '/../');
$dotEnv->load();