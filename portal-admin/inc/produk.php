<?php

    switch ($_GET['act']) {
        case 'view':
?>

<div class="content">
    <div class="panel-header bg-primary-gradient pb-5">
        <div class="page-inner py-5">
            <div class="text-center">
                <h1 class="text-white pb-2 fw-bold"><i class="fas fa-utensils"></i> Produk</h1>
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
                                <h2 class="text-secondary fw-bold">Daftar Produk</h2>
                            </div>
                            <div class="ml-md-auto py-2 py-md-0">
                                <a href="tambah-produk" class="btn btn-secondary"><i class="fas fa-plus"></i> Tambah Produk</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tabelData" class="table table-striped table-bordered py-2" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col" width="90px">Aksi</th>
                                        <th scope="col" width="50px">Urutan</th>
                                        <th scope="col" width="200px">Nama Produk</th>
                                        <th scope="col" width="100px">Status</th>
                                        <th scope="col" width="175px">Harga</th>
                                        <th scope="col" width="50px">Berat</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                        $Data = $pdo->query("SELECT id_produk, urutan, nama_produk, status, harga, diskon, harga_final, berat FROM produk ORDER BY urutan ASC");
                                        while($resultData = $Data->fetch(PDO::FETCH_ASSOC)){
                                    ?>

                                    <tr>
                                        <td>
                                            <a href="ubah-produk-<?= $resultData['id_produk']; ?>">
                                                <button type="button" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </a>
                                            <a onclick="confirmHapusProduk('<?= $resultData['id_produk']; ?>')" class="btn btn-sm btn-danger text-light"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                        <td><button class="btn btn-sm btn-info"><?= rp($resultData['urutan']); ?></button></td>
                                        <td><h5><ins><?= $resultData['nama_produk']; ?></ins></h5></td>
                                        <td>
                                            <?php if ($resultData['status']==="Promo"): ?>
                                                <button class="btn btn-sm btn-success"><i class="fas fa-tag"></i> Promo</button>
                                            <?php elseif ($resultData['status']==="Aktif"): ?>
                                                <button class="btn btn-sm btn-primary"><i class="fas fa-check"></i> Aktif</button>
                                            <?php elseif ($resultData['status']==="Non-Aktif"): ?>
                                                <button class="btn btn-sm btn-danger"><i class="fas fa-ban"></i> Non-Aktif</button>
                                            <?php endif ?>
                                        </td>
                                        <td>
                                            <div class="py-2">
                                                <?php if ($resultData['diskon']==="0" OR $resultData['diskon']===NULL OR empty($resultData['diskon'])): ?>
                                                    <h3 class="fw-bold text-success">Rp<?= rp($resultData['harga_final']); ?></h3>
                                                <?php else: ?>
                                                    <h6 class="fw-bold text-muted"><del>Rp<?= rp($resultData['harga']); ?></del> <span class="text-danger">Disc. <?= rp($resultData['diskon']); ?>%</span></h6>
                                                    <h3 class="fw-bold text-success">Rp<?= rp($resultData['harga_final']); ?></h3>
                                                <?php endif ?>
                                            </div>
                                        </td>
                                        <td><h5 class="fw-bold text-warning"><?= rp($resultData['berat']); ?> g</h5></td>
                                    </tr>

                                    <?php } ?>

                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th scope="col" width="90px">Aksi</th>
                                        <th scope="col" width="50px">Urutan</th>
                                        <th scope="col" width="200px">Nama Produk</th>
                                        <th scope="col" width="100px">Status</th>
                                        <th scope="col" width="175px">Harga</th>
                                        <th scope="col" width="50px">Berat</th>
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
                    <a href="produk" class="text-light" style="text-decoration: none;"><i class="fas fa-arrow-left"></i> Kembali ke Daftar Produk</a>
                </h5>
                <h1 class="text-white pb-2 fw-bold"><i class="fas fa-utensils"></i> TAMBAH Produk</h1>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row justify-content-center mt--5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body tab-content pb-0" id="pills-without-border-tabContent">
                        <form method="POST" action="actionTambahProduk" enctype="multipart/form-data" class="text-left needs-validation" novalidate>
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

                                    <div class="col-md-6">
                                        <div class="form-group-default">
                                            <label class="font-weight-bold">Nama Produk</label>
                                            <input id="nama_produk" name="___in_nama_produk_special_FamilyFood" type="text" class="form-control input-border-bottom" placeholder="Cth: [PROMO] Nasi Rendang Dading" required>
                                            <div class="invalid-feedback fw-bold">
                                                <i class="fas fa-exclamation-triangle"></i> Mohon Masukkan Nama Produk!
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group-default">
                                            <label class="font-weight-bold">Status Produk</label>
                                            <select name="___in_status_special_FamilyFood" class="form-control input-border-bottom" required>
                                                <option value="">- Pilih Status Produk -</option>
                                                <option value="Promo">Promo</option>
                                                <option value="Aktif">Aktif</option>
                                                <option value="Non-Aktif">Non-Aktif</option>
                                            </select>
                                            <div class="invalid-feedback fw-bold">
                                                <i class="fas fa-exclamation-triangle"></i> Mohon Pilih Status Produk!
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group-default">
                                            <label class="font-weight-bold">Harga Produk</label>
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">Rp</span>
                                                </div>
                                                <input id="harga" name="___in_harga_special_FamilyFood" type="text" class="form-control input-border-bottom" placeholder=" Cth: 200.000,00" data-a-dec="," data-a-sep="." required>
                                                <div class="invalid-feedback fw-bold">
                                                    <i class="fas fa-exclamation-triangle"></i> Mohon Masukkan Harga Produk!
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group-default">
                                            <label class="font-weight-bold">Diskon</label>
                                            <div class="input-group">
                                                <input id="diskon" name="___in_diskon_special_FamilyFood" type="number" class="form-control input-border-bottom" placeholder="Cth: 99" min="0" max="100" value="0">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group-default">
                                            <label class="font-weight-bold">Berat Produk</label>
                                            <div class="input-group">
                                                <input id="berat" name="___in_berat_special_FamilyFood" type="text" class="form-control input-border-bottom" placeholder=" Cth: 1.000" data-a-dec="," data-a-sep="." required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">Gram</span>
                                                </div>
                                                <div class="invalid-feedback fw-bold">
                                                    <i class="fas fa-exclamation-triangle"></i> Mohon Masukkan Berat Produk!
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group-default">
                                            <label class="font-weight-bold">Urutan Produk</label>
                                            <div class="input-group">
                                                <input id="urutan" name="___in_urutan_special_FamilyFood" type="text" class="form-control input-border-bottom" placeholder=" Cth: 1" required>
                                                <div class="invalid-feedback fw-bold">
                                                    <i class="fas fa-exclamation-triangle"></i> Mohon Masukkan Urutan Produk!
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <!-- Gambar Produk -->
                                    <div class="col-12 mt-4">
                                        <div class="alert alert-primary shadow-sm pb-2" role="alert">
                                            <h4 class="fw-bold text-primary"><i class="fas fa-image"></i> Gambar Produk</h4>
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

                                            <input type="file" class="file-upload-input" name="___in_gambar_special_FamilyFood" accept="image/jpeg, image/jpg, image/png, image/gif" onchange="readURL(this);" required />

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

                                            <img class="file-upload-image px-2 pt-2 px-md-4" src="#" alt="Gambar <?= $hal; ?>" />

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

                                        <div class="invalid-feedback fw-bold">
                                            Mohon pilih gambar untuk <?= $hal; ?> anda
                                        </div>
                                    </div>

                                <!-- Deskripsi Produk -->
                                    <div class="col-12 mt-4 mb-2">
                                        <div class="alert alert-primary shadow-sm pb-2" role="alert">
                                            <h4 class="fw-bold text-primary"><i class="fas fa-newspaper"></i> Deskripsi Produk</h4>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group-default">
                                            <textarea id="deskripsiProduk" name="___in_deskripsi_special_FamilyFood" class="form-control input-border-bottom" required></textarea>
                                            <div class="invalid-feedback fw-bold">
                                                <i class="fas fa-exclamation-triangle"></i> Mohon masukkan Deskripsi!
                                            </div>
                                        </div>
                                    </div>

                                <!-- Pengaturan SEO -->
                                    <div class="col-12 mt-4 mb-2">
                                        <div class="alert alert-primary shadow-sm pb-2" role="alert">
                                            <h4 class="fw-bold text-primary"><i class="fab fa-searchengin"></i> Pengaturan SEO</h4>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="alert alert-warning text-warning" role="alert">
                                            <h2 class="alert-heading fw-bold"><i class="fas fa-exclamation-triangle"></i> APA ITU SEO?</h2>
                                            <hr>
                                            <ul>
                                                <li><strong>SEO</strong> adalah suatu cara agar postingan artikel kita lebih mudah dikenal oleh <u>Mesin Pencari (Google)</u></li>
                                                <li><strong>Kosongkan</strong> saja jika tidak ingin diisi</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group-default">
                                            <label for="keyword" class="placeholder font-weight-bold text-primary">Keyword</label>
                                            <textarea id="keyword" name="___in_keyword_special_FamilyFood" class="form-control input-border-bottom" rows="3" placeholder="Cth: Promo Nasi Rendang Daging, Nasi rendang Enak, Rendang Murah, dll."></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group-default">
                                            <label for="description" class="placeholder font-weight-bold text-primary">Description</label>
                                            <textarea id="description" name="___in_description_special_FamilyFood" class="form-control input-border-bottom" rows="3" placeholder="Cth: Nasi Rendang Daging adalah produk paling laris kami. Dengan daging yang empuk & enak, ........"></textarea>
                                        </div>
                                    </div>

                                <div class="col-12 border-top mt-2"></div>

                                <div class="col-12 my-4">
                                    <button type="submit" name="_submit_special_FamilyFood_" class="btn btn-block btn-lg btn-secondary"><i class="fas fa-check"></i> SIMPAN PERUBAHAN</button>
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

        $Data       = $pdo->query("SELECT * FROM produk WHERE id_produk='$_GET[kode]'");
        $resultData = $Data->fetch(PDO::FETCH_ASSOC);
        $jmlData    = $Data->rowCount(PDO::FETCH_ASSOC);

        if ($jmlData===0) {
            echo "<script>window.location = 'produk';</script>";
            die();
            exit();
        }
?>

<div class="content">
    <div class="panel-header bg-primary-gradient pb-5">
        <div class="page-inner py-5">
            <div class="text-center">
                <h5>
                    <a href="produk" class="text-light" style="text-decoration: none;"><i class="fas fa-arrow-left"></i> Kembali ke Daftar Produk</a>
                </h5>
                <h1 class="text-white pb-2 fw-bold"><i class="fas fa-utensils"></i> Mengubah Produk <hr /><u>"<?= $resultData['nama_produk'] ?>"</u></h1>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row justify-content-center mt--5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body tab-content pb-0" id="pills-without-border-tabContent">
                        <form method="POST" action="actionEditProduk" enctype="multipart/form-data" class="text-left needs-validation" novalidate>
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

                                    <div class="col-md-6">
                                        <div class="form-group-default">
                                            <label class="font-weight-bold">Nama Produk</label>
                                            <input id="nama_produk" name="___in_nama_produk_special_FamilyFood" type="text" class="form-control input-border-bottom" placeholder="Cth: [PROMO] Nasi Rendang Dading" value="<?= $resultData['nama_produk']; ?>" required>
                                            <div class="invalid-feedback fw-bold">
                                                <i class="fas fa-exclamation-triangle"></i> Mohon Masukkan Nama Produk!
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group-default">
                                            <label class="font-weight-bold">Status Produk</label>
                                            <select name="___in_status_special_FamilyFood" class="form-control input-border-bottom" required>
                                                <option value="">- Pilih Status Produk -</option>
                                                <option value="Promo" <?php if ($resultData['status']==="Promo") { echo "selected"; } ?>>Promo</option>
                                                <option value="Aktif" <?php if ($resultData['status']==="Aktif") { echo "selected"; } ?>>Aktif</option>
                                                <option value="Non-Aktif" <?php if ($resultData['status']==="Non-Aktif") { echo "selected"; } ?>>Non-Aktif</option>
                                            </select>
                                            <div class="invalid-feedback fw-bold">
                                                <i class="fas fa-exclamation-triangle"></i> Mohon Pilih Status Produk!
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group-default">
                                            <label class="font-weight-bold">Harga Produk</label>
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">Rp</span>
                                                </div>
                                                <input id="harga" name="___in_harga_special_FamilyFood" type="text" class="form-control input-border-bottom" placeholder=" Cth: 200.000,00" data-a-dec="," data-a-sep="." value="<?= $resultData['harga']; ?>" required>
                                                <div class="invalid-feedback fw-bold">
                                                    <i class="fas fa-exclamation-triangle"></i> Mohon Masukkan Harga Produk!
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group-default">
                                            <label class="font-weight-bold">Diskon</label>
                                            <div class="input-group">
                                                <input id="diskon" name="___in_diskon_special_FamilyFood" type="number" class="form-control input-border-bottom" placeholder="Cth: 99" min="0" max="100" value="<?= $resultData['diskon']; ?>">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group-default">
                                            <label class="font-weight-bold">Berat Produk</label>
                                            <div class="input-group">
                                                <input id="berat" name="___in_berat_special_FamilyFood" type="text" class="form-control input-border-bottom" placeholder=" Cth: 1.000" data-a-dec="," data-a-sep="." value="<?= $resultData['berat']; ?>" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">Gram</span>
                                                </div>
                                                <div class="invalid-feedback fw-bold">
                                                    <i class="fas fa-exclamation-triangle"></i> Mohon Masukkan Berat Produk!
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group-default">
                                            <label class="font-weight-bold">Urutan Produk</label>
                                            <div class="input-group">
                                                <input id="urutan" name="___in_urutan_special_FamilyFood" type="text" class="form-control input-border-bottom" placeholder=" Cth: 1" value="<?= $resultData['urutan']; ?>" required>
                                                <div class="invalid-feedback fw-bold">
                                                    <i class="fas fa-exclamation-triangle"></i> Mohon Masukkan Urutan Produk!
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <!-- Gambar Produk -->
                                    <div class="col-12 mt-4">
                                        <div class="alert alert-primary shadow-sm pb-2" role="alert">
                                            <h4 class="fw-bold text-primary"><i class="fas fa-image"></i> Gambar Produk</h4>
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
                                            <input type="file" class="file-upload-input" name="___in_gambar_special_FamilyFood" accept="image/jpeg, image/jpg, image/png, image/gif" onchange="readURL(this);" />

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

                                            <img class="file-upload-image px-2 pt-2 px-md-4" src="#" alt="<?= $resultData['nama_produk']; ?>" />

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

                                        <div class="file-upload-content-edit text-center">

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

                                            <img class="file-upload-image px-2 pt-2 px-md-4" src="../assets/images/produk/<?= $resultData['gambar']; ?>" alt="<?= $resultData['nama_produk']; ?>" />

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

                                        <div class="invalid-feedback fw-bold">
                                            Mohon pilih gambar untuk Produk anda
                                        </div>
                                    </div>

                                <!-- Deskripsi Produk -->
                                    <div class="col-12 mt-4 mb-2">
                                        <div class="alert alert-primary shadow-sm pb-2" role="alert">
                                            <h4 class="fw-bold text-primary"><i class="fas fa-newspaper"></i> Deskripsi Produk</h4>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group-default">
                                            <textarea id="deskripsiProduk" name="___in_deskripsi_special_FamilyFood" class="form-control input-border-bottom" required><?= $resultData['deskripsi']; ?></textarea>
                                            <div class="invalid-feedback fw-bold">
                                                <i class="fas fa-exclamation-triangle"></i> Mohon masukkan Deskripsi!
                                            </div>
                                        </div>
                                    </div>

                                <!-- Pengaturan SEO -->
                                    <div class="col-12 mt-4 mb-2">
                                        <div class="alert alert-primary shadow-sm pb-2" role="alert">
                                            <h4 class="fw-bold text-primary"><i class="fab fa-searchengin"></i> Pengaturan SEO</h4>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="alert alert-warning text-warning" role="alert">
                                            <h2 class="alert-heading fw-bold"><i class="fas fa-exclamation-triangle"></i> APA ITU SEO?</h2>
                                            <hr>
                                            <ul>
                                                <li><strong>SEO</strong> adalah suatu cara agar postingan artikel kita lebih mudah dikenal oleh <u>Mesin Pencari (Google)</u></li>
                                                <li><strong>Kosongkan</strong> saja jika tidak ingin diisi</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group-default">
                                            <label for="keyword" class="placeholder font-weight-bold text-primary">Keyword</label>
                                            <textarea id="keyword" name="___in_keyword_special_FamilyFood" class="form-control input-border-bottom" rows="10" placeholder="Cth: Promo Nasi Rendang Daging, Nasi rendang Enak, Rendang Murah, dll."><?= $resultData['keyword']; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group-default">
                                            <label for="description" class="placeholder font-weight-bold text-primary">Description</label>
                                            <textarea id="description" name="___in_description_special_FamilyFood" class="form-control input-border-bottom" rows="10" placeholder="Cth: Nasi Rendang Daging adalah produk paling laris kami. Dengan daging yang empuk & enak, ........"><?= $resultData['description']; ?></textarea>
                                        </div>
                                    </div>

                                <div class="col-12 border-top mt-2"></div>

                                <div class="col-12 my-4">
                                    <input type="hidden" name="___in_id_produk_special_FamilyFood" value="<?= $resultData['id_produk']; ?>">
                                    <input type="hidden" name="___in_gambar_lama_special_FamilyFood" value="<?= $resultData['gambar']; ?>">
                                    <input type="hidden" name="___in_id_sitemap_1_special_FamilyFood" value="<?= $resultData['id_sitemap_1']; ?>">
                                    <button type="submit" name="_submit_special_FamilyFood_" class="btn btn-block btn-lg btn-secondary"><i class="fas fa-check"></i> SIMPAN PERUBAHAN</button>
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