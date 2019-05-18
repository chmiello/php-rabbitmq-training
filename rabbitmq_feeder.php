<?php

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

// rabbitmq connection

$connection = new \PhpAmqpLib\Connection\AMQPStreamConnection(
    getenv('RABBITMQ_HOST'),
    getenv('RABBITMQ_PORT'),
    getenv('RABBITMQ_USERNAME'),
    getenv('RABBITMQ_PASSWORD')
);

$channel = $connection->channel();

$channel->queue_declare(
    $queue = getenv('RABBITMQ_QUEUE_NAME'), // nazwa kolejki
    $passive = false, // passive
    $durable = true, // durable
    $exclusive = false, // exclusive
    $auto_delete = false, // auto deete
    $nowait = false, // nowait
    $arguments = null, // arguments
    $ticket = null // ticket
);

$taskId = 0;

while (true) {
    $taskId++;
    $messageBody = 'Task #' . $taskId;
    $msg = new \PhpAmqpLib\Message\AMQPMessage($messageBody);

    $channel->basic_publish($msg, '', getenv('RABBITMQ_QUEUE_NAME'));

    echo $messageBody . PHP_EOL;

    sleep(1);
}