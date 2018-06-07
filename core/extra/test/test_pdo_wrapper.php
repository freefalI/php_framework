<?php
/**
 * Created by PhpStorm.
 * User: Andrew Shmatko
 * Date: 19.03.2018
 * Time: 20:05
 */

require_once "src/PDOwrapper.php";


Database::connect('localhost', 'test_db', 'root', '');


print_r(sql("SELECT * FROM weather"));
echo "--------------------------\n";

print_r(sql("SELECT * FROM weather WHERE pressure > ?", 750));
echo "--------------------------\n";

print_r(sql("SELECT * FROM weather WHERE pressure = ? OR pressure = ?", 750, 751));
echo "--------------------------\n";

print_r(dsql("SELECT * FROM weather WHERE pressure = ? OR pressure = ?", [750, 751]));
echo "--------------------------\n";

print_r(dsql("SELECT * FROM weather WHERE pressure > :max", [':max' => 750]));
echo "--------------------------\n";


//$query = "UPDATE users SET name = :user_name WHERE id = :user_id";
//$params = [':user_name' => 'foobear', ':user_id' => 1001];
////echo build_pdo_query($query, $params);