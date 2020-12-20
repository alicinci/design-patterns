<?php

namespace Singleton;

use PDO;
use PDOException;

/**
 * @author Ali Cinci <alicinci.dev@gmail.com>
 */
class SQLDB extends Singleton
{
    /**
     * @var PDO
     */
    private $connection;

    /**
     * SQLDB constructor.
     */
    protected function __construct()
    {
        $conf = new Configuration();
        try {
            $this->connection = new PDO("mysql:host={$conf->getHost()};dbname={$conf->getDbName()}",
                $conf->getUser(),
                $conf->getPwd());
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    /**
     * @return PDO
     */
    public function getConnection()
    {
        return $this->connection;
    }
}