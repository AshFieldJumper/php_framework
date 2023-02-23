<?php

namespace core;

class DB
{
    public function __construct()
    {
        parent::__construct();
        $this->pdo = new \PDO($this->getDsn(), $this->getUser(), $this->getPassword());
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function query(): QueryBuilder
    {
        $qb = new QueryBuilder();
        if (get_class($this) instanceof Model){
            $qb->from(get_class($this));
        }
        return $qb;
    }
    public function prepare()
    {
        $pdoStatement = $pdo->prepare($query);
        $pdoStatement->execute();

        $users = $pdoStatement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function get()
    {
        $pdoStatement = $pdo->prepare($query);
        $pdoStatement->execute(
        );

        return $pdoStatement->fetch(\PDO::FETCH_ASSOC);
    }
}