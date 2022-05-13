<?php

    switch ($_GET['act']) {
        case 'view':
?>

<div class="content">
    <div class="panel-header bg-primary-gradient pb-5">
        <div class="page-inner py-5">
            <div class="text-center">
                <h1 class="text-white pb-2 fw-bold"><i class="fas fa-shopping-basket"></i> Sedang Diproses</h1>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row justify-content-center mt--5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                            <div>
                                <h2 class="text-secondary fw-bold">Daftar Transaksi</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tabelData" class="table table-striped table-bordered py-2" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col" width="250px">Aksi</th>
                                        <th scope="col" width="300px">NO. Pesanan</th>
                                        <th scope="col" width="200px">Nama Penerima</th>
                                        <th scope="col" width="150px">Total Pembayaran</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <tr>
                                        <td>
                                            <a href="aksi-sedang-diproses-<?= $resultData['session']; ?>">
                                                <button type="button" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-external-link-alt"></i> Detail
                                                </button>
                                            </a>

                                            <a target="_blank" href="https://api.whatsapp.com/send?phone=<?= whatsApp($resultData['nomor_whatsapp']); ?>&text=Hallo%20<?= urlencode($resultData['nama_penerima']); ?>...%0A%0APesanan%20anda%20dengan%20No.%20Pesanan%3A%20*<?= urlencode($resultData['kode_invoice']); ?>*%20telah%20kami%20*PROSES*%0A%0ASilahkan%20cek%20detail%20pesanan%20anda%20di%20<?= $link1.'/transaksi-'.$resultData['session']; ?>" title="Hubungi Pembeli" role="button" class="btn btn-sm btn-success"><i class="fab fa-whatsapp"></i> Hubungi Pembeli</a>
                                        </td>
                                        <td><h4 class="fw-bold text-warning"><?= $resultData['kode_invoice']; ?></h4></td>
                                        <td><h5><ins><?= $resultData['nama_penerima']; ?></ins></h5></td>
                                        <td><h3 class="fw-bold text-success">Rp<?= rp($resultData['total_pembayaran']); ?></h3></td>
                                    </tr>

                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th scope="col" width="250px">Aksi</th>
                                        <th scope="col" width="300px">NO. Pesanan</th>
                                        <th scope="col" width="200px">Nama Penerima</th>
                                        <th scope="col" width="150px">Total Pembayaran</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
        break;
        case 'aksi':

        $Data       = $pdo->query("SELECT * FROM invoice WHERE session='$_GET[kode]'");
        $resultData = $Data->fetch(PDO::FETCH_ASSOC);
        $jmlData    = $Data->rowCount(PDO::FETCH_ASSOC);

        if ($jmlData===0) {
            echo "<script>window.location = 'sedang-diproses';</script>";
            die();
            exit();
        }
?>

<div class="content">
    <div class="panel-header bg-primary-gradient pb-5">
        <div class="page-inner py-5">
            <div class="text-center">
                <h5>
                    <a href="sedang-diproses" class="text-light" style="text-decoration: none;"><i class="fas fa-arrow-left"></i> Kembali ke Daftar <strong>Transaksi Sedang Diproses</strong></a>
                </h5>
                <h1 class="text-white pb-2 fw-bold border p-2"><?= $resultData['kode_invoice'] ?></h1>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row justify-content-center mt--5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="alert alert-warning text-warning" role="alert">
                            <h2 class="alert-heading fw-bold"><i class="fas fa-exclamation-triangle"></i> PERHATIAN!</h2>
                            <hr>
                            <p class="mb-0">Mohon perhatikan data dibawah ini dengan benar!</p>
                        </div>
                    </div>
                    <div class="card-body tab-content pb-0" id="pills-without-border-tabContent">
                        <form method="POST" action="actionSedangDiproses" class="text-left needs-validation" novalidate>

                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header bg-primary" id="headingOne">
                                        <button type="button" class="btn btn-link p-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <h4 class="mb-0 fw-bold text-light">DETAIL TRANSAKSI <i class="fas fa-chevron-down"></i></h4>
                                        </button>
                                    </div>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row">

                                                <div class="col-12 text-center">
                                                    <h2 class="text-warning">NO PESANAN</h2>
                                                    <h1 class="fw-bold text-warning"><?= $resultData['kode_invoice'] ?></h1>
                                                </div>

                                                <div class="col-12 border-dotted-5 my-3"></div>

                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="row">
                                                                <div class="col-md-6 fw-bold border-end-2 pb-0 pb-lg-3">
                                                                    <h2 class="fw-bold text-success">Alamat Pengiriman</h2>

                                                                    <hr />
                                                                    
                                                                    <h4 class="fw-bold"><i class="far fa-user"></i> <?= $resultData['nama_penerima'] ?></h4>
                                                                    <h4 class="fw-bold"><i class="fab fa-whatsapp"></i> <?= $resultData['nomor_whatsapp'] ?></h4>
                                                                    <p>
                                                                        <i class="fas fa-map-marker-alt"></i> <?= $resultData['detail_alamat'] ?>, <span class="text-uppercase"><?= $resultData['kab_kota'] ?>, <?= $resultData['provinsi'] ?> - <?= $resultData['kode_pos'] ?></span>
                                                                    </p>
                                                                </div>
                                                                <hr class="d-block d-md-none" />
                                                                <div class="col-md-6 fw-bold text-end-3 pb-3">
                                                                    <h4 class="fw-bold">
                                                                        <h2 class="mb-2 fw-bold text-success">Waktu transaksi: </h2>
                                                                        <i class="far fa-calendar-check"></i> <?= tgl2($resultData['date_transaksi']) ?>
                                                                        <br />
                                                                        <i class="far fa-clock"></i> <?= $resultData['time_transaksi'] ?> WIB
                                                                    </h4>
                                                                    
                                                                    <hr class="d-block d-md-none" />

                                                                    <h2 class="mt-2 fw-bold mt-lg-4 text-success"><?= $resultData['ekspedisi'] ?></h2>
                                                                    <h4 class="fw-bold"><?= $resultData['jenis_pengiriman'] ?></h4>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card-body">
                                                            <div class="row justify-content-center mt-2">

                                                                <div class="col-3 col-lg-2">
                                                                    <img src="../assets/images/produk/<?= $resultKeranjang['gambar'] ?>" alt="Gambar Produk <?= $resultKeranjang['nama_produk'] ?>" class="img-thumbnail">
                                                                </div>
                                                                <div class="col-9 col-lg-10">
                                                                    <h2 class="fw-bold text-success"><?= $resultKeranjang['nama_produk'] ?></h2>
                                                                    <hr class="my-2" />
                                                                    <div class="row">
                                                                        <div class="col-9 col-md-10">
                                                                            <?php if ($resultKeranjang['diskon']==="0" OR $resultKeranjang['diskon']===NULL OR empty($resultKeranjang['diskon'])): ?>
                                                                                <h3 class="fw-bold text-success">Rp <?= rp($resultKeranjang['harga_final']) ?>,00</h3>
                                                                            <?php else: ?>
                                                                                <h4><del class="fw-bold text-muted">Rp <?= rp($resultKeranjang['harga']) ?>,00</del> <span class="text-danger">Disc. <?=$resultKeranjang['diskon'] ?>%</span></h4>
                                                                                <h3 class="fw-bold text-success">Rp <?= rp($resultKeranjang['harga_final']) ?>,00</h3>
                                                                            <?php endif ?>
                                                                        </div>
                                                                        <div class="col-3 col-md-2 text-right">
                                                                            <h2 class="text-danger">x<?= $resultKeranjang['qty'] ?></h2>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-11 col-md-12 border-dotted-3 my-3"></div>
                                                            </div>
                                                        </div>

                                                        <div class="card-footer">
                                                            <div class="row text-dark">
                                                                <div class="col-7 col-md-8 py-1 text-right border-right">
                                                                    <h4>Subtotal Produk (<?= rp($resultData["qty"]) ?>)</h4>
                                                                </div>
                                                                <div class="col-5 col-md-4 py-1 text-right">
                                                                    <h4 class="fw-bold">Rp<?= rp($resultData["sub_harga"]) ?>,00</h4>
                                                                </div>

                                                                <div class="col-7 col-md-8 py-1 text-right border-top border-right">
                                                                    <h4>Berat</h4>
                                                                </div>
                                                                <div class="col-5 col-md-4 py-1 text-right border-top">
                                                                    <h4 class="fw-bold"><?= rp($resultData["berat"]) ?> g</h4>
                                                                </div>

                                                                <div class="col-7 col-md-8 py-1 text-right border-top border-right">
                                                                    <h4>Biaya Pengiriman</h4>
                                                                </div>
                                                                <div class="col-5 col-md-4 py-1 text-right border-top">
                                                                    <h4 class="fw-bold">Rp<?= rp($resultData["biaya_ekspedisi"]) ?>,00</h4>
                                                                </div>

                                                                <div class="col-7 col-md-8 py-2 text-right border-top border-right">
                                                                    <h2 class="fw-bold text-success"><i class="fas fa-money-bill-wave"></i> Total Pembayaran</h2>
                                                                </div>
                                                                <div class="col-5 col-md-4 py-2 text-right border-top">
                                                                    <h2 class="fw-bold text-success">Rp<?= rp($resultData["total_pembayaran"]) ?>,00</h2>
                                                                </div>

                                                                <div class="col-7 col-md-8 py-1 text-right text-warning border-top border-right">
                                                                    <h4 class="fw-bold"><i class="fab fa-gratipay"></i> Metode Pembayaran</h4>
                                                                </div>
                                                                <div class="col-5 col-md-4 py-1 text-right border-top">
                                                                    <h4 class="fw-bold text-warning mb-0"><?php if ($resultData["status"]!=="Menunggu Konfirmasi") { echo $resultData["metode_pembayaran"]; }else{ echo "-"; } ?></h4>
                                                                    <a target="_blank" href="<?= $link1.'/assets/images/bukti-pembayaran/'.$resultData["bukti_pembayaran"] ?>" title="Cek Bukti Pembayaran" class="text-primary"><i class="fas fa-external-link-alt"></i> Cek bukti pembayaran</a>
                                                                </div>

                                                                <div class="col-7 col-md-8 py-1 text-right text-warning border-top border-right">
                                                                    <h4 class="fw-bold"><i class="fas fa-bell"></i> Status Pembayaran</h4>
                                                                </div>
                                                                <div class="col-5 col-md-4 py-1 text-right text-warning border-top">
                                                                    <h4 class="fw-bold"><?php if ($resultData["status"]!=="Menunggu Konfirmasi") { echo "Berhasil"; }else{ echo "-"; } ?></h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header bg-primary" id="headingTwo">
                                        <button type="button" class="btn btn-link p-0 collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                            <h4 class="mb-0 fw-bold text-light">FORM PROSES TRANSAKSI <i class="fas fa-chevron-down"></i></h4>
                                        </button>
                                    </div>
                                    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row">
                                                <!-- Data Utama -->
                                                    <div class="col-12 my-2">
                                                        <div class="alert alert-primary shadow-sm pb-2" role="alert">
                                                            <h4 class="fw-bold text-primary"><i class="fas fa-file-alt"></i> Data Utama</h4>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group-default">
                                                            <label class="font-weight-bold">Masukkan Nomor Resi</label>
                                                            <input id="no_resi" name="___in_no_resi_special_FamilyFood" type="text" class="form-control input-border-bottom" placeholder="Cth: Masukkan nomor resi disini..." required>
                                                            <div class="invalid-feedback fw-bold">
                                                                <i class="fas fa-exclamation-triangle"></i> Mohon Masukkan Masukkan Nomor Resi!
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!-- End Data Utama -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 border-top mt-2"></div>

                            <div class="col-12 my-4">
                                <input type="hidden" name="___in_kode_invoice_special_FamilyFood" value="<?= $resultData['kode_invoice']; ?>">
                                <button type="submit" name="_submit_special_FamilyFood_" class="btn btn-block btn-lg btn-secondary"><h2 class="fw-bold mb-0"><i class="fas fa-shopping-basket"></i> PROSES TRANSAKSI</h2></button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    }
?>