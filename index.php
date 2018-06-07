<?php
require "core/builder/PDOwrapper.php";
require "core/builder/QueryComposer.php";
require "core/builder/SQLBuilder.php";

require "core/output.php";
require "core/Route.php";
require "core/Model.php";
require "core/Middleware.php";

require "app/db_connect/db_connection.php";

// require "app/View.php";
require "app/Controller.php";

require "app/web/routes.php";
//models

class Product extends Model
{
    
}
class Brand extends Model
{
    
}

class Category extends Model
{
    public $table="categories";
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

if(!isset($_SESSION)){
    session_start();
}

Route::run();


    // echo json_encode($newProduct);

// for ($i=1; $i<28; $i++) { 
// SQL::table('products')->insert()->where("id=" . $i)->setValues([
//     'img_path'=>"vendor/images/" .$i . ".jpg"
//     ])->execute();
// }

// for ($i=1; $i<120; $i++) { 
//     $b=$i%4+1;
//     $c=$i%4+1;
//     SQL::table('products')->insert()->setValues([
//         'id'=>$i,
//         'id_brand'=>$b,
//         'model'=>'ac' . $i,
//         'id_category'=>$c,
//         'price'=>$i*1.5,
//         'img_path'=>'/vendor/jeans1.png'
//         ])->execute();
//     }

// SQL::table('sneakers')->select()->execute();print_r($arr);
// $products = Product::select()->execute();

// foreach ($products as $p) {
//    echo $p . "<br>";
// }

// $s1 = Student::find(5);
// $s1->changeGroup('Андрій');
// $s1->insert();
// echo $s1;

//
//$aa = ['id' => 10, 'name' => 'Олег', 'surname' => 'Юрченко', 'course' => 2, 'group_name' => 'ty61',
//    'birthday' => '1999-00-00', 'study_form_id' => 2];
//$s2 = new Student($aa,true);
//$s2->delete()->show();
//Student::find(5)->finishCourse()->insert(6);
//Student::find(6)->delete();
