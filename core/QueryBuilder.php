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
    private array $from = [];

    public function __toString(): string
    {
        $select = "SELECT " . ($this->fields === [] ? '*' : implode(', ', $this->fields));
        $from = ' FROM ' . implode(', ', $this->from);
        $where = $this->conditions === [] ? '' : ' WHERE ' . implode(' AND ', $this->conditions);

        return $select
            . $from
            . $where;
    }

    public function select(mixed ...$select): self
    {
        $this->fields = $select;

        return $this;
    }

    public function where($column, $operator, $value): self
    {
        $this->conditions[] = $column . " " . $operator . " " . $value;

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