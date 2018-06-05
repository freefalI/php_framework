<link rel="stylesheet/less" type="text/css" href="/styles/register.less">
<script type="text/javascript" src="/styles/less.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">


<div class="login-wrapper container">
<br>
    <br>
    <br>

  <form class="form-signin" method="POST" action="/register">
  <h2 class="form-signin-heading">Registration</h2>

    <br>

  <div class="form-group">

   <label for="">Name </label>
    <input id="ename" required type="text" value="<?= $_GET['name'] ?>" class="form-control input" name="name" placeholder="Enter name">
    <br>
    <label for="">Surname</label>
    <input id="esurname" required type="text" value="<?= $_GET['surname'] ?>"class="form-control input" name="surname" placeholder="Enter surname">
    <br>
    <label for="">Fathers name</label>
    <input id="efathersName" required type="text" value="<?= $_GET['fathersName'] ?>" class="form-control input" name="fathersName" placeholder="Enter fathers name">
    <br>

    <label for="">Email</label>
    <input id="email" required type="email" value="<?= $_GET['email'] ?>"  class="form-control input" name="email" placeholder="Enter email">
    <br>

    <label for="">Phone number</label>
    <input id="ephone" required type="tel" value="<?= $_GET['phoneNumber'] ?>"  class="form-control input" name="phoneNumber" placeholder="Enter phone number">
    <br>

    <label for="">Adress</label>
    <input id="eadress" required type="text" value="<?= $_GET['adress'] ?>" class="form-control input" name="adress" placeholder="Enter adress">
    <br> 
    <label for="exampleInputPassword1">Password</label>
    <input  name="password" required type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter password" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACIUlEQVQ4EX2TOYhTURSG87IMihDsjGghBhFBmHFDHLWwSqcikk4RRKJgk0KL7C8bMpWpZtIqNkEUl1ZCgs0wOo0SxiLMDApWlgOPrH7/5b2QkYwX7jvn/uc//zl3edZ4PPbNGvF4fC4ajR5VrNvt/mo0Gr1ZPOtfgWw2e9Lv9+chX7cs64CS4Oxg3o9GI7tUKv0Q5o1dAiTfCgQCLwnOkfQOu+oSLyJ2A783HA7vIPLGxX0TgVwud4HKn0nc7Pf7N6vV6oZHkkX8FPG3uMfgXC0Wi2vCg/poUKGGcagQI3k7k8mcp5slcGswGDwpl8tfwGJg3xB6Dvey8vz6oH4C3iXcFYjbwiDeo1KafafkC3NjK7iL5ESFGQEUF7Sg+ifZdDp9GnMF/KGmfBdT2HCwZ7TwtrBPC7rQaav6Iv48rqZwg+F+p8hOMBj0IbxfMdMBrW5pAVGV/ztINByENkU0t5BIJEKRSOQ3Aj+Z57iFs1R5NK3EQS6HQqF1zmQdzpFWq3W42WwOTAf1er1PF2USFlC+qxMvFAr3HcexWX+QX6lUvsKpkTyPSEXJkw6MQ4S38Ljdbi8rmM/nY+CvgNcQqdH6U/xrYK9t244jZv6ByUOSiDdIfgBZ12U6dHEHu9TpdIr8F0OP692CtzaW/a6y3y0Wx5kbFHvGuXzkgf0xhKnPzA4UTyaTB8Ph8AvcHi3fnsrZ7Wore02YViqVOrRXXPhfqP8j6MYlawoAAAAASUVORK5CYII=&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
 
    <br>
    
    <input  name="password2" required type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter password once more" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACIUlEQVQ4EX2TOYhTURSG87IMihDsjGghBhFBmHFDHLWwSqcikk4RRKJgk0KL7C8bMpWpZtIqNkEUl1ZCgs0wOo0SxiLMDApWlgOPrH7/5b2QkYwX7jvn/uc//zl3edZ4PPbNGvF4fC4ajR5VrNvt/mo0Gr1ZPOtfgWw2e9Lv9+chX7cs64CS4Oxg3o9GI7tUKv0Q5o1dAiTfCgQCLwnOkfQOu+oSLyJ2A783HA7vIPLGxX0TgVwud4HKn0nc7Pf7N6vV6oZHkkX8FPG3uMfgXC0Wi2vCg/poUKGGcagQI3k7k8mcp5slcGswGDwpl8tfwGJg3xB6Dvey8vz6oH4C3iXcFYjbwiDeo1KafafkC3NjK7iL5ESFGQEUF7Sg+ifZdDp9GnMF/KGmfBdT2HCwZ7TwtrBPC7rQaav6Iv48rqZwg+F+p8hOMBj0IbxfMdMBrW5pAVGV/ztINByENkU0t5BIJEKRSOQ3Aj+Z57iFs1R5NK3EQS6HQqF1zmQdzpFWq3W42WwOTAf1er1PF2USFlC+qxMvFAr3HcexWX+QX6lUvsKpkTyPSEXJkw6MQ4S38Ljdbi8rmM/nY+CvgNcQqdH6U/xrYK9t244jZv6ByUOSiDdIfgBZ12U6dHEHu9TpdIr8F0OP692CtzaW/a6y3y0Wx5kbFHvGuXzkgf0xhKnPzA4UTyaTB8Ph8AvcHi3fnsrZ7Wore02YViqVOrRXXPhfqP8j6MYlawoAAAAASUVORK5CYII=&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
    <br>
    <button type="submit" class="btn  btn-lg btn-primary btn-block">Register</button>
    </div>  
</form>
</div>
<br><br>
