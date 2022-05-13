<!DOCTYPE html>
<html lang="id, in">
<head>
	<link rel="icon" type="image/x-icon" href="../assets/images/<?= $iconWebsite; ?>" />

    <!-- Fonts and icons -->
    <link href="../assets/plugins/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <style>@import url('https://fonts.googleapis.com/css2?family=Fugaz+One&display=swap');</style>

	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/paging.min.css">
</head>
<body>

	<div class="container-fluid">
		<?php require "../inc/headerV2.php"; ?>
		<?php require "content.php"; ?>
		<?php require "../inc/footerV2.php"; ?>
	</div>

	<a href="javascript:" id="return-to-top"><i class="fas fa-chevron-up"></i></a>

	<!-- Asset -->
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
	<script src="../assets/js/bootstrap.bundle.min.js"></script>

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
	<!-- Asset -->

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

</body>
</html>