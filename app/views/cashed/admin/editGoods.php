<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/styles/admin.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
        crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>

</head>

<body>

    <head>
        <div id="admin-head" class="container-fluid">
            <h1 id="admin-label">
                <br>Admin page</h1>
            <form method="POST" id="exit-button">
                <button type="submit" name="exit" class="btn exit-from-admin-panel btn-outline-light">EXIT</button>
            </form>
            <br>
            <br>
            <a href="/browse/goods">
                <button class="btn admin-back btn-outline-light">
                    <i class="fas fa-long-arrow-alt-left"></i>
                </button>
            </a>
        </div>

    </head>
    <div id="wrapper">
    <br> <br>
        <h1>Edit</h1>
        <br> <br>
        <form method='POST' action="/update/goods/<?= $product->id ?>">
            <div class="form-group" id="add-product-form">
                <h3 name="id" value="<?= $product->id ?>">Id = <?= $product->id ?></h3>
                <!-- <input type="email" class="form-control input"  placeholder="Enter id"  value="<?= $product->id ?>"> -->
                <!-- <small class="form-text text-muted">Note</small> -->
                <br>
                <label for="">Select category</label>
                <select name="id_category" class="form-control" id="exampleSelect1">
                    <?php foreach ($categories as $category):  ?>
                        <?php if($category->name == $product->category): ?>
                        <option value="<?= $category->id ?>" selected=""><?= $category->name ?></option>
                        <?php else: ?>
                        <option value="<?= $category->id ?>"><?= $category->name ?></option>
                        <?php endif  ?>
                    <?php endforeach; ?>
                </select>
                <br>
                <label for="">Select brand</label>
                <select name="id_brand" class="form-control" id="exampleSelect2">
                    <?php foreach ($brands as $brand):  ?>
                        <?php if($brand->name == $product->brand): ?>
                        <option value="<?= $brand->id ?>" selected=""><?= $brand->name ?></option>
                        <?php else: ?>
                        <option value="<?= $brand->id ?>"><?= $brand->name ?></option>
                        <?php endif  ?>
                    <?php endforeach; ?>
                </select>
                <br>
                <label for="">Model</label>
                <input type="text" class="form-control input" name="model" placeholder="Enter model" value="<?= $product->model ?>">
                <br>
                <label for="">Price</label>
                <input type="number" class="form-control input" name="price" placeholder="Enter price" value="<?= $product->price ?>">
                <br>
                <label for="">Image path</label>
                <input type="text" class="form-control input" name="img_path" placeholder="Enter path to image" value="<?= $product->img_path ?>">
                <br>
                <label for="">Description</label> <br>
                <textarea name="description" id="" cols="60" rows="10"><?= $product->description ?></textarea>
                <br>
                <button onclick="return confirm('Применить изменения?')" type="submit" class="btn btn-info edit-button">Save</button>
        </form>
        </div>
        <div>
            <img id="img-edit" src="<?= $product->img_path ?>" alt="image<?= $product->id ?>">
        </div>
    </div>
</body>
</html>