function salert(msg, result, timer) {
    new swal({
        title : msg,
        icon : result,
        timer : timer
    });
}

function delete_alert(msg, icon, url) {
    Swal.fire({
        title: msg,
        icon: icon,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '確認刪除',
        cancelButtonText: '取消'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                '刪除成功'
            )
            setTimeout(function() {
                location.href = url;
            }, 1500);
        }
    })
}

function ajaxSetup() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
}

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
            salert("新增成功", "success", 1500);
            setTimeout(function() {
                location.href = '/product_type';
            }, 1500);
        }
    });
});

$('button[name="typeDelete"]').each(function() {
    $(this).click(function(e) {
        e.preventDefault();
        ajaxSetup();

        let id = $(this).parent().parent().find('input[name="type_id"]').val();
        let name = $(this).parent().parent().find('input[name="type_name"]').val();
        let url = '/type_delete/'+id;

        Swal.fire({
            title: '確定要刪除"'+name+'"類別?',
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
                    data: {'id':id},
                    success: function() {
                        Swal.fire(
                            '刪除成功'
                        )
                        // return false;
                        setTimeout(function() {
                            location.href = '/product_type';
                        }, 1500);
                    }
                });
            }
        })
    });
});

$('#productAdd').click(function(e) {
    e.preventDefault();
    ajaxSetup();

    let url = '/product_add/store';
    let title = $('#product_title').val();
    let intro = $('#product_intro').val();
    let ingredients = $('#product_ingredients').val();
    let weight = $('#product_weight').val();
    let content = $('#product_content').val();
    let image = $('#product_image').val();

    $.ajax({
        url: url,
        method: 'post',
        data: {
            product_title : title,
            product_intro : intro,
            product_ingredients : ingredients,
            product_weight : weight,
            product_content : content,
            product_image : image
        },
        success: function() {
            salert("新增成功", "success", 1500);
            setTimeout(function() {
                location.href = "/product_list";
            }, 1500)
        }
    })
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