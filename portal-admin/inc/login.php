<?php

    require "../../system/koneksi.php";
    require "../../system/fungsi_indotgl.php";
    require "../../system/fungsi_modul.php";
    require "../../system/fungsi_rupiah.php";
    require "../../system/fungsi_seo.php";
    require "../../system/fungsi_telp.php";
    require "../../system/paging.php";
    require "../../system/z_setting.php";

    session_start();
    error_reporting(0);
    // var_dump($_SESSION);

    if ($_SESSION['_msg__']==="GagalLogin") {
        $_SESSION['_alert__']   = '1';
    }elseif ($_SESSION['_msg__']==="GagalreCAPTCHA") {
        $_SESSION['_alert__']   = '4';
    }elseif ($_SESSION['_msg__']==="Back") {
        $_SESSION['_alert__']   = '3';
        $_SESSION['_msg__']     = '0';
    }else{
        $_SESSION['_alert__']   = '0';
        $_SESSION['_msg__']     = '0';
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Login Page</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="../assets/images/<?= $iconWebsite; ?>">
    
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Lato:300,400,700,900"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['assets/css/fonts.min.css']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/atlantis.min.css">
</head>

<body class="bg-primary py-4 py-md-5">

    <section class="container bg-primary my-2 my-md-5">
        <div class="row justify-content-center">
        	<div class="w-100"></div>
            <div class="col-10 col-xs-8 col-md-6 col-lg-5 col-xl-5 p-4 text-center">
                <h1 class="text-light">Selamat Datang di <br /> Portal Admin <br /><strong><?= $namaweb; ?></strong></h1>
                <hr />
                <a href="<?= $linkWeb1; ?>">
                    <img src="../assets/images/<?= $logoVersiDesktop; ?>" alt="<?= $judulLogoVersiDesktop; ?>" class="img-fluid">
                </a>
            </div>
            <div class="col-10 col-xs-8 col-md-6 col-lg-5 col-xl-4 p-4 bg-light rounded shadow">
                <?php
                    if ($_SESSION['_msg__']==="GagalLogin") {
                        echo "<div class='alert alert-danger text-left' role='alert'>";
                        echo "<h4 class='alert-heading text-danger'><i class='fas fa-exclamation-triangle'></i> GAGAL!</h4>";
                        echo "<hr>";
                        echo "<p class='mb-0'><strong>Username</strong> atau <strong>Password</strong> anda salah! Mohon periksa kembali.</p>";
                        echo "</div>";
                        $_SESSION['_msg__'] = 0;
                    }elseif ($_SESSION['_msg__']==="GagalreCAPTCHA") {
                        echo "<div class='alert alert-danger text-left' role='alert'>";
                        echo "<h4 class='alert-heading text-danger'><i class='fas fa-exclamation-triangle'></i> CAPTCHA SALAH!</h4>";
                        echo "<hr>";
                        echo "<p class='mb-0'>Mohon isi <strong>captcha</strong> kembali!</p>";
                        echo "</div>";
                        $_SESSION['_msg__'] = 0;
                    }else{
                        echo "<div class='alert alert-warning' role='alert'>";
                        echo "<i class='fas fa-exclamation-triangle text-warning'></i> Silahkan <em><u><strong>Login</strong></u></em> untuk membuka Portal";
                        echo "</div>";
                    }

                ?>
                <hr />
                <form method="POST" action="actionLogin" class="text-left text-primary needs-validation" novalidate>
                    <!--Username-->
                    <div class="form-group form-group-default">
                        <label class="font-weight-bold">Username</label>
                        <input type="text" name="___in_username_special_SEMANAK" class="form-control" placeholder="Masukkan username anda..." minlength="5" maxlength="20" onkeyup="this.value=this.value.replace(/[^a-z][^0-9]/g,'');" required>
                        <div class="invalid-feedback">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                            </svg> 
                            Mohon masukkan username anda!
                        </div>
                    </div>
                    <!--Username-->

                    <!--Password-->
					<div class="form-group form-group-default">
						<label class="font-weight-bold" for="pass">Password <span id="buttonShowPassword" onclick="showPassword()"><i class="fas fa-eye-slash"></i></span></label>
						<input type="password" id="pass" name="___in_password_special_SEMANAK" class="form-control" placeholder="Masukkan Password anda..." minlength="8" maxlength="20" required>
				      	<div class="invalid-feedback">
	                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
	                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
	                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
	                        </svg> 
				          	Mohon masukkan <em>password</em> anda!
				        </div>
					</div>

                    <!-- <div class="form-group form-group-default">
                        <div class="input-group">
                            <div class="g-recaptcha" data-sitekey="<?= $site_key_reCAPTCHA ?>" required></div>
                        </div>
                    </div> -->

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" name="_submit_special_SEMANAK_" class="btn btn-block btn-primary">MASUK <i class="fas fa-sign-in-alt"></i></button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>

    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery-3.6.0.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

    <script>
        function showPassword() {

            // membuat variabel berisi tipe input dari id='pass', id='pass' adalah form input password 
            var x = document.getElementById('pass').type;

            //membuat if kondisi, jika tipe x adalah password maka jalankan perintah di bawahnya
            if (x == 'password') {

                //ubah form input password menjadi text
                document.getElementById('pass').type = 'text';
                
                //ubah icon mata terbuka menjadi tertutup
                document.getElementById('buttonShowPassword').innerHTML = `<i class="fas fa-eye"></i>`;
            }else{

                //ubah form input password menjadi text
                document.getElementById('pass').type = 'password';

                //ubah icon mata terbuka menjadi tertutup
                document.getElementById('buttonShowPassword').innerHTML = `<i class="fas fa-eye-slash"></i>`;
            }
        }
    </script>

    <!-- Notifikasi -->
    <?php if ($_SESSION['_alert__']=='1'): ?>
        <script>
            var placementFrom = "top";
            var placementAlign = "center";
        </script>

        <script>
            var state = "danger";
            var style = "withicon";
            var content = {};
            content.message = 'Sistem kami tidak bisa menemukan akun anda. Mohon cek kembali username & password anda!';
            content.title = 'LOGIN GAGAL!!!';
            content.icon = 'fas fa-exclamation-circle';
        </script>

        <script>
            $.notify(content,{
                type: state,
                placement: {
                    from: placementFrom,
                    align: placementAlign
                },
                time: 1000,
                delay: 0,
            });
        </script>
    <?php elseif ($_SESSION['_alert__']=='2'): ?>
        <script>
            var placementFrom = "top";
            var placementAlign = "center";
        </script>
        
        <script>
            var state = "success";
            var style = "withicon";
            var content = {};
            content.message = 'Silahkan login menggunakan username & password anda!';
            content.title = 'AKUN ANDA SUDAH TERDAFTAR!';
            content.icon = 'fas fa-check-circle';
        </script>

        <script>
            $.notify(content,{
                type: state,
                placement: {
                    from: placementFrom,
                    align: placementAlign
                },
                time: 1000,
                delay: 0,
            });
        </script>
    <?php elseif ($_SESSION['_alert__']=='3'): ?>
        <script>
            var placementFrom = "top";
            var placementAlign = "center";
        </script>
        
        <script>
            var state = "success";
            var style = "withicon";
            var content = {};
            content.message = 'Silahkan login menggunakan username & password anda!';
            content.title = 'SILAHKAN LOGIN KEMBALI!';
            content.icon = 'fas fa-check-circle';
        </script>

        <script>
            $.notify(content,{
                type: state,
                placement: {
                    from: placementFrom,
                    align: placementAlign
                },
                time: 1000,
                delay: 0,
            });
        </script>
    <?php elseif ($_SESSION['_alert__']=='4'): ?>
        <script>
            var placementFrom = "top";
            var placementAlign = "center";
        </script>

        <script>
            var state = "danger";
            var style = "withicon";
            var content = {};
            content.message = 'Mohon ulangi kembali!';
            content.title = 'CAPTCHA SALAH!!!';
            content.icon = 'fas fa-exclamation-circle';
        </script>

        <script>
            $.notify(content,{
                type: state,
                placement: {
                    from: placementFrom,
                    align: placementAlign
                },
                time: 1000,
                delay: 0,
            });
        </script>
    <?php endif ?>
    <!-- End Notifikasi -->

</body>
</html>