<?php

class Main extends Controller
{
    static $minp;
    static $maxp;
    /* function __construct(){
          echo "This is the main controller!";
         parent::__construct();
     }*/

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

    public function containerA()
    {
        $categories = Category::select()->execute();
        $brands = Brand::select()->execute();

        $numOfProducts = Product::select()->setValues('count(id) as count')->execute()[0]->count;
        $numOfGoodsOnPage = 12;
        $numOfPages = round($numOfProducts / $numOfGoodsOnPage);
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        $leftBound = ($currentPage - 1) * $numOfGoodsOnPage;
                // echo  output('admin/browseGoods', ['products'=>$products],0); 
        $paginator = [
            'curPage' => $currentPage,
            'numOfPages' => $numOfPages,
            'numOfGoodsOnPage' => $numOfGoodsOnPage
        ];
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
        ])->orderBy('products.id')->limit($leftBound . ',' . $numOfGoodsOnPage)->execute();
        // $products = Product::select()->execute();
        echo output("main/container", ['products' => $products, 'brands' => $brands, 'categories' => $categories, 'paginator' => $paginator]);
    }

    public function cart()
    {
        // // $products = ProductInCart::select()->execute();
        // $products = Product::select()->limit(10)->execute();

        echo output('cart', ['products' => $products]);
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
    public function registration()
    {
        echo output("main/registration");
    }

    public function register()
    {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $fathersName = $_POST['fathersName'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phoneNumber'];
        $adress = $_POST['adress'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        if (strcmp($password, $password2)) {
            $url = 'name=' . $name . '&surname=' . $surname . '&fathersName=' . $fathersName . '&email=' .
                $email . '&phoneNumber=' . $phoneNumber . '&adress=' . $adress;
            header('Location: /registration?' . $url);
            // echo output("main/registration")
            return 0;
        }
        try {
            $a = Client::findByEmail($email);
        } catch (Exception $ex) {
            header('Location: /');
        //     return;
        // };
            $client = new Client([
                'email' => $email,
                'name' => $name,
                "surname" => $surname,
                "father_name" => $fathersName,
                "phone" => $phoneNumber,
                "adress" => $adress,
                "password" => $password,
                'is_verified' => 0
            ], true);
            $code = hash('sha256', $client);
            $client->save();

            $num = Client::select()->setValues('id')->execute();
            $num = $num[count($num) - 1]->id;

            $ver = new Verification(
                [
                    'user_id' => $num,
                    'code' => $code
                ],
                1
            );
            $ver->save();
            
            
            //success registration
            $message = '<p>Please, confirm your email.</p> <p>To activate your account click on the link below.</p>
            <a href = "http://zebra/confirm?userId=' . $num . "&key=" . $code . '">Click here</a>';
            $text = '<!DOCTYPE HTML><html><head><title>Regidtration</title></head><body>' . $message . "</body></html>";
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
            mail($email, 'Registration in Zebra shop', $text, $headers);
        }
        header('Location: /');
        // return;
  
        // echo output("main/registration");
    }
    public function confirm()
    {
        $userId = $_GET['userId'];
        $key = $_GET['key'];
        try {
            $ver = Verification::find($userId);
            if (!strcmp($ver->code, $key)) {
                $c = Client::find($userId);
                $c->is_verified = 1;
                $c->save();
                $ver->delete();
            }

            //zayti

            $_SESSION['user'] = $c;
        } catch (Exception $ex) {
        }
        header('Location: /');
    }

    public function authorisation()
    {
        echo output("main/authorisation");
    }
    public function authorisate()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $client = Client::select()->where("email = " . $email . " and password = " . $password)->execute();
        if (!count($client)) {
            return;
        }
        $client = $client[0];
        if ($client->is_verified){
            $_SESSION['user'] = $client;
        }     // print_r($client);
        // echo output("main/authorisation");
        header('Location: /');
    }

    public function unlogin()
    {
        unset($_SESSION['user']);
        header('Location: /');
    }
    public function fastBuy()
    {
        Database::connect('localhost', 'zebra', 'root', '');
        $name = $_POST['name'];
        $phoneNumber = $_POST['phoneNumber'];

        $goods = $_POST['goods'];
        $cart = $_POST['cart'];

        echo $name;
        echo $phoneNumber;
        echo "<br>1<br>";
        $client = new Client([
            'email' => null,
            'name' => $name,
            "surname" => null,
            "father_name" => null,
            "phone" => $phoneNumber,
            "adress" => null,
            "password" => null,
            'is_verified' => 0
        ], 1);

        print_r($goods);
        print_r($cart);
        // $client = new Client([
        //     'name' => $name,
            
        //     'phone' => $phoneNumber],1);
        $client->save();

        $clientId = Client::select()->setValues("id")->where("name = $name and phone = $phoneNumber")->execute();
        // $clientId = Client::select()->setValues("id")->limit(',1')->execute();
        $clientId = $clientId[0]->id; 
        // print_r($id);

        $amount = 0;
        foreach ($cart as $idd => $number) {
            $amount += ($goods[$idd]['price'] * $number);
        }
        $orderDate = date('Y-m-d H:i:s');
        $order = new Order([
            'id_client' => $clientId,
            'amount' => $amount,
            'order_date' => $orderDate,
            'dispatch_date' => null
        ], 1);
        $order->save();

        $orderId = Order::select()->setValues("id")->where("id_client = $clientId and amount = $amount")->execute();
        $orderId = $orderId[0]->id;
        foreach ($cart as $idd => $number) {
            $a = new OrderDetails([
                'id_order' => $orderId,
                'id_product' => $idd,
                'number' => $number,
                'amount' => ($goods[$idd]['price'] * $number)
            ], 1);
            $a->save();
        }


        header('Location: /');
    }

    public function buy()
    {
        Database::connect('localhost', 'zebra', 'root', '');
        
        $client = $_SESSION['user'];
        $goods = $_POST['goods'];
        $cart = $_POST['cart'];

           
        echo $client;

        

        print_r($goods);
        print_r($cart);
       
        $amount = 0;
        foreach ($cart as $idd => $number) {
            $amount += ($goods[$idd]['price'] * $number);
        }
        $orderDate = date('Y-m-d H:i:s');
        $order = new Order([
            'id_client' => $client->id,
            'amount' => $amount,
            'order_date' => $orderDate,
            'dispatch_date' => null
        ], 1);
        $order->save();

        $orderId = Order::select()->setValues("id")->where("id_client = $client->id and amount = $amount")->execute();
        $orderId = $orderId[count( $orderId)-1]->id;
        foreach ($cart as $idd => $number) {
            $a = new OrderDetails([
                'id_order' => $orderId,
                'id_product' => $idd,
                'number' => $number,
                'amount' => ($goods[$idd]['price'] * $number)
            ], 1);
            $a->save();
        }

        // header('Location: /');
    }
}