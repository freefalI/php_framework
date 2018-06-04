var cart = {}; 

(function(){
    // alert("11");
    // console.log("ad");
    // $(".navbar a").css("fontSize", '"Roboto Condensed" !important');
    // $(".navbar a").css("fontSize", "60px");
    // console.log("aaa");
    // $(".navbar a").css("color", "red");
    var buttons = document.getElementsByClassName('add-to-cart');
    for (var i = 0; i < buttons.length; i++) 
        buttons[i].onclick = addToCart;
    // $('.cart-button').on('click', sendLocalStorage);
    loadCart();
    // $("navbar").css("color", "red");
})();


function updateNumberInHeader(){
    var n = 0;
    for (var key in cart){
        n+=cart[key];
    }
    $('#amount').html(n);
}
function addToCart(){
    var id = $(this).attr('data-id');
    if (cart[id]==undefined){
        cart[id]=1;
    }
    else {
        cart[id]++;
    }
    updateNumberInHeader();
    $("#amount").css("background", "#05b5a9");
    $("#amount").css("color", "#fff");
    window.setTimeout(function () {  $("#amount").css("background", "none") }, 500);
    window.setTimeout(function () {  $("#amount").css("color", "black") }, 500);
    // showMiniCart();
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
    // var n = 0;
    // for (var key in cart){
    //     n+=cart[key];
    // }
    // console.log(n);
    // $('#amount').html(n);
    updateNumberInHeader();
    showMiniCart();
}
}

