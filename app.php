<?php

require_once __DIR__ . '/vendor/autoload.php';

define('HOME', realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR);

$application = require_once HOME . 'bootstrap/app.php';

dump($application);