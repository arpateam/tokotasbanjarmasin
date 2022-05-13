$('.image-upload-wrap').hide();
$(".alert-validation-file").hide();
$(".alert-validation-success").show();
$(".file-upload-content-edit").css("border","2px dashed #198754");
$('.ubah-gambar').addClass('btn-outline-success');
$('.ubah-gambar').removeClass('btn-outline-danger');

function readURL(input){
    if (input.files && input.files[0]){

        var reader = new FileReader();

        var size = $('.file-upload-input')[0].files[0].size;
        var extension = $('.file-upload-input').val().split('.').pop().toLowerCase();
        var validFileExtensions = ['jpeg', 'jpg', 'png', 'gif'];

        reader.onload = function(e){
            $('.image-upload-wrap').hide();

            if ($.inArray(extension, validFileExtensions) == -1) {
                $('.file-upload-image').attr('src', '../assets/images/no-image-medium.png');
            }else if (size>2097152) {
                $('.file-upload-image').attr('src', '../assets/images/no-image-medium.png');
            }else{
                $('.file-upload-image').attr('src', e.target.result);
            }

            $('.file-upload-content').show();
        };

        // Validation file c
        if ($.inArray(extension, validFileExtensions) == -1) {
            $(".alert-validation-success").hide();
            $(".alert-validation-file").show();
            $(".message-alert-validation-file").html("Gagal upload gambar! Mohon masukkan gambar berformat <strong>jpeg, jpg, png atau gif</strong>");
            $(".file-upload-content").css("border","2px dashed #dc3545");
            $('.ubah-gambar').addClass('btn-outline-danger');
            $('.ubah-gambar').removeClass('btn-outline-success');
        }else if (size>2097152) {
            $(".alert-validation-success").hide();
            $(".alert-validation-file").show();
            $(".message-alert-validation-file").html("Gagal upload gambar! Maksimal ukuran gambar <strong>2MB</strong>");
            $(".file-upload-content").css("border","2px dashed #dc3545");
            $('.ubah-gambar').addClass('btn-outline-danger');
            $('.ubah-gambar').removeClass('btn-outline-success');
        }else{
            $(".alert-validation-file").hide();
            $(".alert-validation-success").show();
            $(".file-upload-content").css("border","2px dashed #198754");
            $('.ubah-gambar').addClass('btn-outline-success');
            $('.ubah-gambar').removeClass('btn-outline-danger');
        }

        reader.readAsDataURL(input.files[0]);

    }else{
        removeUpload();
    }
}

function removeUpload(){
    $('.file-upload-input').replaceWith($('.file-upload-input').clone());
    $('.file-upload-content').hide();
    $('.file-upload-content-edit').hide();
    $('.image-upload-wrap').show();
}

$('.image-upload-wrap').bind('dragover', function (){
    $('.image-upload-wrap').addClass('image-dropping');
});

$('.image-upload-wrap').bind('dragleave', function (){
    $('.image-upload-wrap').removeClass('image-dropping');
}); 