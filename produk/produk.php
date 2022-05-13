<div class="container-fluid">
    <div class="container">
        <div class="row justify-content-center px-3 px-md-4 my-4">
            <div class="card border-0 border-top-2 col-md-12">
                <div class="row justify-content-end">
                    <div class="col-2 col-sm-2 col-lg-1">
                        <span class="ribbonTestimoni"><i class="fas fa-tag fa-2x"></i></span>
                    </div>
                    <div class="col-10 col-sm-10 col-lg-11">

                    <div class="card-body">
                        <h1 class="text-success">Produk Kami</h1>
                    </div>
                </div>
            </div>

            <div class="col-11 border-dotted-5"></div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="container mb-5">
        <div class="row px-3 px-md-4">
            <?php
                $Data = $pdo->query("SELECT nama_produk, seo, gambar, harga, diskon, harga_final, deskripsi FROM produk WHERE status!='Non-Aktif' ORDER BY urutan ASC");
                while($resultData = $Data->fetch(PDO::FETCH_ASSOC)){
                    $des    = htmlentities(strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$resultData["deskripsi"])));
                    $des2   = substr($des,0,strrpos(substr($des,0,100)," "));
            ?>
            <?php if ($resultData['diskon']==="0" OR $resultData['diskon']===NULL OR empty($resultData['diskon'])): ?>
                <div class="col-md-6 col-lg-4 my-4">
                    <a href="<?= $resultData['seo'] ?>.html" class="card shadow-sm h-100 text-decoration-none produk-hover">
                        <img src="../assets/images/produk/<?= $resultData['gambar'] ?>" class="card-img-top" alt="<?= $resultData['nama_produk'] ?>">
                        <div class="card-body">
                            <h4 class="card-title text-success"><?= $resultData['nama_produk'] ?></h4>
                            <small class="text-muted"><?= $des2 ?> ...</small>
                        </div>
                        <div class="ribbonHarga">
                            <h4 class="text-success"><i class="fas fa-tag"></i> Rp<?= rp($resultData['harga_final']) ?></h4>
                        </div>
                    </a>
                </div>
            <?php else: ?>
                <div class="col-md-6 col-lg-4 my-4">
                    <a href="<?= $resultData['seo'] ?>.html" class="card shadow-sm h-100 text-decoration-none produk-hover">
                        <div class='ribbon ribbon-top-left'><span>Disc. <?= $resultData['diskon'] ?>%</span></div>
                        <img src="../assets/images/produk/<?= $resultData['gambar'] ?>" class="card-img-top" alt="<?= $resultData['nama_produk'] ?>">
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
            <?php endif ?>
            <?php } ?>
        </div>
    </div>
</div>