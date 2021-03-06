<?php
require_once "core/builder/PDOwrapper.php";
require_once "core/builder/SQLBuilder.php";
require_once "core/builder/QueryComposer.php";


require "core/output.php";
require "core/Route.php";
require "core/Model.php";
require "core/Middleware.php";

// require "app/db_connect/db_connection.php";

// require "app/View.php";
require "app/Controller.php";

require "app/web/routes.php";
//models
class Product extends Model
{
    
}
// require "ProductInCart.php";

function initProducts()
{
    Database::connect('localhost', 'zebra', 'root', '');
    $localstorage=json_decode($_POST['localstorage']);
    $goods=[];
    foreach ($localstorage as $key=>$value ){
        $p=Product::select()->setValues('products.id','categories.name  as category','brands.name as brand',
            'products.model','products.price','products.img_path')-> join([
            'categories'=>'products.id_category=categories.id',
            'brands'=>'products.id_brand=brands.id'])->where('products.id = ' . $key)->execute()[0];
            // $p = Product::find($key);
        $goods[]=$p->attributes;
    }
    $products=[];
    foreach ($goods as $key=>$value ){
        $products[$value['id']] = $value;
    }
    echo json_encode($products);
}
