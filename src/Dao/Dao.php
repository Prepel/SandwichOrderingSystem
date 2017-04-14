<?php

namespace Dao;

class Dao
{
    /** @var  \PDO */
    protected $pdo;

    /**
     * Dao constructor.
     */
    public function __construct()
    {
        $this->pdo = Database::getInstance()->getConnection();
        // set fetch mode to fetch assoc default, so we don't have to add it in every fetch.
        $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
    }
}
