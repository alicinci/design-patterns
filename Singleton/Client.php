<?php

namespace Singleton;

use PDO;

/**
 * @author Ali Cinci <alicinci.dev@gmail.com>
 */
class Client
{
    /**
     * @var PDO
     */
    private $client;

    /**
     * Client constructor.
     */
    public function __construct()
    {
        $conn = SQLDB::getInstance();
        $this->client = $conn->getConnection();
    }

    /**
     * @return array|false
     */
    public function query()
    {
        if ($this->client instanceof PDO) {
            $query = [];
            foreach($this->client->query('SELECT * from FOO') as $row) {
                array_push($query, $row);
            }
            return $query;
        }

        return false;
    }
}