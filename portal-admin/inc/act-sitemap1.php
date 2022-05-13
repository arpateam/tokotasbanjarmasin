<?php

session_start();
error_reporting(0);

require '../../system/fungsi_sitemap.php';

if (empty($_SESSION['_kode_login__'])) {
    header("location: ../keluar");
    die();
    exit();
}elseif(!empty($_GET['id_sitemap_1'])){
	$id_sitemap_1 	= $_GET['id_sitemap_1'];

	hapusSitemap_1("sitemap_1", $id_sitemap_1, "sitemap-one");
	if ($count>0) {
		echo "<script>window.location = '../sitemap-one'</script>";
		die();
		exit();
	}
}elseif(!isset($_POST['_submit_special_SEMANAK_'])){
    header("location: ../keluar");
    die();
    exit();
}else{
	require '../../system/koneksi.php';
	require '../../system/fungsi_modul.php';
	require '../../system/others.php';

	// Data file
	$hal 				= "Sitemap 1";
	$link 				= "sitemap-one";

	$module 			= $_GET["module"];
	$module2 			= "sitemap_one";
	$database			= "sitemap_1";

	$act 				= $_GET["act"];
	// Data file

	// Nilai yang akan di input
		$id_sub_sitemap 	= $_POST['___in_id_sub_sitemap_special_SEMANAK'];
		$loc_1 				= $_POST['___in_loc_special_SEMANAK'];
		$priority_1 		= $_POST['___in_priority_special_SEMANAK'];

	// Nilai yang akan di input
	
	// Tambah
	if ($module==$module2 AND $act=='add'){
		tambahSitemap_1($database, $id_sub_sitemap, $loc_1, $priority_1, $link);
		if ($count>0) {
			$_SESSION['_msg__'] = 'Berhasil';
			echo "<script>window.location = '../edit-$link-$insertId'</script>";
			die();
    		exit();
		}
	}
	// End Tambah

	// Edit
	elseif ($module==$module2 AND $act=='edit'){
		$id_sitemap_1 	= $_POST['___in_id_sitemap_1_special_SEMANAK'];

		editSitemap_1($database, $id_sitemap_1, $id_sub_sitemap, $loc_1, $priority_1, $link);
		if ($count>0) {
			$_SESSION['_msg__'] = 'Berhasil';
			echo "<script>window.location = '../edit-$link-$id_sitemap_1'</script>";
			die();
    		exit();
		}
	}
	// End Edit
	
}

?>