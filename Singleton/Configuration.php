<?php

namespace Singleton;

/**
 * @author Ali Cinci <alicinci.dev@gmail.com>
 */
class Configuration
{
    /**
     * @var
     */
    private $host;

    /**
     * @var
     */
    private $dbName;

    /**
     * @var
     */
    private $user;

    /**
     * @var
     */
    private $pwd;

    /**
     * Configuration constructor.
     */
    public function __construct()
    {
        $this->host = env('SQL_HOST');
        $this->dbName = env('SQL_DB');
        $this->user = env('SQL_USER');
        $this->pwd = env('SQL_PWD');
    }

    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @return mixed
     */
    public function getDbName()
    {
        return $this->dbName;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return mixed
     */
    public function getPwd()
    {
        return $this->pwd;
    }
}