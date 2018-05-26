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
        // $maxId = sql("SELECT MAX(ID) as maxId FROM PRODUCTS ");
        // $_POST['id'] =$maxId[0]['maxId']+1;
        $categories = Category::select()->execute();
        $brands = Brand::select()->execute();
        echo  output('admin/add', ['categories'=>$categories,'brands'=> $brands,'id'=>$maxId],0); 
    }

    public function delete($params){
        $id=$params['id'];
        // Product::delete()->where("id = " . $id)->execute();
        Product::find($id)->delete();
        header( 'Location: /browse' );
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
        // Product::find($id)->update($_POST)->save()->execute();
        header( 'Location: /browse');
    }
    public function insert($params){
        $maxId = sql("SELECT MAX(ID) as maxId FROM PRODUCTS ");
        $_POST['id'] =$maxId[0]['maxId']+1;
        // Product::insert()->setValues($_POST)->execute();
        $p = new Product($_POST,true);
        $p->save();
        header( 'Location: /browse' );
    }
}
// GET -select
// POST — insert
// PUT -update
// DELETE — 