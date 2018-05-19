    <div class="jumbotron text-center">
        <h1>My First Bootstrap Page</h1>
        <p>Resize this responsive page to see the effect!</p>
    </div>
    <div class="mini-cart"></div>
    <div class="container">
        <div class="row">
            @foreach ($products as $product):
            <div class="col col-sm-6  col-md-4 col-lg-3">
            <img class ="iii" src="{{$product->img_path; }}" alt="image"  >    
            <h3>{{"Adidas" . " " . $product->model}}</h3>
            <p>Lorem ipsum dolor..</p>
            <p>{{$product->price}}</p>
            <button type="submit" class="btn btn-primary add-to-cart" data-id={{$product->id}}>Buy</button>
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
    </div>

   