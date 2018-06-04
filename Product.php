<?php

class Product extends Model
{
    
}

class Client extends Model
{
    public $id_field = "id";
    
}
class Order extends Model
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