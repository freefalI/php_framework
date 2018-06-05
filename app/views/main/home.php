<link rel="stylesheet/less" type="text/css" href="/styles/home.less">
<script type="text/javascript" src="/styles/less.min.js"></script>

<div id = "home-top">
    <img id="home-zebra-image-1" class="img-fluid" src="/vendor/zebra1gradient.png" alt="">
    
    <p>INTRODUCING</p>
    <h2>WILD EYES</h2>
</div>
<div id="sales">
    @ foreach ($sales as $index=>$sale):
        <div class = "one_sale">
            <h2>-{{$sale->stock}}%</h2>
            <a href="/product/{{$saleGoods[$index]->id}}">
                <img class="" src="{{$saleGoods[$index]->img_path}}" alt="jeans">
                <p>{{$saleGoods[$index]->model}}</p>
            </a>
        </div>
    @ endforeach;

    </div>

<span id="label-categories" class='fa'>CATEGORIES</span>
<div id="home-categories-circles">

    <img id="home-zebra-image-2" class="img-fluid" src="/vendor/zebra2gradient.png" alt="">

    <div id="ellipse1"></div>
    <a href="/products/shoes"><div id="ellipse2">
        <img id="shape" src="/vendor/Shape1.png">
    </div></a>
    <a href="/products/shirts"><div id="ellipse3">
        <img class="img-fluid" src="/vendor/Shape2.png">
    </div></a>
    <a href="/products/jeans"><div id="ellipse4">
        <img class="wid" src="/vendor/Shape3.png">
    </div></a>
    <a href="/products/accessories"><div id="ellipse5">
        <img  id = "el4"  src="/vendor/Shape4.png">
    </div></a>
    <a href="/products/shoes"><div id="ellipse6">
        <img src="/vendor/Shape1.png">
    </div></a>
    <a href="/products/shirts"><div id="ellipse7">
        <img src="/vendor/Shape2.png">
    </div></a>
    <a href="/products/jeans"><div id="ellipse8">
        <img class="wid" src="/vendor/Shape3.png">
    </div></a>
    <div id="ellipse9"></div>

    <!-- <img id = "ellipse1" src="/vendor/Ellipse1.png" alt="">    
    <img id = "ellipse2" src="/vendor/Ellipse2.png" alt="">    
    <img id = "ellipse3" src="/vendor/Ellipse3.png" alt="">    
    <img id = "ellipse4" src="/vendor/Ellipse4.png" alt="">    
    <img id = "ellipse5" src="/vendor/Ellipse5.png" alt="">    
    <img id = "ellipse6" src="/vendor/Ellipse6.png" alt="">    
    <img id = "ellipse7" src="/vendor/Ellipse7.png" alt="">    
    <img id = "ellipse8" src="/vendor/Ellipse8.png" alt="">    
    <img id = "ellipse9" src="/vendor/Ellipse9.png" alt="">     -->
</div>

<!-- <div style="clear: both;"></div> -->

<div class="container goods-example">

    <img id="levis-logo" src="/vendor/levis.png" alt="Levis">

    <img id="big-image" src="{{$product->img_path}}" alt="jeans">
    <div id="goods-info">
        <a href ="/product/{{$product->id}}"> <p id="name">{{$product->model}}</p></a>
        <p id="description">
            {{$product->description}}
        </p>
        <p id="rate">Rate: 
            <span>$ {{$product->price}}</span>
        </p>
        <div id="" >
            <button data-id="{{$product->id}}" class ="add-to-cart">
            <img src="/vendor/cart-image-white.png" alt="">
            <span>Add to cart</span>
        </button>
        </div>
    </div>
    <div id="othergoods">
        <div><a href="/product/{{$prods[0]->id}}"><img class="img-thumbnail" src="{{$prods[0]->img_path}}" alt="jeans">
        <p>{{$prods[0]->model}}</p></a></div>
        <div><a href="/product/{{$prods[1]->id}}"><img class="img-thumbnail" src="{{$prods[1]->img_path}}" alt="jeans"><p>{{$prods[1]->model}}</p></a></div>
        <div><a href="/product/{{$prods[2]->id}}"><img class="img-thumbnail" src="{{$prods[2]->img_path}}" alt="jeans"><p>{{$prods[2]->model}}</p></a></div>
        <div><a href="/product/{{$prods[3]->id}}"><img class="img-thumbnail" src="{{$prods[3]->img_path}}" alt="jeans"><p>{{$prods[3]->model}}</p></a></div>
        <div id="home-5image"><a href="/product/{{$prods[4]->id}}"> <img class="img-thumbnail"  src="{{$prods[4]->img_path}}" alt="jeans"><p>{{$prods[4]->model}}</p></a></div>

    </div>
</div>




<!-- </div>
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <h3>Column 1</h3>
            <p>Lorem ipsum dolor..</p>
            <p>Ut enim ad..</p>
        </div>
        <div class="col-sm-4">
            <h3>Column 2</h3>
            <p>Lorem ipsum dolor..</p>
            <p>Ut enim ad..</p>
        </div>
        <div class="col-sm-4">
            <h3>Column 3</h3>
            <p>Lorem ipsum dolor..</p>
            <p>Ut enim ad..</p>
        </div>
    </div>
</div> -->