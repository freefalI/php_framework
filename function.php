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

// function fastBuy(){
//     Database::connect('localhost', 'zebra', 'root', '');
//     $name = $_POST['name'];
//     $phoneNumber = $_POST['phoneNumber'];
   
//     $goods = $_POST['goods'];
//     $cart = $_POST['cart'];
  
//     echo $name;
//     echo $phoneNumber;
//     echo "<br>1<br>";
//     $client = new Client([
//         'email' => null,
//         'name' => $name,
//         "surname" => null,
//         "father_name" => null,
//         "phone" => $phoneNumber,
//         "adress" => null,
//         "password" => null,
//         'is_verified'=>0],1);

//         print_r($goods);
//         print_r($cart);
//     // $client = new Client([
//     //     'name' => $name,
        
//     //     'phone' => $phoneNumber],1);
//         $client->save();
        
//     $clientId = Client::select()->setValues("id")->where("name = $name and phone = $phoneNumber")->execute();
//     // $clientId = Client::select()->setValues("id")->limit(',1')->execute();
//     $clientId=$clientId[0]->id ; 
//     // print_r($id);

//     $amount=0;
//     foreach ($cart as $idd => $number) {
//         $amount+=($goods[$idd]['price']*$number);
//     }   
//     $orderDate= date('Y-m-d H:i:s');
//     $order = new Order([
//         'id_client'=>$clientId,
//         'amount'=>$amount,
//         'order_date'=> $orderDate,
//         'dispatch_date'=>null
//     ],1);  
//     $order->save();

//     $orderId=Order::select()->setValues("id")->where("id_client = $clientId and amount = $amount")->execute();
//     $orderId = $orderId[0]->id;
//     foreach ($cart as $idd => $number) {
//         $a =  new OrderDetails([
//             'id_order'=> $orderId,
//             'id_product'=>$idd,
//             'number'=>$number,
//             'amount'=>($goods[$idd]['price']*$number)],1);
//             $a->save();
//     } 




    // print_r($goods);
  
// }
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