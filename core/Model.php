<?php
//ORM

/**
 *
 * id is not autoincrement by default
 *
 * when it is autoincrement, program may work incorrectly
 *
 */
class Model
{
    private $table;
    private $id_field = 'id';
//    private $isAutoInc = true;
    private $isNew;
    protected $attributes = [];
    private $builder;


    public function __construct($attrs = null, $isNew = false)
    {
        $this->isNew = $isNew;
        $this->setTable();
        $this->builder = SQL::table($this->table);
        if (isset($attrs))
            $this->attributes = $attrs;
    }

    public function setTable()
    {
        if (!isset ($this->table))
            $this->table = strtolower(static::class) . 's';
    }

    public static function __callStatic($name, $arguments)
    {
        $model = new static();
        $res = call_user_func_array([$model, $name], $arguments);
        return $res;
    }

    public function __call($name, $arguments)
    {
        $res = call_user_func_array([$this->builder, $name], $arguments);
        if ($res instanceof SQL)
            return $this;
        return $res;
    }
    public function __set($name, $value)
    {
        if (isset($this->$name))
            $this->$name = $value;
        else {
            if (isset($this->attributes[$name]))
                $this->attributes[$name] = $value;
            else
                throw  new Exception("Error: Non-existed field!");
        }
    }

    public function __get($name)
    {
        if (isset($this->$name))
            return $this->$name;
        else {
            if (isset($this->attributes[$name]))
                return $this->attributes[$name];
        }
        throw  new Exception("Error: Non-existed field!");
    }

    public function execute()
    {
        $result = $this->builder->execute();
        $models = [];
        foreach ($result as $rec)
            $models[] = new self($rec, false);
        return $models;
    }

    public static function find($id)
    {
        $obj = new static();
        $record = $obj->builder->select()->where($obj->id_field . " = " . $id)->execute();
//        print_r($record[0]);
        if (!count($record))
            throw  new Exception("Error: could not find record with such id");
        return new static($record[0]);
    }


    public function show()
    {
        echo $this . "\n";
//        foreach ($this->attributes as $key => $value) {
//            echo sprintf("%-20s", $key);
//        }
//        echo "\n";
//
//        foreach ($this->attributes as $key => $value) {
//            echo sprintf("%-20s", $value);
//        }
    }

    public function insert()
    {
        if ($this->isNew) {
            $this->builder->insert()->setValues($this->attributes)->execute();
            $this->isNew = false;
        } else {
            $this->builder->update()->where($this->id_field . " = " . $this->attributes[$this->id_field])->setValues($this->attributes)->execute();
        }
        return $this;
    }

    public function save()
    {
        return $this->insert();
    }

    public function delete()
    {
        try {
            if ($this->isNew)
                throw new Exception("WARNING: An attempt to delete a nonexistent record in database\n");
            $this->builder->delete()->where($this->id_field . " = " . $this->attributes[$this->id_field])->execute();
            return $this;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return $this;
        }
    }

    public function __toString()
    {
        $a = '';
        foreach ($this->attributes as $key => $value)
            $a .= "\t" . $key . " => " . $value . "\n";
        return $a;
    }

    public function changeId($id)
    {
        $this->id_field = $id;
        return $this;
    }
}




/**
 *
 * TODO
 * flag isNew +
 * check insert method +
 * AUTOINC ?
 */
