<div class="hero-wrapper">
    <figure>
        <img src="assets/parallax-banner/<?= $bannerBeranda ?>" alt="Banner Beranda <?= $nama_web ?>">
        <div class="button-parallax d-none d-md-block">
        	<h3 class="text-success"><?= $namaweb; ?></h3>
        	<p class="text-muted">Toko Grosir Tas terlengkap di daerah Banjarmasin. Menyediakan berbagai macam Tas Ransel, Tas Slempang, Tas Anak, Koper, dll.</p>
        	<a href="produk/" role="button" class="btn btn-success"><i class="fas fa-cart-plus"></i> Yuk Berbelanja</a>
        </div>

        <div class="button-parallax d-block d-md-none">
        	<h5 class="text-success"><?= $namaweb; ?></h5>
        	<small class="text-muted fw-light mb-2">Toko Grosir Tas terlengkap di daerah Banjarmasin. Menyediakan berbagai macam Tas Ransel, Tas Slempang, Tas Anak, Koper, dll.</small>
        	<a href="produk/" role="button" class="btn btn-sm btn-success mt-2"><i class="fas fa-cart-plus"></i> Yuk Berbelanja</a>
        </div>
    </figure>
</div>

<div class="container my-5">

	<div class="row justify-content-center my-4">
		<div class="col-11">
			<h1 class="text-success">Produk Promo</h1>
		</div>
		<div class="col-11 border-dotted-5"></div>
	</div>

	<div class="row justify-content-center px-3 px-md-4">
    	<?php
            $Data = $pdo->query("SELECT nama_produk, seo, gambar, harga, diskon, harga_final, deskripsi FROM produk WHERE status='Promo' ORDER BY urutan ASC LIMIT 3");
            while($resultData = $Data->fetch(PDO::FETCH_ASSOC)){
            	$des 	= htmlentities(strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$resultData["deskripsi"])));
            	$des2 	= substr($des,0,strrpos(substr($des,0,100)," "));
        ?>
	  	<div class="col-md-6 col-lg-4 my-4">
		    <a href="produk/<?= $resultData['seo'] ?>.html" class="card shadow-sm h-100 text-decoration-none produk-hover">
		    	<div class='ribbon ribbon-top-left'><span>Disc. <?= $resultData['diskon'] ?>%</span></div>
		      	<img src="assets/images/produk/<?= $resultData['gambar'] ?>" class="card-img-top" alt="<?= $resultData['nama_produk'] ?>">
		      	<div class="card-body">
		        	<h4 class="card-title text-success"><?= $resultData['nama_produk'] ?></h4>
		        	<small class="text-muted"><?= $des2 ?> ...</small>
		      	</div>
	      		<div class="ribbonHarga">
		        	<h6 class="text-muted"><del>Rp<?= rp($resultData['harga']) ?></del> <span class="text-danger">Disc. <?= $resultData['diskon'] ?>%</span></h6>
		        	<h4 class="text-success"><i class="fas fa-tag"></i> Rp<?= rp($resultData['harga_final']) ?></h4>
		        </div>
		    </a>
	  	</div>
	  	<?php } ?>

	  	<div class="w-100"></div>

	  	<div class="col-auto my-4">
	  		<a role="button" href="promo/" title="Selengkapnya" class="btn btn-success">Selengkapnya <i class="fas fa-arrow-right"></i></a>
	  	</div>
	</div>

	<div class="row justify-content-center my-4">
		<div class="col-11">
			<h1 class="text-success">Produk Terbaru</h1>
		</div>
		<div class="col-11 border-dotted-5"></div>
	</div>

	<div class="row justify-content-center px-3 px-md-4">
    	<?php
            $Data = $pdo->query("SELECT nama_produk, seo, gambar, harga, diskon, harga_final, deskripsi, status FROM produk WHERE status!='Non-Aktif' ORDER BY id_produk DESC LIMIT 3");
            while($resultData = $Data->fetch(PDO::FETCH_ASSOC)){
            	$des 	= htmlentities(strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$resultData["deskripsi"])));
            	$des2 	= substr($des,0,strrpos(substr($des,0,100)," "));
            	if ($resultData['status']==="Promo") {
        ?>

	  	<div class="col-md-6 col-lg-4 my-4">
		    <a href="produk/<?= $resultData['seo'] ?>.html" class="card shadow-sm h-100 text-decoration-none produk-hover">
		    	<div class='ribbon ribbon-top-left'><span>Disc. <?= $resultData['diskon'] ?>%</span></div>
		      	<img src="assets/images/produk/<?= $resultData['gambar'] ?>" class="card-img-top" alt="<?= $resultData['nama_produk'] ?>">
		      	<div class="card-body">
		        	<h4 class="card-title text-success"><?= $resultData['nama_produk'] ?></h4>
		        	<small class="text-muted"><?= $des2 ?> ...</small>
		      	</div>
	      		<div class="ribbonHarga">
		        	<h6 class="text-muted"><del>Rp<?= rp($resultData['harga']) ?></del> <span class="text-danger">Disc. <?= $resultData['diskon'] ?>%</span></h6>
		        	<h4 class="text-success"><i class="fas fa-tag"></i> Rp<?= rp($resultData['harga_final']) ?></h4>
		        </div>
		    </a>
	  	</div>

	  	<?php 
            	}else{
        ?>

	  	<div class="col-md-6 col-lg-4 my-4">
		    <a href="produk/<?= $resultData['seo'] ?>.html" class="card shadow-sm h-100 text-decoration-none produk-hover">
		      	<img src="assets/images/produk/<?= $resultData['gambar'] ?>" class="card-img-top" alt="<?= $resultData['nama_produk'] ?>">
		      	<div class="card-body">
		        	<h4 class="card-title text-success"><?= $resultData['nama_produk'] ?></h4>
		        	<small class="text-muted"><?= $des2 ?> ...</small>
		      	</div>
	      		<div class="ribbonHarga">
		        	<h4 class="text-success"><i class="fas fa-tag"></i> Rp<?= rp($resultData['harga_final']) ?></h4>
		      	</div>
		    </a>
	  	</div>

	  	<?php
	  			}
            }
		?>

	  	<div class="w-100"></div>

	  	<div class="col-auto my-4">
	  		<a role="button" href="produk/" title="Selengkapnya" class="btn btn-success">Selengkapnya <i class="fas fa-arrow-right"></i></a>
	  	</div>
	</div>

	<div class="row justify-content-center my-4">
		<div class="col-11 border-dotted-5"></div>
	</div>

	<div class="row justify-content-center px-3 px-md-4">
    	<?php
            $Testimoni 			= $pdo->query("SELECT * FROM testimoni ORDER BY tgl_update DESC");
            $resultTestimoni 	= $Testimoni->fetch(PDO::FETCH_ASSOC);
        ?>
	  	<div class="card col-md-11 bg-white rounded-3 shadow p-3 p-md-5 my-4">
	  		<div class="row justify-content-end">
	  			<div class="col-3 col-sm-2 col-md-1">
	  				<span class="ribbonTestimoni"><i class="fas fa-star fa-lg"></i></span>
	  			</div>
	  			<div class="col-9 col-sm-10 col-md-11">
		            <div class="card-title">
				  		<h3 class="text-success d-none d-md-block">Dengarkan Testimoni Pelanggan Kami</h3>
				  		<h4 class="text-success d-block d-md-none">Dengarkan Testimoni Pelanggan Kami</h4>
		            </div>

			  		<div class="card-body">
				  		<h5 class="d-none d-md-block"><?= $resultTestimoni['deskripsi'] ?></h5>
				  		<h6 class="text-muted d-none d-md-block"><i class="fas fa-long-arrow-alt-right"></i> <?= $resultTestimoni['nama'] ?></h6>

				  		<h6 class="d-block d-md-none"><?= $resultTestimoni['deskripsi'] ?></h6>
				  		<span class="text-muted d-block d-md-none"><i class="fas fa-long-arrow-alt-right"></i> <?= $resultTestimoni['nama'] ?></span>
			  		</div>
	  			</div>
		  	</div>

	  		<div class="card-footer bg-transparent">
		  		<div class="row justify-content-end">
		  			<a href="testimoni" role="button" class="col-8 col-sm-6 col-md-4 col-xl-3 btn btn-success">Selengkapnya <i class="fas fa-arrow-right"></i></a>
		  		</div>
	  		</div>
	  	</div>
	</div>

	<div class="row justify-content-center my-4">
		<div class="col-11 border-dotted-5"></div>
	</div>
</div>