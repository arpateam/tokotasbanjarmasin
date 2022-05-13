<?php

    $TransaksiSukses        = $pdo->query("SELECT kode_invoice FROM invoice WHERE status='Selesai'");
    $dataTransaksiSukses    = $TransaksiSukses->rowCount(PDO::FETCH_ASSOC);

    $BarangTerjual          = $pdo->query("SELECT SUM(qty) AS barangTerjual FROM invoice WHERE status='Selesai'");
    $dataBarangTerjual      = $BarangTerjual->fetch(PDO::FETCH_ASSOC);

    $TotalPenghasilan       = $pdo->query("SELECT SUM(sub_harga) AS totalPenghasilan FROM invoice WHERE status='Selesai'");
    $dataTotalPenghasilan   = $TotalPenghasilan->fetch(PDO::FETCH_ASSOC);

    $TransaksiBaru          = $pdo->query("SELECT kode_invoice FROM invoice WHERE status='Menunggu Konfirmasi'");
    $dataTransaksiBaru      = $TransaksiBaru->rowCount(PDO::FETCH_ASSOC);

    $Diproses               = $pdo->query("SELECT kode_invoice FROM invoice WHERE status='Diproses'");
    $dataDiproses           = $Diproses->rowCount(PDO::FETCH_ASSOC);

    $Dikirim                = $pdo->query("SELECT kode_invoice FROM invoice WHERE status='Dikirim'");
    $dataDikirim            = $Dikirim->rowCount(PDO::FETCH_ASSOC);

    $Selesai                = $pdo->query("SELECT kode_invoice FROM invoice WHERE status='Selesai'");
    $dataSelesai            = $Selesai->rowCount(PDO::FETCH_ASSOC);

?>

<div class="content">
    <div class="panel-header bg-primary-gradient pb-5">
        <div class="page-inner py-5">
            <div class="text-center">
                <h1 class="text-white pb-2 fw-bold">Hallo, <?= $_SESSION['_nama__'] ?></h1>
                <h4 class="text-white op-7 mb-2">Selamat Datang di Portal <?= $namaweb ?></h4>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-10">
                    <div class="alert alert-warning text-warning" role="alert">
                        <h3><i class="fas fa-exclamation-triangle"></i> Ini adalah rekap transaksi anda pada bulan <strong><?= getBulan2(date("m"))." ".date("Y") ?></strong></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--4">
            <div class="col-sm-6 col-lg-4">
                <div class="card card-stats card-success card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-thumbs-up fa-2x"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <h5 class="card-category">Transaksi Sukses</h5>
                                    <h4 class="card-title"><?= rp($dataTransaksiSukses) ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="card card-stats card-success card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-check-square fa-2x"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <h5 class="card-category">Barang Terjual</h5>
                                    <h4 class="card-title"><?= rp($dataBarangTerjual["barangTerjual"]) ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-4">
                <div class="card card-stats card-success card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-money-bill-wave fa-2x"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <h5 class="card-category">Total Penghasilan</h5>
                                    <h4 class="card-title">Rp<?= rp($dataTotalPenghasilan["totalPenghasilan"]) ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-lg-12 col-xl-3">
                <div class="card p-3">
                    <div class="d-flex align-items-center">
                        <span class="stamp stamp-md bg-danger mr-3">
                            <i class="fas fa-receipt"></i>
                        </span>
                        <div>
                            <h5 class="mb-1"><b><a href="menunggu-konfirmasi"><?= rp($dataTransaksiBaru) ?> <small>Transaksi Baru</small></a></b></h5>
                            <small class="text-muted">Menunggu Konfirmasi</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="card p-3">
                    <div class="d-flex align-items-center">
                        <span class="stamp stamp-md bg-warning mr-3">
                            <i class="fas fa-shopping-basket"></i>
                        </span>
                        <div>
                            <h5 class="mb-1"><b><a href="sedang-diproses"><?= rp($dataDiproses) ?> <small>Transaksi</small></a></b></h5>
                            <small class="text-muted">Sedang Diproses</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="card p-3">
                    <div class="d-flex align-items-center">
                        <span class="stamp stamp-md bg-primary mr-3">
                            <i class="fas fa-shipping-fast"></i>
                        </span>
                        <div>
                            <h5 class="mb-1"><b><a href="sedang-dikirim"><?= rp($dataDikirim) ?> <small>Transaksi</small></a></b></h5>
                            <small class="text-muted">Sedang Dikirim</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="card p-3">
                    <div class="d-flex align-items-center">
                        <span class="stamp stamp-md bg-success mr-3">
                            <i class="fas fa-check"></i>
                        </span>
                        <div>
                            <h5 class="mb-1"><b><a href="pesanan-selesai"><?= rp($dataSelesai) ?> <small>Transaksi</small></a></b></h5>
                            <small class="text-muted">Sudah Selesai</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>