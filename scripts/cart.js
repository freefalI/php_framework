var cart = {}; 
(function(){
    alert("'44'");
    var buttons = document.getElementsByClassName('add-to-cart');
    for (var i = 0; i < buttons.length; i++) 
    buttons[i].onclick = addToCart;
    loadCart();
})();

function loadCart(){
    if(localStorage.getItem('cart')){
        cart=JSON.parse(localStorage.getItem('cart'));
        // showMiniCart();
        showCart();
    }
    else{
        $('.main-cart').html("Корзина пуста");
    }
}

function showCart(){
    $.getJSON('goods')
    var out='';
    for (var key in cart){
        out+=key + ' ---- '+cart[key]+'<br>';
    }
    $('.mini-cart').html(out);
}