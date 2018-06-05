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
<div class = "container purchase clearfix">
<!-- <form action = "mail.php" method="POST"> -->
@ if(!isset($_SESSION['user'])):
<!-- <form method="POST" action="/fastBuy"> -->

<h3>Please, enter data. We will contact you later.</h3><br>
    <label for="">Name </label>
    <input id="ename" required type="text" class="form-control input" name="name" placeholder="Enter name">
    <br>
    <label for="">Phone number</label>
    <input id="ephone" required type="tel" class="form-control input" name="phoneNumber" placeholder="Enter phone number">
    <br>
    <button  class="btn fastBuy">Buy</button><br><br>
    <!-- onclick="return confirm('Alert!?')" -->
<!-- </form> -->

<!-- </form> -->
@endif;
@ if(isset($_SESSION['user'])):
    <button  class="btn buy">Buy</button><br><br>
    @endif;
</div>
<script src="scripts/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/scripts/cart.js"></script>
<link rel="stylesheet" type="text/css" href="/styles/cart.css">