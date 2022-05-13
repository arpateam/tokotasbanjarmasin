<?php

session_start();

if(isset($_POST['_submit_special_FamilyFood_']) OR $_GET['act']=='03'){
    require '../../system/koneksi.php';
    require '../../system/fungsi_modul.php';
    require '../../system/fungsi_session.php';

    // Data file
    $database   = "keranjang";
    $act        = $_GET["act"];
    // Data file
    
    // Add Keranjang
    if ($act=='01'){
        // Nilai yang akan di input
            $session        = $_POST['___in_session_special_FamilyFood'];
            $kode_invoice   = $_POST['___in_kode_invoice_special_FamilyFood'];
            $id_produk      = preg_replace('/<[^<]+?>/', ' ', $_POST['___in_id_produk_special_FamilyFood']);
            $qty            = preg_replace('/<[^<]+?>/', ' ', $_POST['___in_qty_special_FamilyFood']);
            $sub_harga      = preg_replace('/<[^<]+?>/', ' ', $_POST['___in_sub_harga_special_FamilyFood']);
            $status         = "Proses";
        // Nilai yang akan di input

        try{
            $stmt = $pdo->prepare("INSERT INTO $database
                            (session,kode_invoice,id_produk,qty,sub_harga,status)
                            VALUES(:session,:kode_invoice,:id_produk,:qty,:sub_harga,:status)" );
                    
            $stmt->bindParam(":session", $session, PDO::PARAM_STR);
            $stmt->bindParam(":kode_invoice", $kode_invoice, PDO::PARAM_STR);
            $stmt->bindParam(":id_produk", $id_produk, PDO::PARAM_STR);
            $stmt->bindParam(":qty", $qty, PDO::PARAM_STR);
            $stmt->bindParam(":sub_harga", $sub_harga, PDO::PARAM_STR);
            $stmt->bindParam(":status", $status, PDO::PARAM_STR);
                
            $count = $stmt->execute();
                    
            $insertId = $pdo->lastInsertId();

            if ($count>0) {
                $_SESSION['_msg__'] = 'Berhasil';
                header("Location: kasir");
                exit();
            }     
        }catch(PDOException $e){
            var_dump($e);
            exit();
            $_SESSION['_msg__'] = 'Gagal';
            echo "<script>window.location(history.back(0))</script>";
            exit();
        }
    }
    // Add Keranjang
    
    // Edit Keranjang
    elseif ($act=='02'){

        // Nilai yang akan di input
            $id_keranjang   = preg_replace('/<[^<]+?>/', ' ', $_POST['___in_id_keranjang_special_FamilyFood']);
            $qty            = preg_replace('/<[^<]+?>/', ' ', $_POST['___in_qty_special_FamilyFood']);
            $harga_final    = preg_replace('/<[^<]+?>/', ' ', $_POST['___in_harga_final_special_FamilyFood']);
            $sub_harga      = $harga_final*$qty;
        // Nilai yang akan di input

        try{
            $sql = "UPDATE $database
                    SET qty             = :qty,
                        sub_harga       = :sub_harga
                    WHERE id_keranjang  = :id_keranjang
                ";
                          
            $statement = $pdo->prepare($sql);

            $statement->bindParam(":id_keranjang", $id_keranjang, PDO::PARAM_INT);
            $statement->bindParam(":qty", $qty, PDO::PARAM_STR);
            $statement->bindParam(":sub_harga", $sub_harga, PDO::PARAM_STR);

            $count = $statement->execute();

            if ($count>0) {
                $_SESSION['_msg__'] = 'Berhasil';
                header("Location: kasir");
                exit();
            }     
        }catch(PDOException $e){
            $_SESSION['_msg__'] = 'Gagal';
            echo "<script>window.location(history.back(0))</script>";
            exit();
        }
    }
    // Edit Keranjang
    
    // Hapus Keranjang
    elseif ($act=='03'){
        try{
            $del = $pdo->query("DELETE FROM $database WHERE id_$database='$_GET[id]'");
            $del->execute();

            $_SESSION['_msg__'] = 'Berhasil';
            header("Location: keranjang-saya");
            die();
            exit();
        }catch(PDOException $e){
            $_SESSION['_msg__'] = 'Gagal';
            echo "<script>window.location(history.back(0))</script>";
            die();
            exit();
        }
    }
    // Hapus Keranjang

    // Add Invoice
    if ($act=='04'){
        // Data file
        $database   = "invoice";
        $database2  = "keranjang";

        $act        = $_GET["act"];
        // Data file

        // Nilai yang akan di input
            $session            = $_POST['___in_session_special_FamilyFood'];
            $kode_invoice       = $_POST['___in_kode_invoice_special_FamilyFood'];
            $qty                = "0";
            $sub_harga          = preg_replace('/<[^<]+?>/', ' ', $_POST['___in_total_bayar_special_FamilyFood']);
            $berat              = "0";
            $nama_penerima      = preg_replace('/<[^<]+?>/', ' ', $_POST['___in_nama_penerima_special_FamilyFood']);
            $nomor_whatsapp     = "0";
            $provinsi           = "0";
            $kab_kota           = "0";
            $detail_alamat      = "0";
            $kode_pos           = "0";
            $ekspedisi          = "0";
            $jenis_pengiriman   = "0";
            $biaya_ekspedisi    = "0";
            $total_pembayaran   = $sub_harga;
            $status             = "Selesai";
            $status_keranjang   = "Checkout";
        // Nilai yang akan di input

        try{
            $stmt = $pdo->prepare("INSERT INTO $database
                            (kode_invoice,session,date_transaksi,time_transaksi,qty,sub_harga,berat,nama_penerima,nomor_whatsapp,provinsi,kab_kota,detail_alamat,kode_pos,ekspedisi,jenis_pengiriman,biaya_ekspedisi,total_pembayaran,status)
                            VALUES(:kode_invoice,:session,NOW(),NOW(),:qty,:sub_harga,:berat,:nama_penerima,:nomor_whatsapp,:provinsi,:kab_kota,:detail_alamat,:kode_pos,:ekspedisi,:jenis_pengiriman,:biaya_ekspedisi,:total_pembayaran,:status)" );
                    
            $stmt->bindParam(":kode_invoice", $kode_invoice, PDO::PARAM_STR);
            $stmt->bindParam(":session", $session, PDO::PARAM_STR);
            $stmt->bindParam(":qty", $qty, PDO::PARAM_STR);
            $stmt->bindParam(":sub_harga", $sub_harga, PDO::PARAM_STR);
            $stmt->bindParam(":berat", $berat, PDO::PARAM_STR);
            $stmt->bindParam(":nama_penerima", $nama_penerima, PDO::PARAM_STR);
            $stmt->bindParam(":nomor_whatsapp", $nomor_whatsapp, PDO::PARAM_STR);
            $stmt->bindParam(":provinsi", $provinsi, PDO::PARAM_STR);
            $stmt->bindParam(":kab_kota", $kab_kota, PDO::PARAM_STR);
            $stmt->bindParam(":detail_alamat", $detail_alamat, PDO::PARAM_STR);
            $stmt->bindParam(":kode_pos", $kode_pos, PDO::PARAM_STR);
            $stmt->bindParam(":ekspedisi", $ekspedisi, PDO::PARAM_STR);
            $stmt->bindParam(":jenis_pengiriman", $jenis_pengiriman, PDO::PARAM_STR);
            $stmt->bindParam(":biaya_ekspedisi", $biaya_ekspedisi, PDO::PARAM_STR);
            $stmt->bindParam(":total_pembayaran", $total_pembayaran, PDO::PARAM_STR);
            $stmt->bindParam(":status", $status, PDO::PARAM_STR);
                
            $count = $stmt->execute();
                    
            $insertId = $pdo->lastInsertId();

            if ($count>0) {
                try{
                    $sql = "UPDATE $database2
                            SET status          = :status
                            WHERE kode_invoice  = :kode_invoice
                        ";
                                  
                    $statement = $pdo->prepare($sql);

                    $statement->bindParam(":kode_invoice", $kode_invoice, PDO::PARAM_INT);
                    $statement->bindParam(":status", $status_keranjang, PDO::PARAM_STR);

                    $count = $statement->execute();

                    if ($count>0) {
                        $_SESSION['_msg__'] = 'Berhasil';
                        header("Location: pesanan-selesai");
                        exit();
                    }     
                }catch(PDOException $e){
                    $_SESSION['_msg__'] = 'Gagal';
                    echo "<script>window.location(history.back(0))</script>";
                    exit();
                }
            }     
        }catch(PDOException $e){
            var_dump($e);
            exit();
            $_SESSION['_msg__'] = 'Gagal';
            echo "<script>window.location(history.back(0))</script>";
            exit();
        }
    }
    // Add Invoice
}else{
    header("location: 404");
    die();
    exit();
}

?>