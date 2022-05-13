<?php

	$hal 				= "Pengaturan";
	$penyimpananGambar	= "../assets/images";
	$database 			= "modul";
	$link 				= "pengaturan";

	if ($_SESSION['_level__']==="Administrator") {
		switch($_GET['act']){
			case "view":

?>

<div class="content">
    <div class="panel-header bg-primary-gradient pb-5">
        <div class="page-inner py-5">
            <div class="text-center">
                <h1 class="text-white pb-2 fw-bold"><i class="fas fa-cogs"></i> PENGATURAN WEBSITE</h1>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
		<div class="row justify-content-center mt--5">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="card-title">Daftar Pengaturan</div>
					</div>
					<div class="card-body">
                        <div class="table-responsive">
                            <table id="tabelData" class="table table-head-bg-primary table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th scope="col">No</th>
										<th scope="col">Pengaturan</th>
										<th scope="col">Tanggal Update</th>
										<th scope="col">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><?= $no++; ?></td>
										<td><?= $result['nama']; ?></td>
										<td><?= tgl2($result['tgl_update']); ?></td>
										<td>
											<a href="edit-<?= $link; ?>-<?= $result['id_modul']; ?>" role="button" class="btn btn-block btn-primary">Edit <i class="fas fa-edit"></i></a>
										</td>
									</tr>
								</tbody>
							</table>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php

			break;
			case "edit":

	$queryEdit	= $pdo->query("SELECT id_$database, nama, gambar, deskripsi, jenis_modul, tgl_update FROM $database WHERE id_$database='$_GET[id]'");
	$resultEdit	= $queryEdit->fetch(PDO::FETCH_ASSOC);

	$action	= "edit";

?>

<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title text-primary d-none d-md-block"><i class="fas fa-file-alt"></i> <?= $hal; ?></h4>
			<ul class="breadcrumbs">
				<li class="nav-home">
					<a href="dashboard">
						<i class="flaticon-home"></i>
					</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="<?= $link; ?>"><?= $hal; ?></a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="#"><u>Edit <?= $hal; ?></u></a>
				</li>
			</ul>
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="card-title">Form Edit <?= $hal; ?></div>
						<div class="alert alert-warning mt-4" role="alert">
						  	<i class="fas fa-exclamation-triangle"></i> Mohon isi form dibawah ini dengan lengkap & benar!
						</div>
					</div>
					<div class="card-body">
						<form action="actionEditPengaturan" enctype="multipart/form-data" method="POST" class="needs-validation" novalidate>

							<input type="hidden" name="___in_id_modul_special_SEMANAK01" value="<?= $resultEdit['id_modul']; ?>">
							<input type="hidden" name="___in_gambar_lama_special_SEMANAK02" value="<?= $resultEdit['gambar']; ?>">

			                <!--nama-->
			                <div class="mb-4">
								<div class="form-group-default">
									<label class="font-weight-bold">Nama Halaman</label>
									<input id="nama" name="___in_nama_special_SEMANAK03" type="text" class="form-control input-border-bottom" value="<?= $resultEdit['nama']; ?>">
								</div>
			                </div>

			                <!-- Gambar -->
			                <?php if ($resultEdit['jenis_modul']=='Images'): ?>
				                <div class="mb-4">

				                    <label class="form-label font-weight-bold">MASUKKAN GAMBAR</label>

				                    <div class="alert alert-warning d-flex align-items-center mt-2" role="alert">
				                        <div>
				                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
				                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
				                                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
				                            </svg> 
				                            Maksimal ukuran gambar <strong>2MB</strong>
				                            <hr />
				                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
				                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
				                                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
				                            </svg> 
				                            Dimensi gambar minimal <strong>114 pixel x 144 pixel</strong>
				                        </div>
				                    </div>

				                    <div class="image-upload-wrap">
				                        <input type="file" class="file-upload-input" name="___in_gambar_special_SEMANAK04" accept="image/jpeg, image/jpg, image/png, image/gif" onchange="readURL(this);" />

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

				                        <img class="file-upload-image px-2 pt-2 px-md-4" src="#" alt="<?= $resultEdit['nama']; ?>" />

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

				                        <img class="file-upload-image px-2 pt-2 px-md-4" src="<?= $penyimpananGambar.'/'.$resultEdit['gambar']; ?>" alt="<?= $resultEdit['nama']; ?>" />

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

				                    <div class="invalid-feedback">
				                        Mohon pilih gambar untuk artikel anda
				                    </div>
				                </div>
			                <!-- End Gambar -->

			                <!-- Deskripsi -->
			                <?php else: ?>

			                	<?php if ($resultEdit['id_modul']==="4" OR $resultEdit['id_modul']==="5"): ?>
			                		<div class="mb-4">
					                    <div class="form-group-default">
											<label for="deskripsi2" class="placeholder font-weight-bold">Nomor WhatsApp</label>
											<input type="tel" id="deskripsi2" class="form-control input-border-bottom" name="___in_deskripsi_special_SEMANAK05" placeholder="Cth: 085701311015" value="<?= $resultEdit['deskripsi']; ?>" pattern="^(0)8[1-9][0-9]{6,9}$" required>
									      	<div class="invalid-feedback">
			                                    <i class="fas fa-exclamation-triangle"></i> Mohon Masukkan Nomor WhatsApp!
			                                    <br /> <i class="fas fa-exclamation-triangle"></i> Nomor <u>tidak boleh</u> menggunakan spasi!
			                                    <br /> <i class="fas fa-exclamation-triangle"></i> Cth: 085701311015
			                                </div>
										</div>
					                </div>
			                	<?php else: ?>
					                <div class="mb-4">
					                    <div class="form-group-default">
											<label for="deskripsi2" class="placeholder font-weight-bold">DESKRIPSI</label>
											<textarea id="deskripsi2" name="___in_deskripsi_special_SEMANAK05" class="form-control input-border-bottom" rows="2" required><?= $resultEdit['deskripsi']; ?></textarea>
									      	<div class="invalid-feedback">
						                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
						                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
						                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
						                        </svg> 
									          	Mohon masukkan Deskripsi!
									        </div>
										</div>
					                </div>
			                	<?php endif ?>
					                
			                <?php endif ?>
			                <!-- End Deskripsi -->
              
			                <!--footer button-->
			                <div class="mt-4 pt-4 border-top">
			                    <a href="<?= $link; ?>" role="button" class="btn btn-warning">
			                        <i class="fas fa-arrow-left"></i> Batal
			                    </a>
			                    <button type="submit" name="_submit_special_SEMANAK_" class="btn btn-primary">
			                        <i class="fas fa-check"></i> Selesai Edit
			                    </button>
			                </div>
			                <!--end footer button-->

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php

			break;
			case "banner-beranda":

	$queryEdit	= $pdo->query("SELECT id_$database, deskripsi FROM $database WHERE id_$database='13'");
	$resultEdit	= $queryEdit->fetch(PDO::FETCH_ASSOC);

?>

<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title text-primary d-none d-md-block"><i class="fas fa-image"></i> Banner Beranda</h4>
			<ul class="breadcrumbs">
				<li class="nav-home">
					<a href="dashboard">
						<i class="flaticon-home"></i>
					</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="<?= $link; ?>"><?= $hal; ?></a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="#"><u>Edit Banner Beranda</u></a>
				</li>
			</ul>
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="card-title">Form Edit Banner Beranda</div>
						<div class="alert alert-warning mt-4 text-warning" role="alert">
						  	<i class="fas fa-exclamation-triangle"></i> Mohon isi form dibawah ini dengan lengkap & benar!
						</div>
					</div>
					<div class="card-body">
	                	<ul class="nav nav-tabs" id="myTab" role="tablist">
						  	<li class="nav-item">
						    	<a class="nav-link active">
						    		<h4 class="font-weight-bold"><i class="fas fa-image"></i> Banner Beranda</h4>
						    	</a>
						  	</li>
						 	<li class="nav-item">
						    	<a class="nav-link" href="ubah-banner-beranda" role="tab">
						    		<h4 class="font-weight-bold"><i class="fas fa-edit"></i> Ubah Banner</h4>
						    	</a>
						  	</li>
						</ul>

						<div class="tab-content" id="myTabContent">
						  	<div class="tab-pane fade show active">
							  	<div class="mb-4 p-3 border-left border-bottom border-right text-center">
								    <img src="../assets/parallax-banner/<?= $resultEdit['deskripsi'] ?>" alt="Banner <?= $resultEdit['deskripsi'] ?>" class="img-fluid">
								</div>
						  	</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php

			break;
			case "ubah-banner-beranda":

	$queryEdit	= $pdo->query("SELECT id_$database, deskripsi FROM $database WHERE id_$database='13'");
	$resultEdit	= $queryEdit->fetch(PDO::FETCH_ASSOC);

?>

<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title text-primary d-none d-md-block"><i class="fas fa-image"></i> Banner Beranda</h4>
			<ul class="breadcrumbs">
				<li class="nav-home">
					<a href="dashboard">
						<i class="flaticon-home"></i>
					</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="<?= $link; ?>"><?= $hal; ?></a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="#"><u>Edit Banner Beranda</u></a>
				</li>
			</ul>
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="card-title">Form Edit Banner Beranda</div>
						<div class="alert alert-warning mt-4 text-warning" role="alert">
						  	<i class="fas fa-exclamation-triangle"></i> Mohon isi form dibawah ini dengan lengkap & benar!
						</div>
					</div>
					<div class="card-body">
	                	<ul class="nav nav-tabs" id="myTab" role="tablist">
						  	<li class="nav-item">
						    	<a class="nav-link" href="banner-beranda">
						    		<h4 class="font-weight-bold"><i class="fas fa-image"></i> Banner Beranda</h4>
						    	</a>
						  	</li>
						 	<li class="nav-item">
						    	<a class="nav-link active">
						    		<h4 class="font-weight-bold"><i class="fas fa-edit"></i> Ubah Banner</h4>
						    	</a>
						  	</li>
						</ul>

						<div class="tab-content" id="myTabContent">
						  	<div class="tab-pane fade show active" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
							  	<div class="mb-4 p-3 border-left border-bottom border-right">
							  	<form id="upload_form" class="needs-validation" novalidate>

							  		<div class="alert alert-warning my-2 pb-1 text-warning" role="alert">
									  	<ul>
									  		<li><i class="fas fa-exclamation-triangle"></i> <strong>Ukuran Banner</strong> tidak boleh lebih dari <strong>2MB</strong></li>
									  	</ul>
									</div>

									<div class="form-group mt-2">
										<label id="pilihFileBanner">Pilih File Banner</label><br/>
										<input type="file" name="file" id="file" for="pilihFileBanner" class="form-control" accept="image/jpeg, image/jpg, image/png" required>
									</div>

									<div class="form-group py-0">
										<progress id="progressBar" value="0" max="100" class="mb-2" style="width:100%; display: none;"></progress>
										<h4 class="text-primary" id="statusProgress"></h4>
										<p id="loaded_n_total"></p>
										<div id="status"></div>
									</div>

							  		<!--footer button-->
					                <div class="mt-2 pt-4 border-top">
					                    <input type="button" id="upload" value="UPLOAD BANNER" class="btn btn-lg btn-block btn-primary">
					                </div>
					                <!--end footer button-->
							  	</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
			break;  
		}
	}else{
		echo "<script>window.location = 'keluar-edit';</script>";
		die();
		exit();
	}
?>