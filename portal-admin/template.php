<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Admin <?= $namaweb ?> | <?= $_SESSION['_nama__'] ?></title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="../assets/images/<?= $iconWebsite; ?>">

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

    <!-- Plugins -->
    <!-- Data Umum -->
    <?php if ($_GET['module']=='data-admin'): ?>
        <link rel="stylesheet" href="../assets/plugins/select2-4.1.0/css/select2.min.css">
        <link rel="stylesheet" href="../assets/plugins/validation-pass-arpateam/css/style.css">
    <?php endif ?>
    <!-- End Data Umum -->

    <!-- Menunggu Konfirmasi View, Sedang Diproses View, Sedang Dikirim View, Sedang Dikirim Aksi, Pesanan Selesai View, Produk View, Promo View, Testimoni View, Sitemap One View, Kasir View -->
    <?php if (($_GET['module']=='menunggu-konfirmasi') AND ($_GET['act']=='view') OR ($_GET['module']=='sedang-diproses') AND ($_GET['act']=='view') OR ($_GET['module']=='sedang-dikirim') AND ($_GET['act']=='view') OR ($_GET['module']=='sedang-dikirim') AND ($_GET['act']=='aksi') OR ($_GET['module']=='pesanan-selesai') AND ($_GET['act']=='view') OR ($_GET['module']=='produk') AND ($_GET['act']=='view') OR ($_GET['module']=='promo' AND $_GET['act']=='view') OR ($_GET['module']=='testimoni' AND $_GET['act']=='view') OR ($_GET['module']=='sitemap-one' AND $_GET['act']=='view') OR ($_GET['module']=='kasir' AND $_GET['act']=='view')): ?>
        <link rel="stylesheet" type="text/css" href="../assets/plugins/DataTables/datatables.min.css"/>
    <?php endif ?>
    <!-- END Menunggu Konfirmasi View, Sedang Diproses View, Sedang Dikirim View, Sedang Dikirim Aksi, Pesanan Selesai View, Produk View, Promo View, Testimoni View, Sitemap One View, Kasir View -->

    <!-- Aksi Menunggu Konfirmasi, Produk Add, Promo Add -->
    <?php if (($_GET['module']=='menunggu-konfirmasi' AND $_GET['act']=='aksi') OR ($_GET['module']=='produk' AND $_GET['act']=='add') OR ($_GET['module']=='promo' AND $_GET['act']=='add')): ?>
        <link rel="stylesheet" href="../assets/plugins/image-upload-arpateam/image-upload-arpateam.css"/>
        <link rel="stylesheet" href="../assets/plugins/summernote-0.8.18/summernote-bs4.css"/>
    <?php endif ?>
    <!-- END Aksi Menunggu Konfirmasi, Produk Add, Promo Add -->

    <!-- Pengaturan Edit, Halaman Tanya Jawab Edit, Produk Edit, Promo Edit -->
    <?php if (($_GET['module']=='pengaturan' AND $_GET['act']=='edit') OR ($_GET['module']=='halaman' AND $_GET['act']=='tanya-jawab') OR ($_GET['module']=='produk' AND $_GET['act']=='edit') OR ($_GET['module']=='promo' AND $_GET['act']=='edit')): ?>
        <link rel="stylesheet" href="../assets/plugins/image-upload-arpateam/image-upload-arpateam.css"/>
        <link rel="stylesheet" href="../assets/plugins/summernote-0.8.18/summernote-bs4.css"/>
    <?php endif ?>
    <!-- END Pengaturan Edit, Halaman Tanya Jawab Edit, Produk Edit, Promo Edit -->

    <!-- Primary CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/atlantis.css">
    <?php if ($_GET['module']=='kasir' AND $_GET['act']=='view'): ?>
        <link rel="stylesheet" href="assets/css/keranjang.min.css">
    <?php endif ?>
    <!-- Primary CSS Files -->
</head>
<body>
    <div class="wrapper">
        <!-- Header -->
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="blue">
                
                <a href="dashboard" class="logo">
                    <img src="../assets/images/<?= $logoVersiDesktop; ?>" alt="<?= $judulLogoVersiDesktop; ?>" class="navbar-brand" style="max-height: 100%;width: 90%;">
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
                
                <div class="container-fluid">
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                                <div class="avatar-sm">
                                    <img src="../assets/images/avatar/male01.png" alt="Avatar Male 01" class="avatar-img rounded-circle">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>
                                        <div class="user-box">
                                            <div class="avatar-lg"><img src="../assets/images/avatar/male01.png" alt="Avatar Male 01" class="avatar-img rounded-circle"></div>
                                            <div class="u-text">
                                                <h4><?= $_SESSION['_nama__'] ?></h4>
                                                <h5 class="text-muted"><?= $_SESSION['_level__'] ?></h5>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"><i class="far fa-user-circle"></i> Profil</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-primary" href="keluar">KELUAR <i class="fas fa-sign-out-alt"></i></a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
        <!-- End Header -->

        <!-- Sidebar -->
        <div class="sidebar sidebar-style-2">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-primary">

                        <li class="nav-item <?php if($_GET['module']=='dashboard'){ echo 'active'; } ?>">
                            <a href="dashboard">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <li class="nav-section border-top">
                            <span class="sidebar-mini-icon">
                                <i class="fas fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Transaksi Offline</h4>
                        </li>
                        <li class="nav-item <?php if(($_GET['module']=='kasir' AND $_GET['act']=='view') OR ($_GET['module']=='kasir' AND $_GET['act']=='aksi')){ echo 'active'; } ?>">
                            <a href="kasir">
                                <i class="fas fa-store"></i>
                                <p>Kasir</p>
                            </a>
                        </li>

                        <li class="nav-section border-top">
                            <span class="sidebar-mini-icon">
                                <i class="fas fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Transaksi Online</h4>
                        </li>
                        <li class="nav-item <?php if(($_GET['module']=='menunggu-konfirmasi' AND $_GET['act']=='view') OR ($_GET['module']=='menunggu-konfirmasi' AND $_GET['act']=='aksi')){ echo 'active'; } ?>">
                            <a href="menunggu-konfirmasi">
                                <i class="fas fa-receipt"></i>
                                <p>Menunggu Konfirmasi</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if(($_GET['module']=='sedang-diproses' AND $_GET['act']=='view') OR ($_GET['module']=='sedang-diproses' AND $_GET['act']=='aksi')){ echo 'active'; } ?>">
                            <a href="sedang-diproses">
                                <i class="fas fa-shopping-basket"></i>
                                <p>Sedang Diproses</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if(($_GET['module']=='sedang-dikirim' AND $_GET['act']=='view') OR ($_GET['module']=='sedang-dikirim' AND $_GET['act']=='aksi')){ echo 'active'; } ?>">
                            <a href="sedang-dikirim">
                                <i class="fas fa-shipping-fast"></i>
                                <p>Sedang Dikirim</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if(($_GET['module']=='pesanan-selesai' AND $_GET['act']=='view') OR ($_GET['module']=='pesanan-selesai' AND $_GET['act']=='aksi')){ echo 'active'; } ?>">
                            <a href="pesanan-selesai">
                                <i class="fas fa-check"></i>
                                <p>Pesanan Selesai</p>
                            </a>
                        </li>

                        <li class="nav-section border-top">
                            <span class="sidebar-mini-icon">
                                <i class="fas fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Menu Utama</h4>
                        </li>
                        <li class="nav-item <?php if(($_GET['module']=='produk' AND $_GET['act']=='view') OR ($_GET['module']=='produk' AND $_GET['act']=='add') OR ($_GET['module']=='produk' AND $_GET['act']=='edit')){ echo 'active'; } ?>">
                            <a href="produk">
                                <i class="fas fa-utensils"></i>
                                <p>Produk</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if($_GET['module']=='testimoni'){ echo 'active'; } ?>">
                            <a href="testimoni">
                                <i class="fas fa-smile"></i>
                                <p>Testimoni</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if($_GET['module']=='halaman' AND $_GET['act']=='tanya-jawab'){ echo 'active'; } ?>">
                            <a href="faq">
                                <i class="fas fa-comments"></i>
                                <p>FAQ</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if(($_GET['module']=='promo' AND $_GET['act']=='view') OR ($_GET['module']=='promo' AND $_GET['act']=='add') OR ($_GET['module']=='promo' AND $_GET['act']=='edit')){ echo 'active'; } ?>">
                            <a href="promo">
                                <i class="fas fa-newspaper"></i>
                                <p>Promo</p>
                            </a>
                        </li>

                        <li class="nav-section border-top">
                            <span class="sidebar-mini-icon">
                                <i class="fas fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Pengaturan Website</h4>
                        </li>

                        <li class="nav-item <?php if(($_GET['module']=='pengaturan' AND $_GET['act']=='banner-beranda') OR ($_GET['module']=='pengaturan' AND $_GET['act']=='ubah-banner-beranda')){ echo 'active'; } ?>">
                            <a href="banner-beranda">
                                <i class="fas fa-image"></i>
                                <p>Banner Beranda</p>
                            </a>
                        </li>

                        <li class="nav-item <?php if($_GET['module']=='halaman' AND $_GET['act']=='view' OR $_GET['module']=='halaman' AND $_GET['act']=='edit'){ echo 'active'; } ?>">
                            <a href="halaman">
                                <i class="fab fa-searchengin"></i>
                                <p>Pengaturan SEO</p>
                            </a>
                        </li>

                        <?php if ($_SESSION['_level__']==="Administrator"): ?>
                        <li class="nav-item <?php if($_GET['module']=='data-admin'){ echo 'active'; } ?>">
                            <a href="data-admin">
                                <i class="fas fa-users-cog"></i>
                                <p>Data Admin</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if($_GET['module']=='pengaturan' AND $_GET['act']=='view' OR $_GET['module']=='pengaturan' AND $_GET['act']=='edit'){ echo 'active'; } ?>">
                            <a href="pengaturan">
                                <i class="fas fa-cogs"></i>
                                <p>Pengaturan Website</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if($_GET['module']=='sitemap-one'){ echo 'active'; } ?>">
                            <a href="sitemap-one">
                                <i class="fas fa-sitemap"></i>
                                <p>Sitemap 1</p>
                            </a>
                        </li>
                        <?php endif ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <div class="main-panel">
            <?php require 'inc/contents.php'; ?>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="copyright ml-auto">
                        2021, di buat dengan <i class="fa fa-heart heart text-danger"></i> oleh <a href="https://www.arpateam.com">#ARPATEAM</a>
                    </div>              
                </div>
            </footer>
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery-3.6.0.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery UI -->
    <script src="assets/js/plugin/jquery-ui-1.13.0/jquery-ui.min.js"></script>
    <script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- Atlantis JS -->
    <script src="assets/js/atlantis.min.js"></script>

    <!-- Data Umum -->
    <?php if ($_GET['module']=='data-admin'): ?>
        <script src="../assets/plugins/validation-pass-arpateam/js/validation.js"></script>
        <!-- Show Password -->
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
            function showUlangiPassword() {

                // membuat variabel berisi tipe input dari id='passUlangi', id='passUlangi' adalah form input password 
                var x = document.getElementById('passUlangi').type;

                //membuat if kondisi, jika tipe x adalah password maka jalankan perintah di bawahnya
                if (x == 'password') {

                    //ubah form input password menjadi text
                    document.getElementById('passUlangi').type = 'text';
                    
                    //ubah icon mata terbuka menjadi tertutup
                    document.getElementById('buttonShowUlangiPassword').innerHTML = `<i class="fas fa-eye"></i>`;
                }else{

                    //ubah form input password menjadi text
                    document.getElementById('passUlangi').type = 'password';

                    //ubah icon mata terbuka menjadi tertutup
                    document.getElementById('buttonShowUlangiPassword').innerHTML = `<i class="fas fa-eye-slash"></i>`;
                }
            }
        </script>
        <!-- Show Password -->
    <?php endif ?>
    <!-- End Data Umum -->

    <!-- Menunggu Konfirmasi View, Sedang Diproses View, Sedang Dikirim View, Sedang Dikirim Aksi, Pesanan Selesai View, Produk View, Promo View, Testimoni View, Sitemap One View, Kasir View -->
    <?php if (($_GET['module']=='menunggu-konfirmasi' AND $_GET['act']=='view') OR ($_GET['module']=='sedang-diproses' AND $_GET['act']=='view') OR ($_GET['module']=='sedang-dikirim' AND $_GET['act']=='view') OR ($_GET['module']=='sedang-dikirim') AND ($_GET['act']=='aksi') OR ($_GET['module']=='pesanan-selesai' AND $_GET['act']=='view') OR ($_GET['module']=='produk' AND $_GET['act']=='view') OR ($_GET['module']=='promo' AND $_GET['act']=='view') OR ($_GET['module']=='testimoni' AND $_GET['act']=='view') OR ($_GET['module']=='sitemap-one' AND $_GET['act']=='view') OR ($_GET['module']=='kasir' AND $_GET['act']=='view')): ?>
        <script type="text/javascript" src="../assets/plugins/DataTables/datatables.min.js"></script>
        <script type="text/javascript" src="../assets/plugins/DataTables/Bootstrap-4-4.6.0/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#tabelData').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true
                });
                $('#tabelSitemapPage').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true
                });
                $('#tabelSitemapProduk').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true
                });
                $('#tabelSitemapPromo').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true
                });
            });
        </script>


        <script src="../assets/plugins/sweetalert/sweetalert.min.js"></script>
        <?php if (($_GET['module']=='produk' AND $_GET['act']=='view')): ?>
            <script>
                function confirmHapusProduk(enkripsi) {
                    swal({
                        title: "Apakah anda yakin ingin menghapus Produk ini?",
                        text: "Data yang telah terhapus tidak dapat dikembalikan lagi!",
                        icon: "warning",
                        primaryMode: true,
                        buttons: ["Tidak Jadi", "Ya, Hapus Saja"],
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location = "actionDeleteProduk-" + enkripsi;
                        }else{
                            swal({
                                title: "Produk tidak jadi di hapus",
                                icon: "warning",
                                primaryMode: true,
                            })
                        }
                    });
                }
            </script>
        <?php elseif (($_GET['module']=='promo' AND $_GET['act']=='view')): ?>
            <script>
                function confirmHapusPromo(enkripsi) {
                    swal({
                        title: "Apakah anda yakin ingin menghapus Promo ini?",
                        text: "Data yang telah terhapus tidak dapat dikembalikan lagi!",
                        icon: "warning",
                        primaryMode: true,
                        buttons: ["Tidak Jadi", "Ya, Hapus Saja"],
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location = "actionDeletePromo-" + enkripsi;
                        }else{
                            swal({
                                title: "Promo tidak jadi di hapus",
                                icon: "warning",
                                primaryMode: true,
                            })
                        }
                    });
                }
            </script>
        <?php elseif (($_GET['module']=='testimoni' AND $_GET['act']=='view')): ?>
            <script>
                function confirmHapusTestimoni(enkripsi) {
                    swal({
                        title: "Apakah anda yakin ingin menghapus Testimoni ini?",
                        text: "Data yang telah terhapus tidak dapat dikembalikan lagi!",
                        icon: "warning",
                        primaryMode: true,
                        buttons: ["Tidak Jadi", "Ya, Hapus Saja"],
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location = "actionDeleteTestimoni-" + enkripsi;
                        }else{
                            swal({
                                title: "Testimoni tidak jadi di hapus",
                                icon: "warning",
                                primaryMode: true,
                            })
                        }
                    });
                }
            </script>
        <?php elseif (($_GET['module']=='sedang-dikirim' AND $_GET['act']=='aksi')): ?>
            <script>
                function confirmSelesaikanPesanan(enkripsi) {
                    swal({
                        title: "Apakah anda yakin ingin Menyelesaikan Transaksi Ini?",
                        text: "Mohon pastikan kembali sebelum anda benar-benar ingin Menyelesaikan Transaksi Ini!",
                        icon: "warning",
                        primaryMode: true,
                        buttons: ["Tidak Jadi", "Ya, Saya Yakin"],
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location = "actionSelesaikanPesanan-" + enkripsi;
                        }else{
                            swal({
                                title: "Transaksi Ini tidak jadi di selesaikan",
                                icon: "warning",
                                primaryMode: true,
                            })
                        }
                    });
                }
            </script>
        <?php elseif (($_GET['module']=='kasir' AND $_GET['act']=='view')): ?>
            <script>
                function confirmHapusKeranjang(enkripsi) {
                    swal({
                        title: "Apakah anda yakin ingin menghapus Produk ini di Keranjang?",
                        text: "Data yang telah terhapus tidak dapat dikembalikan lagi!",
                        icon: "warning",
                        primaryMode: true,
                        buttons: ["Tidak Jadi", "Ya, Hapus Saja"],
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location = "actionHapusKeranjang-" + enkripsi;
                        }else{
                            swal({
                                title: "Produk tidak jadi di hapus",
                                icon: "warning",
                                primaryMode: true,
                            })
                        }
                    });
                }
            </script>

            <script>
                $(function() {
                    (function quantityProducts() {
                        var $quantityArrowMinus = $(".quantity-arrow-minus");
                        var $quantityArrowPlus = $(".quantity-arrow-plus");
                        var $quantityNum = $(".quantity-num");

                        $quantityArrowMinus.click(quantityMinus);
                        $quantityArrowPlus.click(quantityPlus);

                        function quantityMinus() {
                          if ($quantityNum.val() > 1) {
                            $quantityNum.val(+$quantityNum.val() - 1);
                          }
                        }

                        function quantityPlus() {
                          $quantityNum.val(+$quantityNum.val() + 1);
                        }
                    })();
                });
            </script>
        <?php endif ?>
    <?php endif ?>
    <!-- END Menunggu Konfirmasi View, Sedang Diproses View, Sedang Dikirim View, Sedang Dikirim Aksi, Pesanan Selesai View, Produk View, Promo View, Testimoni View, Sitemap One View, Kasir View -->

    <!-- Produk Add, Produk Edit-->
    <?php if (($_GET['module']=='produk' AND $_GET['act']=='add') OR ($_GET['module']=='produk' AND $_GET['act']=='edit')): ?>
    <script type="text/javascript" src="../assets/plugins/autoNumeric/autoNumeric.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#harga').autoNumeric('init');
        });
        $(document).ready(function(){
            $('#berat').autoNumeric('init', {vMin: '0', vMax: '999999999' });
        });
    </script>
    <?php endif ?>
    <!-- End Produk Add, Produk Edit-->

    <!-- Aksi Menunggu Konfirmasi, Produk Add, Promo Add -->
    <?php if (($_GET['module']=='menunggu-konfirmasi' AND $_GET['act']=='aksi') OR ($_GET['module']=='produk' AND $_GET['act']=='add') OR ($_GET['module']=='promo' AND $_GET['act']=='add')): ?>
        <script src="../assets/plugins/image-upload-arpateam/image-upload-arpateam.js"></script>
        <script src="../assets/plugins/summernote-0.8.18/summernote-bs4.js"></script>

        <?php if ($_GET['module']=='produk' AND $_GET['act']=='add'): ?>
            <script type="text/javascript">
                $(document).ready(function(){

                    $('#deskripsiProduk').summernote({
                        callbacks: {
                            onImageUpload: function(files) {
                                for(let i=0; i < files.length; i++) {
                                    $.upload(files[i]);
                                }
                            }
                        },
                        placeholder: 'Tulis deskripsi produk di sini...',
                        tabsize: 2,
                        height: 200,
                    });

                    $.upload = function (file) {
                        let out = new FormData();
                        out.append('file', file, file.name);

                        $.ajax({
                            method: 'POST',
                            url: 'actionUploadImgDeskripsiProduk',
                            contentType: false,
                            cache: false,
                            processData: false,
                            data: out,
                            success: function (img) {
                                $('#deskripsiProduk').summernote('insertImage', img);
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.error(textStatus + " " + errorThrown);
                            }
                        });
                    };

                });
            </script>
        <?php elseif ($_GET['module']=='promo' AND $_GET['act']=='add'): ?>
            <script type="text/javascript">
                $(document).ready(function(){

                    $('#deskripsi').summernote({
                        callbacks: {
                            onImageUpload: function(files) {
                                for(let i=0; i < files.length; i++) {
                                    $.upload(files[i]);
                                }
                            }
                        },
                        placeholder: 'Tulis deskripsi artikel di sini',
                        tabsize: 2,
                        height: 200,
                    });

                    $.upload = function (file) {
                        let out = new FormData();
                        out.append('file', file, file.name);

                        $.ajax({
                            method: 'POST',
                            url: 'actionUploadImgDeskripsiPromo',
                            contentType: false,
                            cache: false,
                            processData: false,
                            data: out,
                            success: function (img) {
                                $('#deskripsi').summernote('insertImage', img);
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.error(textStatus + " " + errorThrown);
                            }
                        });
                    };

                });
            </script>
        <?php endif ?>
    <?php endif ?>
    <!-- End Aksi Menunggu Konfirmasi, Produk Add, Promo Add -->

    <!-- Pengaturan Edit, Halaman Tanya Jawab Edit, Produk Edit, Promo Edit -->
    <?php if (($_GET['module']=='pengaturan' AND $_GET['act']=='edit') OR ($_GET['module']=='halaman' AND $_GET['act']=='tanya-jawab') OR ($_GET['module']=='produk' AND $_GET['act']=='edit') OR ($_GET['module']=='promo' AND $_GET['act']=='edit')): ?>
        <script src="../assets/plugins/image-upload-arpateam/image-upload-arpateam-edit.js"></script>
        <script src="../assets/plugins/summernote-0.8.18/summernote-bs4.js"></script>

        <?php if ($_GET['module']=='produk' AND $_GET['act']=='edit'): ?>
            <script type="text/javascript">
                $(document).ready(function(){

                    $('#deskripsiProduk').summernote({
                        callbacks: {
                            onImageUpload: function(files) {
                                for(let i=0; i < files.length; i++) {
                                    $.upload(files[i]);
                                }
                            }
                        },
                        placeholder: 'Tulis deskripsi produk anda di sini',
                        tabsize: 2,
                        height: 200,
                    });

                    $.upload = function (file) {
                        let out = new FormData();
                        out.append('file', file, file.name);

                        $.ajax({
                            method: 'POST',
                            url: 'actionUploadImgDeskripsiProduk',
                            contentType: false,
                            cache: false,
                            processData: false,
                            data: out,
                            success: function (img) {
                                $('#deskripsiProduk').summernote('insertImage', img);
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.error(textStatus + " " + errorThrown);
                            }
                        });
                    };

                });
            </script>
        <?php elseif ($_GET['module']=='promo' AND $_GET['act']=='edit'): ?>
            <script type="text/javascript">
                $(document).ready(function(){

                    $('#deskripsi').summernote({
                        callbacks: {
                            onImageUpload: function(files) {
                                for(let i=0; i < files.length; i++) {
                                    $.upload(files[i]);
                                }
                            }
                        },
                        placeholder: 'Tulis deskripsi artikel di sini',
                        tabsize: 2,
                        height: 200,
                    });

                    $.upload = function (file) {
                        let out = new FormData();
                        out.append('file', file, file.name);

                        $.ajax({
                            method: 'POST',
                            url: 'actionUploadImgDeskripsiPromo',
                            contentType: false,
                            cache: false,
                            processData: false,
                            data: out,
                            success: function (img) {
                                $('#deskripsi').summernote('insertImage', img);
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.error(textStatus + " " + errorThrown);
                            }
                        });
                    };

                });
            </script>
        <?php elseif ($_GET['module']=='halaman' AND $_GET['act']=='tanya-jawab'): ?>
            <script type="text/javascript">
                $(document).ready(function(){

                    $('#deskripsi').summernote({
                        callbacks: {
                            onImageUpload: function(files) {
                                for(let i=0; i < files.length; i++) {
                                    $.upload(files[i]);
                                }
                            }
                        },
                        placeholder: 'Tulis deskripsi disini...',
                        tabsize: 2,
                        height: 200,
                    });

                    $.upload = function (file) {
                        let out = new FormData();
                        out.append('file', file, file.name);

                        $.ajax({
                            method: 'POST',
                            url: 'actionUploadImgDeskripsiHalaman',
                            contentType: false,
                            cache: false,
                            processData: false,
                            data: out,
                            success: function (img) {
                                $('#deskripsi').summernote('insertImage', img);
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.error(textStatus + " " + errorThrown);
                            }
                        });
                    };

                });
            </script>
        <?php endif ?>
    <?php endif ?>
    <!-- End Pengaturan Edit, Halaman Tanya Jawab Edit, Produk Edit, Promo Edit -->

    <!-- Notifikasi -->
    <!-- Bootstrap Notify -->
    <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
    <?php if ($_SESSION['_alert__']!==NULL): ?>
        <script>
            var placementFrom = "top";
            var placementAlign = "center";
        </script>

        <?php if ($_SESSION['_alert__']===0): ?>
            <script>
                var state = "danger";
                var style = "withicon";
                var content = {};
                content.message = 'Sistem kami tidak bisa menyimpan data perubahan anda';
                content.title = 'GAGAL!!!';
                content.icon = 'fas fa-exclamation-circle';
            </script>
        <?php elseif ($_SESSION['_alert__']===1): ?>
            <script>
                var state = "success";
                var style = "withicon";
                var content = {};
                content.message = 'Perubahan berhasil di simpan';
                content.title = 'BERHASIL!!!';
                content.icon = 'fas fa-check-circle';
            </script>
        <?php elseif ($_SESSION['_alert__']===2): ?>
            <script>
                var state = "success";
                var style = "withicon";
                var content = {};
                content.message = 'Selamat Datang di Portal Admin <?= $namaweb ?>';
                content.title = 'BERHASIL LOGIN!';
                content.icon = 'fas fa-bell';
            </script>
        <?php endif ?>

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

    <!-- Banner Beranda -->
    <?php if (($_GET['module']=='pengaturan' AND $_GET['act']=='banner-beranda') OR ($_GET['module']=='pengaturan' AND $_GET['act']=='ubah-banner-beranda')): ?>
    <script>
        function ambilId(file){
            return document.getElementById(file);
        }

        $(document).ready(function(){
            $("#upload").click(function(){
                ambilId("progressBar").style.display = "block";
                var file = ambilId("file").files[0];

                if (file!="") {
                    var formdata = new FormData();
                    formdata.append("file", file);
                    var ajax = new XMLHttpRequest();
                    ajax.upload.addEventListener("progress", progressHandler, false);
                    ajax.addEventListener("load", completeHandler, false);
                    ajax.addEventListener("error", errorHandler, false);
                    ajax.addEventListener("abort", abortHandler, false);
                    ajax.open("POST", "actionBannerBeranda");
                    ajax.send(formdata);
                }
            });
        });

        function progressHandler(event){
            ambilId("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
            var percent = (event.loaded / event.total) * 100;
            ambilId("progressBar").value = Math.round(percent);
            ambilId("statusProgress").innerHTML = Math.round(percent)+"% Mengunggah... Mohon tunggu sebentar!";
        }
        function completeHandler(event){
            ambilId("statusProgress").innerHTML = "100% Selesai!";
            ambilId("status").innerHTML = event.target.responseText;
        }
        function errorHandler(event){
            ambilId("status").innerHTML = "Upload Failed";
        }
        function abortHandler(event){
            ambilId("status").innerHTML = "Upload Aborted";
        }
    </script>
    <?php endif ?>
    <!-- End Banner Beranda -->

    <!-- All -->
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
    <!-- End All -->

</body>
</html>