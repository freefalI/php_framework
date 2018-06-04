<!-- <link rel="stylesheet/less" type="text/css" href="/styles/container.less"> -->
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
<!-- <script type="text/javascript" src="/styles/less.min.js"></script> -->
 <!-- <div class="jumbotron text-center">
        <h1>My First Bootstrap Page</h1>
        <p>Resize this responsive page to see the effect!</p>
    </div> -->
    <!-- <div class="mini-cart"></div> -->
    <div id="container-wrapper">
<br><br>
<h1 id="cat-name">{{$category->name}}</h1>
<br><br>
<div class = "sidebar left-sidebar">
         
<label>Price filter</label>
<form id="filterPrice" method=get action="">
    @ if( isset($setAttrs['minPrice'])):
        <input type=number id=min_price name=min_price  width="10" class="form-control" value = "{{$setAttrs['minPrice']}}" placeholder="Minimum price"/>
    @ else:
        <input type=number id=min_price name=min_price  width="10"  class="form-control"  placeholder="Minimum price"/>
    @endif;
    
    @ if( isset($setAttrs['maxPrice'])):
        <input type=number id=max_price name=max_price  class="form-control" value = "{{$setAttrs['maxPrice']}}" placeholder="Maximum price"/>
    @ else:
        <input type=number id=max_price name=max_price   class="form-control" placeholder="Maximum price"/>
    @endif;
    
<button type=submit class="button btn">Filter</button>

</form><br>
<form id = "filterBrand" method=get action="">
    <label>Brands</label>
        
   
            @ $i=0;
            @ foreach ($brands as $brand):
              @ $i++;  
            @ if( !strcmp($setAttrs["setbrand" . $i],'set')):
                <p><input type="checkbox" checked="" name = "brand{{$i}}">  {{$brand->name}}</p>
                @ else:
                <p><input type="checkbox"  name = "brand{{$i}}">  {{$brand->name}}</p>
                @endif;
            @ endforeach; 
         
        <button type=submit name ="brand-filter" value = "on" class="button btn">Filter</button>        
</form>
<br>
<label>Categories</label>
    
        @foreach ($categories as $category):
        <p><a class="cat-link" href="/products/{{$category->name}}">{{$category->name}}</a></p>
        @ endforeach; 
        
</div>

    <div class="container goods-grid">
    
        <div class="row">
            @foreach ($products as $product):
            <div class="col col-sm-6  col-md-4 col-lg-3 container-item"> 
            <a href="/product/{{$product->id}}" class="cat-link"><img class ="image" src="{{$product->img_path;}}" alt="image"> </a>  
            <!-- <img class ="iii" src="vendor/images/1" alt="image"  >     -->
           <a href="/product/{{$product->id}}" class="cat-link"> <h3 id="goods-name" >{{$product->category . " " . $product->brand .  " " . $product->model}}</h3></a>
            <!-- <p>Lorem ipsum dolor..</p> -->
            <p id="price">${{$product->price}}</p>
            <!-- <img id="add-to-cart-img" class = "add-to-cart" src="vendor/cart-image.png" alt="" data-id={{$product->id}}> -->
            <!-- <button type="submit" class="btn btn-primary add-to-cart" data-id={{$product->id}}>Buy</button> -->
            <img id="add-to-cart-img" class = "add-to-cart" src="/vendor/cart-image.png" alt="" data-id={{$product->id}}>
            </div>
            <!-- <div class="col-sm-4">
                <h3>Column 2</h3>
                <p>Lorem ipsum dolor..</p>
                <p>Ut enim ad..</p>
            </div>
            <div class="col-sm-4">
                <h3>Column 3</h3>
                <p>Lorem ipsum dolor..</p>
                <p>Ut enim ad..</p>
            </div> -->
            @ endforeach;
        </div>
        <nav class = "align-items-center" aria-label="Page navigation example" id="paginator-block">
  <ul class="pagination">
  @ if( $paginator['numOfPages']>=3):

        @ if( $paginator['curPage']!=1):
            <li class="page-item">
            <a class="page-link" href="{{$_SERVER['REQUEST_URI']}}&page=1" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
            </li>
            @endif;
            @ if( $paginator['curPage']==1):
            
            <li class="page-item "><a class="page-link active1" href="#!">1</a></li>
            <li class="page-item"><a class="page-link" href="{{$_SERVER['REQUEST_URI']}}&page=2">2</a></li>
            <li class="page-item"><a class="page-link" href="{{$_SERVER['REQUEST_URI']}}&page=3">3</a></li>
            @ elseif( $paginator['curPage']== $paginator['numOfPages']) :
                <li class="page-item "><a class="page-link" href="{{$_SERVER['REQUEST_URI']}}&page={{$paginator['curPage']-1}}">{{$paginator['curPage']-1}}</a></li>
            <li class="page-item "><a class="page-link active1" href="#!">{{$paginator['curPage']}}</a></li>
            <!-- <li class="page-item"><a class="page-link" href="?curPage{{$paginator['curPage+1']}}">?curPage{{$paginator['curPage+1']}}</a></li> -->
            @else:
                <li class="page-item "><a class="page-link" href="{{$_SERVER['REQUEST_URI']}}&page={{$paginator['curPage']-1}}">{{$paginator['curPage']-1}}</a></li>
            <li class="page-item "><a class="page-link active1" href="#!">{{$paginator['curPage']}}</a></li>
            <li class="page-item"><a class="page-link" href="{{$_SERVER['REQUEST_URI']}}&page={{$paginator['curPage']+1}}">{{$paginator['curPage']+1}}</a></li>
            @endif;
            @ if( $paginator['curPage']!=$paginator['numOfPages']):
            <li class="page-item">
            <a class="page-link" href="{{$_SERVER['REQUEST_URI']}}&page={{$paginator['numOfPages']}}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
            </li>
            @endif;

    @ elseif( $paginator['numOfPages']==1):
        <li class="page-item "><a class="page-link active1" href="#!">1</a></li>

    @else:
        @ if( $paginator['curPage']!=1):
            <li class="page-item">
            <a class="page-link" href="{{$_SERVER['REQUEST_URI']}}&page=1" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
            </li>
            <li class="page-item "><a class="page-link" href="{{$_SERVER['REQUEST_URI']}}&page=1">1</a></li>
            <li class="page-item"><a class="page-link active1" href="#">2</a></li>
            @ //endif;
            @ //if( $paginator['curPage']==1):
            @else:
            <li class="page-item "><a class="page-link active1" href="#!">1</a></li>
            <li class="page-item"><a class="page-link" href="{{$_SERVER['REQUEST_URI']}}&page=2">2</a></li>
            <li class="page-item">
            <a class="page-link" href="{{$_SERVER['REQUEST_URI']}}&page=2" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
            </li>
            @endif;

    @endif;
  </ul>
</nav>
    </div>






</div>
<script type="text/javascript" src="/scripts/main.js"></script>
<script src="/scripts/jquery-3.2.1.min.js"></script>
   <!-- <script type="text/javascript" src="/scripts/main.js"></script>
<script src="/scripts/jquery-3.2.1.min.js"></script> -->