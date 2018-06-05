var cart = {};
var goods;


function loadCart() {
    if (localStorage.getItem('cart')) {
        cart = JSON.parse(localStorage.getItem('cart'));
        $.post(
            "handler.php",
            {
                "action": "initProducts",
                "localstorage": localStorage.getItem('cart')
            },
            function (data) {
                goods = JSON.parse(data);
                showCart();
                init();
                // $('.fastBuy').on('click', fastBuy); 
            });
    }
    else {
        $('#cart').html("<h2>Cart is empty!</h2>");
    }
}


function showCart() {
    if (!isEmpty(cart)) {
        $('#cart').html('<h2>Cart is empty!</h2>');
    }
    // else {
    //         var out = '';
    //         for (var id in cart) {
    //             out += `<div class = "cart-item" ><button data-id="${id}" class="del-goods"><i class="fas fa-times"></i></button>`;
    //             out += `<img class ='cart-item-image' src="${goods[id].img_path}">`;
    //             // out += ` ${goods[id].id_category  }`;
    //             out += ` ${goods[id].brand  }`;
    //             out += ` ${goods[id].model  }`;
    //             out += ` ${goods[id].price  }`;
    //             out += `  <button data-id="${id}" class="minus-goods">-</button>  `;
    //             out += ` ${cart[id]}  `;
    //             out += `  <button data-id="${id}" class="plus-goods">+</button>  `;
    //             out += cart[id]*goods[id].price;
    //             out += '</div><br>';
    //         }
    else {
        var out = '';
        var out2 = '';
        var amount=0;
        for (var id in cart) {
            out +=`
                <article class="product">
                    <header>
                        <a class="remove" data-id="${id}" >
                            <img src="${goods[id].img_path}" alt="">

                            <h3>Remove product</h3>
                        </a>
                    </header>

                    <div class="content">

                        <h1>${goods[id].brand} ${goods[id].model}</h1>

                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, numquam quis perspiciatis ea ad omnis provident laborum
                        dolore in atque.
                        </div>
                    <footer class="content">
                        <span data-id="${id}" class="qt-minus">-</span>
                        <span  class="qt">${cart[id]}</span>
                        <span data-id="${id}" class="qt-plus">+</span>

                        <h2 class="full-price">
                            ${cart[id]*goods[id].price}€
                        </h2>

                        <h2 class="price">
                            ${goods[id].price}€
                        </h2>
                    </footer>
                </article>`
                

            amount+=cart[id]*goods[id].price;

        }
        out2+=`
            <div class="container clearfix">
            <div class="left">
                <h1 class="total">Total:
                    <span>${amount}</span>€</h1>
                <a class="checkout btn">Clear cart</a>
            </div>

            </div>
            </div> `;


    
        // $('.main-cart').html(out);
        // $('.del-goods').on('click', delGoods);
        // $('.plus-goods').on('click', plusGoods);
        // $('.minus-goods').on('click', minusGoods);

        $('#cart').html(out);
        $('#footer-cart').html(out2);
        // $('.remove').on('click', delGoods);
        // $('.qt-plus').on('click', plusGoods);
        // $('.qt-minus').on('click', minusGoods);
    }
}

// function delGoods() {
//     //удаляем товар из корзины
//     var id = $(this).attr('data-id');
//     delete cart[id];
//     saveCart();
//     showCart();
// }

// function plusGoods() {
//     //добавляет товар в корзине
//     var id = $(this).attr('data-id');
//     cart[id]++;
//     saveCart();
//     showCart();
// }
// function minusGoods() {
//     //уменьшаем товар в корзине
//     var id = $(this).attr('data-id');
//     if (cart[id] == 1) {
//         delete cart[id];
//     }
//     else {
//         cart[id]--;
//     }

//     saveCart();
//     showCart();
// }


function saveCart() {
    //сохраняю корзину в localStorage
    localStorage.setItem('cart', JSON.stringify(cart)); //корзину в строку
}

function isEmpty(object) {
    //проверка корзины на пустоту
    for (var key in object)
        if (object.hasOwnProperty(key)) return true;
    return false;
}

(function () {
    
    loadCart();
    
    $('.fastBuy').on('click', fastBuy); 
    $('.Buy').on('click', Buy); 
    // $('.send-email').on('click', sendEmail); // отправить письмо с заказом
    //  });
})();

function fastBuy(){
    alert("adadgr");
    var name = $('#ename').val();
    var phoneNumber = $('#ephone').val();
    if (isEmpty(cart)) {
        $.post(
            "/fastBuy",
            {
                // "action" :'fastBuy',
                "name": name,
                "phoneNumber": phoneNumber,
                "cart": cart,
                "goods": goods,
            },function(data){
                console.log(data);
            }
        );
    }
    else {
        alert('Корзина пуста');
    }
}

function Buy(){
    if (isEmpty(cart)) {
        $.post(
            "/buy",
            {
                // "action" :'fastBuy',
                "cart": cart,
                "goods": goods,
            },function(data){
                console.log(data);
            }
        );
    }
    else {
        alert('Корзина пуста');
    }
}
function sendEmail() {
    var name = $('#ename').val();
    var surname  = $('#esurname').val();
    var fathersName = $('#efathersName').val();
    var email = $('#email').val();
    var phoneNumber = $('#ephone').val();
    var adress = $('#eadress').val();
    console.log('AAAAAAAAA');
    // console.log(isEmpty(cart));

    if (isEmpty(cart)) {
        $.post(
            "mail.php",
            {
                "name": name,
                "surname": surname,
                "fathersName": fathersName,
                "email": email,
                "phoneNumber": phoneNumber,
                "adress": adress,
                "cart": cart,
                "goods": goods
            },
            function (data) {
                if (data == 1) {
                    alert('Заказ отправлен');
                    // window.location.replace('/a');
                }
                else {
                    alert('Повторите заказ');
                }
            }
        );
    }
    else {
        alert('Корзина пуста');
    }
    // var ename = $('#ename').val();
    // var email = $('#email').val();
    // var ephone = $('#ephone').val();
    // if (ename != '' && email != '' && ephone != '') {
    //     if (isEmpty(cart)) {
    //         $.post(
    //             "mail.php",
    //             {
    //                 "ename": ename,
    //                 "email": email,
    //                 "ephone": ephone,
    //                 "cart": cart,
    //                 "goods": goods
    //             },
    //             function (data) {
    //                 if (data == 1) {
    //                     alert('Заказ отправлен');
    //                 }
    //                 else {
    //                     alert('Повторите заказ');
    //                 }
    //             }
    //         );
    //     }
    //     else {
    //         alert('Корзина пуста');
    //     }
    // }
    // else {
    //     alert('Заполните поля');
    // }

}



var check = false;

function changeVal(el) {
    var qt = parseFloat(el.parent().children(".qt").html());
    var price = parseFloat(el.parent().children(".price").html());
    var eq = Math.round(price * qt * 100) / 100;

    el.parent().children(".full-price").html(eq + "€");

    changeTotal();
}

function changeTotal() {

    var price = 0;

    $(".full-price").each(function (index) {
        price += parseFloat($(".full-price").eq(index).html());
    });

    price = Math.round(price * 100) / 100;
    // var tax = Math.round(price * 0.05 * 100) / 100
    // var shipping = parseFloat($(".shipping span").html());
    // var fullPrice = Math.round((price + tax + shipping) * 100) / 100;

    if (price == 0) {
        fullPrice = 0;
    }

    // $(".subtotal span").html(price);
    // $(".tax span").html(tax);
    $(".total span").html(price);
    $(".total2").html(price);
}
function updateNumberInHeader(){
    var n = 0;
    for (var key in cart){
        n+=cart[key];
    }
    $('#amount').html(n);
}
// $(document).ready(function () {
    function init(){
    
    $(".remove").click(function () {
        var id = $(this).attr('data-id');
        delete cart[id];
        saveCart();
        updateNumberInHeader();
        $("#amount").css("background", "#05b5a9");
        $("#amount").css("color", "#fff");
        window.setTimeout(function () {  $("#amount").css("background", "none") }, 500);
        window.setTimeout(function () {  $("#amount").css("color", "black") }, 500);
        var el = $(this);
        el.parent().parent().addClass("removed");
        window.setTimeout(
            function () {
                el.parent().parent().slideUp('fast', function () {
                    el.parent().parent().remove();
                    if ($(".product").length == 0) {
                        if (check) {
                            $("#cart").html("<h2>No products!</h2>")
                        } else {
                            $("#cart").html("<h2>No products!</h2>");
                        }
                    }
                    changeTotal();
                });
            }, 200);
    });
    
    $(".qt-plus").click(function () {
        var id = $(this).attr('data-id');
        cart[id]++;
        saveCart();
        updateNumberInHeader();
        $("#amount").css("background", "#05b5a9");
        $("#amount").css("color", "#fff");
        window.setTimeout(function () {  $("#amount").css("background", "none") }, 500);
        window.setTimeout(function () {  $("#amount").css("color", "black") }, 500);

        $(this).parent().children(".qt").html(parseInt($(this).parent().children(".qt").html()) + 1);

        $(this).parent().children(".full-price").addClass("added");

        var el = $(this);
        window.setTimeout(function () { el.parent().children(".full-price").removeClass("added"); changeVal(el); }, 150);
    });
   function updateNumberInHeader(){
    var n = 0;
    for (var key in cart){
        n+=cart[key];
    }
    $('#amount').html(n);
}
    $(".qt-minus").click(function () {
        var id = $(this).attr('data-id');
        child = $(this).parent().children(".qt");

        if (parseInt(child.html()) > 1) {
            child.html(parseInt(child.html()) - 1);
            
        }
        if (cart[id] > 1) {
            cart[id]--;
        }
        saveCart();
        updateNumberInHeader();
        $("#amount").css("background", "#05b5a9");
        $("#amount").css("color", "#fff");
        window.setTimeout(function () {  $("#amount").css("background", "none") }, 500);
        window.setTimeout(function () {  $("#amount").css("color", "black") }, 500);

        $(this).parent().children(".full-price").addClass("minused");

        var el = $(this);
        window.setTimeout(function () { el.parent().children(".full-price").removeClass("minused"); changeVal(el); }, 150);
    });
    

    window.setTimeout(function () { $(".is-open").removeClass("is-open") }, 1200);

    $(".checkout").click(function () {
        check = true;
        $(".remove").click();
    });
    
// });
    }