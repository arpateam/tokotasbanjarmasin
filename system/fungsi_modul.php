<?php

	$modul = $pdo->query("SELECT id_modul, nama, deskripsi, gambar FROM modul ORDER BY id_modul ASC");
	while($tmodul = $modul->fetch(PDO::FETCH_ASSOC)) {

		if ($tmodul['id_modul'] == 1) {
			$logoVersiDesktop		= $tmodul['gambar'];
			$judulLogoVersiDesktop	= $tmodul['nama'];
		}elseif ($tmodul['id_modul'] == 2) {
			$logoVersiMobile		= $tmodul['gambar'];
			$judulLogoVersiMobile	= $tmodul['nama'];
		}elseif ($tmodul['id_modul'] == 3) {
			$iconWebsite		= $tmodul['gambar'];
		}elseif ($tmodul['id_modul'] == 4) {
			$nomorWhatsApp1		= $tmodul['deskripsi'];
		}elseif ($tmodul['id_modul'] == 5) {
			$nomorWhatsApp2		= $tmodul['deskripsi'];
		}elseif ($tmodul['id_modul'] == 6) {
			$linkInstagram		= $tmodul['deskripsi'];
		}elseif ($tmodul['id_modul'] == 7) {
			$linkFacebook		= $tmodul['deskripsi'];
		}elseif ($tmodul['id_modul'] == 8) {
			$email				= $tmodul['deskripsi'];
		}elseif ($tmodul['id_modul'] == 9) {
			$YouTube			= $tmodul['deskripsi'];
		}elseif ($tmodul['id_modul'] == 10) {
			$googleMaps			= $tmodul['deskripsi'];
		}elseif ($tmodul['id_modul'] == 11) {
			$alamatFooter		= $tmodul['deskripsi'];
		}elseif ($tmodul['id_modul'] == 12) {
			$deskripsiFooter	= $tmodul['deskripsi'];
		}elseif ($tmodul['id_modul'] == 13) {
			$bannerBeranda		= $tmodul['deskripsi'];
		}elseif ($tmodul['id_modul'] == 14) {
			$linkTokopedia		= $tmodul['deskripsi'];
		}elseif ($tmodul['id_modul'] == 15) {
			$linkShopee			= $tmodul['deskripsi'];
		}elseif ($tmodul['id_modul'] == 16) {
			$linkTikTok			= $tmodul['deskripsi'];
		}

	}

?>