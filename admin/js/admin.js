function init(){
    $.post(
        "core.php",
        {
            "action" : "init"
        },
        showGoods
    );
}

function showGoods(data){
    data = JSON.parse(data);
    let out = '<select size="5">';
    out += '<option data-id="0">Новый товар</option>'
    for(let id in data){
        out += `<option data-id="${id}">${data[id]['name']}</option>`
    }
    out += '</select>';
    $('.goods-out').html(out);
    $('.goods-out select').on('change', selectGoods);
}

function selectGoods() {
    let id = $('.goods-out select option:selected').attr('data-id');
    $.post(
        "core.php",
        {
            "action" : "selectOneGoods",
            "gid" : id
        },
        function (data) {
            data = JSON.parse(data);
            $('#gname').val(data.name);
            $('#gcost').val(data.cost);
            $('#gdescr').val(data.description);
            $('#gorder').val(data.ord);
            $('#gimg').val(data.img);
            $('#gid').val(data.id);
        }
    );
}

function saveToDb() {
    let id = $('#gid').val();
    if (id != ""){
        $.post(
            "core.php",
            {
                "action" : "updateGoods",
                "id" : id,
                "gname" : $('#gname').val(),
                "gcost" : $('#gcost').val(),
                "gdescr" : $('#gdescr').val(),
                "gorder" : $('#gorder').val(),
                "gimg" : $('#gimg').val()
            },
            function (data) {
                if(data == 1) {
                    alertGood()
                    init();
                }else {
                    alertBad();
                }
            }
        );
    } else {
        $.post(
            "core.php",
            {
                "action" : "newGoods",
                "id" : 0,
                "gname" : $('#gname').val(),
                "gcost" : $('#gcost').val(),
                "gdescr" : $('#gdescr').val(),
                "gorder" : $('#gorder').val(),
                "gimg" : $('#gimg').val()
            },
            function (data) {
                if(data == 1) {
                    alertGood();
                    init();
                }else {
                    alertBad();
                }
            }
        );
    }
}

function alertGood() {
    //вывод на страницу
    $('.alert-info').show();
    setTimeout(function alertStopGood(){
        $('.alert-info').hide();
    }, 1000);
}

function alertBad() {
    //вывод на страницу
    $('.alert-danger').show();
    setTimeout(function alertStopBad(){
        $('.alert-danger').hide();
    }, 1000);
}



$(document).ready(function () {
    init();
    $('.add-to-db').on('click', saveToDb);
})