<?php
/**
 * Created by PhpStorm.
 * User: Andrew Shmatko
 * Date: 14.04.2018
 * Time: 17:21
 */

require_once "src/SQLBuilder.php";

Database::connect('localhost', 'test_db', 'root', '');

//select
//$arr = SQL::table('weather')->select()->orderBy('pressure')->setValues('day','pressure')->limit(2)->execute();print_r($arr);
//$arr = SQL::table('weather')->select()->orderBy('pressure')->desc()->execute();print_r($arr);
$arr = SQL::table('weather')->select()->where("pressure > 650 and temperature < 10 ")->orderBy('pressure')->desc()->execute();print_r($arr);


//$arr = SQL::table('weather')->select()->setValues('temperature', 'pressure')
//    ->where("pressure > 650 and temperature < 10 ")->orderBy('pressure')->limit(2)->execute();
//print_r($arr);
//
//$arr = SQL::table('weather')->update()->setValues(['temperature' => 1111,])->where("pressure = 746")->execute();
//
//
$arr = SQL::table('weather')->insert()->setValues([
    'day' => '2023-03-02',
    'temperature' => 111,
    'pressure' => 746,
    'humidity' => 73,
    'precipitation' => 'Сильний сніг'])
    ->where("pressure > 650 ")->execute();
//
//
//$arr = SQL::table('weather')->delete()->where("temperature = 111 ")->execute();
//


//print_r($arr);
