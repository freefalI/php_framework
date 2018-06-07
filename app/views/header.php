<!DOCTYPE html>
<html lang="eng">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Zebra shop</title>
<script src='https://www.google.com/recaptcha/api.js'></script>
<link href="https://fonts.googleapis.com/css?family=Holtwood+One+SC" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>
<!-- <link href="font-awesome.min.css" rel="stylesheet" type="text/css"> -->
<!-- Our Custom CSS -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
<!-- <link rel="stylesheet" type="text/css" href="styles/style.css" > -->
<!-- <link rel="stylesheet" type="text/css" href="styles/cart.css" > -->
<link rel="stylesheet/less" type="text/css" href="/styles/header.less">
<link rel="stylesheet/less" type="text/css" href="/styles/container.less">
<!-- <script type="text/javascript" src="/styles/less.min.js"></script> -->
<script type="text/javascript" src="/styles/less.min.js"></script>


</head>
<body >
    <header class = "container-fluid bg-light">
    <nav class="navbar navbar-expand-lg navbar-light container">
        <a class="navbar-brand header-logo" href="/"><span id="ze">ZE</span><span id="bra">BRA</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03"
            aria-expanded="false" aria-label="Toggle navigation" style="">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor03">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active header-button-home">
                    <a class="nav-link" href="/">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item dropdown show">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">Products</a>
                    <div class="dropdown-menu " x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 40px, 0px);">
                        
                        <a class="dropdown-item" href="/products/jeans">Jeans</a>
                        <a class="dropdown-item" href="/products/shirts">Shirts</a>
                        <a class="dropdown-item" href="/products/shoes">Shoes</a>
                        <a class="dropdown-item" href="/products/accessories">Accessories</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Shopping</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>
                <li class="nav-item nav-right nav-item-right cart-button">
                    <a class="nav-link cart-image" href="/cart"><img src="/vendor/cart-image.png" alt="cart"> <sup id="amount"></sup></a>
                </li>
                <!-- <li class="nav-item nav-right nav-item-right"> -->
                        <!-- <a class="nav-link" href="/admin">Admin</a> -->
                <!-- </li> -->
                <?php if(!isset($_SESSION['user'])):?>
                <li class="nav-item"><a class="nav-link" href ="/registration" >Registration</a></li>
                <li class="nav-item"> <a class="nav-link" href ="/authorisation" >Log in</a></li>
                <?php endif;?>
                <?php if(isset($_SESSION['user'])):?>
                <li class=" aut">
                <span id="aut-e"><?=$_SESSION['user']->email?></span>
                <!-- <br><br> -->
                <span id="aut-n"> <?=$_SESSION['user']->name?><?=$_SESSION['user']->surname?></span>
                </li>
                <li class="nav-item"> <a  class="nav-link" href ="/unlogin" >Log out</a></li>
                 <?php endif;?>
            </ul>
            <!-- <button type="submit" class="btn btn-primary">Cart</button> -->

            <!-- <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form> -->


        </div>
    </nav>
</header>
    <div id="wrapper" class = "container">