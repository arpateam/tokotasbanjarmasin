<div class="col-lg-4">
    <div class="card mx-2 mx-lg-0 mb-5 sticky-top-card">
        <h5 class="card-header card-header-success text-light"><i class="fas fa-tag"></i> Produk Promo</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-12 mt-2 mb-3">
                    <a href="../produk/<?= $resultData['seo'] ?>.html" class="card shadow-sm h-100 text-decoration-none produk-hover">
                        <div class='ribbon ribbon-top-left'><span>Disc. <?= $resultData['diskon'] ?>%</span></div>
                        <img src="../assets/images/produk/<?= $resultData['gambar'] ?>" class="card-img-top" alt="<?= $resultData['nama_produk'] ?>">
                        <div class="card-body">
                            <h5 class="card-title text-success"><?= $resultData['nama_produk'] ?></h5>
                            <small class="text-muted"><?= $des2 ?> ...</small>
                        </div>
                        <div class="ribbonHarga">
                            <h6 class="text-muted"><del>Rp<?= rp($resultData['harga']) ?></del> <span class="text-danger">Disc. <?= $resultData['diskon'] ?>%</span></h6>
                            <h5 class="text-success"><i class="fas fa-tag"></i> Rp<?= rp($resultData['harga_final']) ?></h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>