var cart = {}; 

(function(){
    // alert("11");
    // console.log("ad");
    var buttons = document.getElementsByClassName('add-to-cart');
    for (var i = 0; i < buttons.length; i++) 
    buttons[i].onclick = addToCart;
    loadCart();
})();

function addToCart(){
    var id = $(this).attr('data-id');
    if (cart[id]==undefined){
        cart[id]=1;
    }
    else {
        cart[id]++;
    }
    showMiniCart();
    saveCart();
}



function showMiniCart(){ 
    //аоказываю мини корзину.
    var out='';
    for (var key in cart){
        out+=key + ' ---- '+cart[key]+'<br>';
    }
    $('.mini-cart').html(out);
}

function saveCart(){
    localStorage.setItem('cart',JSON.stringify(cart));//сохраняем корзин
}

function loadCart(){
if(localStorage.getItem('cart')){
    cart=JSON.parse(localStorage.getItem('cart'));
    showMiniCart();
}
}