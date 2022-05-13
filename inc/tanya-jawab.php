<div class="container-fluid">
	<div class="container">
		<div class="row justify-content-center px-3 px-md-4 my-4">
			<div class="card border-0 border-top-2 col-md-11">
		  		<div class="row justify-content-end">
		  			<div class="col-2 col-sm-2 col-lg-1">
		  				<span class="ribbonTestimoni"><i class="fas fa-comments fa-2x"></i></span>
		  			</div>
		  			<div class="col-10 col-sm-10 col-lg-11">

					<div class="card-body">
						<h1 class="text-success">Tanya Jawab <?= $namaweb ?></h1>
					</div>
				</div>
		  	</div>

		  	<div class="col-11 border-dotted-5"></div>
		</div>
	</div>
</div>

<div class="container my-5">
	<div class="row justify-content-center px-3 px-md-4">
    	<?php
            $Data 		= $pdo->query("SELECT deskripsi FROM page WHERE id_page='3'");
            $resultData = $Data->fetch(PDO::FETCH_ASSOC)
        ?>
	  	<div class="card col-md-11 bg-white rounded-100 border-start-7 shadow p-2 p-md-4 my-2">
	  		<?= $resultData['deskripsi'] ?>
	  	</div>
	</div>

	<div class="row justify-content-center my-4">
		<div class="col-11 border-dotted-5"></div>
	</div>
</div>