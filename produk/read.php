<div class="container-fluid">
    <div class="container">
        <div class="row justify-content-center px-3 px-md-4 my-4">
            <div class="card border-0 border-top-2 col-md-11">
                <div class="row justify-content-end">
                    <div class="col-2 col-sm-2 col-lg-1">
                        <span class="ribbonTestimoni"><i class="fab fa-readme fa-2x"></i></span>
                    </div>
                    <div class="col-10 col-sm-10 col-lg-11">
                        <div class="card-body">
                            <h2 class="text-success"><?= $resultDetail['nama_produk'] ?></h2>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card-body">
                            <div class="ribbonHargaRead">
                                <h3 class="text-success"><i class="fas fa-tag"></i> Rp<?= rp($resultDetail['harga_final']) ?></h3>
                            </div>
                            <div class="ribbonHargaRead">
                                <h5 class="text-muted"><del>Rp<?= rp($resultDetail['harga']) ?></del> <span class="text-danger">Disc. <?= $resultDetail['diskon'] ?>%</span></h5>
                                <h3 class="text-success"><i class="fas fa-tag"></i> Rp<?= rp($resultDetail['harga_final']) ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-11 border-dotted-5"></div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="container">
        <div class="row justify-content-center px-0 px-md-4 my-4">
            <div class="col-lg-11">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <figure class="figure">
                                <div class='ribbon ribbon-top-left'><span>PROMO</span></div>
                            <img src="../assets/images/produk/<?= $resultDetail['gambar'] ?>" class="figure-img img-fluid rounded" alt="Gambar <?= $resultDetail['nama_produk'] ?>">
                            <figcaption class="figure-caption">Gambar <?= $resultDetail['nama_produk'] ?></figcaption>
                        </figure>
                        <?= $resultDetail['deskripsi'] ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<form method="POST" action="actionAddKeranjang">
    <input type="hidden" name="___in_id_produk_special_FamilyFood" value="<?= $resultDetail['id_produk'] ?>">
    <input type="hidden" name="___in_qty_special_FamilyFood" value="1">
    <input type="hidden" name="___in_sub_harga_special_FamilyFood" value="<?= $resultDetail['harga_final'] ?>">
    <button type="submit" name="_submit_special_FamilyFood_" class="btn btn-lg btn-danger button-beli d-block d-lg-none"><i class="fas fa-shopping-cart"></i> BELI</button>
    <button type="submit" name="_submit_special_FamilyFood_" class="btn btn-lg btn-danger button-beli-lg d-none d-lg-block"><i class="fas fa-shopping-cart"></i> BELI SEKARANG</button>
</form>