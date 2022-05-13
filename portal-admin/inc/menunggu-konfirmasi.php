<?php

    switch ($_GET['act']) {
        case 'view':
?>

<div class="content">
    <div class="panel-header bg-primary-gradient pb-5">
        <div class="page-inner py-5">
            <div class="text-center">
                <h1 class="text-white pb-2 fw-bold"><i class="fas fa-receipt"></i> Menunggu Konfirmasi</h1>
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
                                        <th scope="col" width="80px">Aksi</th>
                                        <th scope="col" width="300px">NO. Pesanan</th>
                                        <th scope="col" width="200px">Nama Penerima</th>
                                        <th scope="col" width="175px">Total Pembayaran</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                        $Data = $pdo->query("SELECT kode_invoice, session, nama_penerima, total_pembayaran FROM invoice WHERE status='Menunggu Konfirmasi' ORDER BY date_transaksi ASC");
                                        while($resultData = $Data->fetch(PDO::FETCH_ASSOC)){
                                    ?>

                                    <tr>
                                        <td>
                                            <a href="aksi-menunggu-konfirmasi-<?= $resultData['session']; ?>">
                                                <button type="button" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-external-link-alt"></i> Detail
                                                </button>
                                            </a>
                                        </td>
                                        <td><h4 class="fw-bold text-warning"><?= $resultData['kode_invoice']; ?></h4></td>
                                        <td><h5><ins><?= $resultData['nama_penerima']; ?></ins></h5></td>
                                        <td><h3 class="fw-bold text-success">Rp<?= rp($resultData['total_pembayaran']); ?></h3></td>
                                    </tr>

                                    <?php } ?>

                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th scope="col" width="80px">Aksi</th>
                                        <th scope="col" width="300px">NO. Pesanan</th>
                                        <th scope="col" width="200px">Nama Penerima</th>
                                        <th scope="col" width="175px">Total Pembayaran</th>
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
            echo "<script>window.location = 'menunggu-konfirmasi';</script>";
            die();
            exit();
        }
?>

<div class="content">
    <div class="panel-header bg-primary-gradient pb-5">
        <div class="page-inner py-5">
            <div class="text-center">
                <h5>
                    <a href="menunggu-konfirmasi" class="text-light" style="text-decoration: none;"><i class="fas fa-arrow-left"></i> Kembali ke Daftar <strong>Transaksi Menunggu Konfirmasi</strong></a>
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
                        <form method="POST" action="actionMenungguKonfirmasi" enctype="multipart/form-data" class="text-left needs-validation" novalidate>

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

                                                                <?php
                                                                    $Keranjang          = $pdo->query("SELECT nama_produk, harga, diskon, harga_final, berat, gambar, id_keranjang, qty, sub_harga FROM keranjang INNER JOIN produk ON keranjang.id_produk=produk.id_produk WHERE session='$resultData[session]' AND keranjang.status='Checkout' ORDER BY id_keranjang DESC");
                                                                    while ($resultKeranjang     = $Keranjang->fetch(PDO::FETCH_ASSOC)) {
                                                                ?>

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

                                                                <?php } ?>
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

                                                <div class="col-12 mb-4">
                                                    <a target="_blank" href="https://api.whatsapp.com/send?phone=<?= whatsApp($resultData['nomor_whatsapp']); ?>&text=Hallo%20<?= urlencode($resultData['nama_penerima']); ?>...%0A%0AAnda%20memiliki%20transaksi%20dengan%20No.%20Pesanan%3A%20*<?= urlencode($resultData['kode_invoice']); ?>*%0A%0ADetail%20pesanan%20Anda%20<?= $link1.'/transaksi-'.$resultData['session']; ?>%0A%0ASilahkan%20bayar%20sesuai%20nominal%0A%0APembayaran%20via%20Transfer%20ke%20rek%0A*Bank%20BCA%201234567890*%0A*Bank%20Mandiri%201234567890*%0A%0ADan%20kirim%20bukti%20transfer%20di%20nomor%20ini%0ATerima%20Kasih" title="Hubungi Pembeli" role="button" class="btn btn-block btn-success"><i class="fab fa-whatsapp"></i> HUBUNGI PEMBELI</a>
                                                </div>

                                                <div class="col-12 mb-3 border-dotted-5"></div>

                                                <!-- Data Utama -->
                                                    <div class="col-12 my-2">
                                                        <div class="alert alert-primary shadow-sm pb-2" role="alert">
                                                            <h4 class="fw-bold text-primary"><i class="fas fa-file-alt"></i> Data Utama</h4>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group-default">
                                                            <label class="font-weight-bold">Metode Pembayaran</label>
                                                            <input id="metode_pembayaran" name="___in_metode_pembayaran_special_FamilyFood" type="text" class="form-control input-border-bottom" placeholder="Cth: Transfer BRI" required>
                                                            <div class="invalid-feedback fw-bold">
                                                                <i class="fas fa-exclamation-triangle"></i> Mohon Masukkan Metode Pembayaran!
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!-- End Data Utama -->

                                                <!-- Gambar Blog -->
                                                    <div class="col-12 mt-4">
                                                        <div class="alert alert-primary shadow-sm pb-2" role="alert">
                                                            <h4 class="fw-bold text-primary"><i class="fas fa-image"></i> Gambar Blog</h4>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="alert alert-warning text-warning d-flex align-items-center mt-2" role="alert">
                                                            <div>
                                                                <i class="fas fa-exclamation-triangle"></i> 
                                                                Maksimal ukuran gambar <strong>2MB</strong>
                                                            </div>
                                                        </div>

                                                        <div class="image-upload-wrap">

                                                            <input type="file" class="file-upload-input" name="___in_bukti_pembayaran_special_FamilyFood" accept="image/jpeg, image/jpg, image/png, image/gif" onchange="readURL(this);" required />

                                                            <div class="invalid-feedback fw-bold">
                                                                Mohon masukkan bukti pembayaran anda!
                                                            </div>

                                                            <div class="drag-text">
                                                                <h3>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" fill="currentColor" class="bi bi-cloud-arrow-up" viewBox="0 0 16 16">
                                                                        <path fill-rule="evenodd" d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z"/>
                                                                        <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
                                                                    </svg>
                                                                    <br />
                                                                    Drag & Drop your files or <u>Browse</u>
                                                                </h3>
                                                            </div>
                                                        </div>

                                                        <div class="file-upload-content">

                                                            <div class="alert alert-success alert-validation-success mx-2 mt-2 mx-md-4 mt-md-4" role="alert">
                                                                <div>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-check-fill" viewBox="0 0 16 16">
                                                                        <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 4.854-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                                                                    </svg>
                                                                    Gambar anda siap di upload
                                                                </div>
                                                            </div>

                                                            <div class="alert alert-danger alert-validation-file mx-2 mt-2 mx-md-4 mt-md-4" role="alert">
                                                                <div>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                                                                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                                    </svg>
                                                                    <span class="message-alert-validation-file"></span>
                                                                </div>
                                                            </div>

                                                            <img class="file-upload-image px-2 pt-2 px-md-4" src="#" alt="Gambar Bukti Pembayaran" />

                                                            <div class="image-title-wrap px-2 py-2 px-md-4 py-md-4">
                                                                <button type="button" onclick="removeUpload()" class="col-12 btn btn-sm ubah-gambar">
                                                                    Ubah Gambar
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!-- End Gambar Blog -->
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