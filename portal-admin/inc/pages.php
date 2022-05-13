<?php

	$hal 				= "Halaman";
	$database 			= "page";
	$link 				= "halaman";

	switch($_GET['act']){
		case "view":

?>

<div class="content">
    <div class="panel-header bg-primary-gradient pb-5">
        <div class="page-inner py-5">
            <div class="text-center">
                <h1 class="text-white pb-2 fw-bold"><i class="fas fa-columns"></i> HALAMAN WEBSITE</h1>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
		<div class="row justify-content-center mt--5">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="card-title">Daftar Halaman</div>
					</div>
					<div class="card-body">
                        <div class="table-responsive">
                            <table id="tabelData" class="table table-head-bg-primary table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th scope="col">No</th>
										<th scope="col">Nama Halaman</th>
										<th scope="col">Tanggal Update</th>
										<th scope="col">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$no = 1;
										$query = $pdo->query("SELECT id_$database, judul, tgl_update FROM $database");
										while($result = $query->fetch(PDO::FETCH_ASSOC)){
									?>
									<tr>
										<td><?= $no++; ?></td>
										<td><?= $result['judul']; ?></td>
										<td><?= tgl2($result['tgl_update']); ?></td>
										<td>
											<a href="edit-<?= $link; ?>-<?= $result['id_page']; ?>" role="button" class="btn btn-block btn-primary">Edit <i class="fas fa-edit"></i></a>
										</td>
									</tr>
									<?php } ?>
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

	$queryEdit	= $pdo->query("SELECT * FROM $database WHERE id_$database='$_GET[id]'");
	$resultEdit	= $queryEdit->fetch(PDO::FETCH_ASSOC);

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
						<form action="actionEditHalaman" method="POST" class="row needs-validation" novalidate>


                            <!-- Data Utama -->
                                <div class="col-12 my-2">
                                    <div class="alert alert-primary shadow-sm pb-2" role="alert">
                                        <h4 class="fw-bold text-primary"><i class="fas fa-file-alt"></i> Data Utama</h4>
                                    </div>
                                </div>

				                <!--Judul-->
				                <div class="col-12">
									<div class="form-group-default">
										<label class="font-weight-bold">Nama Halaman</label>
										<input id="judul" name="___in_judul_special_FamilyFood" type="text" class="form-control input-border-bottom" value="<?= $resultEdit['judul']; ?>" readonly>
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

                                <div class="col-12">
                                    <div class="form-group-default">
                                        <label class="font-weight-bold">title Halaman</label>
                                        <input id="title" name="___in_title_special_FamilyFood" type="text" class="form-control input-border-bottom" placeholder="Cth: Joko Widodo Terpilih Sebagai Presiden Indonesia Periode 2019-2024" value="<?= $resultEdit['title']; ?>" required>
                                        <div class="invalid-feedback fw-bold">
                                            <i class="fas fa-exclamation-triangle"></i> Mohon Masukkan Title Halaman!
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group-default">
                                        <label for="keyword" class="placeholder font-weight-bold text-primary">Keyword</label>
                                        <textarea id="keyword" name="___in_keyword_special_FamilyFood" class="form-control input-border-bottom" rows="3" placeholder="Cth: #2019GantiPresiden, Jokowi, JokoWidodo, Presiden2019, Pemilu2019, Dst." required><?= $resultEdit['keyword']; ?></textarea>
                                        <div class="invalid-feedback fw-bold">
                                            <i class="fas fa-exclamation-triangle"></i> Mohon Masukkan Keyword!
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group-default">
                                        <label for="description" class="placeholder font-weight-bold text-primary">Description</label>
                                        <textarea id="description" name="___in_description_special_FamilyFood" class="form-control input-border-bottom" rows="3" placeholder="Cth: Selamat dan Sukses atas pelantikan Bpk. Ir.H.Joko Widodo dan Bpk. Prof. Dr. K.H. Ma’ruf Amin Sebagai Presiden dan Wakil Presiden Republik Indonesia Periode 2019-2024" required><?= $resultEdit['description']; ?></textarea>
                                        <div class="invalid-feedback fw-bold">
                                            <i class="fas fa-exclamation-triangle"></i> Mohon Masukkan Description!
                                        </div>
                                    </div>
                                </div>
              
			                <!--footer button-->
			                <div class="col-12 mt-4 pt-4 border-top">
			                    <a href="<?= $link; ?>" role="button" class="btn btn-warning">
			                        <i class="fas fa-arrow-left"></i> Batal
			                    </a>
			                    <input type="hidden" name="___in_id_page_special_FamilyFood" value="<?= $resultEdit['id_page']; ?>">
			                    <button type="submit" name="_submit_special_FamilyFood_" class="btn btn-primary">
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
		case "tanya-jawab":

	$queryEdit	= $pdo->query("SELECT id_page, deskripsi FROM $database WHERE id_$database='3'");
	$resultEdit	= $queryEdit->fetch(PDO::FETCH_ASSOC);

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
					<a href="#"><u>Edit TanyaJawab</u></a>
				</li>
			</ul>
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="card-title">Form Edit TanyaJawab</div>
						<div class="alert alert-warning mt-4" role="alert">
						  	<i class="fas fa-exclamation-triangle"></i> Mohon isi form dibawah ini dengan lengkap & benar!
						</div>
					</div>
					<div class="card-body">
						<form action="actionEditTanyaJawab" method="POST" class="row needs-validation" novalidate>

                            <!-- Data Utama -->
                                <div class="col-12 my-2">
                                    <div class="alert alert-primary shadow-sm pb-2" role="alert">
                                        <h4 class="fw-bold text-primary"><i class="fas fa-file-alt"></i> Data Utama</h4>
                                    </div>
                                </div>

                            	<!-- Deskripsi -->
                                <div class="col-12">
                                    <div class="form-group-default">
                                        <textarea id="deskripsi" name="___in_deskripsi_special_FamilyFood" class="form-control input-border-bottom" required><?= $resultEdit['deskripsi'] ?></textarea>
                                        <div class="invalid-feedback fw-bold">
                                            <i class="fas fa-exclamation-triangle"></i> Mohon masukkan Deskripsi!
                                        </div>
                                    </div>
                                </div>
              
			                <!--footer button-->
			                <div class="col-12 mt-4 pt-4 border-top">
			                    <input type="hidden" name="___in_id_page_special_FamilyFood" value="<?= $resultEdit['id_page']; ?>">
			                    <button type="submit" name="_submit_special_FamilyFood_" class="btn btn-lg btn-block btn-primary">
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
	}
?>