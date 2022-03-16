//新增、修改成功彈跳視窗
function success_alert(msg) {
    Swal.fire({
        title : msg,
        icon : 'success',
        timer : 1500
    });
}

//刪除彈跳視窗
function warning_alert(msg, url, id, returnUrl) {
    Swal.fire({
        title: msg,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '確認刪除',
        cancelButtonText: '取消'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: url,
                method: 'delete',
                data: {'id' : id},
                success: function() {
                    Swal.fire(
                        '刪除成功'
                    )
                    setTimeout(function() {
                        location.href = returnUrl;
                    }, 1500);
                }
            });
        }
    })
}

//csrf
function ajaxSetup() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
}

//最新消息-新增
$('#newsAdd').click(function(e) {
    e.preventDefault();
    ajaxSetup();

    let url = '/news_add/store';
    let news_title = $('#news_title').val();
    let news_content = $('#news_content').val();

    $.ajax({
        url: url,
        method: 'post',
        data: {
            news_title:news_title, 
            news_content:news_content
        },
        success: function() {
            success_alert("新增成功");
            setTimeout(function() {
                location.href = "/news_list"
            }, 1500);
        }
    });
});

//最新消息-修改
$('#newsEdit').click(function(e) {
    e.preventDefault();
    ajaxSetup();
    
    let id = $('#news_id').val();
    let title = $('#news_title').val();
    let content = $('#news_content').val();
    let url = '/news_update/'+id;

    $.ajax({
        url: url,
        method: 'patch',
        data: {
            news_title : title,
            news_content : content
        },
        success: function() {
            success_alert("修改完成");
            setTimeout(function() {
                location.href = '/news_list';
            }, 1500)
        }
    });
});

//最新消息-刪除
$('button[name="newsDelete"]').each(function() {
    $(this).click(function() {
        ajaxSetup();

        let id = $(this).parent().parent().find('input[name="news_id"]').val();
        let url = '/news_delete/'+id;

        warning_alert("確定要刪除此筆消息?", url, id, "/news_list");
    });
});

//產品分類-新增
$('#typeAdd').click(function(e) {
    e.preventDefault();
    ajaxSetup();

    let url = '/type_add/store';
    let type_name = $('#type_name').val();

    $.ajax({
        url: url,
        method: 'post',
        data: {'type_name':type_name},
        success: function() {
            success_alert("新增成功");
            setTimeout(function() {
                location.href = '/type_list';
            }, 1500);
        }
    });
});

//產品分類-刪除
$('button[name="typeDelete"]').each(function() {
    $(this).click(function(e) {
        e.preventDefault();
        ajaxSetup();

        let id = $(this).parent().parent().find('input[name="type_id"]').val();
        let name = $(this).parent().parent().find('input[name="type_name"]').val();
        let url = '/type_delete/'+id;

        warning_alert('確定要刪除"'+name+'"類別?', url, id, "/type_list");
    });
});

//產品-新增
$('#productAdd').click(function(e) {
    e.preventDefault();
    ajaxSetup();

    let url = '/product_add/store';
    let type = $('#product_type').val();
    let title = $('#product_title').val();
    let intro = $('#product_intro').val();
    let ingredients = $('#product_ingredients').val();
    let weight = $('#product_weight').val();
    let content = $('#product_content').val();
    // let image = $('#product_image').val();

    $.ajax({
        url: url,
        method: 'post',
        data: {
            type_id : type,
            product_title : title,
            product_intro : intro,
            product_ingredients : ingredients,
            product_weight : weight,
            product_content : content,
            // product_image : image
        },
        success: function() {
            success_alert("新增成功");
            setTimeout(function() {
                location.href = "/product_list";
            }, 1500)
        }
    })
});

//產品-修改
$('#productEdit').click(function(e) {
    e.preventDefault();
    ajaxSetup();

    let id = $('#product_id').val();
    let type_id = $('#product_type').val();
    let title = $('#product_title').val();
    let intro = $('#product_intro').val();
    let ingredients = $('#product_ingredients').val();
    let weight = $('#product_weight').val();
    let content = $('#product_content').val();
    let url = '/product_update/'+id;

    $.ajax({
        url: url,
        method: 'patch',
        data: {
            id : id,
            type_id : type_id,
            product_title : title,
            product_intro : intro,
            product_ingredients : ingredients,
            product_weight : weight,
            product_content : content,
        },
        success: function() {
            success_alert("修改完成");
            setTimeout(function() {
                location.href = '/product_list';
            }, 1500)
        }
    })
});

//產品-刪除
$('button[name="productDelete"]').each(function() {
    $(this).click(function(e) {
        e.preventDefault();
        ajaxSetup();

        let id = $(this).parent().parent().find('input[name="product_id"]').val();
        let url = '/product_delete/'+id;
        warning_alert("確定要刪除此項產品?", url, id, "/product_list");
    });
});

//產品圖片上傳同步顯示於img中-start
$('#product_image').change(function(e) {
    readURL(e.target);
});

function readURL(input){
    if(input.files && input.files[0]){
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#img").attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
//產品圖片上傳同步顯示於img中-end