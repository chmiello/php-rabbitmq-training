<?php

require_once __DIR__ . '/vendor/autoload.php';

define('HOME', realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR);

define('PHP_EXT', '.php');

require_once HOME . 'bootstrap/helpers.php';

$application = require_once HOME . 'bootstrap/app.php';
