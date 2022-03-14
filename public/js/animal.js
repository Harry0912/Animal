$("input[name='save'], #type_add").click(function() {
    new swal({
        title: "新增成功",
        icon: "success",
        timer: 1500
    });
});

$('input[name="product_image"]').change(function(e) {
    readURL(e.target);
});

//產品圖片上傳同步顯示於img中
function readURL(input){
    if(input.files && input.files[0]){
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#img").attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}