let cart = {}; //Корзина

function init() {
    //Считываю файл goods.json
    $.getJSON('goods.json', goodsOut);
}

function goodsOut(data) {
    //вывод на страницу
    let out = '';
    for (let key in data) {
        out += '<div class="col-lg-4 col-md-6 mb-4">';
            out += '<div class="card h-100">';
                out += `<a href=""><img class="card-img-top" src="img/${data[key].img}" alt="${data[key].name}"></a>`;
                out += '<div class="card-body">';
                    out += '<h4 class="card-title">';
                        out += `<a href="#">${data[key].name}</a>`;
                    out += '</h4>';
                    out += `<h5>${data[key].cost} грн.</h5>`;
                    out += `<p class="card-text">${data[key].description}</p>`;
                out += '</div>';
                out += '<div class="card-footer">';
                    out += `<a class="btn btn-primary add-to-cart" data-id="${key}">Добавить в корзину</a>`;
                 out += '</div>';
            out += '</div>';
        out += '</div>';
    }
    $('.goods-out').html(out);
    $('.add-to-cart').on('click', addToCart);
}

function addToCart(){
    //Добавляем товар в карзину
    let id = $(this).attr('data-id');
    // console.log(id);
    if (cart[id] == undefined){
        cart[id] = 1; //Если товара нет - то обьявляем 1
    } else {
        cart[id]++; //Если товар есть - то добавляем 1
    }
    showMiniCart();
    saveToCart();
}

function saveToCart() {
    //Сохраняю карзину в LocalStorage
    localStorage.setItem('cart', JSON.stringify(cart));
}

function showMiniCart(){
    if (!isEmpty(cart)){
        $('.basket').html('<h3>Корзина пуста!</h3>')
    } else {
        $.getJSON('goods.json', function (data) {
            let goods = data;
            let out = '';
            for (let id in cart) {
                out += `<button data-id="${id}" class="del-goods"><i class="fas fa-trash-alt"></i></button>`;
                out += `<h4>${goods[id]['name']}</h4>`;
                out += `<img src="img/${goods[id]['img']}">`;
                out += `<h5 class="count">${cart[id]}</h5>`;
                out += `<h6 class="x"><i class="fas fa-times"></i></h6>`;
                out += `<h5 class="price">${goods[id]['cost']} грн.</h5>`;
                out += `<h6><i class="fas fa-exchange-alt"></i></h6>`;
                out += `<h5 class="final-price">${cart[id] * goods[id]['cost']} грн.</h5>`;
                out += `<button data-id="${id}" class="plus-goods"><i class="fas fa-plus"></i></button>`;
                out += `<button data-id="${id}" class="minus-goods"><i class="fas fa-minus"></i></i></button>`;
                out += `<br>`;
                out += `<br>`;
                out += `<hr>`;


            }
            $('.basket').html(out);
            $('.del-goods').on('click', delGoods);
            $('.plus-goods').on('click', plusGoods);
            $('.minus-goods').on('click', minusGoods);
        });
    }
}

function delGoods() {
    let id = $(this).attr('data-id');
    delete cart[id];
    saveToCart();
    showMiniCart();
}

function minusGoods() {
    let id = $(this).attr('data-id');
    if (cart[id] > 1) {
        cart[id]--
    } else {
        delete cart[id];
    }
    saveToCart();
    showMiniCart();
}

function plusGoods() {
    let id = $(this).attr('data-id');
    cart[id]++
    saveToCart();
    showMiniCart();
}

function isEmpty(object) {
    //проверка корзины на пустоту
    for (var key in object)
        if (object.hasOwnProperty(key)) return true;
    return false;
}

function loadCart() {
    //Проверяю если в LocalStorage cart
    if (localStorage.getItem('cart')) {
        //если есть - расшифровываю и записываю в переменную cart
        cart = JSON.parse(localStorage.getItem('cart'));
        showMiniCart();
    } else {
        $('.basket').html('<h3>Корзина пуста!</h3>')
    }
}

$(document).ready(function () {
    init();
    loadCart();
});
