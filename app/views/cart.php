 <div id="site-header">
<div class="container">
    <h1>Shopping cart</h1>
</div>
</div>
<div class="main-cart">
    <div class="container">
        <section id="cart">
        </section>
    </div>
    <div id="footer-cart">
    </div>


</div>
<!-- <div class="email-field">
    <p>Имя:
        <input type="text" id="ename">
    </p>
    <p>Email:
        <input type="text" id="email">
    </p>
    <p>Телефон:
        <input type="text" id="ephone">
    </p>
    <p>
        <button class="send-email">Заказать</button>
    </p>
</div> -->
<br><br><br>
<!-- <form action = "mail.php" method="POST"> -->
<div>
    <label for="">Name </label>
    <input id="ename" required type="text" class="form-control input" name="name" placeholder="Enter name">
    <br>
    <label for="">Surname</label>
    <input id="esurname" required type="text" class="form-control input" name="surname" placeholder="Enter surname">
    <br>
    <label for="">Fathers name</label>
    <input id="efathersName" required type="text" class="form-control input" name="fathersName" placeholder="Enter fathers name">
    <br>

    <label for="">Email</label>
    <input id="email" required type="email" class="form-control input" name="email" placeholder="Enter email">
    <br>

    <label for="">Phone number</label>
    <input id="ephone" required type="tel" class="form-control input" name="ephoneNunmber" placeholder="Enter phone number">
    <br>

    <label for="">Adress</label>
    <input id="eadress" required type="text" class="form-control input" name="adress" placeholder="Enter adress">
    <br>
    <button  class="btn btn-info add-button send-email ">Buy</button>
    <!-- onclick="return confirm('Alert!?')" -->
<!-- </form> -->
</div>



<script src="scripts/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/scripts/cart.js"></script>
<link rel="stylesheet" type="text/css" href="/styles/cart.css">