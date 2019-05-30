<?php

namespace Rabbitmq;

use Rabbitmq\Contracts\Commands\Executor;
use Rabbitmq\Contracts\Rabbitmq\Connection;

/**
 * Main class
 *
 * @package Rabbitmq
 *
 */
class Application
{
    /**
     * Rabbitmq driver
     *
     * @var Connection|null
     */
    private $_rabbitmqConnection = null;

    /**
     * Command executor
     *
     * @var Executor|null
     */
    private $_commandExecutor = null;

    /**
     * Setter _rabbitmqConnection
     *
     * @param Connection $connection Connection class
     *
     * @return Application
     */
    public function setRabbitmqConnection(Connection $connection)
    {
        $this->_rabbitmqConnection = $connection;

        return $this;
    }

    /**
     * Getter _rabbitmqConnection
     *
     * @return Connection|null
     */
    public function getRabbitmqConnection(): Connection
    {
        return $this->_rabbitmqConnection;
    }

    /**
     * Setter _commandExeutor
     *
     * @param Executor $executor Executor class
     *
     * @return $this
     */
    public function setCommandExecutor(Executor $executor)
    {
        $this->_commandExecutor = $executor;
        return $this;
    }

    /**
     * Getter _commandExecutor
     *
     * @return Executor|null
     */
    public function getCommandExecutor()
    {
        return $this->_commandExecutor;
    }

    /**
     * Execute command
     *
     * @return void
     */
    public function executeCommand()
    {
        $this->_commandExecutor->executeCommand();
    }

}