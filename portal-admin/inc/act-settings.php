<?php

session_start();
error_reporting(0);

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
	require '../../system/others.php';
	require "../../system/fungsi_upload_gambar.php";

	// Data file
	$link 				= "pengaturan";
	$penyimpananGambar	= "../../assets/images";
	$penyimpananVideo	= "../../assets/parallax-video";
	$database			= "modul";
	$act 				= $_GET["act"];
	// Data file
	
	// Edit Setting
	if ($act=='01'){

		// Nilai yang akan di input
			$id_modul 		= $_POST['___in_id_modul_special_SEMANAK01'];
			$nama 			= $_POST['___in_nama_special_SEMANAK03'];
			$nama_seo		= seo($nama);
			$deskripsi 		= $_POST['___in_deskripsi_special_SEMANAK05'];

			$lokasi_file 	= $_FILES['___in_gambar_special_SEMANAK04']['tmp_name'];
			$lokasi_upload	= "$penyimpananGambar/";
			$nama_file   	= $_FILES['___in_gambar_special_SEMANAK04']['name'];
			$tipe_file   	= strtolower($_FILES['___in_gambar_special_SEMANAK04']['type']);
			$tipe_file2   	= seo2($tipe_file); // ngedapetin png / jpg / jpeg
			$ukuran   		= $_FILES['___in_gambar_special_SEMANAK04']['size'];
			$nama_file_unik = $nama_seo.".".$tipe_file2;
		// Nilai yang akan di input

		try {

			$in_gambar_lama 	= $_POST['___in_gambar_lama_special_SEMANAK02'];
			$cariExtensiGambar	= explode(".", $in_gambar_lama);
			$extensiGambarnya 	= $cariExtensiGambar[1];

			if (empty($nama_file)) {

				rename("$penyimpananGambar/$in_gambar_lama", "$penyimpananGambar/$nama_file_unik$extensiGambarnya");
				$nama_file_edit	= $nama_file_unik.$extensiGambarnya;

			}else {

				// Hapus gambar
				unlink("$penyimpananGambar/$in_gambar_lama");
				// Hapus gambar

				uploadGambarAsli($nama_file_unik, $tipe_file, $lokasi_file, $lokasi_upload);
				$nama_file_edit	= $nama_file_unik;

			}

			if (!empty($deskripsi)) {
				$nama_file_edit = NULL;
			}

			$sql = "UPDATE $database
					SET nama 			= :nama,
						nama_seo 		= :nama_seo,
						gambar 			= :gambar,
						deskripsi 		= :deskripsi,
						tgl_update 		= now()
					WHERE id_$database	= :id_modul
				";
						  
			$statement = $pdo->prepare($sql);

			$statement->bindParam(":id_modul", $id_modul, PDO::PARAM_INT);
			$statement->bindParam(":nama", $nama, PDO::PARAM_STR);
			$statement->bindParam(":nama_seo", $nama_seo, PDO::PARAM_STR);
			$statement->bindParam(":gambar", $nama_file_edit, PDO::PARAM_STR);
			$statement->bindParam(":deskripsi", $deskripsi, PDO::PARAM_STR);

			$count = $statement->execute();

			$_SESSION['_msg__']  = "Berhasil";
			echo "<script>window.location = 'edit-$link-$id_modul'</script>";
			die();
    		exit();
		}catch(PDOException $e){
			$_SESSION['_msg__']  = "Gagal";
			echo "<script>window.location = 'edit-$link-$id_modul'</script>";
			die();
    		exit();
		}
	}
	// End Edit Setting
	
	// Edit Video Beranda
	elseif ($act=='02'){

		// Nilai yang akan di input
			$id_modul 		= "13";
			$in_video_lama 	= $_POST['___in_video_lama_special_SEMANAK02'];

			$lokasi_file 	= $_FILES['___in_video_special_SEMANAK04']['tmp_name'];
			$lokasi_upload	= "$penyimpananVideo/";
			$nama_file   	= $_FILES['___in_video_special_SEMANAK04']['name'];
			$tipe_file   	= strtolower($_FILES['___in_video_special_SEMANAK04']['type']);
			$tipe_file2   	= seo3($tipe_file); // ngedapetin png / jpg / jpeg
			$ukuran   		= $_FILES['___in_video_special_SEMANAK04']['size'];
			$nama_file_unik = "video-beranda-family-food-indonesia-".rand(111,999).".".$tipe_file2;
		// Nilai yang akan di input

		// Cek file upload
			if(empty($nama_file)){
				$_SESSION['_msg__'] 	= 'fileWajib';
				echo "<script>window.location = 'video-beranda'</script>";
				exit();
				die();
			}

			if ($tipe_file!="video/mp4"){
				$_SESSION['_msg__'] 	= 'cekFile';
				echo "<script>window.location = 'video-beranda'</script>";
				exit();
				die();
			}

			if($ukuran>1000000 OR $ukuran<=0){
				$_SESSION['_msg__'] 	= 'cekFile';
				echo "<script>window.location = 'video-beranda'</script>";
				exit();
				die();
			}
		// Cek file upload

		try{

			// Hapus Video
				unlink("$penyimpananVideo/$in_video_lama");
			// Hapus Video

			// Upload Video
				//direktori gambar
				$vfile_upload 	= $lokasi_upload.$nama_file_unik;

				// Simpan gambar dalam ukuran sebenarnya
				move_uploaded_file($lokasi_file, $vfile_upload);
			// Upload Video

			$sql = "UPDATE $database
					SET deskripsi 		= :deskripsi,
						tgl_update 		= now()
					WHERE id_$database	= :id_modul
				";
						  
			$statement = $pdo->prepare($sql);

			$statement->bindParam(":id_modul", $id_modul, PDO::PARAM_INT);
			$statement->bindParam(":deskripsi", $nama_file_unik, PDO::PARAM_STR);

			$count = $statement->execute();

			$_SESSION['_msg__']  = "Berhasil";
			echo "<script>window.location = 'video-beranda'</script>";
			die();
    		exit();
		}catch(PDOException $e){
			$_SESSION['_msg__'] 	= "Gagal";
			echo "<script>window.location = 'video-beranda'</script>";
			die();
    		exit();
		}
	}
	// End Edit Video Beranda
	
}

?>