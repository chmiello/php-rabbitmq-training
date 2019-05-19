<?php
/**
 * Created by PhpStorm.
 * User: chmiello
 * Date: 19.05.19
 * Time: 21:09
 */

namespace Rabbitmq\Contracts\Commands;

/**
 * Class Executor
 * @package Rabbitmq\Contracts\Commands
 */
abstract class Executor
{
    /**
     * @var array
     */
    protected $_commands = [];

    /**
     * @var null
     */
    protected $commandDriver = null;

    /**
     * @return mixed
     */
    public function loadCommandsFromConfig()
    {
        
    }

}