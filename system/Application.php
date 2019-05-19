<?php

namespace Rabbitmq;

use Rabbitmq\Libs\Connection;

/**
 * Class Application
 * @package Rabbitmq
 *
 */
class Application
{
    /**
     * @var null|Connection
     */
    private $_rabbitmqConnection = null;

    /**
     * @param Connection $connection
     *
     * @return Application
     */
    public function setRabbitmqConnection(Connection $connection)
    {
        $this->_rabbitmqConnection = $connection;

        return $this;
    }

    /**
     * @return Connection|null
     */
    public function getRabbitmqConnection()
    {
        return $this->_rabbitmqConnection;
    }

}