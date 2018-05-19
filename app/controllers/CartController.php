<?php
 
class CartController  extends Controller
{
    /* function __construct(){
          echo "This is the main controller!";
         parent::__construct();
     }*/

    public function index(){
        // if 
        
        // $products = ProductInCart::select()->execute();
        $products = Product::select()->limit(10)->execute();
        
        echo  output('cart', [ 'products'=>$products]); 
    }

    // public function container(){
    //     $products = Product::select()->execute();
    //     echo output("main/container",['products'=>$products]);
    // }
    
    // public function cart(){
    //     // $products = ProductInCart::select()->execute();
    //     $products = Product::select()->limit(10)->execute();
        
    //     echo  output('cart', [ 'products'=>$products]); 
    // }
}