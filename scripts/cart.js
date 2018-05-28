var cart = {}; 
 var goods;


function sendLocalStorage(){
    $.post(
        "handler.php",
        {
            "action": "initProducts",
            "localstorage" :localStorage.getItem('cart')
        },
        function (data) {
            goods  = JSON.parse(data);
            // console.log(cart);
            // console.log(goods);
            loadCart(); 
        });
    }



function loadCart(){
    if(localStorage.getItem('cart')){
        cart=JSON.parse(localStorage.getItem('cart'));
        // console.log(cart);
        showCart();
    }
    else{
        $('.main-cart').html("Корзина пуста");
    }
}

function showCart(){
    if (!isEmpty(cart)) {
        $('.main-cart').html('Корзина пуста!');
    }
    else {
            var out = '';
            for (var id in cart) {
                out += `<div class = "cart-item" ><button data-id="${id}" class="del-goods"><i class="fas fa-times"></i></button>`;
                out += `<img class ='cart-item-image' src="${goods[id].img_path}">`;
                // out += ` ${goods[id].id_category  }`;
                out += ` ${goods[id].id_brand  }`;
                out += ` ${goods[id].model  }`;
                out += ` ${goods[id].price  }`;
                out += `  <button data-id="${id}" class="minus-goods">-</button>  `;
                out += ` ${cart[id]}  `;
                out += `  <button data-id="${id}" class="plus-goods">+</button>  `;
                out += cart[id]*goods[id].price;
                out += '</div><br>';
            }
    
            $('.main-cart').html(out);
            $('.del-goods').on('click', delGoods);
            $('.plus-goods').on('click', plusGoods);
            $('.minus-goods').on('click', minusGoods);
        }
    }

function delGoods() {
    //удаляем товар из корзины
    var id = $(this).attr('data-id');
    delete cart[id];
    saveCart();
    showCart();
}

function plusGoods() {
    //добавляет товар в корзине
    var id = $(this).attr('data-id');
    cart[id]++;
    saveCart();
    showCart();
}
function minusGoods() {
    //уменьшаем товар в корзине
    var id = $(this).attr('data-id');
    if (cart[id]==1) {
        delete cart[id];
    }
    else {
        cart[id]--;
    }

    saveCart();
    showCart();
}


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

(function(){
    sendLocalStorage();
    // loadCart()
$('.send-email').on('click', sendEmail); // отправить письмо с заказом
//  });
})();


function sendEmail() {
    console.log(cart);
    console.log(goods);
    var ename = $('#ename').val();
    var email = $('#email').val();
    var ephone = $('#ephone').val();
    if (ename!='' && email!='' && ephone!='') {
        if (isEmpty(cart)) {
            $.post(
                "mail.php",
                {
                    "ename" : ename,
                    "email" : email,
                    "ephone" : ephone,
                    "cart" : cart,
                    "goods" :goods
                },
                function(data){
                    if (data==1) {
                        alert('Заказ отправлен');
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
    }
    else {
        alert('Заполните поля');
    }

}