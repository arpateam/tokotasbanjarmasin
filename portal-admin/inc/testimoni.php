<?php

    switch ($_GET['act']) {
        case 'view':
?>

<div class="content">
    <div class="panel-header bg-primary-gradient pb-5">
        <div class="page-inner py-5">
            <div class="text-center">
                <h1 class="text-white pb-2 fw-bold"><i class="fas fa-smile"></i> TESTIMONI</h1>
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
                                <h2 class="text-secondary fw-bold">Daftar Testimoni</h2>
                            </div>
                            <div class="ml-md-auto py-2 py-md-0">
                                <a href="tambah-testimoni" class="btn btn-secondary"><i class="fas fa-plus"></i> Tambah Testimoni</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tabelData" class="table table-striped table-bordered py-2" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col" width="70px">Aksi</th>
                                        <th scope="col" width="150px">Nama</th>
                                        <th scope="col" width="300px">Deskripsi</th>
                                        <th scope="col" width="150px">Tanggal Update</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                        $Data = $pdo->query("SELECT * FROM testimoni ORDER BY tgl_update DESC");
                                        while($resultData = $Data->fetch(PDO::FETCH_ASSOC)){
                                    ?>

                                    <tr>
                                        <td>
                                            <a href="ubah-testimoni-<?= $resultData['id_testimoni']; ?>">
                                                <button type="button" class="btn btn-sm btn-success">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </a>
                                            <a onclick="confirmHapusTestimoni('<?= $resultData['id_testimoni']; ?>')" class="btn btn-sm btn-danger text-light"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                        <td><button class="btn btn-sm btn-warning"><?= $resultData['nama']; ?></button></td>
                                        <td>
                                            <?= $resultData['deskripsi']; ?>
                                        </td>
                                        <td><h3 class="text-success fw-bold border border-success text-center p-2"><?= tgl2($resultData['tgl_update']); ?></h3></td>
                                    </tr>

                                    <?php } ?>

                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th scope="col" width="70px">Aksi</th>
                                        <th scope="col" width="150px">Nama</th>
                                        <th scope="col" width="300px">Deskripsi</th>
                                        <th scope="col" width="150px">Tanggal Update</th>
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
        case 'add':
?>

<div class="content">
    <div class="panel-header bg-primary-gradient pb-5">
        <div class="page-inner py-5">
            <div class="text-center">
                <h5>
                    <a href="testimoni" class="text-light" style="text-decoration: none;"><i class="fas fa-arrow-left"></i> Kembali ke Daftar Testimoni</a>
                </h5>
                <h1 class="text-white pb-2 fw-bold"><i class="fas fa-smile"></i> TAMBAH TESTIMONI</h1>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row justify-content-center mt--5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body tab-content pb-0" id="pills-without-border-tabContent">
                        <form method="POST" action="actionTambahTestimoni" enctype="multipart/form-data" class="text-left needs-validation" novalidate>
                            <div class="row">

                                <div class="col-12">
                                    <div class="alert alert-warning text-warning" role="alert">
                                        <h2 class="alert-heading fw-bold"><i class="fas fa-exclamation-triangle"></i> PERHATIAN!</h2>
                                        <hr>
                                        <p class="mb-0">Mohon isi form dibawah ini dengan lengkap dan benar!</p>
                                    </div>
                                </div>

                                <!-- Data Utama -->
                                    <div class="col-12 my-2">
                                        <div class="alert alert-primary shadow-sm pb-2" role="alert">
                                            <h4 class="fw-bold text-primary"><i class="fas fa-file-alt"></i> Data Utama</h4>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group-default">
                                            <label for="nama" class="font-weight-bold">Nama</label>
                                            <input id="nama" name="___in_nama_special_SEMANAK" type="text" class="form-control input-border-bottom" placeholder="Cth: Muhammad Mustofa" required>
                                            <div class="invalid-feedback fw-bold">
                                                <i class="fas fa-exclamation-triangle"></i> Mohon Masukkan Nama!
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group-default">
                                            <label for="deskripsi" class="font-weight-bold">Deskripsi Testimoni</label>
                                            <textarea id="deskripsi" name="___in_deskripsi_special_SEMANAK" class="form-control input-border-bottom" placeholder="Cth: Rendang dagingnya sangat enak! Lebih enak dari yang itu ...." rows="3" required></textarea>
                                            <div class="invalid-feedback fw-bold">
                                                <i class="fas fa-exclamation-triangle"></i> Mohon Masukkan Deskripsi Testimoni!
                                            </div>
                                        </div>
                                    </div>

                                <div class="col-12 border-top mt-2"></div>

                                <div class="col-12 my-4">
                                    <button type="submit" name="_submit_special_SEMANAK_" class="btn btn-block btn-lg btn-secondary"><i class="fas fa-check"></i> SIMPAN PERUBAHAN</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
        break;
        case 'edit':

        $Data       = $pdo->query("SELECT id_testimoni, nama, deskripsi FROM testimoni WHERE id_testimoni='$_GET[kode]'");
        $resultData = $Data->fetch(PDO::FETCH_ASSOC);
        $jmlData    = $Data->rowCount(PDO::FETCH_ASSOC);

        if ($jmlData===0) {
            echo "<script>window.location = 'testimoni';</script>";
            die();
            exit();
        }
?>

<div class="content">
    <div class="panel-header bg-primary-gradient pb-5">
        <div class="page-inner py-5">
            <div class="text-center">
                <h5>
                    <a href="testimoni" class="text-light" style="text-decoration: none;"><i class="fas fa-arrow-left"></i> Kembali ke Daftar Testimoni</a>
                </h5>
                <h1 class="text-white pb-2 fw-bold"><i class="fas fa-smile"></i> Mengubah Testimoni <hr /> <u>"<?= $resultData['nama'] ?>"</u></h1>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row justify-content-center mt--5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body tab-content pb-0" id="pills-without-border-tabContent">
                        <form method="POST" action="actionEditTestimoni" enctype="multipart/form-data" class="text-left needs-validation" novalidate>
                            <div class="row">

                                <div class="col-12">
                                    <div class="alert alert-warning text-warning" role="alert">
                                        <h2 class="alert-heading fw-bold"><i class="fas fa-exclamation-triangle"></i> PERHATIAN!</h2>
                                        <hr>
                                        <p class="mb-0">Mohon isi form dibawah ini dengan lengkap dan benar!</p>
                                    </div>
                                </div>

                                <!-- Data Utama -->
                                    <div class="col-12 my-2">
                                        <div class="alert alert-primary shadow-sm pb-2" role="alert">
                                            <h4 class="fw-bold text-primary"><i class="fas fa-file-alt"></i> Data Utama</h4>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group-default">
                                            <label for="nama" class="font-weight-bold">Nama</label>
                                            <input id="nama" name="___in_nama_special_SEMANAK" type="text" class="form-control input-border-bottom" placeholder="Cth: Muhammad Mustofa" value="<?= $resultData['nama']; ?>" required>
                                            <div class="invalid-feedback fw-bold">
                                                <i class="fas fa-exclamation-triangle"></i> Mohon Masukkan Nama!
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group-default">
                                            <label for="deskripsi" class="font-weight-bold">Deskripsi Testimoni</label>
                                            <textarea id="deskripsi" name="___in_deskripsi_special_SEMANAK" class="form-control input-border-bottom" placeholder="Cth: Rendang dagingnya sangat enak! Lebih enak dari yang itu ...." rows="3" required><?= $resultData['deskripsi']; ?></textarea>
                                            <div class="invalid-feedback fw-bold">
                                                <i class="fas fa-exclamation-triangle"></i> Mohon Masukkan Deskripsi Testimoni!
                                            </div>
                                        </div>
                                    </div>

                                <div class="col-12 border-top mt-2"></div>

                                <div class="col-12 my-4">
                                    <input type="hidden" name="___in_id_testimoni_special_SEMANAK" value="<?= $resultData['id_testimoni']; ?>">
                                    <button type="submit" name="_submit_special_SEMANAK_" class="btn btn-block btn-lg btn-secondary"><i class="fas fa-check"></i> SIMPAN PERUBAHAN</button>
                                </div>

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