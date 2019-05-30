<?php
/**
 * Created by PhpStorm.
 * User: chmiello
 * Date: 19.05.19
 * Time: 20:55
 */

namespace Rabbitmq\Libs;

use GetOpt\ArgumentException;
use GetOpt\ArgumentException\Missing;
use GetOpt\GetOpt;
use GetOpt\Option;
use Rabbitmq\Contracts\Commands\Executor as AbstractExecutor;

/**
 * Class Executor
 *
 * @category Rabbitmq\Libs
 * // show version and quit
 * if ($this->commandDriver->getOption('version')) {
 * echo sprintf('%s: %s' . PHP_EOL, NAME, VERSION);
 * exit;
 * }
 * @package  Rabbitmq\Libs
 * @author   chmiello <bartek@chmiello.pl>
 *
 * @property GetOpt $commandDriver
 */
class Executor extends AbstractExecutor
{

    protected $commandDriverClass = GetOpt::class;

    /**
     * Load commands from
     *
     * @return void
     */
    public function loadCommands()
    {
        $this->commands = config('app.commands');
    }

    /**
     * Register command in application
     *
     * @param mixed $command Command class
     *
     * @return void
     */
    public function registerCommand($command)
    {
        $this->commandDriver->addCommand(new $command);
    }


    /**
     * Execute command
     *
     * @return void
     */
    public function executeCommand()
    {
        // process arguments and catch user errors
        try {
            try {
                $this->commandDriver->process();
            } catch (Missing $exception) {
                // catch missing exceptions if help is requested
                if (!$this->commandDriver->getOption('help')) {
                    throw $exception;
                }
            }
        } catch (ArgumentException $exception) {
            file_put_contents('php://stderr', $exception->getMessage() . PHP_EOL);
            echo PHP_EOL . $this->commandDriver->getHelpText();
            exit;
        }

        // show help and quit
        $command = $this->commandDriver->getCommand();
        if (!$command || $this->commandDriver->getOption('help')) {
            echo $this->commandDriver->getHelpText();
            exit;
        }
    }

    /**
     * Add help option
     *
     * @return void
     */
    public function afterConstruct()
    {
        $this->commandDriver->addOptions(
            [
                Option::create('?', 'help', GetOpt::NO_ARGUMENT)
                    ->setDescription('Show version information and quit'),
            ]
        );
    }
}
