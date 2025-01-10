<?php

class Database
{
    private static $instance = null;
    private $connection;

    private function __construct($config)
    {
        $dsn = "mysql:" . http_build_query($config['database'], '', ';');
        $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
        $this->connection = new PDO($dsn, $config['database']['dbuser'], $config['database']['dbpwd'], $options);
    }

    public static function getInstance($config)
    {
        if (self::$instance === null) {
            self::$instance = new self($config);
        }
        return self::$instance;
    }

    public function query($query, $params = []): bool|PDOStatement
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($params);
        return $statement;
    }

    public function close(): void
    {
        $this->connection = null;
        self::$instance = null;
    }
}