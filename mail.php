<?php
// читать json файл
// $json = file_get_contents('../goods.json');
// $message .='<p>Name: '.$_POST['ename'].'</p>';
// $message .='<p>Surname: '.$_POST['esurname'].'</p>';
// $message .='<p>Fathers name: '.$_POST['efathersName'].'</p>';


// $message .='<p>Email: '.$_POST['email'].'</p>';
// $message .='<p>Phone Number: '.$_POST['ephone'].'</p>';
// $message .='<p>Adress: '.$_POST['eadress'].'</p>';


$message ='<p>Name: '.$_POST['name'].'</p>';
$message .='<p>Surname: '.$_POST['surname'].'</p>';
$message .='<p>Fathers name: '.$_POST['fathersName'].'</p>';


$message .='<p>Email: '.$_POST['email'].'</p>';
$message .='<p>Phone Number: '.$_POST['phoneNumber'].'</p>';
$message .='<p>Adress: '.$_POST['adress'].'</p>';


//client->select( whereуьфшд = )->wxecute()
// add data to db

// echo $message;

$goods = $_POST['goods'];
// $json = json_decode($json, true);
$json=$goods;
//письмо
// $message = '';
// $message .= '<h1>Заказ в магазине</h1>';
// $message .='<p>Телефон: '.$_POST['ephone'].'</p>';
// $message .='<p>Почта: '.$_POST['email'].'</p>';
// $message .='<p>Клиент: '.$_POST['ename'].'</p>';

$cart = $_POST['cart'];
$sum = 0;
foreach ($cart as $id=>$count) {
    $message .= '#'.$json[$id]['id'] .' ( ';
    $message .= $json[$id]['id_category'].' ';
    $message .=$json[$id]['id_brand'].') ';
    $message .=$json[$id]['model'].' --- ';
    $message .=$count.' --- ';
    $message .=$count*$json[$id]['price'];
    $message .='<br>';
    $sum = $sum +$count*$json[$id]['price'];
}
$message .='Всего: '.$sum;

// print_r($message);

// $to = 'your@email'.','; //не забудь поменять!
$to = 'andriyshmatko@mail.ua'; //не забудь поменять!
// $to = 'andriyshmatko@mail.ua'.','; //не забудь поменять!
// $to .=$_POST['email'];

$spectext = '<!DOCTYPE HTML><html><head><title>Заказ</title></head><body>';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

$m = mail($to, 'Заказ в магазине', $spectext.$message.'</body></html>', $headers);

if ($m) {echo 1;} else {echo 0;}
// header( 'Location: /' );
// return 1;
//ADD TO DB
