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
    require "../../system/z_setting.php";

    // Data file
    $link                   = "testimoni";
    $database               = "testimoni";
    $act                    = $_GET["act"];
    // Data file

    // Tambah data
    if ($_GET['act']==="01") {
        $nama       = htmlspecialchars($_POST['___in_nama_special_SEMANAK']);
        $deskripsi  = htmlspecialchars($_POST['___in_deskripsi_special_SEMANAK']);
        
        try{
            $stmt = $pdo->prepare("INSERT INTO $database
                            (nama,deskripsi,tgl_update)
                            VALUES(:nama,:deskripsi,NOW())" );
                    
            $stmt->bindParam(":nama", $nama, PDO::PARAM_STR);
            $stmt->bindParam(":deskripsi", $deskripsi, PDO::PARAM_STR);
                
            $count = $stmt->execute();
                    
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
    // Tambah data

    // Edit data
    elseif ($_GET['act']==="02") {
        $id_testimoni   = htmlspecialchars($_POST['___in_id_testimoni_special_SEMANAK']);
        $nama           = htmlspecialchars($_POST['___in_nama_special_SEMANAK']);
        $deskripsi      = htmlspecialchars($_POST['___in_deskripsi_special_SEMANAK']);

        try {
            $sql = "UPDATE $database
                    SET nama        = :nama,
                        deskripsi   = :deskripsi
                    WHERE id_$database  = :id_testimoni
                ";
                          
            $statement = $pdo->prepare($sql);

            $statement->bindParam(":id_testimoni", $id_testimoni, PDO::PARAM_INT);
            $statement->bindParam(":nama", $nama, PDO::PARAM_STR);
            $statement->bindParam(":deskripsi", $deskripsi, PDO::PARAM_STR);

            $count = $statement->execute();

            if ($count>0) {
                $_SESSION['_msg__']  = "Berhasil";
                echo "<script>window.location = 'ubah-$link-$id_testimoni'</script>";
                die();
                exit();
            }
        }catch(PDOException $e){
            $_SESSION['_msg__']  = "Gagal";
            echo "<script>window.location = 'ubah-$link-$id_testimoni'</script>";
            die();
            exit();
        }

    }
    // Edit data

    // Hapus data
    elseif ($_GET['act']=='03'){
        try{
            $del = $pdo->query("DELETE FROM $database WHERE id_$database='$_GET[id]'");
            $del->execute();

            $_SESSION['_msg__'] = 'Berhasil';
            header("Location: $link");
            die();
            exit();
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