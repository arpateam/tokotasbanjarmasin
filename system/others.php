<?php

	date_default_timezone_set("Asia/Jakarta");

	function indoTglWithTime($indoTgl){
		$time 		= substr($indoTgl,10,9);
		$tanggal 	= substr($indoTgl,8,2);
		$bulan 		= getBulan(substr($indoTgl,5,2));
		$tahun 		= substr($indoTgl,0,4);
		return $tanggal.' '.$bulan.' '.$tahun.' '.$time;	 
	}

	function indoTglNoTime($indoTgl){
		$tanggal 	= substr($indoTgl,8,2);
		$bulan 		= getBulan(substr($indoTgl,5,2));
		$tahun 		= substr($indoTgl,0,4);
		return $tanggal.' '.$bulan.' '.$tahun;	 
	}

	function indoTgl($indoTgl){
		$hari 		= getHari(substr($indoTgl,11,1));
		$tanggal 	= substr($indoTgl,8,2);
		$bulan 		= getBulan(substr($indoTgl,5,2));
		$tahun 		= substr($indoTgl,0,4);
		return $hari.', '.$tanggal.' '.$bulan.' '.$tahun;	 
	}

	function getHari($hri){
		switch ($hri){
			case 0: 
				return "Minggu";
				break;
			case 1:
				return "Senin";
				break;
			case 2:
				return "Selasa";
				break;
			case 3:
				return "Rabu";
				break;
			case 4:
				return "Kamis";
				break;
			case 5:
				return "Jumat";
				break;
			case 6:
				return "Sabtu";
				break;
		}
	}

	function getBulan($bln){
		switch ($bln){
			case 1: 
				return "Januari";
				break;
			case 2:
				return "Februari";
				break;
			case 3:
				return "Maret";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Juni";
				break;
			case 7:
				return "Juli";
				break;
			case 8:
				return "Agustus";
				break;
			case 9:
				return "September";
				break;
			case 10:
				return "Oktober";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "Desember";
				break;
		}
	}

	function rp($angka){
	  	$rupiah=number_format($angka,0,',','.');
	  	return $rupiah;
	}

	function rpInt($s) {
		$s 	= str_replace('.', '', $s); // Hilangkan karakter yang telah disebutkan di array $d
		$s 	= explode(",", $s);
        $s 	= $s[0];
	    return $s;
	}

	function telp($s) {
	    $c = array (' ');
		$d = array ('-',',','.','~','+');

	    $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
	    
	    $s = strtolower(str_replace($c, '', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
	    return $s;
	}

	function seo($s) {
	    $c = array (' ');
	    $d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+','“','”');

	    $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
	    
	    $s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
	    return $s;
	}

	function seo2($s) {
	    $c = array (' ');
	    $d = array ('/','image');

	    $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
	    
	    $s = strtolower(str_replace($c, '', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
	    return $s;
	}

	function seo3($s) {
	    $c = array (' ');
	    $d = array ('/','video');

	    $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
	    
	    $s = strtolower(str_replace($c, '', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
	    return $s;
	}

	function createUsername($s) {
	    $c = array (' ');
	    $d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+','“','”');

	    $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
	    
	    $s = strtolower(str_replace($c, '', $s));
	    return $s;
	}