<?php

	if($_GET['module']=='home') { 
		include("inc/home.php");
	}elseif($_GET['module']=='testimoni') { 
		include("inc/testimoni.php");
	}elseif($_GET['module']=='tanya-jawab') { 
		include("inc/tanya-jawab.php");
	}elseif($_GET['module']=='keranjang') { 
		include("inc/cart.php");
	}elseif($_GET['module']=='transaksi') { 
		include("inc/transaction.php");
	}elseif($_GET['module']=='404') { 
		include("inc/404.php");
	}else{
		echo "<script>window.location = '404';</script>";
	}

?>