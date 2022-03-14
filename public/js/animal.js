function salert(msg, result, timer) {
    new swal({
        title : msg,
        icon : result,
        timer : timer
    });
}

function ajaxSetup() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
}

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
            salert("新增成功", "success", 1500);
            setTimeout(function() {
                location.href = "/news_list"
            }, 1500);
        }
    });
});

//產品圖片上傳同步顯示於img中-start
$('input[name="product_image"]').change(function(e) {
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