<?php
 
class CartController  extends Controller
{

    public function index(){
        echo  output('cart', []); 
    }

    public function fastBuy()
    {
        Database::connect('localhost', 'zebra', 'root', '');
        if(empty($_POST['name']) or empty($_POST['phoneNumber']))
        {
           
            echo 0;
            return;
        }
        
       if(!preg_match('/\d+/',$_POST['phoneNumber'] )){
            echo 0;
            return;
       }

        $name = $_POST['name'];
        $phoneNumber = $_POST['phoneNumber'];
        $goods = $_POST['goods'];
        $cart = $_POST['cart'];

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
        $client->save();

        $clientId = Client::select()->setValues("id")->where("name = $name and phone = $phoneNumber")->execute();
        $clientId = $clientId[0]->id; 
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
        // header('Location: /');
        echo 1;
    }

    public function buy()
    {
        Database::connect('localhost', 'zebra', 'root', '');
        $client = $_SESSION['user'];
        $goods = $_POST['goods'];
        $cart = $_POST['cart'];

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

        echo 1;
    }

}