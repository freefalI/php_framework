<?php
 
class AdminController  extends Controller
{
    
   protected $middleware=["Auth"];

    /* function __construct(){
          echo "This is the main controller!";
         parent::__construct();
     }*/


    public function index(){
        echo  output('admin/index', [],0); 
    }
    public function browse($params){
        $table = $params['table'];
        switch ($table) {
            case 'goods':
                $products=Product::select()->setValues('products.id','categories.name  as category','brands.name as brand',
                'products.model','products.price','products.img_path')-> join([
                'categories'=>'products.id_category=categories.id',
                'brands'=>'products.id_brand=brands.id'])->orderBy('products.id')->execute();
                echo  output('admin/browseGoods', ['products'=>$products],0); 
                break;
            case 'categories':
                $categories=Category::select()->execute();
                echo  output('admin/browseCategories', ['categories'=>$categories],0); 
                break;
            case 'brands':
                $brands=Brand::select()->execute();
                echo  output('admin/browseBrands', ['brands'=>$brands],0); 
                break;
            default:
            header( 'Location: /admin' );
                break;
        }
    }
        
    public function edit($params){
        $table = $params['table'];
        switch ($table) {
            case 'goods':
            $product=Product::select()->setValues('products.id','categories.name  as category','brands.name as brand',
            'products.model','products.price','products.img_path')-> join([
            'categories'=>'products.id_category=categories.id',
            'brands'=>'products.id_brand=brands.id'])->where('products.id = ' . $params['id'])->execute()[0];
            $categories = Category::select()->execute();
            $brands = Brand::select()->execute();
            echo  output('admin/editGoods', ['product'=>$product,
                'categories'=>$categories,
                'brands'=> $brands],0); 
                break;
            case 'categories':
                // $category=Category::select()->execute();
                $category=Category::find($params['id']);
                echo  output('admin/editCategories', ['category'=>$category],0); 
                break;
            case 'brands':
                // $brand=Brand::select()->execute();
                $brand=Brand::find($params['id']);
                echo  output('admin/editBrands', ['brand'=>$brand],0); 
                break;
            default:
            header( 'Location: /admin' );
                break;
        }
        // $product=Product::select()->setValues('products.id','categories.name  as category','brands.name as brand',
        // 'products.model','products.price','products.img_path')-> join([
        // 'categories'=>'products.id_category=categories.id',
        // 'brands'=>'products.id_brand=brands.id'])->where('products.id = ' . $params['id'])->execute()[0];
        // // $product = Product::find($params['id']);
        // $categories = Category::select()->execute();
        // $brands = Brand::select()->execute();
        // echo  output('admin/edit', ['product'=>$product,
        //     'categories'=>$categories,
        //     'brands'=> $brands],0); 
    }
    public function add($params){
        $table = $params['table'];
        switch ($table) {
            case 'goods':
                $maxId = sql("SELECT MAX(ID) as maxId FROM PRODUCTS ");
                // $_POST['id'] = $maxId[0]['maxId'] + 1;
                $maxId= $maxId[0]['maxId'] + 1;
                $categories = Category::select()->execute();
                $brands = Brand::select()->execute();
                echo output('admin/addGoods', ['categories' => $categories, 'brands' => $brands, 'id' => $maxId], 0);
                break;
            case 'categories':
                $maxId = sql("SELECT MAX(ID) as maxId FROM categories ");
                // $_POST['id'] = $maxId[0]['maxId'] + 1;
                $maxId= $maxId[0]['maxId'] + 1;
                $categories = Category::select()->execute();
                echo output('admin/addCategories', ['categories' => $categories, 'id' => $maxId], 0);
                break;
            case 'brands':
                $maxId = sql("SELECT MAX(ID) as maxId FROM brands ");
                // $_POST['id'] = $maxId[0]['maxId'] + 1;
                $maxId = $maxId[0]['maxId'] + 1;
                $brands = Brand::select()->execute();
                echo output('admin/addBrands', ['brands' => $brands, 'id' => $maxId], 0);
                break;
            default:
            header( 'Location: /browse/' . $table );
                break;
        }
        // $maxId = sql("SELECT MAX(ID) as maxId FROM PRODUCTS ");
        // $_POST['id'] =$maxId[0]['maxId']+1;
        // $categories = Category::select()->execute();
        // $brands = Brand::select()->execute();
        // echo  output('admin/add', ['categories'=>$categories,'brands'=> $brands,'id'=>$maxId],0); 
    }

    public function delete($params){
        $table = $params['table'];
        $id=$params['id'];
        switch ($table) {
            case 'goods':
                Product::find($id)->delete();
                break;
            case 'categories':
                Category::find($id)->delete();
                break;
            case 'brands':
                Brand::find($id)->delete();
                break;
        }
        header( 'Location: /browse/' . $table );
        // $id=$params['id'];
        // // Product::delete()->where("id = " . $id)->execute();
        // Product::find($id)->delete();
        
    }
    public function update($params){
        $id=$params['id'];
        $_POST['id'] =$id;
        $table = $params['table'];
        switch ($table) {
            case 'goods':
                Product::update()->setValues($_POST)->where("id = " . $id)->execute();
                break;
            case 'categories':
                Category::update()->setValues($_POST)->where("id = " . $id)->execute();
                break;
            case 'brands':
                Brand::update()->setValues($_POST)->where("id = " . $id)->execute();
                break;
        }
        header( 'Location: /browse/' . $table );
        // // $a=[
        // //     'id'=>$id,
        // //     'id_category'=> $_POST['category'],
        // //     'id_brand'=> $_POST['brand'],
        // //     'model'=> $_POST['model'],
        // //     'price'=> $_POST['price'],
        // //     'img_path'=> $_POST['img_path']
        // // ];
        // Product::update()->setValues($_POST)->where("id = " . $id)->execute();
        // // Product::find($id)->update($_POST)->save()->execute();
        // header( 'Location: /browse');
    }
    public function insert($params){
        $table = $params['table'];
        switch ($table) {
            case 'goods':
                $maxId = sql("SELECT MAX(ID) as maxId FROM PRODUCTS ");
                $_POST['id'] = $maxId[0]['maxId'] + 1;
            // Product::insert()->setValues($_POST)->execute();
                $p = new Product($_POST, true);
                $p->save();
                break;
            case 'categories':
                $maxId = sql("SELECT MAX(ID) as maxId FROM categories ");
                $_POST['id'] = $maxId[0]['maxId'] + 1;
            // Product::insert()->setValues($_POST)->execute();
                $p = new Category($_POST, true);
                $p->save();
                break;
            case 'brands':
                $maxId = sql("SELECT MAX(ID) as maxId FROM brands ");
                $_POST['id'] = $maxId[0]['maxId'] + 1;
            // Product::insert()->setValues($_POST)->execute();
                $p = new Brand($_POST, true);
                $p->save();
                break;
        }
        header( 'Location: /browse/' . $table );
        // $maxId = sql("SELECT MAX(ID) as maxId FROM PRODUCTS ");
        // $_POST['id'] =$maxId[0]['maxId']+1;
        // // Product::insert()->setValues($_POST)->execute();
        // $p = new Product($_POST,true);
        // $p->save();
        // header( 'Location: /browse' );
    }
}
// GET -select
// POST — insert
// PUT -update
// DELETE — 