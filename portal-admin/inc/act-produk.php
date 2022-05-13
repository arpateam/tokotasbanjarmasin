<?php

session_start();
error_reporting(0);

if (empty($_SESSION['_kode_login__'])) {
    header("location: keluar-edit");
    die();
    exit();
}elseif(isset($_POST['_submit_special_FamilyFood_']) OR $_GET['act']=='03'){
    require '../../system/koneksi.php';
    require '../../system/others.php';
    require '../../system/fungsi_modul.php';
    require '../../system/fungsi_sitemap.php';
    require "../../system/fungsi_upload_gambar.php";
    require "../../system/z_setting.php";

    // Data file
    $link                   = "produk";
    $penyimpananGambar      = "../../assets/images/produk";
    $database               = "produk";
    $act                    = $_GET["act"];
    // Data file

    // Tambah data
    if ($_GET['act']==="01") {
        $urutan         = htmlspecialchars($_POST['___in_urutan_special_FamilyFood']);
        $nama_produk    = htmlspecialchars($_POST['___in_nama_produk_special_FamilyFood']);
        $seo            = seo($nama_produk)."-".rand(00,99);
        $status         = htmlspecialchars($_POST['___in_status_special_FamilyFood']);
        $harga          = rpInt(htmlspecialchars($_POST['___in_harga_special_FamilyFood']));
        $diskon         = htmlspecialchars($_POST['___in_diskon_special_FamilyFood']);

        if ($diskon===0 OR $diskon===NULL OR empty($diskon)) {
            $harga_final    = $harga;
        }else{
            $hitung1        = (($harga*$diskon)/100);
            $hitung2        = $harga-$hitung1;
            $harga_final    = $hitung2;
        }

        $berat          = rpInt(htmlspecialchars($_POST['___in_berat_special_FamilyFood']));

        // Gambar
            $lokasi_file            = $_FILES['___in_gambar_special_FamilyFood']['tmp_name'];
            $lokasi_upload          = "$penyimpananGambar/";
            $nama_file              = $_FILES['___in_gambar_special_FamilyFood']['name'];
            $tipe_file              = strtolower($_FILES['___in_gambar_special_FamilyFood']['type']);
            $tipe_file2             = seo2($tipe_file); // ngedapetin png / jpg / jpeg
            $ukuran                 = $_FILES['___in_gambar_special_FamilyFood']['size'];
            $nama_file_unik         = $seo.".".$tipe_file2;

            // Cek jenis file yang di upload
            cekFile($tipe_file);
            // Cek jenis file yang di upload

            // Cek ukuran file yang di upload
            cekUkuranFile2mb($ukuran);
            // Cek ukuran file yang di upload

            $gambar     = $nama_file_unik;

        $deskripsi      = $_POST['___in_deskripsi_special_FamilyFood'];

        if (empty($_POST['___in_description_special_FamilyFood']) || $_POST['___in_description_special_FamilyFood']===NULL || $_POST['___in_description_special_FamilyFood']===0) {
            $my_keyword     = preg_replace('/<[^<]+?>/', ' ', $deskripsi);
            $keyword        = $nama_produk.substr($my_keyword, 0,256);
        }else{
            $keyword        = $nama_produk.htmlspecialchars(substr($_POST['___in_keyword_special_FamilyFood'], 0,256));
        }

        if (empty($_POST['___in_description_special_FamilyFood']) || $_POST['___in_description_special_FamilyFood']===NULL || $_POST['___in_description_special_FamilyFood']===0) {
            $my_description     = preg_replace('/<[^<]+?>/', ' ', $deskripsi);
            $description        = $nama_produk.substr($my_description, 0,400);
        }else{
            $description        = $nama_produk.htmlspecialchars(substr($_POST['___in_description_special_FamilyFood'], 0,400));
        }

        // SiteMap 1
            $database_1         = "sitemap_1";
            $id_sub_sitemap     = 2;
            $loc_1              = $link1."/produk/".$seo.".html";
            $priority_1         = "0.80";
        // SiteMap 1

        tambahSitemap_1($database_1, $id_sub_sitemap, $loc_1, $priority_1, $link);
        $id_sitemap_1 = $insertId;
        if ($count>0) {
            try{
                $stmt = $pdo->prepare("INSERT INTO $database
                                (urutan,nama_produk,seo,status,harga,diskon,harga_final,berat,gambar,deskripsi,keyword,description,id_sitemap_1)
                                VALUES(:urutan,:nama_produk,:seo,:status,:harga,:diskon,:harga_final,:berat,:gambar,:deskripsi,:keyword,:description,:id_sitemap_1)" );
                        
                $stmt->bindParam(":urutan", $urutan, PDO::PARAM_STR);
                $stmt->bindParam(":nama_produk", $nama_produk, PDO::PARAM_STR);
                $stmt->bindParam(":seo", $seo, PDO::PARAM_STR);
                $stmt->bindParam(":status", $status, PDO::PARAM_STR);
                $stmt->bindParam(":harga", $harga, PDO::PARAM_STR);
                $stmt->bindParam(":diskon", $diskon, PDO::PARAM_STR);
                $stmt->bindParam(":harga_final", $harga_final, PDO::PARAM_STR);
                $stmt->bindParam(":berat", $berat, PDO::PARAM_STR);
                $stmt->bindParam(":gambar", $gambar, PDO::PARAM_STR);
                $stmt->bindParam(":deskripsi", $deskripsi, PDO::PARAM_STR);
                $stmt->bindParam(":keyword", $keyword, PDO::PARAM_STR);
                $stmt->bindParam(":description", $description, PDO::PARAM_STR);
                $stmt->bindParam(":id_sitemap_1", $id_sitemap_1, PDO::PARAM_STR);
                    
                $count = $stmt->execute();

                // Upload gambar
                uploadGambarAsli($nama_file_unik, $tipe_file, $lokasi_file, $lokasi_upload);
                // Upload gambar
                        
                $insertId = $pdo->lastInsertId();

                if ($count>0) {
                    $_SESSION['_msg__'] = 'Berhasil';
                    header("Location: $link");
                    die();
                    exit();
                }     
            }catch(PDOException $e){
                hapusSitemap_1($database_1, $id_sitemap_1, $link);
                if ($count>0) {
                    $_SESSION['_msg__'] = 'Gagal';
                    echo "<script>window.location(history.back(0))</script>";
                    die();
                    exit();
                }
            }
        }
    }
    // Tambah data

    // Edit data
    elseif ($_GET['act']==="02") {
        $id_sitemap_1   = htmlspecialchars($_POST['___in_id_sitemap_1_special_FamilyFood']);
        $id_produk      = htmlspecialchars($_POST['___in_id_produk_special_FamilyFood']);
        $urutan         = htmlspecialchars($_POST['___in_urutan_special_FamilyFood']);
        $nama_produk    = htmlspecialchars($_POST['___in_nama_produk_special_FamilyFood']);
        $seo            = seo($nama_produk)."-".rand(00,99);
        $status         = htmlspecialchars($_POST['___in_status_special_FamilyFood']);
        $harga          = rpInt(htmlspecialchars($_POST['___in_harga_special_FamilyFood']));
        $diskon         = htmlspecialchars($_POST['___in_diskon_special_FamilyFood']);

        if ($diskon===0 OR $diskon===NULL OR empty($diskon)) {
            $harga_final    = $harga;
        }else{
            $hitung1        = (($harga*$diskon)/100);
            $hitung2        = $harga-$hitung1;
            $harga_final    = $hitung2;
        }

        $berat          = rpInt(htmlspecialchars($_POST['___in_berat_special_FamilyFood']));

        // Gambar
            $lokasi_file            = $_FILES['___in_gambar_special_FamilyFood']['tmp_name'];
            $lokasi_upload          = "$penyimpananGambar/";
            $nama_file              = $_FILES['___in_gambar_special_FamilyFood']['name'];
            $tipe_file              = strtolower($_FILES['___in_gambar_special_FamilyFood']['type']);
            $tipe_file2             = seo2($tipe_file); // ngedapetin png / jpg / jpeg
            $ukuran                 = $_FILES['___in_gambar_special_FamilyFood']['size'];
            $nama_file_unik         = $seo.".".$tipe_file2;


            $in_gambar_lama     = $_POST['___in_gambar_lama_special_FamilyFood'];
            $cariExtensiGambar  = explode(".", $in_gambar_lama);
            $extensiGambarnya   = $cariExtensiGambar[1];

            if (empty($nama_file)){
                // Ubah nama gambar
                rename("$penyimpananGambar/$in_gambar_lama", "$penyimpananGambar/$nama_file_unik$extensiGambarnya");
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
                // Hapus gambar

                // Upload gambar
                uploadGambarAsli($nama_file_unik, $tipe_file, $lokasi_file, $lokasi_upload);
                // Upload gambar

                $gambar = $nama_file_unik;
            }
        // Gambar

        $deskripsi      = $_POST['___in_deskripsi_special_FamilyFood'];

        if (empty($_POST['___in_description_special_FamilyFood']) || $_POST['___in_description_special_FamilyFood']===NULL || $_POST['___in_description_special_FamilyFood']===0) {
            $my_keyword     = preg_replace('/<[^<]+?>/', ' ', $deskripsi);
            $keyword        = $nama_produk.substr($my_keyword, 0,256);
        }else{
            $keyword        = $nama_produk.htmlspecialchars(substr($_POST['___in_keyword_special_FamilyFood'], 0,256));
        }

        if (empty($_POST['___in_description_special_FamilyFood']) || $_POST['___in_description_special_FamilyFood']===NULL || $_POST['___in_description_special_FamilyFood']===0) {
            $my_description     = preg_replace('/<[^<]+?>/', ' ', $deskripsi);
            $description        = $nama_produk.substr($my_description, 0,400);
        }else{
            $description        = $nama_produk.htmlspecialchars(substr($_POST['___in_description_special_FamilyFood'], 0,400));
        }

        // SiteMap 1
            $database_1         = "sitemap_1";
            $id_sub_sitemap     = 2;
            $loc_1              = $link1."/produk/".$seo.".html";
            $priority_1         = "0.80";
        // SiteMap 1

        try {
            $sql = "UPDATE $database
                    SET urutan          = :urutan,
                        nama_produk     = :nama_produk,
                        seo             = :seo,
                        status          = :status,
                        harga           = :harga,
                        diskon          = :diskon,
                        harga_final     = :harga_final,
                        berat           = :berat,
                        gambar          = :gambar,
                        deskripsi       = :deskripsi,
                        keyword         = :keyword,
                        description     = :description
                    WHERE id_$database  = :id_produk
                ";
                          
            $statement = $pdo->prepare($sql);

            $statement->bindParam(":id_produk", $id_produk, PDO::PARAM_INT);
            $statement->bindParam(":urutan", $urutan, PDO::PARAM_STR);
            $statement->bindParam(":nama_produk", $nama_produk, PDO::PARAM_STR);
            $statement->bindParam(":seo", $seo, PDO::PARAM_STR);
            $statement->bindParam(":status", $status, PDO::PARAM_STR);
            $statement->bindParam(":harga", $harga, PDO::PARAM_STR);
            $statement->bindParam(":diskon", $diskon, PDO::PARAM_STR);
            $statement->bindParam(":harga_final", $harga_final, PDO::PARAM_STR);
            $statement->bindParam(":berat", $berat, PDO::PARAM_STR);
            $statement->bindParam(":gambar", $gambar, PDO::PARAM_STR);
            $statement->bindParam(":deskripsi", $deskripsi, PDO::PARAM_STR);
            $statement->bindParam(":keyword", $keyword, PDO::PARAM_STR);
            $statement->bindParam(":description", $description, PDO::PARAM_STR);

            $count = $statement->execute();

            editSitemap_1($database_1, $id_sitemap_1, $id_sub_sitemap, $loc_1, $priority_1, $link);
            if ($count>0) {
                $_SESSION['_msg__']  = "Berhasil";
                echo "<script>window.location = 'ubah-$link-$id_produk'</script>";
                die();
                exit();
            }
        }catch(PDOException $e){
            $_SESSION['_msg__']  = "Gagal";
            echo "<script>window.location = 'ubah-$link-$id_produk'</script>";
            die();
            exit();
        }

    }
    // Edit data

    // Hapus data
    elseif ($_GET['act']=='03'){
        $Data           = $pdo->query("SELECT gambar, id_sitemap_1 FROM produk WHERE id_produk='$_GET[id]'");
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