<?php

session_start();
error_reporting(0);

if (empty($_SESSION['_kode_login__'])) {
    header("location: keluar-edit");
    die();
    exit();
}elseif(isset($_POST['_submit_special_SEMANAK_']) OR $_GET['act']=='03'){
    require '../../system/koneksi.php';
    require '../../system/others.php';
    require '../../system/fungsi_modul.php';
    require '../../system/fungsi_sitemap.php';
    require "../../system/fungsi_upload_gambar.php";
    require "../../system/z_setting.php";

    // Data file
    $link                   = "promo";
    $penyimpananGambar      = "../../assets/images/promo";
    $penyimpananGambarSmall = "../../assets/images/promo/small";
    $database               = "promo";
    $act                    = $_GET["act"];
    // Data file

    // Tambah data
    if ($_GET['act']==="01") {
        $id_data_admin  = $_SESSION['_id_data_admin__'];
        $judul          = htmlspecialchars($_POST['___in_judul_special_SEMANAK']);
        $judul_seo      = seo($judul)."-".rand(00,99);

        // Gambar
            $lokasi_file            = $_FILES['___in_gambar_special_SEMANAK']['tmp_name'];
            $lokasi_upload          = "$penyimpananGambar/";
            $lokasi_upload_small    = "$penyimpananGambarSmall/";
            $nama_file              = $_FILES['___in_gambar_special_SEMANAK']['name'];
            $tipe_file              = strtolower($_FILES['___in_gambar_special_SEMANAK']['type']);
            $tipe_file2             = seo2($tipe_file); // ngedapetin png / jpg / jpeg
            $ukuran                 = $_FILES['___in_gambar_special_SEMANAK']['size'];
            $nama_file_unik         = $judul_seo.".".$tipe_file2;

            // Cek jenis file yang di upload
            cekFile($tipe_file);
            // Cek jenis file yang di upload

            // Cek ukuran file yang di upload
            cekUkuranFile2mb($ukuran);
            // Cek ukuran file yang di upload

            $gambar     = $nama_file_unik;

        $deskripsi      = $_POST['___in_deskripsi_special_SEMANAK'];

        if (empty($_POST['___in_description_special_SEMANAK']) || $_POST['___in_description_special_SEMANAK']===NULL || $_POST['___in_description_special_SEMANAK']===0) {
            $my_keyword     = preg_replace('/<[^<]+?>/', ' ', $deskripsi);
            $keyword        = substr($my_keyword, 0,1000);
        }else{
            $keyword        = htmlspecialchars(substr($_POST['___in_keyword_special_SEMANAK'], 0,400));
        }

        if (empty($_POST['___in_description_special_SEMANAK']) || $_POST['___in_description_special_SEMANAK']===NULL || $_POST['___in_description_special_SEMANAK']===0) {
            $my_description     = preg_replace('/<[^<]+?>/', ' ', $deskripsi);
            $description        = substr($my_description, 0,1000);
        }else{
            $description        = htmlspecialchars(substr($_POST['___in_description_special_SEMANAK'], 0,400));
        }

        $dikunjungi     = 0;

        // SiteMap 1
            $database_1         = "sitemap_1";
            $id_sub_sitemap     = 3;
            $loc_1              = $link1."/promo/".$judul_seo.".html";
            $priority_1         = "0.80";
        // SiteMap 1

        tambahSitemap_1($database_1, $id_sub_sitemap, $loc_1, $priority_1, $link);
        $id_sitemap_1 = $insertId;

        if ($count>0) {
            try{
                $stmt = $pdo->prepare("INSERT INTO $database
                                (id_data_admin,judul,judul_seo,gambar,deskripsi,keyword,description,dikunjungi,tgl_update,id_sitemap_1)
                                VALUES(:id_data_admin,:judul,:judul_seo,:gambar,:deskripsi,:keyword,:description,:dikunjungi,NOW(),:id_sitemap_1)" );
                        
                $stmt->bindParam(":id_data_admin", $id_data_admin, PDO::PARAM_STR);
                $stmt->bindParam(":judul", $judul, PDO::PARAM_STR);
                $stmt->bindParam(":judul_seo", $judul_seo, PDO::PARAM_STR);
                $stmt->bindParam(":gambar", $gambar, PDO::PARAM_STR);
                $stmt->bindParam(":deskripsi", $deskripsi, PDO::PARAM_STR);
                $stmt->bindParam(":keyword", $keyword, PDO::PARAM_STR);
                $stmt->bindParam(":description", $description, PDO::PARAM_STR);
                $stmt->bindParam(":dikunjungi", $dikunjungi, PDO::PARAM_STR);
                $stmt->bindParam(":id_sitemap_1", $id_sitemap_1, PDO::PARAM_STR);
                    
                $count = $stmt->execute();

                // Upload gambar
                uploadGambarWithSmall($nama_file_unik, $tipe_file, $lokasi_file, $lokasi_upload, $lokasi_upload_small);
                // Upload gambar
                        
                $insertId = $pdo->lastInsertId();

                if ($count>0) {
                    $_SESSION['_msg__'] = 'Berhasil';
                    header("Location: $link");
                    die();
                    exit();
                }     
            }catch(PDOException $e){
                $_SESSION['_msg__'] = 'Gagal';
                echo "<script>window.location(history.back(0))</script>";
                die();
                exit();
            }
        }
    }
    // Tambah data

    // Edit data
    elseif ($_GET['act']==="02") {
        $id_sitemap_1   = htmlspecialchars($_POST['___in_id_sitemap_1_special_SEMANAK']);
        $id_promo    = htmlspecialchars($_POST['___in_id_promo_special_SEMANAK']);
        $judul          = htmlspecialchars($_POST['___in_judul_special_SEMANAK']);
        $judul_seo      = seo($judul)."-".rand(00,99);

        // Gambar
            $lokasi_file            = $_FILES['___in_gambar_special_SEMANAK']['tmp_name'];
            $lokasi_upload          = "$penyimpananGambar/";
            $lokasi_upload_small    = "$penyimpananGambarSmall/";
            $nama_file              = $_FILES['___in_gambar_special_SEMANAK']['name'];
            $tipe_file              = strtolower($_FILES['___in_gambar_special_SEMANAK']['type']);
            $tipe_file2             = seo2($tipe_file); // ngedapetin png / jpg / jpeg
            $ukuran                 = $_FILES['___in_gambar_special_SEMANAK']['size'];
            $nama_file_unik         = $judul_seo.".".$tipe_file2;


            $in_gambar_lama     = $_POST['___in_gambar_lama_special_SEMANAK'];
            $cariExtensiGambar  = explode(".", $in_gambar_lama);
            $extensiGambarnya   = $cariExtensiGambar[1];

            if (empty($nama_file)){
                // Ubah nama gambar
                rename("$penyimpananGambar/$in_gambar_lama", "$penyimpananGambar/$nama_file_unik$extensiGambarnya");
                rename("$penyimpananGambarSmall/$in_gambar_lama", "$penyimpananGambarSmall/$nama_file_unik$extensiGambarnya");
                // Ubah nama gambar

                $gambar = $nama_file_unik.$extensiGambarnya;
            }else{
                // Cek jenis file yang di upload
                cekFile($tipe_file);
                // Cek jenis file yang di upload

                // Cek ukuran file yang di upload
                cekUkuranFile2mb($ukuran);
                // Cek ukuran file yang di upload

                // Hapus gambar
                unlink("$penyimpananGambar/$in_gambar_lama");
                unlink("$penyimpananGambarSmall/$in_gambar_lama");
                // Hapus gambar

                // Upload gambar
                uploadGambarWithSmall($nama_file_unik, $tipe_file, $lokasi_file, $lokasi_upload, $lokasi_upload_small);
                // Upload gambar

                $gambar = $nama_file_unik;
            }
        // Gambar

        $deskripsi      = $_POST['___in_deskripsi_special_SEMANAK'];

        if (empty($_POST['___in_description_special_SEMANAK']) || $_POST['___in_description_special_SEMANAK']===NULL || $_POST['___in_description_special_SEMANAK']===0) {
            $my_keyword     = preg_replace('/<[^<]+?>/', ' ', $deskripsi);
            $keyword        = substr($my_keyword, 0,1000);
        }else{
            $keyword        = htmlspecialchars(substr($_POST['___in_keyword_special_SEMANAK'], 0,400));
        }

        if (empty($_POST['___in_description_special_SEMANAK']) || $_POST['___in_description_special_SEMANAK']===NULL || $_POST['___in_description_special_SEMANAK']===0) {
            $my_description     = preg_replace('/<[^<]+?>/', ' ', $deskripsi);
            $description        = substr($my_description, 0,1000);
        }else{
            $description        = htmlspecialchars(substr($_POST['___in_description_special_SEMANAK'], 0,400));
        }

        // SiteMap 1
            $database_1         = "sitemap_1";
            $id_sub_sitemap     = 3;
            $loc_1              = $link1."/promo/".$judul_seo.".html";
            $priority_1         = "0.80";
        // SiteMap 1

        try {
            $sql = "UPDATE $database
                    SET judul           = :judul,
                        judul_seo       = :judul_seo,
                        gambar          = :gambar,
                        deskripsi       = :deskripsi,
                        keyword         = :keyword,
                        description     = :description
                    WHERE id_$database  = :id_promo
                ";
                          
            $statement = $pdo->prepare($sql);

            $statement->bindParam(":id_promo", $id_promo, PDO::PARAM_INT);
            $statement->bindParam(":judul", $judul, PDO::PARAM_STR);
            $statement->bindParam(":judul_seo", $judul_seo, PDO::PARAM_STR);
            $statement->bindParam(":gambar", $gambar, PDO::PARAM_STR);
            $statement->bindParam(":deskripsi", $deskripsi, PDO::PARAM_STR);
            $statement->bindParam(":keyword", $keyword, PDO::PARAM_STR);
            $statement->bindParam(":description", $description, PDO::PARAM_STR);

            $count = $statement->execute();

            editSitemap_1($database_1, $id_sitemap_1, $id_sub_sitemap, $loc_1, $priority_1, $link);
            if ($count>0) {
                $_SESSION['_msg__']  = "Berhasil";
                echo "<script>window.location = 'ubah-$link-$id_promo'</script>";
                die();
                exit();
            }
        }catch(PDOException $e){
            $_SESSION['_msg__']  = "Gagal";
            echo "<script>window.location = 'ubah-$link-$id_promo'</script>";
            die();
            exit();
        }

    }
    // Edit data

    // Hapus data
    elseif ($_GET['act']=='03'){
        $Data           = $pdo->query("SELECT gambar, id_sitemap_1 FROM $database WHERE id_promo='$_GET[id]'");
        $resultData     = $Data->fetch(PDO::FETCH_ASSOC);
        $gambarHapus    = $resultData["gambar"];

        // SiteMap 1
            $database_1     = "sitemap_1";
            $id_sitemap_1   = $resultData['id_sitemap_1'];
        // SiteMap 1

        try{
            $del = $pdo->query("DELETE FROM $database WHERE id_$database='$_GET[id]'");
            $del->execute();

            // Hapus gambar
            unlink("$penyimpananGambar/$gambarHapus");
            unlink("$penyimpananGambarSmall/$gambarHapus");
            // Hapus gambar

            hapusSitemap_1($database_1, $id_sitemap_1, $link);
            if ($count>0) {
                $_SESSION['_msg__'] = 'Berhasil';
                header("Location: $link");
                die();
                exit();
            }
        }catch(PDOException $e){
            $_SESSION['_msg__'] = 'Gagal';
            echo "<script>window.location(history.back(0))</script>";
            die();
            exit();
        }
    }
    // Hapus data

}else{
    header("location: keluar-edit");
    die();
    exit();
}