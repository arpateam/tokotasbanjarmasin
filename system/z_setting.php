<?php

	//error_reporting(0);
	
	//session code unique
	require 'koneksi.php';
	$code = "khmi";

	$sql7 = $pdo->query("SELECT id_modul, deskripsi, gambar, jenis_modul FROM modul WHERE status='On' ORDER BY id_modul ASC");
	while($tsql7 = $sql7->fetch(PDO::FETCH_ASSOC)) {
		if($tsql7['jenis_modul']!='Images'){
			$deskrip[$tsql7['id_modul']] = $tsql7['deskripsi'];
		}elseif($tsql7['jenis_modul']!='Video'){
			$deskrip[$tsql7['id_modul']] = $tsql7['gambar'];
		}else{
			$deskrip[$tsql7['id_modul']] = $tsql7['gambar'];
		}
	}
	$nmgweb 	= explode(",", $deskrip[0]);
	$ng1=$nmgweb[0];
	$ng2=$nmgweb[1];
	$ng3=$nmgweb[2];
	$ng4=$nmgweb[3];
	$ng5=$nmgweb[4];
	
$namaweb  	= $ng1;
$imgname1  	= $ng2;
$link1	  	= $ng3;
$link2	  	= $ng4;
$link3	  	= $ng5;
	
?>