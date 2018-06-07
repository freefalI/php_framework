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
}