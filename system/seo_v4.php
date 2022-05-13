<?php

$author		= $link3;

$default 	= $namaweb;
$default3 	= $link3;
$default4 	= $link1;

if(($_GET['module']=='home') OR ($_GET['module']=='produk') OR ($_GET['module']=='testimoni') OR ($_GET['module']=='tanya-jawab') OR ($_GET['module']=='blog') OR ($_GET['module']=='promo') OR ($_GET['module']=='keranjang')){
	$tseo = $pdo->query("SELECT title, keyword, description FROM page WHERE id_page='$_GET[id]'");
	$seo = $tseo->fetch(PDO::FETCH_ASSOC);
	
	$title = "$seo[title]";
	$keyword = "$seo[keyword]";
	$description = "$seo[description]";
	
	$imageshare = "assets/images/default-share.jpg";
	$urlshare = $default4;
}elseif($_GET['module']=='read-promo'){
	$Detail 	= $pdo->query("SELECT judul,judul_seo,gambar,keyword,description FROM promo WHERE judul_seo='$_GET[judul_seo]'");
	$tDetail 	= $Detail->fetch(PDO::FETCH_ASSOC);
	
	$des 	= htmlentities(strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$tDetail["description"])));
	$des2 	= substr($des,0,strrpos(substr($des,0,177)," "));

	$title 			= "$tDetail[judul]";
	$keyword 		= "$tDetail[keyword]";
	$description 	= "$des2";
	
	$imageshare = "assets/images/promo/small/$tDetail[gambar]";
	$urlshare 	= "$default4/promo/$tDetail[judul_seo].html";
	
}elseif($_GET['module']=='read-produk'){
	$Detail 	= $pdo->query("SELECT nama_produk,seo,gambar,keyword,description FROM produk WHERE seo='$_GET[judul_seo]'");
	$tDetail 	= $Detail->fetch(PDO::FETCH_ASSOC);
	
	$des 	= htmlentities(strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$tDetail["description"])));
	$des2 	= substr($des,0,strrpos(substr($des,0,177)," "));

	$title 			= "$tDetail[nama_produk]";
	$keyword 		= "$tDetail[keyword]";
	$description 	= "$des2";
	
	$imageshare = "assets/images/produk/$tDetail[gambar]";
	$urlshare 	= "$default4/produk/$tDetail[seo].html";
	
}elseif($_GET['module']=='transaksi'){
	$Detail 	= $pdo->query("SELECT * FROM invoice WHERE session='$_GET[session]'");
	$tDetail 	= $Detail->fetch(PDO::FETCH_ASSOC);

	if ($tDetail['status']==="Menunggu Konfirmasi") {
		$titleNya		= "Transaksi $tDetail[kode_invoice] [Menunggu Konfirmasi]";
		$keywordNya 	= "Hallo, Transaksi Dengan No. Pesanan: $tDetail[kode_invoice] [Menunggu Konfirmasi] dari Penjual";
		$descriptionNya = "Hallo, Transaksi Dengan No. Pesanan: $tDetail[kode_invoice] [Menunggu Konfirmasi] dari Penjual";
		$imageshareNya	= "menunggu-konfirmasi.jpg";
	}elseif ($tDetail['status']==="Diproses") {
		$titleNya		= "Transaksi $tDetail[kode_invoice] [Menunggu Proses]";
		$keywordNya 	= "Hallo, Transaksi Dengan No. Pesanan: $tDetail[kode_invoice] [Menunggu Proses] dari Penjual";
		$descriptionNya = "Hallo, Transaksi Dengan No. Pesanan: $tDetail[kode_invoice] [Menunggu Proses] dari Penjual";
		$imageshareNya	= "diproses.jpg";
	}elseif ($tDetail['status']==="Dikirim") {
		$titleNya		= "Transaksi $tDetail[kode_invoice] [Sedang Dikirim]";
		$keywordNya 	= "Hallo, Transaksi Dengan No. Pesanan: $tDetail[kode_invoice] [Sudah Dikirim] Oleh Penjual";
		$descriptionNya = "Hallo, Transaksi Dengan No. Pesanan: $tDetail[kode_invoice] [Sudah Dikirim] Oleh Penjual";
		$imageshareNya	= "dikirim.jpg";
	}elseif ($tDetail['status']==="Selesai") {
		$titleNya		= "Transaksi $tDetail[kode_invoice] [Sudah Selesai]";
		$keywordNya 	= "Hallo, Transaksi Dengan No. Pesanan: $tDetail[kode_invoice] [Sudah Diselesaikan] Oleh Penjual";
		$descriptionNya = "Hallo, Transaksi Dengan No. Pesanan: $tDetail[kode_invoice] [Sudah Diselesaikan] Oleh Penjual";
		$imageshareNya	= "selesai.jpg";
	}

	$title 			= $titleNya;
	$keyword 		= $keywordNya;
	$description 	= $descriptionNya;
	
	$imageshare = "assets/images/$imageshareNya";
	$urlshare 	= "$default4/transaksi-$tDetail[session]";
}else{
	$tseo = $pdo->query("SELECT title, keyword, description FROM page WHERE id_page='0'");
	$seo = $tseo->fetch(PDO::FETCH_ASSOC);

	$title = "$seo[title]";
	$keyword = "$seo[keyword]";
	$description = "$seo[description]";
	
	$imageshare = "assets/images/default-share.jpg";
	$urlshare = $default4;
}
?>
	<meta charset="utf-8">

	<head><meta name="google" content="notranslate" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="HandheldFriendly" content="true">

	<meta name="googlebot" content="index,follow">
	<meta name="googlebot-news" content="index,follow">
	<meta name="robots" content="index,follow">
	<meta name="Slurp" content="all">

	<!-- Tempat verivikasi search console -->

	<meta name="google-site-verification" content="kV3-FyDUXSyHfgfwIS5sjR_jFgoq0ZOtQqh9eeWkHV4" />
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-8QXD4TRNLE"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-8QXD4TRNLE');
    </script>

	<!-- Tempat verivikasi search console -->

	<title><?= $title; ?></title>

	<meta name="keywords" content="<?= $keyword; ?>">
	<meta name="description" content="<?= $description; ?>">

	<!-- Untuk Facebook -->

	<meta property="fb:app_id" content="184663602948248">

	<!-- Untuk Facebook -->

	<!-- Untuk Twitter -->

	<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="<?= $default; ?>" />
	<meta name="twitter:creator" content="<?= $author; ?>" />

	<!-- Untuk Twitter -->

	<meta property="og:url" content="<?= $urlshare; ?>">
	<meta property="og:type" content="article">
	<meta property="og:title" content="<?= $title; ?>">
	<meta property="og:description" content="<?= $description; ?>">
	<meta property="og:site_name" content="<?= $default; ?>">
	  
	<meta name="image_src" content="<?= $default4; ?>/<?= $imageshare; ?>">
	<meta property="og:image" content="<?= $default4; ?>/<?= $imageshare; ?>">
	<meta property="og:image:alt" content="Gambar <?= $title; ?>">
	<meta property="og:image:type" content="image/jpeg" />
	<meta property="og:image:width" content="480" />
	<meta property="og:image:height" content="269" />
		
	<link rel="canonical" href="<?= $urlshare; ?>">
	<link rel="shortlink" href="<?= $default3; ?>">