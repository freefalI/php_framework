<?php


class SQL
{
    public $table;
    public $where;
    public $orderBy;
    public $limit;
    public $select;
    public $insert;
    public $update;
    public $delete;
    public $join;
    public $params;

    public static function table($table)
    {
        return new SQL($table);
    }

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function first()
    {
        $this->limit = 1;
        return $this;
    }

    public function limit($numOfRecords)
    {
        $this->limit = $numOfRecords;
        return $this;
    }

    public function where($args)
    {
        $this->where = $args;
        return $this;
    }

    public function orderBy(...$fields)
    {
        $this->orderBy = $fields;
        return $this;
    }

    public function desc()
    {
        array_push($this->orderBy, 'desc');
        return $this;
    }

    public function select()
    {
        $this->select = true;
        return $this;
    }

    public function insert()
    {
        $this->insert = true;
        return $this;
    }

    public function update()
    {
        $this->update = true;
        return $this;
    }

    public function delete()
    {
        $this->delete = true;
        return $this;
    }

    public function join($params)
    {
        $this->join = $params;
        return $this;
    }

    public function setValues(...$params)
    {
        $this->params = $params;
        return $this;
    }


    public function execute()
    {
        return QueryComposer::compose($this);
    }

}