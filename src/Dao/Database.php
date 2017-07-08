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
        $this->getConfigurations();

        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->schema;

        $this->connection = new \PDO( $dsn, $this->user, $this->password );
    }

    /**
     * @throws ConfigurationMissingException
     */
    private function getConfigurations(){
        $configurations = include('settings.php');
        if(isset($configurations['db-host']) && isset($configurations['db-user']) && isset($configurations['db-password']) && isset($configurations['db-schema'])){
            $this->host     = $configurations['db-host'];
            $this->schema   = $configurations['db-schema'];
            $this->user     = $configurations['db-user'];
            $this->password = $configurations['db-password'];
        } else {
            throw new ConfigurationMissingException('Database configuration missing.');
        }

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
