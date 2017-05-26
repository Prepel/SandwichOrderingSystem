<?php
namespace Dao;

class Database
{
    /**
     * @var string
     */
    private $host;

    /**
     * @var string
     */
    private $schema;

    /**
     * @var string
     */
    private $user;

    /**
     * @var string
     */
    private $password;

    /**
     * @var \PDO
     */
    private $connection;

    /**
     * @var Database
     */
    private static $instance;

    /**
     * Function to get the instance of the database or create a new one
     *
     * @return Database
     */
    public static function getInstance()
    {
        if (!static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * Database constructor
     */
    private function __construct()
    {
        $this->host     = '127.0.0.1';
        $this->schema   = 'SandwichOrderingSystem';
        $this->user     = 'root';
        $this->password = '';

        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->schema;

        $this->connection = new \PDO( $dsn, $this->user, $this->password );
    }

    /**
     * Get the PDO connection
     *
     * @return \PDO
     */
    public function getConnection()
    {
        return $this->connection;
    }
}
