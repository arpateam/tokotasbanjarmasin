<?php

	function formWajib($pilihan){

		if ($pilihan == '0' OR $pilihan == '' OR empty($pilihan)) {
			echo "<script>window.alert('Ada form yang belum di isi. Mohon di isi dengan lengkap!'); window.location(history.back(-1))</script>";
			exit();
		}

	}