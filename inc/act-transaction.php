<?php

session_start();

if(isset($_POST['_submit_special_FamilyFood_']) OR $_GET['act']=='03'){
	require '../system/koneksi.php';
	require '../system/fungsi_modul.php';

	// Data file
	$database 	= "invoice";
	$database2 	= "keranjang";

	$act 		= $_GET["act"];
	// Data file
	
	// Add Invoice
	if ($act=='01'){
		// Nilai yang akan di input
			$kode_invoice 		= $_SESSION['kode_invoice_FamillyFood'];
			$session 			= $_SESSION['session_FamillyFood'];
	        $qty 				= preg_replace('/<[^<]+?>/', ' ', $_POST['___in_qty_special_FamilyFood']);
	        $sub_harga 			= preg_replace('/<[^<]+?>/', ' ', $_POST['___in_sub_harga_special_FamilyFood']);
	        $berat 				= preg_replace('/<[^<]+?>/', ' ', $_POST['___in_total_berat_special_FamilyFood']);
	        $nama_penerima 		= preg_replace('/<[^<]+?>/', ' ', $_POST['___in_nama_penerima_special_FamilyFood']);
	        $nomor_whatsapp 	= preg_replace('/<[^<]+?>/', ' ', $_POST['___in_nomor_whatsapp_special_FamilyFood']);
	        $provinsi 			= preg_replace('/<[^<]+?>/', ' ', $_POST['provinsi']);
	        $kab_kota 			= preg_replace('/<[^<]+?>/', ' ', $_POST['kab_kota']);
	        $detail_alamat 		= preg_replace('/<[^<]+?>/', ' ', $_POST['___in_detail_alamat_special_FamilyFood']);
	        $kode_pos 			= preg_replace('/<[^<]+?>/', ' ', $_POST['kodepos']);
	        $ekspedisi 			= preg_replace('/<[^<]+?>/', ' ', $_POST['ekspedisi']);
	        $jenis_pengiriman 	= preg_replace('/<[^<]+?>/', ' ', $_POST['nama_paket']);
	        $biaya_ekspedisi 	= preg_replace('/<[^<]+?>/', ' ', $_POST['ongkir']);
	        $total_pembayaran 	= preg_replace('/<[^<]+?>/', ' ', $_POST['total_pembayaran']);
	        $status 			= "Menunggu Konfirmasi";
	        $status_keranjang	= "Checkout";
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
							SET status 			= :status
							WHERE kode_invoice	= :kode_invoice
						";
								  
					$statement = $pdo->prepare($sql);

					$statement->bindParam(":kode_invoice", $kode_invoice, PDO::PARAM_INT);
					$statement->bindParam(":status", $status_keranjang, PDO::PARAM_STR);

					$count = $statement->execute();

		            if ($count>0) {
			            $_SESSION['_msg__'] = 'Berhasil';
			            header("Location: ../transaksi-$session");
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