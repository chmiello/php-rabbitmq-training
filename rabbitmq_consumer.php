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

$callback = function ($msg) {
    $sleep = rand(1, 2);
    echo " [x] Received: ", $msg->body, " - execution time: ", $sleep, "\n";
    sleep($sleep);
};

$channel->basic_consume(
    getenv('RABBITMQ_QUEUE_NAME'),
    '',
    false,
    true,
    false,
    false,
    $callback
);


while (count($channel->callbacks)) {
    $channel->wait();
}
