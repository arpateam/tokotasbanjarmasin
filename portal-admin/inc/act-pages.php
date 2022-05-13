<?php

session_start();
error_reporting(0);

if (empty($_SESSION['_kode_login__'])) {
    header("location: keluar-edit");
    die();
    exit();
}elseif(!isset($_POST['_submit_special_FamilyFood_'])){
    header("location: keluar-edit");
    die();
    exit();
}else{
	require '../../system/koneksi.php';
	require '../../system/others.php';
	require '../../system/fungsi_modul.php';

	// Data file
	$link 				= "halaman";
	$database			= "page";
	$act 				= $_GET["act"];
	// Data file

	// Nilai yang akan di input
		$id_page 		= $_POST['___in_id_page_special_FamilyFood'];
		$judul 			= $_POST['___in_judul_special_FamilyFood'];
		$title 			= preg_replace('/<[^<]+?>/', ' ', $_POST['___in_title_special_FamilyFood']);
		$keyword 		= preg_replace('/<[^<]+?>/', ' ', $_POST['___in_keyword_special_FamilyFood']);
		$description 	= preg_replace('/<[^<]+?>/', ' ', $_POST['___in_description_special_FamilyFood']);
	// Nilai yang akan di input
	
	// Edit
	if ($act=='01'){
		try {
			$sql = "UPDATE $database
					SET judul 			= :judul,
						title 			= :title,
						keyword 		= :keyword,
						description 	= :description,
						tgl_update 		= now()
					WHERE id_$database	= :id_page
				";
						  
			$statement = $pdo->prepare($sql);

			$statement->bindParam(":id_page", $id_page, PDO::PARAM_INT);
			$statement->bindParam(":judul", $judul, PDO::PARAM_STR);
			$statement->bindParam(":title", $title, PDO::PARAM_STR);
			$statement->bindParam(":keyword", $keyword, PDO::PARAM_STR);
			$statement->bindParam(":description", $description, PDO::PARAM_STR);

			$count = $statement->execute();

			$_SESSION['_msg__']  = "Berhasil";
			echo "<script>window.location = 'edit-$link-$id_page'</script>";
			die();
    		exit();
		}catch(PDOException $e){
			$_SESSION['_msg__']  = "Gagal";
			echo "<script>window.location = 'edit-$link-$id_page'</script>";
			die();
    		exit();
		}
	}
	// End Edit
	
	// Edit Tanya Jawab
	elseif ($act=='02'){
		$deskripsi 	= $_POST['___in_deskripsi_special_FamilyFood'];
		try {
			$sql = "UPDATE $database
					SET deskripsi 		= :deskripsi,
						tgl_update 		= now()
					WHERE id_$database	= :id_page
				";
						  
			$statement = $pdo->prepare($sql);

			$statement->bindParam(":id_page", $id_page, PDO::PARAM_INT);
			$statement->bindParam(":deskripsi", $deskripsi, PDO::PARAM_STR);

			$count = $statement->execute();

			$_SESSION['_msg__']  = "Berhasil";
			echo "<script>window.location = 'tanya-jawab'</script>";
			die();
    		exit();
		}catch(PDOException $e){
			$_SESSION['_msg__']  = "Gagal";
			echo "<script>window.location(history.back(0))</script>";
			die();
    		exit();
		}
	}
	// End Edit Tanya Jawab
	
}

?>