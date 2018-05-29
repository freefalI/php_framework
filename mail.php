<?php
// читать json файл
// $json = file_get_contents('../goods.json');
$goods = $_POST['goods'];
// $json = json_decode($json, true);
$json=$goods;
//письмо
$message = '';
$message .= '<h1>Заказ в магазине</h1>';
$message .='<p>Телефон: '.$_POST['ephone'].'</p>';
$message .='<p>Почта: '.$_POST['email'].'</p>';
$message .='<p>Клиент: '.$_POST['ename'].'</p>';

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
$to = 'andriyshmatko@mail.ua'.','; //не забудь поменять!
$to .=$_POST['email'];

$spectext = '<!DOCTYPE HTML><html><head><title>Заказ</title></head><body>';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

$m = mail($to, 'Заказ в магазине', $spectext.$message.'</body></html>', $headers);

if ($m) {echo 1;} else {echo 0;}
//ADD TO DB
