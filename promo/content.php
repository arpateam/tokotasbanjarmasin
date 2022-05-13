<?php

	if($_GET['module']=='promo') { 
		include("promo.php");
	}elseif($_GET['module']=='read-promo') { 
		include("read.php");
	}else{
		echo "<script>window.location = '404';</script>";
	}

?>