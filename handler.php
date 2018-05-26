<?php

require_once "core/builder/PDOwrapper.php";
require_once "core/builder/SQLBuilder.php";
require_once "core/builder/QueryComposer.php";
require_once 'function.php';

$action = $_POST['action'];

switch ($action) {
    case 'initProducts':
        initProducts();
        break;
    case 'initCategories':
        initCategories();
        break;
    case 'selectOneGoods':
        selectOneGoods();
        break;
    case 'selectCategory':
        selectCategory();
        break;
    case 'addOrUpdateItem':
        addOrUpdateItem();
        break;
    case 'AddNewProduct':
        AddNewProduct();
        break;
//    case 2:
//        echo "i равно 2";
//        break;
}