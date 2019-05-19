<?php
/**
 * Created by PhpStorm.
 * User: chmiello
 * Date: 18.05.19
 * Time: 11:23
 */

namespace Rabbitmq\Libs;


use PhpAmqpLib\Connection\AMQPStreamConnection;

/**
 * Class Connection
 * @package Rabbitmq\Libs
 *
 */
class Connection
{
    private $_connection = null;

    /**
     * Connection constructor.
     */

    public function __construct()
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

    /**
     * @return AMQPStreamConnection
     */

    public function getConnection(): AMQPStreamConnection
    {
        return $this->_connection;
    }
}