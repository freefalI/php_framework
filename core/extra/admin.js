$(document).ready(function () {
    init();
});

function init() {
    $('.select-table-to-edit select').on('change', chooseTableToEdit);
}

function chooseTableToEdit() {
    $('.select-items').empty();
    $('.edit-items').empty();
    var id = $('.select-table-to-edit select option:selected').attr('data-id');
    console.log(id);

    if (id == 1) {
        editProducts();
    }
    if (id == 2) {
        editCategories();
    }
}
function editProducts() {
    var out = '  \
    <h2>Товар</h2>\
    <p> Категория: <input type="text" id="gcat"></p>\
    <p> Бренд: <input type="text" id="gbrand"></p>\
    <p> Модель: <input type="text" id="gmodel"></p>\
    <p> Стоимость: <input type="text" id="gprice"></p>\
    <p> Image: <input type="text" id="gimg"></p>\
    <input type="hidden" id = "gid">\
    <button class="btn save-changes">Add</button>';
    $('.edit-items').html(out);
    $('.save-changes').on('click', addOrUpdateItem);
    $.post(
        "handler.php",
        {
            "action": "initProducts"
        },
        showGoods
    );
   
    
}

function addOrUpdateItem(){
    // $.post(
    //     "handler.php",
    //     {
    //         "action": "addOrUpdateItem"
    //     },
        // function (data){
            var id = $('.select-items select option:selected').attr('data-id');
            
            if (id==0){
                        console.log(document.getElementById('gcat').value);
                        console.log(document.getElementById('gbrand').value);
                        console.log(document.getElementById('gmodel').value);
                        console.log(document.getElementById('gprice').value);
                        console.log(document.getElementById('gimg').value);
                        // "nbrand":document.getElementById('gbrand').value ,
                        // "nmodel":document.getElementById('gmodel').value ,
                        // "nprice":document.getElementById('gprice').value ,
                        // "nimg":document.getElementById('gimg').value


                $.post(
                    "handler.php",
                    {
                        "action": "AddNewProduct",
                        "ncat":document.getElementById('gcat').value ,
                        "nbrand":document.getElementById('gbrand').value ,
                        "nmodel":document.getElementById('gmodel').value ,
                        "nprice":document.getElementById('gprice').value ,
                        "nimg":document.getElementById('gimg').value
                   
                    }, function (data) {
                        // data = JSON.parse(data);
                        // alert('new product added')
                        console.log(data);

                    }
                 );
            }  
        // } 
        // });
}


function editCategories() {
    var out = '  \
    <h2>Категории</h2>\
    <p> ID: <input type="text" id="gid"></p>\
    <p> NAME : <input type="text" id="gname"></p>\
<!-- <input type="hidden" id = "gid">-->\
    <button class="btn">Add</button>';
    $('.edit-items').html(out);

    $.post(
        "handler.php",
        {
            "action": "initCategories"
        },
        showCategories
    );
}

//similar
function showGoods(data) {
    data = JSON.parse(data);
    console.log(data);
    var out = '<h3>Select product to edit</h3><select class="custom-select">';

    out += '<option data-id="0">Новый товар</option>';
    for (var id in data) {
        out += `<option data-id="${id}">${data[id].id}</option>`;
    }
    out += '</select>';
    $('.select-items').html(out);
    $('.select-items select').on('change', selectGoods);
}

function showCategories(data) {
    data = JSON.parse(data);
    console.log(data);
    var out = '<select class="custom-select">';

    out += '<option data-id="0">Новая категория</option>';
    for (var id in data) {
        out += `<option data-id="${id}">${data[id].name}</option>`;
    }
    out += '</select>';
    $('.select-items').html(out);
    $('.select-items select').on('change', selectCategories);
}
function selectGoods() {
    var id = $('.select-items select option:selected').attr('data-id');
    console.log(id);
    $.post(
        "handler.php",
        {
            "action": "selectOneGoods",
            "gid": id
        },
        function (data) {
            data = JSON.parse(data);
            $('#gcat').val(data.id_category);
            $('#gbrand').val(data.id_brand);
            $('#gmodel').val(data.model);
            $('#gprice').val(data.price);
            $('#gimg').val(data.img_path);
            $('#gid').val(data.id);
        });

}

function selectCategories() {
    var id = $('.select-items select option:selected').attr('data-id');
    console.log(id);
    $.post(
        "handler.php",
        {
            "action": "selectCategory",
            "gid": id
        },
        function (data) {
            data = JSON.parse(data);
            // $('#gmodel').val(data.model);
            $('#gname').val(data.name);
            // $('#gimg').val(data.img_path);
            $('#gid').val(data.id);
        });

}