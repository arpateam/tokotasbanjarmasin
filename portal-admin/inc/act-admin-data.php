<?php

session_start();

if (empty($_SESSION['_kode_login__'])) {
    header("location: keluar-edit");
    die();
    exit();
}elseif(!isset($_POST['_submit_special_SEMANAK_'])){
    header("location: keluar-edit");
    die();
    exit();
}else{
	require '../../system/koneksi.php';
	require '../../system/fungsi_modul.php';

	// Data file
	$database 	= "data_admin";

	$act 		= $_GET["act"];
	// Data file
	
	// Add data admin
	if ($act=='01'){

		// Nilai yang akan di input
	        $nama   			= preg_replace('/<[^<]+?>/', ' ', $_POST['___in_nama_special_SEMANAK']);
	        $level     			= htmlspecialchars($_POST['___in_level_special_SEMANAK']);
	        $status 			= "Aktif";

	        $username           = preg_replace('/<[^<]+?>/', ' ', $_POST['___in_username_special_SEMANAK']);
	        $queryCekUsername   = $pdo->query("SELECT username FROM $database WHERE username='$username'");
	        $rowsCekUsername    = $queryCekUsername->rowCount();

	        if ($rowsCekUsername>0) {
	            $_SESSION['_msg__'] 	= 'Gagal';
	            $_SESSION['_notify__'] 	= 'UsernameTerdaftar';
	            echo "<script>window.location(history.back(0))</script>";
	            exit();
	            die();
	        }

	        $password           = htmlspecialchars($_POST['___in_password_special_SEMANAK']);
	        $ulangi_password    = htmlspecialchars($_POST['___in_ulangi_password_special_SEMANAK']);

	        if ($password!=$ulangi_password) {
	            $_SESSION['_msg__'] 	= 'Gagal';
	            $_SESSION['_notify__'] 	= 'PasswordTidakSama';
	            echo "<script>window.location(history.back(0))</script>";
	            exit();
	            die();
	        }else{
	            $password_enkrip    = password_hash($password, PASSWORD_DEFAULT);
	        }
		// Nilai yang akan di input

		try{
            $stmt = $pdo->prepare("INSERT INTO $database
                            (username,password,nama,level,status,terakhir_login)
                            VALUES(:username,:password,:nama,:level,:status,NOW())" );
                    
            $stmt->bindParam(":username", $username, PDO::PARAM_STR);
            $stmt->bindParam(":password", $password_enkrip, PDO::PARAM_STR);
            $stmt->bindParam(":nama", $nama, PDO::PARAM_STR);
            $stmt->bindParam(":level", $level, PDO::PARAM_STR);
            $stmt->bindParam(":status", $status, PDO::PARAM_STR);
                
            $count = $stmt->execute();
                    
            $insertId = $pdo->lastInsertId();

            if ($count>0) {
	            $_SESSION['_msg__'] = 'Berhasil';
	            header("Location: data-admin");
	            exit();
            }     
        }catch(PDOException $e){
            $_SESSION['_msg__'] = 'Gagal';
            echo "<script>window.location(history.back(0))</script>";
            exit();
        }
	}
	// Add data admin
	
	// Edit data admin
	elseif ($act=='02'){

		// Nilai yang akan di input
	        $id_data_admin 	= htmlspecialchars($_POST['___in_id_data_admin_special_SEMANAK']);
	        $nama   		= preg_replace('/<[^<]+?>/', ' ', $_POST['___in_nama_special_SEMANAK']);
	        $level  		= htmlspecialchars($_POST['___in_level_special_SEMANAK']);
	        $kode_login   	= NULL;
	        $status      	= htmlspecialchars($_POST['___in_status_special_SEMANAK']);
		// Nilai yang akan di input

		try{
            $sql = "UPDATE $database
					SET nama 	 		= :nama,
						level 			= :level,
						status 			= :status,
						kode_login 		= :kode_login
					WHERE id_data_admin	= :id_data_admin
				";
						  
			$statement = $pdo->prepare($sql);

			$statement->bindParam(":id_data_admin", $id_data_admin, PDO::PARAM_INT);
			$statement->bindParam(":nama", $nama, PDO::PARAM_STR);
			$statement->bindParam(":level", $level, PDO::PARAM_STR);
			$statement->bindParam(":status", $status, PDO::PARAM_STR);
			$statement->bindParam(":kode_login", $kode_login, PDO::PARAM_STR);

			$count = $statement->execute();

            if ($count>0) {
	            $_SESSION['_msg__'] = 'Berhasil';
	            header("Location: data-admin");
	            exit();
            }     
        }catch(PDOException $e){
            $_SESSION['_msg__'] = 'Gagal';
            echo "<script>window.location(history.back(0))</script>";
            exit();
        }
	}
	// Edit data admin
	
	// Edit Password data admin
	elseif ($act=='03'){
		$id_data_admin 		= htmlspecialchars($_POST['___in_id_data_admin_special_SEMANAK']);
        $password           = htmlspecialchars($_POST['___in_password_special_SEMANAK']);
        $ulangi_password    = htmlspecialchars($_POST['___in_ulangi_password_special_SEMANAK']);
		$kode_login   		= NULL;

        if ($password!=$ulangi_password) {
            $_SESSION['_msg__'] 	= 'Gagal';
            $_SESSION['_notify__'] 	= 'PasswordTidakSama';
            echo "<script>window.location(history.back(0))</script>";
            exit();
            die();
        }else{
            $password_enkrip    = password_hash($password, PASSWORD_DEFAULT);
        }

        try{
            $sql = "UPDATE $database
                    SET kode_login 		= :kode_login,
                    	password        = :password
                    WHERE id_data_admin = :id_data_admin
                ";
                          
            $statement = $pdo->prepare($sql);
            $statement->bindParam(":id_data_admin", $id_data_admin, PDO::PARAM_INT);
            $statement->bindParam(":kode_login", $kode_login, PDO::PARAM_INT);
            $statement->bindParam(":password", $password_enkrip, PDO::PARAM_STR);

            $count = $statement->execute();

            if ($count>0) {
                // Jika berhasil
                $_SESSION['_msg__'] = 'Berhasil';
	            header("Location: data-admin");
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
	// Edit Password data admin
	
}

?>