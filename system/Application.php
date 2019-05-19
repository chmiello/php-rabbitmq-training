<?php

namespace Rabbitmq;

use Rabbitmq\Contracts\Commands\Executor;
use Rabbitmq\Contracts\Rabbitmq\Connection;

/**
 * Class Application
 * @package Rabbitmq
 *
 */
class Application
{
    /**
     * @var Connection|null
     */
    private $_rabbitmqConnection = null;

    /**
     * @var Executor|null
     */
    private $_commandExecutor = null;

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
    public function getRabbitmqConnection(): Connection
    {
        return $this->_rabbitmqConnection;
    }

    /**
     * @param Executor $executor
     *
     * @return $this
     */
    public function setCommandExecutor(Executor $executor)
    {
        $this->_commandExecutor = $executor;
        return $this;
    }

    /**
     * @return Executor|null
     */
    public function getCommandExecutor()
    {
        return $this->_commandExecutor;
    }

}