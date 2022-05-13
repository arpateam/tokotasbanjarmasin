<?php
	function telp($s) {
	    $c = array (' ');
		$d = array ('-',',','.','~','+');

	    $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
	    
	    $s = strtolower(str_replace($c, '', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
	    return $s;
	}

	function whatsApp($s) {
        $s = $s;
        $s = preg_replace('/0/', '62', $s, 1); // outputs 'here is the solution'

        return $s;
    }
?>
