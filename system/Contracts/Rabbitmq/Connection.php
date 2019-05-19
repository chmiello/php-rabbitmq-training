<?php
/**
 * Created by PhpStorm.
 * User: chmiello
 * Date: 19.05.19
 * Time: 20:56
 */

namespace Rabbitmq\Contracts\Rabbitmq;

abstract class Connection
{
    /**
     * @var null
     */
    protected $_connection = null;

    /**
     * Connection constructor.
     */

    public function __construct()
    {
        $this->initConnection();
    }

    /**
     * @return mixed
     */
    abstract protected function initConnection();

    /**
     * @return null
     */
    public function getConnection()
    {
        return $this->_connection;
    }
}