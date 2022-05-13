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
    $penyimpananGambar      = "../../assets/images/bukti-pembayaran";
    $database               = "invoice";
    $act                    = $_GET["act"];
    // Data file

    // Aksi Menunggu Konfirmasi
    if ($_GET['act']==="01") {
        $kode_invoice       = htmlspecialchars($_POST['___in_kode_invoice_special_FamilyFood']);
        $metode_pembayaran  = htmlspecialchars($_POST['___in_metode_pembayaran_special_FamilyFood']);
        $status             = "Diproses";

        // Gambar
            $lokasi_file            = $_FILES['___in_bukti_pembayaran_special_FamilyFood']['tmp_name'];
            $lokasi_upload          = "$penyimpananGambar/";
            $nama_file              = $_FILES['___in_bukti_pembayaran_special_FamilyFood']['name'];
            $tipe_file              = strtolower($_FILES['___in_bukti_pembayaran_special_FamilyFood']['type']);
            $tipe_file2             = seo2($tipe_file); // ngedapetin png / jpg / jpeg
            $ukuran                 = $_FILES['___in_bukti_pembayaran_special_FamilyFood']['size'];
            $nama_file_unik         = "bukti-transaksi-".seo($metode_pembayaran)."-".seo($kode_invoice).".".$tipe_file2;

            // Cek jenis file yang di upload
            cekFile($tipe_file);
            // Cek jenis file yang di upload

            // Cek ukuran file yang di upload
            cekUkuranFile2mb($ukuran);
            // Cek ukuran file yang di upload

            $bukti_pembayaran     = $nama_file_unik;

        try {
            $sql = "UPDATE $database
                    SET metode_pembayaran   = :metode_pembayaran,
                        bukti_pembayaran    = :bukti_pembayaran,
                        status              = :status
                    WHERE kode_invoice      = :kode_invoice
                ";
                          
            $statement = $pdo->prepare($sql);

            $statement->bindParam(":kode_invoice", $kode_invoice, PDO::PARAM_INT);
            $statement->bindParam(":metode_pembayaran", $metode_pembayaran, PDO::PARAM_STR);
            $statement->bindParam(":bukti_pembayaran", $bukti_pembayaran, PDO::PARAM_STR);
            $statement->bindParam(":status", $status, PDO::PARAM_STR);

            $count = $statement->execute();

            if ($count>0) {
                // Upload gambar
                uploadGambarAsli($nama_file_unik, $tipe_file, $lokasi_file, $lokasi_upload);
                // Upload gambar
                $_SESSION['_msg__']  = "Berhasil";
                echo "<script>window.location = 'sedang-diproses'</script>";
                die();
                exit();
            }
        }catch(PDOException $e){
            $_SESSION['_msg__']  = "Gagal";
            echo "<script>window.location(history.back(0))</script>";
            die();
            exit();
        }
    }
    // Aksi Menunggu Konfirmasi

    // Aksi Transaksi Diproses
    elseif ($_GET['act']==="02") {
        $kode_invoice   = htmlspecialchars($_POST['___in_kode_invoice_special_FamilyFood']);
        $no_resi        = htmlspecialchars($_POST['___in_no_resi_special_FamilyFood']);
        $status         = "Dikirim";

        try {
            $sql = "UPDATE $database
                    SET no_resi         = :no_resi,
                        date_pengiriman = NOW(),
                        time_pengiriman = NOW(),
                        status          = :status
                    WHERE kode_invoice  = :kode_invoice
                ";
                          
            $statement = $pdo->prepare($sql);

            $statement->bindParam(":kode_invoice", $kode_invoice, PDO::PARAM_INT);
            $statement->bindParam(":no_resi", $no_resi, PDO::PARAM_STR);
            $statement->bindParam(":status", $status, PDO::PARAM_STR);

            $count = $statement->execute();

            if ($count>0) {
                $_SESSION['_msg__']  = "Berhasil";
                echo "<script>window.location = 'sedang-dikirim'</script>";
                die();
                exit();
            }
        }catch(PDOException $e){
            $_SESSION['_msg__']  = "Gagal";
            echo "<script>window.location(history.back(0))</script>";
            die();
            exit();
        }
    }
    // Aksi Transaksi Diproses

    // Aksi Transaksi Selesai
    elseif ($_GET['act']==="03") {
        $session    = $_GET["id"];
        $status     = "Selesai";

        try {
            $sql = "UPDATE $database
                    SET date_selesai    = NOW(),
                        time_selesai    = NOW(),
                        status          = :status
                    WHERE session       = :session
                ";
                          
            $statement = $pdo->prepare($sql);

            $statement->bindParam(":session", $session, PDO::PARAM_INT);
            $statement->bindParam(":status", $status, PDO::PARAM_STR);

            $count = $statement->execute();

            if ($count>0) {
                $_SESSION['_msg__']  = "Berhasil";
                echo "<script>window.location = 'pesanan-selesai'</script>";
                die();
                exit();
            }
        }catch(PDOException $e){
            $_SESSION['_msg__']  = "Gagal";
            echo "<script>window.location(history.back(0))</script>";
            die();
            exit();
        }
    }
    // Aksi Transaksi Selesai

}else{
    header("location: keluar-edit");
    die();
    exit();
}