<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/styles/admin.css" >
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

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
    <header>
        <div id="admin-head" class = "container-fluid">
            <h1 id="admin-label"><br><br>Admin page</h1>
            <form method="POST" id="exit-button">
                    <button type="submit" name="exit" class="btn exit-from-admin-panel">EXIT</button>
                </form>
                <a href="/browse/brands"> <button  class="btn nav-admin">Brands</button></a>
                <a href="/browse/categories"><button  class="btn nav-admin">Categories</button></a>
                <a href="/browse/goods"><button  class="btn nav-admin">Products</button></a>
        </div>
        
    </header>
    <div id ="wrapper" >
    <br>
    <h1 id="table-header">Categories</h1>    
    <br>
        <a href="/add/categories"><button class="btn" id="go-to-add-page-button">Add new</button></a>
        <br> <br>
    <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th></th>
                  <th>ID</th>
                  <th>Name</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($categories as $category): ?>
                <tr>
                <td><a href="/edit/categories/<?= $category->id ?>"><i class="fas fa-pencil-alt"></i></a></td>
                  <td><?= $category->id ?></td>
                  <td><?= $category->name ?></td>
                  <td><a href="/delete/categories/<?= $category->id ?>" onclick="return confirm('Запись будет удалена из бд. Удалить запись?')"><i class="fas fa-times"></i></a></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <br><br>
          </div>
    </div>
</body>
</html>
