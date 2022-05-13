<?php

function fileWajib($name_file){
	if(empty($name_file)){
		$_SESSION['_msg__'] = 'fileWajib';
		echo "<script>window.location(history.back(-1))</script>";
		exit();
		die();
	}

}

function cekFile($type_file){
	if ($type_file!="image/jpg" AND $type_file!="image/jpeg" AND $type_file!="image/png"){
		$_SESSION['_msg__'] = 'cekFile';
		echo "<script>window.location(history.back(-1))</script>";
		exit();
		die();
	}

}

function cekUkuranFile2mb($file_size){

	if($file_size>2000000 OR $file_size<=0){
		$_SESSION['_msg__'] = 'GagalUploadFile';
		echo "<script>window.location(history.back(-1))</script>";
		exit();
		die();
	}

}

function uploadGambarAsli($name_file, $type_file, $location_file, $location_upload){
	
	//direktori gambar
	$vfile_upload 	= $location_upload.$name_file;

	// Simpan gambar dalam ukuran sebenarnya
	move_uploaded_file($location_file, $vfile_upload);
	
}

function uploadGambarWithSmall($name_file, $type_file, $location_file, $location_upload, $location_upload_small){
	
	//direktori gambar
	$vfile_upload 		= $location_upload.$name_file;
	$vfile_upload_small = $location_upload_small.$name_file;

	// Simpan gambar dalam ukuran sebenarnya
	move_uploaded_file($location_file, $vfile_upload);
	move_uploaded_file($location_file, $vfile_upload_small);

	//identitas file asli
	if ($type_file=="image/jpeg" ){
		$im_src = imagecreatefromjpeg($vfile_upload);
	}elseif ($type_file=="image/jpg" ){
		$im_src = imagecreatefromjpg($vfile_upload);
	}elseif ($type_file=="image/png" ){
		$im_src = imagecreatefrompng($vfile_upload);
	}elseif ($tipe_file=="image/gif" ){
		$im_src = imagecreatefromgif($vfile_upload);
    }elseif ($tipe_file=="image/wbmp" ){
		$im_src = imagecreatefromwbmp($vfile_upload);
    }elseif ($tipe_file=="image/webp" ){
		$im_src = imagecreatefromwebp($vfile_upload);
    }

	// Simpan gambar dalam ukuran yang di maksud
	$src_width 	= imageSX($im_src);
	$src_height = imageSY($im_src);
	
	if($src_width<1920 OR $src_width>1920){
		$dst_width = 1920;
	}else{
		$dst_width = $src_width;
	}

	$dst_height = 1080;

	$im = imagecreatetruecolor($dst_width,$dst_height);
	
	// Turn off transparency blending (temporarily)
	imagealphablending($im, false);
	// Create a new transparent color for image
	$color = imagecolorallocatealpha($im, 0, 0, 0, 127);
	// Completely fill the background of the new image with allocated color.
	imagefill($im, 0, 0, $color);
	// Restore transparency blending
	imagesavealpha($im, true);
	//0, 0, 0, 0 letak gambar
	imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

	if ($type_file=="image/jpeg" ){
		imagejpeg($im,$vfile_upload);
    }elseif ($type_file=="image/jpg" ){
		imagejpg($im,$vfile_upload);
    }elseif ($type_file=="image/png" ){
		imagepng($im,$vfile_upload);
    }elseif ($type_file=="image/gif" ){
		imagegif($im,$vfile_upload);
    }elseif ($type_file=="image/wbmp" ){
		imagewbmp($im,$vfile_upload);
    }elseif ($type_file=="image/webp" ){
		imagewebp($im,$vfile_upload);
    }
	
	if($src_width<853 OR $src_width>853){
		$dst_width = 853;
	}else{
		$dst_width = $src_width;
	}

	$dst_height = 480;

	$im2 = imagecreatetruecolor($dst_width,$dst_height);
	
	// Turn off transparency blending (temporarily)
	imagealphablending($im2, false);
	// Create a new transparent color for image
	$color = imagecolorallocatealpha($im2, 0, 0, 0, 127);
	// Completely fill the background of the new image with allocated color.
	imagefill($im2, 0, 0, $color);
	// Restore transparency blending
	imagesavealpha($im2, true);
	//0, 0, 0, 0 letak gambar
	imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

	if ($type_file=="image/jpeg" ){
		imagejpeg($im2,$vfile_upload_small);
    }elseif ($type_file=="image/jpg" ){
		imagejpg($im2,$vfile_upload_small);
    }elseif ($type_file=="image/png" ){
		imagepng($im2,$vfile_upload_small);
    }elseif ($type_file=="image/gif" ){
		imagegif($im2,$vfile_upload_small);
    }elseif ($type_file=="image/wbmp" ){
		imagewbmp($im2,$vfile_upload_small);
    }elseif ($type_file=="image/webp" ){
		imagewebp($im2,$vfile_upload_small);
    }
  
	imagedestroy($im_src);
	imagedestroy($im);
	imagedestroy($im2);
}