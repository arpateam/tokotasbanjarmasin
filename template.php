<?php
	
	error_reporting(0);

?>

<!DOCTYPE html>
<html lang="id, in">
<head>

	<link rel="icon" type="image/x-icon" href="assets/images/<?= $iconWebsite; ?>" />

    <!-- Fonts and icons -->
    <link href="assets/plugins/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <style>@import url('https://fonts.googleapis.com/css2?family=Fugaz+One&display=swap');</style>

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<?php if ($_GET['module']==='testimoni'): ?>
		<link rel="stylesheet" href="assets/css/paging.min.css">
	<?php endif ?>

	<?php if ($_GET['module']==='keranjang'): ?>
		<link rel="stylesheet" href="assets/css/keranjang.min.css">
	<?php endif ?>
</head>
<body>

	<div class="container-fluid">
		<?php require "inc/header.php"; ?>
		<?php require "inc/content.php"; ?>
		<?php require "inc/footer.php"; ?>
	</div>

	<a href="javascript:" id="return-to-top"><i class="fas fa-chevron-up"></i></a>

	<!-- Asset -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
	<script src="assets/js/bootstrap.bundle.min.js"></script>

	<!-- Keranjang -->
    <?php if (($_GET['module']=='keranjang') OR ($_GET['module']=='transaksi')): ?>
        <script src="assets/plugins/sweetalert/sweetalert.min.js"></script>
        <?php if ($_SESSION['_alert__']===0): ?>
        	<script>swal("GAGAL!", "Sistem kami sepertinya sedang error!", "error");</script>
        <?php elseif ($_SESSION['_alert__']===1): ?>
        	<script>swal("BERHASIL!", "Perubahan telah disimpan!", "success");</script>
	    <?php endif ?>

        <script>
            function confirmHapusKeranjang(enkripsi) {
                swal({
                    title: "Apakah anda yakin ingin menghapus Produk ini di Keranjang?",
                    text: "Data yang telah terhapus tidak dapat dikembalikan lagi!",
                    icon: "warning",
                    primaryMode: true,
                    buttons: ["Tidak Jadi", "Ya, Hapus Saja"],
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "actionHapusKeranjang-" + enkripsi;
                    }else{
                        swal({
                            title: "Produk tidak jadi di hapus",
                            icon: "warning",
                            primaryMode: true,
                        })
                    }
                });
            }
        </script>

        <script>
        	$(function() {
				(function quantityProducts() {
				    var $quantityArrowMinus = $(".quantity-arrow-minus");
				    var $quantityArrowPlus = $(".quantity-arrow-plus");
				    var $quantityNum = $(".quantity-num");

				    $quantityArrowMinus.click(quantityMinus);
				    $quantityArrowPlus.click(quantityPlus);

				    function quantityMinus() {
				      if ($quantityNum.val() > 1) {
				        $quantityNum.val(+$quantityNum.val() - 1);
				      }
				    }

				    function quantityPlus() {
				      $quantityNum.val(+$quantityNum.val() + 1);
				    }
				})();
			});
        </script>

        <script>
	        $(document).ready(function() {
	            $.ajax({
	                type: 'post',
	                url: 'dataProvinsi',
	                success: function(hasil_provinsi) {
	                    $("select[name=nama_provinsi]").html(hasil_provinsi);
	                }
	            });
	            $("select[name=nama_provinsi]").on("change", function() {
	                // Ambil id_provinsi ynag dipilih (dari atribut pribadi)
	                var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
	                $.ajax({
	                    type: 'post',
	                    url: 'dataDistrik',
	                    data: 'id_provinsi=' + id_provinsi_terpilih,
	                    success: function(hasil_distrik) {
	                        $("select[name=nama_distrik]").html(hasil_distrik);
	                    }
	                })
	            });

	            $.ajax({
	                type: 'post',
	                url: 'dataJasaEkspedisi',
	                success: function(hasil_ekspedisi) {
	                    $("select[name=nama_ekspedisi]").html(hasil_ekspedisi);
	                }
	            });
	            $("select[name=nama_ekspedisi]").on("change", function() {
	                // Mendapatkan data ongkos kirim
	                // Mendapatkan ekspedisi yang dipilih
	                var myEkspedisi 		= $("option:selected", this).attr("myEkspedisi");
	                var ekspedisi_terpilih 	= $("select[name=nama_ekspedisi]").val();
	                // Mendapatkan id_distrik yang dipilih
	                var distrik_terpilih 	= $("option:selected", "select[name=nama_distrik]").attr("id_distrik");
	                // Mendapatkan toatal berat dari inputan
	                $total_berat = $("input[name=___in_total_berat_special_FamilyFood]").val();
	                $.ajax({
	                    type: 'post',
	                    url: 'dataPaket',
	                    data: 'ekspedisi=' + ekspedisi_terpilih + '&distrik=' + distrik_terpilih + '&berat=' + $total_berat,
	                    success: function(hasil_paket) {
	                        // console.log(hasil_paket);
	                        $("select[name=nama_paket]").html(hasil_paket);
	                        // Meletakkan nama ekspedisi terpilih di input ekspedisi
	                        $("input[name=ekspedisi]").val(myEkspedisi);
	                    }
	                })
	            });

	            $("select[name=nama_distrik]").on("change", function() {
	                var prov = $("option:selected", this).attr('nama_provinsi');
	                var id_distrik = $("option:selected", this).attr('id_distrik');
	                var dist = $("option:selected", this).attr('nama_distrik');
	                var tipe = $("option:selected", this).attr('tipe_distrik');
	                var kodepos = $("option:selected", this).attr('kodepos');
	                $("input[name=provinsi]").val(prov);
	                $("#provinsi").val(prov);
	                $("input[name=distrik]").val(dist);
	                $("input[name=id_distrik]").val(id_distrik);
	                $("#kab_kota").val(dist);
	                $("input[name=tipe]").val(tipe);
	                $("input[name=kodepos]").val(kodepos);
	            });
	            
	            $("select[name=nama_paket]").on("change", function() {
	                var paket 	= $("option:selected", this).attr("paket");
	                var ongkir 	= $("option:selected", this).attr("ongkir");
	                var etd 	= $("option:selected", this).attr("etd");

	                var rpOngkir 		= new Number(parseInt(ongkir));
					var createRpOngkir 	= {
										  	style: "currency",
										  	currency: "IDR"
										}
					var myOngkir 		= rpOngkir.toLocaleString("id-ID", createRpOngkir);

	                var rpTP 		= new Number(parseInt(<?= $totalBayar ?>)+parseInt(ongkir));
					var createRpTP 	= {
									  	style: "currency",
									  	currency: "IDR"
									}
					var myTP 		= rpTP.toLocaleString("id-ID", createRpTP);

	                $("input[name=paket]").val(paket);
	                $("#ongkir").val(ongkir);
	                $("input[name=estimasi]").attr(etd);
	                $("#total_pembayaran").val(rpTP);
	                $('#SubtotalPengiriman').html(myOngkir);
	                $('#TotalPembayaran').html(myTP);
	            })
	        });
	    </script>
    <?php endif ?>
    <!-- END Keranjang -->

    <!-- All -->
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <!-- End All -->

	<script type="text/javascript">
		// ===== Scroll to Top ==== 
		$(window).scroll(function() {
			if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
			    $('#return-to-top').fadeIn(200);    // Fade in the arrow
			} else {
				$('#return-to-top').fadeOut(200);   // Else fade out the arrow
			}
		});
		$('#return-to-top').click(function() {      // When arrow is clicked
			$('body,html').animate({
				scrollTop : 0                       // Scroll to top of body
			}, 500);
		});
		// ===== Scroll to Top ==== 
	</script>

	<script type="text/javascript">
		function googleTranslateElementInit() {
			new google.translate.TranslateElement(
				{pageLanguage: 'id, in'},
				'google_translate_element'
			);
		}
	</script>
	
	<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?
		cb=googleTranslateElementInit">
	</script>

	<!-- GetButton.io widget -->
	<script type="text/javascript">
	    (function () {
	        var options = {
	            whatsapp: "<?= whatsapp($nomorWhatsApp1); ?>", // WhatsApp number
	            link: "<?= $linkFacebook; ?>", // Link
	            call_to_action: "Ada yang bisa kami bantu?", // Call to action
	            button_color: "#A44F30", // Color of button
	            position: "left", // Position may be 'right' or 'left'
	            order: "whatsapp,link", // Order of buttons
	        };
	        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
	        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
	        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
	        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
	    })();
	</script>
	<!-- /GetButton.io widget -->

	<!-- Asset -->

</body>
</html>