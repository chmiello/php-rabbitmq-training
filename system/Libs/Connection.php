<?php
/**
 * Created by PhpStorm.
 * User: chmiello
 * Date: 18.05.19
 * Time: 11:23
 */

namespace Rabbitmq\Libs;


use PhpAmqpLib\Connection\AMQPStreamConnection;
use Rabbitmq\Contracts\Rabbitmq\Connection as AbstractConection;

/**
 * Class Connection
 * @package Rabbitmq\Libs
 *
 */
class Connection extends AbstractConection
{

    protected function initConnection()
    {
        if (is_null($this->_connection)) {
            $this->_connection = new AMQPStreamConnection(
                getenv('RABBITMQ_HOST'),
                getenv('RABBITMQ_PORT'),
                getenv('RABBITMQ_USERNAME'),
                getenv('RABBITMQ_PASSWORD')
            );
        }
    }
}