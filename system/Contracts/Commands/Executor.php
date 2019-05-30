<?php
/**
 * Created by PhpStorm.
 * User: chmiello
 * Date: 19.05.19
 * Time: 21:09
 */

namespace Rabbitmq\Contracts\Commands;

/**
 * Contract to command executor class
 *
 * @package Rabbitmq\Contracts\Commands
 */
abstract class Executor
{
    /**
     * Commands array
     *
     * @var array
     */
    protected $commands = [];

    /**
     * Command execute class
     *
     * @var null
     */
    protected $commandDriver = null;

    /**
     * Command driver class
     *
     * @var null
     */
    protected $commandDriverClass = null;


    /**
     * Executor constructor.
     *
     * @throws \Exception
     */
    public function __construct()
    {
        if (is_null($this->commandDriverClass)) {
            throw new \Exception('Command driver is not define');
        }

        $this->commandDriver = new $this->commandDriverClass;

        foreach ($this->commands as $command) {
            $this->registerCommand($command);
        }

        $this->afterConstruct();
    }

    /**
     * Load commands from
     *
     * @return void
     */
    abstract public function loadCommands();

    /**
     * Register command in application
     *
     * @param mixed $command Command class
     *
     * @return void
     */
    abstract public function registerCommand($command);


    /**
     * Execute command
     *
     * @return void
     */
    abstract public function executeCommand();


    /**
     * Execute extra commands
     *
     * @return void
     */
    public function afterConstruct()
    {

    }

}