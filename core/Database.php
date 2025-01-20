<?php

class Database
{
    private static $instance = null;
    private $connection;
    public $statement;

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

    public function query($query, $params = []): self
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        return $this;
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $result = $this->find();
        if (!$result) {
            abort(Response::HTTP_NOT_FOUND);
        }
        return $result;
    }

    public function get()
    {
        return $this->statement->fetchAll();
    }
    public function getAllOrFail()
    {
        $result = $this->get();
        if (!$result) {
            abort(Response::HTTP_NOT_FOUND);
        }
        return $result;
    }

    public function close(): void
    {
        $this->connection = null;
        self::$instance = null;
    }
}