<?php

	session_start();

	// Jika berhasil
    unset($_SESSION['_alert__']);
	unset($_SESSION['_msg__']);
	unset($_SESSION['_kode_login__']);
	unset($_SESSION['_id_data_admin__']);
	unset($_SESSION['_nama_BS__']);
	unset($_SESSION['_nama_P__']);
	unset($_SESSION['_no_whatsapp__']);
	unset($_SESSION['_email__']);
	unset($_SESSION['_status__']);
	session_unset();
	session_destroy();
	
	session_start();
	$_SESSION['_msg__'] = "Back";
    echo "<script>window.location = 'masuk';</script>";
    die();
    exit();