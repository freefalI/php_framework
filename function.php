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
require "Student.php";
require "Product.php";
require "ProductInCart.php";

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
// function initCategories()
// {
//     Database::connect('localhost', 'zebra', 'root', '');
//     $arr = SQL::table('categories')->select()->setValues('id', 'name')->execute();
//     $result = [];
//     foreach ($arr as $str) {
//         $result[$str['id']] = $str;
//     }
//     echo json_encode($result);
// //    print_r($result);
// }
// function selectOneGoods()
// {
//     Database::connect('localhost', 'zebra', 'root', '');
//     $id = $_POST['gid'];
//     $result = SQL::table('products')->select()->where("id = " . $id)->execute();
//     if (count($result)) {
//         echo json_encode($result[0]);
//     } else echo 0;
// }

// function selectCategory()
// {
//     Database::connect('localhost', 'zebra', 'root', '');
//     $id = $_POST['gid'];
//     $result = SQL::table('categories')->select()->where("id = " . $id)->execute();
//     if (count($result)) {
//         echo json_encode($result[0]);
//     } else echo 0;
// }

// function AddNewProduct(){
//     Database::connect('localhost', 'zebra', 'root', '');
//     $newProduct = new Product([
//         // 'nid'=>$_POST['id'],
//         'id'=>30,
//     'id_category'=>$_POST['ncat'],
//     'id_brand'=>$_POST['nbrand'],
//     'model'=>$_POST['nmodel'],
//     'price'=>$_POST['nprice'],
//     'img_path'=>$_POST['nimg']],true);
//     // echo     $newProduct;     
//     // json_encode([
//     //     // 'nid'=>$_POST['id'],
//     //     'id'=>30,
//     // 'id_category'=>$_POST['ncat'],
//     // 'id_brand'=>$_POST['nbrand'],
//     // 'model'=>$_POST['nmodel'],
//     // 'price'=>$_POST['nprice'],
//     // 'img_path'=>$_POST['nimg']]);
//     $newProduct->save();
// }