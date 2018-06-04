<link rel="stylesheet/less" type="text/css" href="/styles/inform.less">
<script type="text/javascript" src="/styles/less.min.js"></script>
<br><br><br>

<div class = "left">
    <img src="{{$product->img_path}}" alt="">
</div>

<div class="right">
    <p id = "inf-title">{{$product->category . " " . $product->brand . " " . $product->model}}</p>
    <hr>
    <p id = "inf-price">${{$product->price}}</p>
    <p class =  "inf-info">Articul: #4567</p>
    <p class =  "inf-info">Sizes: L,XL,M</p>
    <p class =  "inf-info">Brand: {{$product->brand}}</p>
    <p class =  "inf-info">Delivery: 1-2 days</p>
   
    <button id = "inf-add-to-cart" type=submit  class="button btn add-to-cart" data-id="{{$product->id}}">Add to cart</button>      
    <!-- <button type=submit name ="brand-filter" value = "on" class="button btn"></button>       -->
</div>
<div id="info-descr-block">
<p id = "descr-title">Description</p>
<p id = "inf-descr">{{$product->description}}</p>
</div>

   <script type="text/javascript" src="/scripts/main.js"></script>
<script src="/scripts/jquery-3.2.1.min.js"></script>