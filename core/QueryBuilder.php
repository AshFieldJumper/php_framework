<?php

namespace core;

class QueryBuilder extends DB
{
    /**
     * @var array<string>
     */
    private $fields = [];

    /**
     * @var array<string>
     */
    private array $conditions = [];
    private array $values = [];

    /**
     * @var array<string>
     */
    private $from = [];

    public function __toString(): string
    {
        $where = $this->conditions === [] ? '' : ' WHERE ' . implode(' AND ', $this->conditions);
        return 'SELECT ' . implode(', ', $this->fields)
            . ' FROM ' . implode(', ', $this->from)
            . $where;
    }

    public function select(string ...$select): self
    {
        $this->fields = $select;
        return $this;
    }

    public function where(array ...$where): self
    {
        foreach ($where as $statement) {
            $this->conditions[] = $statement[0];
            $this->values[] = $statement[1];
        }
        return $this;
    }

    public function from(string $table, ?string $alias = null): self
    {
        if ($alias === null) {
            $this->from[] = $table;
        } else {
            $this->from[] = "${table} AS ${alias}";
        }
        return $this;
    }
}