<?php

	if($_GET['module']=='produk') { 
		include("produk.php");
	}elseif($_GET['module']=='read-produk') { 
		include("read.php");
	}else{
		echo "<script>window.location = '404';</script>";
	}

?>