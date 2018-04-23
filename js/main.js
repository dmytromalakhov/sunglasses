let cart = {}; //Корзина

function init() {
    //Считываю файл goods.json
    $.getJSON('goods.json', goodsOut);
}

function goodsOut(data) {
    //вывод на страницу
    console.log(data);
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
                    out += `<a href="#" class="btn btn-primary add-to-cart" data-id="${key}">Добавить в корзину</a>`;
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
    //Показываю мини карзину
    let out ='';
    for(let key in cart){
        out += key + ' --- '  + cart[key] + '<br>';
    }
    $('.mini-cart').html(out);
}

function loadCart() {
    //Проверяю если в LocalStorage cart
    if (localStorage.getItem('cart')) {
        //если есть - расшифровываю и записываю в переменную cart
        cart = JSON.parse(localStorage.getItem('cart'));
        showMiniCart();
    }
}

$(document).ready(function () {
    init();
    loadCart();
});
