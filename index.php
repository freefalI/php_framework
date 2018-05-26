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
require "Student.php";
require "Product.php";
// require "ProductInCart.php";
require "Brand.php";
require "Category.php";


Route::run();


    // echo json_encode($newProduct);

// for ($i=1; $i<28; $i++) { 
// SQL::table('products')->update()->where("id=" . $i)->setValues([
//     'img_path'=>"vendor/images/" .$i . ".jpg"
//     ])->execute();
// }



// SQL::table('sneakers')->select()->execute();print_r($arr);
// $products = Product::select()->execute();

// foreach ($products as $p) {
//    echo $p . "<br>";
// }

// $s1 = Student::find(5);
// $s1->changeGroup('Андрій');
//$s1->insert();
// echo $s1;

//
//$aa = ['id' => 10, 'name' => 'Олег', 'surname' => 'Юрченко', 'course' => 2, 'group_name' => 'ty61',
//    'birthday' => '1999-00-00', 'study_form_id' => 2];
//$s2 = new Student($aa,true);
//$s2->delete()->show();
//Student::find(5)->finishCourse()->insert(6);
//Student::find(6)->delete();
