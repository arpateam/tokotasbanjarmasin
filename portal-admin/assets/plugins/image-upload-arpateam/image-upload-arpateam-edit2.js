$('.image-upload-wrap2').hide();
$(".alert-validation-file2").hide();
$(".alert-validation-success2").show();
$(".file-upload-content-edit2").css("border","2px dashed #198754");
$('.ubah-gambar2').addClass('btn-outline-success');
$('.ubah-gambar2').removeClass('btn-outline-danger');

function readURL2(input){
    if (input.files && input.files[0]){

        var reader = new FileReader();

        var size = $('.file-upload-input2')[0].files[0].size;
        var extension = $('.file-upload-input2').val().split('.').pop().toLowerCase();
        var validFileExtensions = ['jpeg', 'jpg', 'png', 'gif'];

        reader.onload = function(e){
            $('.image-upload-wrap2').hide();

            if ($.inArray(extension, validFileExtensions) == -1) {
                $('.file-upload-image2').attr('src', '../assets/images/no-image-medium.png');
            }else if (size>2097152) {
                $('.file-upload-image2').attr('src', '../assets/images/no-image-medium.png');
            }else{
                $('.file-upload-image2').attr('src', e.target.result);
            }

            $('.file-upload-content2').show();
        };

        // Validation file c
        if ($.inArray(extension, validFileExtensions) == -1) {
            $(".alert-validation-success2").hide();
            $(".alert-validation-file2").show();
            $(".message-alert-validation-file2").html("Gagal upload gambar! Mohon masukkan gambar berformat <strong>jpeg, jpg, png atau gif</strong>");
            $(".file-upload-content2").css("border","2px dashed #dc3545");
            $('.ubah-gambar2').addClass('btn-outline-danger');
            $('.ubah-gambar2').removeClass('btn-outline-success');
        }else if (size>2097152) {
            $(".alert-validation-success2").hide();
            $(".alert-validation-file2").show();
            $(".message-alert-validation-file2").html("Gagal upload gambar! Maksimal ukuran gambar <strong>2MB</strong>");
            $(".file-upload-content2").css("border","2px dashed #dc3545");
            $('.ubah-gambar2').addClass('btn-outline-danger');
            $('.ubah-gambar2').removeClass('btn-outline-success');
        }else{
            $(".alert-validation-file2").hide();
            $(".alert-validation-success2").show();
            $(".file-upload-content2").css("border","2px dashed #198754");
            $('.ubah-gambar2').addClass('btn-outline-success');
            $('.ubah-gambar2').removeClass('btn-outline-danger');
        }

        reader.readAsDataURL(input.files[0]);

    }else{
        removeUpload2();
    }
}

function removeUpload2(){
    $('.file-upload-input2').replaceWith($('.file-upload-input2').clone());
    $('.file-upload-content2').hide();
    $('.file-upload-content-edit2').hide();
    $('.image-upload-wrap2').show();
}

$('.image-upload-wrap2').bind('dragover', function (){
    $('.image-upload-wrap2').addClass('image-dropping2');
});

$('.image-upload-wrap2').bind('dragleave', function (){
    $('.image-upload-wrap2').removeClass('image-dropping2');
}); 