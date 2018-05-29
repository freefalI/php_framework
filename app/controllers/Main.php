<?php
 
class Main  extends Controller
{
    /* function __construct(){
          echo "This is the main controller!";
         parent::__construct();
     }*/

    public function index(){
        echo output("main/content");
    }

    public function container(){
        $products = Product::select()->execute();
        echo output("main/container",['products'=>$products]);
    }
    
    public function cart(){
        // // $products = ProductInCart::select()->execute();
        // $products = Product::select()->limit(10)->execute();
        
        echo  output('cart', [ 'products'=>$products]); 
    }
}