<?php

session_start();

if(isset($_POST['_submit_special_FamilyFood_']) OR $_GET['act']=='03'){
	require '../system/koneksi.php';
	require '../system/fungsi_modul.php';
	require '../system/fungsi_session.php';

	// Data file
	$database 	= "keranjang";

	$act 		= $_GET["act"];
	// Data file
	
	// Add Keranjang
	if ($act=='01'){
		// Nilai yang akan di input
			$session 		= $_SESSION['session_FamillyFood'];
			$kode_invoice 	= $_SESSION['kode_invoice_FamillyFood'];
	        $id_produk 		= preg_replace('/<[^<]+?>/', ' ', $_POST['___in_id_produk_special_FamilyFood']);
	        $qty 			= preg_replace('/<[^<]+?>/', ' ', $_POST['___in_qty_special_FamilyFood']);
	        $sub_harga 		= preg_replace('/<[^<]+?>/', ' ', $_POST['___in_sub_harga_special_FamilyFood']);
	        $status 		= "Proses";
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
	            header("Location: ../keranjang-saya");
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
	        $id_keranjang 	= preg_replace('/<[^<]+?>/', ' ', $_POST['___in_id_keranjang_special_FamilyFood']);
	        $qty 			= preg_replace('/<[^<]+?>/', ' ', $_POST['___in_qty_special_FamilyFood']);
	        $harga_final 	= preg_replace('/<[^<]+?>/', ' ', $_POST['___in_harga_final_special_FamilyFood']);
	        $sub_harga 		= $harga_final*$qty;
		// Nilai yang akan di input

		try{
            $sql = "UPDATE $database
					SET qty 	 		= :qty,
						sub_harga 		= :sub_harga
					WHERE id_keranjang	= :id_keranjang
				";
						  
			$statement = $pdo->prepare($sql);

			$statement->bindParam(":id_keranjang", $id_keranjang, PDO::PARAM_INT);
			$statement->bindParam(":qty", $qty, PDO::PARAM_STR);
			$statement->bindParam(":sub_harga", $sub_harga, PDO::PARAM_STR);

			$count = $statement->execute();

            if ($count>0) {
	            $_SESSION['_msg__'] = 'Berhasil';
	            header("Location: keranjang-saya");
	            exit();
            }     
        }catch(PDOException $e){
            $_SESSION['_msg__'] = 'Gagal';
            echo "<script>window.location(history.back(0))</script>";
            exit();
        }
	}
	// Edit Keranjang
	
	// Edit Password Keranjang
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
	// Edit Password Keranjang
}else{
    header("location: 404");
    die();
    exit();
}

?>