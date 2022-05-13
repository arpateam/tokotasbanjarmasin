<?php

	require '../../system/koneksi.php';
	require '../../system/fungsi_modul.php';
	require '../../system/others.php';

	$id_modul		= "13";
	$lokasi_file 	= $_FILES['file']['tmp_name'];
	$lokasi_upload	= "../../assets/parallax-banner/";
	$nama_file   	= $_FILES['file']['name'];
	$tipe_file   	= explode("/", strtolower($_FILES['file']['type']));
	$tipe_file2   	= seo3($tipe_file[1]); // ngedapetin png / jpg / jpeg
	$ukuran   		= $_FILES['file']['size'];
	$nama_file_unik = "banner-beranda-toko-tas-banjarmasin-".date("Ymd-His").".".$tipe_file2;

	// Cek file upload
		if(empty($nama_file)){
			echo "<h3 class='text-danger'><i class='fas fa-exclamation-triangle'></i>  GAGAL! Anda belum memilih banner untuk di unggah!</h3>";
		}elseif ($tipe_file2!="jpg" AND $tipe_file2!="jpeg" AND $tipe_file2!="png"){
			echo "<h3 class='text-danger'><i class='fas fa-exclamation-triangle'></i>  GAGAL! Mohon upload banner dengan <u>format</u> <strong>jpeg, jpg, png!</strong></h3>";
		}elseif($ukuran>2000000 OR $ukuran<=0){
			echo "<h3 class='text-danger'><i class='fas fa-exclamation-triangle'></i>  GAGAL! Ukuran file terlalu <strong>besar!</strong></h3>";
		}elseif(move_uploaded_file($lokasi_file, $lokasi_upload . "$nama_file_unik")){
			try{
				$sql = "UPDATE modul
						SET deskripsi 	= :deskripsi,
							tgl_update 	= now()
						WHERE id_modul 	= :id_modul
					";
							  
				$statement = $pdo->prepare($sql);

				$statement->bindParam(":id_modul", $id_modul, PDO::PARAM_INT);
				$statement->bindParam(":deskripsi", $nama_file_unik, PDO::PARAM_STR);

				$count = $statement->execute();

				if ($count>0) {
					echo "<h1 class='text-success'><i class='fas fa-check-circle'></i> BERHASIL! Banner anda sukses diupload!</h1>";
				    echo "<div class='my-4 p-3 border-left border-bottom border-right text-center'>";
				    echo "<a href='banner-beranda' role='button' class='btn btn-lg btn-block btn-success my-4'><i class='fas fa-arrow-left'></i> KEMBALI</a>";
				    echo "</div>";
				}
			}catch(PDOException $e){
				var_dump($e);
				echo "<h3 class='text-danger'><i class='fas fa-exclamation-triangle'></i> GAGAL UPLOAD! Mohon coba lagi!</h3>";
			}
		}else{
		    echo "<h3 class='text-danger'><i class='fas fa-exclamation-triangle'></i> Upload Gagal! Mohon coba lagi!</h3>";
		}
	// Cek file upload
?>