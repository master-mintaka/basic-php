<?php

class Database
{
    public $connection;

    public function __construct($config)
    {
        //$config = require 'config.php';

        $dsn = "mysql:" . http_build_query($config['database'], '', ';');
        $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
        $this->connection = new PDO($dsn, $config['database']['dbuser'], $config['database']['dbpwd'], $options);
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
    }
}
