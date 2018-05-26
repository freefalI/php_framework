<?php
 
class AdminController  extends Controller
{
    
   protected $middleware=["Auth"];

    /* function __construct(){
          echo "This is the main controller!";
         parent::__construct();
     }*/


    public function index(){
        echo  output('admin/editor', []); 
    }
    public function browse(){
        $products=Product::select()->setValues('products.id','categories.name  as category','brands.name as brand',
        'products.model','products.price','products.img_path')-> join([
        'categories'=>'products.id_category=categories.id',
        'brands'=>'products.id_brand=brands.id'])->orderBy('products.id')->execute();
        echo  output('admin/browse', ['products'=>$products],0); 
    }
    public function edit($params){
        $product=Product::select()->setValues('products.id','categories.name  as category','brands.name as brand',
        'products.model','products.price','products.img_path')-> join([
        'categories'=>'products.id_category=categories.id',
        'brands'=>'products.id_brand=brands.id'])->where('products.id = ' . $params['id'])->execute()[0];
        // $product = Product::find($params['id']);
        $categories = Category::select()->execute();
        $brands = Brand::select()->execute();
        echo  output('admin/edit', ['product'=>$product,
            'categories'=>$categories,
            'brands'=> $brands],0); 
    }
    public function add(){
        $categories = Category::select()->execute();
        $brands = Brand::select()->execute();
        echo  output('admin/add', ['categories'=>$categories,'brands'=> $brands],0); 
    }

    public function delete($params){
        $id=$params['id'];
        header( 'Location: /browse' );
        Product::delete()->where("id =" . $id)->execute();

    }
    public function update($params){
        $id=$params['id'];
        $_POST['id'] =$id;
        // $a=[
        //     'id'=>$id,
        //     'id_category'=> $_POST['category'],
        //     'id_brand'=> $_POST['brand'],
        //     'model'=> $_POST['model'],
        //     'price'=> $_POST['price'],
        //     'img_path'=> $_POST['img_path']
        // ];
        Product::update()->setValues($_POST)->where("id = " . $id)->execute();
        header( 'Location: /edit/' . $id );
    }
}
// GET -select
// POST — insert
// PUT -update
// DELETE — 