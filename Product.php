<?php

class Product extends Model
{
    
}

class Client extends Model
{
    public $id_field = "id";
    public static function findByEmail($id)
    {
        $obj = new static();
        $record = $obj->builder->select()->where("email". " = " . $id)->execute();
//        print_r($record[0]);
        if (!count($record))
            throw  new Exception("Error: could not find record with such id");
        return new static($record[0]);
    }

    
}
class Order extends Model
{
    
}
class Sale extends Model
{
    
}
class OrderDetails extends Model
{
    public $table = "orders_details";
}

class Verification extends Model
{
    public $table = "verification";
    public $id_field = "user_id";
}