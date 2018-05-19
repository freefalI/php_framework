<div class="main-cart">

<?php foreach ($products as $product): ?>
    <div class="col col-sm-6  col-md-4 col-lg-3">
            <img class ="iii" src="<?= $product->img_path;  ?>" alt="image"  >    
            <h3><?= "Adidas" . " " . $product->model ?></h3>
            <p>Lorem ipsum dolor..</p>
            <p><?= $product->price ?></p>
            <button type="submit" class="btn btn-primary add-to-cart" data-id=<?= $product->id ?>>Buy</button>
            </div>
<?php  endforeach; ?>

</div>






















<script type="text/javascript" src="scripts/cart.js"></script>