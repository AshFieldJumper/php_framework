<?php

namespace core;

class DB
{
    private \PDO $pdo;

    private string $query = "";

    public function __construct()
    {
        $dsn = "mysql:host=" . getenv('DB_HOST') . ";dbname=" . getenv('DB_NAME') . ";port=" . getenv('DB_PORT') . ";";
        $this->pdo = new \PDO($dsn, getenv('DB_USER'), getenv('DB_PASSWORD'));
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function query()
    {
        $sql = new QueryBuilder();
        if (get_class($this) instanceof Model) {
            $sql->from(get_class($this));
        }
        $this->query = $sql;
    }


    public function get()
    {
        $pdoStatement = $this->pdo->prepare($this->query);
        $pdoStatement->execute();

        return $pdoStatement->fetch(\PDO::FETCH_ASSOC);
    }

    public function first()
    {
        return $this->get()[0];

    }
}