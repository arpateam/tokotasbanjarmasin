<?php
	
	date_default_timezone_set("Asia/Jakarta");
	session_start();

	if(empty($_SESSION['session_FamillyFood']) OR empty($_SESSION['kode_invoice_FamillyFood'])) {
		$_SESSION['session_FamillyFood'] 		= hash("sha256", date("Y-m-d H:i:s").rand(100,999));
		$_SESSION['kode_invoice_FamillyFood'] 	= "#IN".date("dmY-His-").rand(100,999)."-".strtoupper(substr($_SESSION['session_FamillyFood'], 0, 5));
		$_SESSION['qty_FamillyFood'] 			= "0";
	}

	else{
		$DataQty 		= $pdo->query("SELECT SUM(qty) AS QTY FROM keranjang WHERE kode_invoice='$_SESSION[kode_invoice_FamillyFood]' AND status='Proses' ");
		$resultDataQty 	= $DataQty->fetch(PDO::FETCH_ASSOC);

		if (empty($resultDataQty["QTY"])) {
			$_SESSION['qty_FamillyFood'] 	= "0";
		}else{
			$_SESSION['qty_FamillyFood'] 	= $resultDataQty["QTY"];
			if ($_SESSION['qty_FamillyFood']>99) {
				$_SESSION['qty_FamillyFood'] = "99+";
			}
		}
	}