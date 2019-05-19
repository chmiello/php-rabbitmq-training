<?php


/**
 * dotenv init and .env load
 */
$dotenv = Dotenv\Dotenv::create(HOME);
$dotenv->load();

$application = new \Rabbitmq\Application();
$application->setRabbitmqConnection(new \Rabbitmq\Libs\Connection());

return $application;