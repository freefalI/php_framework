<?php

class MainController extends Controller
{
    static $minp;
    static $maxp;


    public function index()
    {
        $pr=Product::find(9);
        $prods = [Product::find(8),
        Product::find(10),
        Product::find(11),
        Product::find(12),
        Product::find(13)];
        $saleGoods=[];
        $sales = Sale::select()->limit(4)->execute();
        foreach ($sales as $sale) {
            $saleGoods[] = Product::find($sale->id_product);
        }

        echo output("main/home",['product'=>$pr,'prods'=>$prods,'sales'=>$sales,'saleGoods'=>$saleGoods]);
    }

    public static function container($params)
    {
        $categories = Category::select()->execute();
        $category = Category::select()->where('name = ' . $params['category'])->execute()[0];
        $brands = Brand::select()->execute();
        $condition = "id_category = " . $category->id;
        $setAttrs = [];

        if (isset($_GET['brand-filter'])) {

            $selectedBrands = [];

            for ($i = 1; $i <= count($brands); $i++) {
                if (isset($_GET['brand' . $i])) {
                    $selectedBrands[] = $brands[$i - 1];
                }
            }
            if (count($selectedBrands)) {

                foreach ($selectedBrands as $key => $brand) {
                    $setAttrs['setbrand' . $brand->id] = 'set';
                    if ($key == 0) {
                        $condition .= " and (id_brand = " . $brand->id;
                    } else {
                        $condition .= " or id_brand = " . $brand->id;
                    }
                }
                $condition .= " )";
            }
        }    
            // $setAttrs['minPrice'] =  self::$minp;
            // echo self::$minp;
            // $setAttrs['maxPrice'] =  self::$maxp;


        if (isset($_GET['min_price']) and isset($_GET['max_price']) and
            $_GET['min_price'] < $_GET['max_price']
            and is_numeric($_GET['min_price']) and is_numeric($_GET['max_price'])) {
            $min_price = $_GET['min_price'];
            $max_price = $_GET['max_price'];
            // self::$minp=$min_price;
            // self::$maxp=$max_price;
            $condition .= " and price >= " . $min_price . " and price <= " . $max_price;
            $setAttrs['minPrice'] = $min_price;
            $setAttrs['maxPrice'] = $max_price;
        }
        // if(empty($_GET['min_price'])){
            // echo 12;
            // $setAttrs['minPrice'] =    self::$minp;
            // $setAttrs['maxPrice'] =   self::$maxp;
        // }
        // echo   self::$minp;
        // echo   self::$maxp;
        // echo $_GET['min_price'];
        // echo $_GET['max_price'];
        // echo $condition;
        $numOfProducts = Product::select()->setValues('count(id) as count')->where($condition)->execute()[0]->count;
        $numOfGoodsOnPage = 12;
        $numOfPages = ceil($numOfProducts / $numOfGoodsOnPage);
        if (!$numOfPages)
            $numOfPages = 1;
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        $leftBound = ($currentPage - 1) * $numOfGoodsOnPage;
            // echo  output('admin/browseGoods', ['products'=>$products],0); 
        $paginator = [
            'curPage' => $currentPage,
            'numOfPages' => $numOfPages,
            'numOfGoodsOnPage' => $numOfGoodsOnPage
        ];
        // echo $numOfPages;
        // echo $currentPage;


        $products = Product::select()->setValues(
            'products.id',
            'categories.name  as category',
            'brands.name as brand',
            'products.model',
            'products.price',
            'products.img_path'
        )->join([
            'categories' => 'products.id_category=categories.id',
            'brands' => 'products.id_brand=brands.id'
        ])->where($condition)->orderBy('products.id')->limit($leftBound . ',' . $numOfGoodsOnPage)->execute();

        echo output("main/container", ['products' => $products, 'categories' => $categories, 'category' => $category, 'brands' => $brands, 'setAttrs' => $setAttrs, 'paginator' => $paginator]);

    }

    public function informPage($params)
    {
        $id = $params['id'];
        // $product = Product::find($id);
        $product = Product::select()->setValues(
            'products.id',
            'categories.name  as category',
            'brands.name as brand',
            'products.model',
            'products.price',
            'products.img_path',
            'products.description'
        )->join([
            'categories' => 'products.id_category=categories.id',
            'brands' => 'products.id_brand=brands.id'
        ])->where('products.id = ' . $params['id'])->execute()[0];
        echo output("main/inform", ['product' => $product]);
    }
    public function about()
    {
        echo output("main/about");
    }
}