<div class="container-fluid">
	<div class="container">
		<div class="row justify-content-center px-3 px-md-4 my-4">
			<div class="card border-0 border-top-2 col-md-11">
		  		<div class="row justify-content-end">
		  			<div class="col-2 col-sm-2 col-lg-1">
		  				<span class="ribbonTestimoni"><i class="fas fa-star fa-2x"></i></span>
		  			</div>
		  			<div class="col-10 col-sm-10 col-lg-11">

					<div class="card-body">
						<h1 class="text-success">Testimoni Pelanggan Kami</h1>
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

            $page   = new pagingTestimoni;
            $batas  = 10;
            $posisi = $page->cariPosisi($batas);

            $Data   = $pdo->query("SELECT * FROM testimoni ORDER BY tgl_update DESC LIMIT $posisi,$batas");
            $Data2  = $pdo->query("SELECT * FROM testimoni ORDER BY tgl_update DESC");
            while($resultData = $Data->fetch(PDO::FETCH_ASSOC)){

	            $date		= explode(" ",tgl2($resultData['tgl_update']));
	            $tanggal	= $date[0];
	            $bulan		= $date[1];
	            $tahun		= $date[2];
        ?>
	  	<div class="card col-md-11 bg-white rounded-100 border-start-7 shadow p-2 p-md-4 my-2">
	  		<div class="row justify-content-end">
	  			<div class="col-3 col-sm-2 col-lg-2 border-end border-success text-success text-center">
	  				<h1><?= $tanggal ?></h1>
	  				<h6><?= $bulan ?></h6>
	  				<h4><?= $tahun ?></h4>
	  			</div>
	  			<div class="col-9 col-sm-10 col-lg-10">
		            <div class="card-title">
				  		<h3 class="text-success d-none d-md-block"><?= $resultData['nama'] ?></h3>
				  		<h4 class="text-success d-block d-md-none"><?= $resultData['nama'] ?></h4>
		            </div>

			  		<div class="card-body">
				  		<h5 class="d-none d-md-block"><?= $resultData['deskripsi'] ?></h5>

				  		<h6 class="d-block d-md-none"><?= $resultData['deskripsi'] ?></h6>
			  		</div>
	  			</div>
		  	</div>
	  	</div>
        <?php
            }

            $jmldata = $Data2->rowCount();
            $jmlhalaman  = $page->jmlhalaman($jmldata, $batas);
            $linkHalaman = $page->navHalaman($_GET['page'], $jmlhalaman);
                       
            if($jmldata>$batas){
        ?>

        <div class="col-md-11 wp-pagenavi mt-5">
            <center><?php echo $linkHalaman; ?></center>
        </div>

        <?php } ?>
	</div>

	<div class="row justify-content-center my-4">
		<div class="col-11 border-dotted-5"></div>
	</div>
</div>