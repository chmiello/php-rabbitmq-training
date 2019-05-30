<?php


/**
 * dotenv init and .env load
 */
$dotenv = Dotenv\Dotenv::create(HOME);
$dotenv->load();

$application = new \Rabbitmq\Application();
$application->setRabbitmqConnection(new \Rabbitmq\Libs\Connection());

try {
    $application->setCommandExecutor(new \Rabbitmq\Libs\Executor());
} catch (Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
    exit;
}

$application->executeCommand();


return $application;