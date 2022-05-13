<?php

	$hal 				= "Data Admin";
	$database 			= "data_admin";

	if ($_SESSION['_level__']==="Administrator") {
		switch($_GET['act']){
			case "view":

?>

<div class="content">
    <div class="panel-header bg-primary-gradient pb-5">
        <div class="page-inner py-5">
            <div class="text-center">
                <h1 class="text-white pb-2 fw-bold text-uppercase"><i class="fas fa-users-cog"></i> DAFTAR <?= $hal; ?></h1>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
		<div class="row justify-content-center mt--5">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header text-center">

						<?php

		                    if ($_SESSION['_notify__']==="UsernameTerdaftar") {
		                        echo "<div class='alert alert-danger text-left mt-2 mb-4' role='alert'>";
		                        echo "<h4 class='alert-heading text-danger'><i class='fas fa-exclamation-triangle'></i> USERNAME SUDAH TERDAFTAR!</h4>";
		                        echo "<hr>";
		                        echo "<p class='mb-0'>Mohon gunakan <strong>username</strong> yang lain!</p>";
		                        echo "</div>";
		                    }elseif ($_SESSION['_notify__']==="PasswordTidakSama") {
		                        echo "<div class='alert alert-danger text-left mt-2 mb-4' role='alert'>";
		                        echo "<h4 class='alert-heading text-danger'><i class='fas fa-exclamation-triangle'></i> PASSWORD TIDAK SAMA!</h4>";
		                        echo "<hr>";
		                        echo "<p class='mb-0'>Mohon masukkan <strong>password</strong> yang sama!</p>";
		                        echo "</div>";
		                    }

		                ?>

						<!-- Tambah Data Admin -->
						<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#tambahDataAdmin">
						  	<i class="fas fa-plus"></i> Tambah <?= $hal; ?>
						</button>

						<!-- Modal Tambah Data Admin-->
						<div class="modal fade" id="tambahDataAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  	<div class="modal-dialog" role="document">
							    <form method="POST" action="actionAddDataAdmin" class="modal-content needs-validation" novalidate>
							      	<div class="modal-header">
							        	<h4 class="modal-title" id="exampleModalLabel">Tambah Data Admin</h4>
							        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          		<span aria-hidden="true">&times;</span>
							        	</button>
							      	</div>
							    	<div class="modal-body text-left">

										<?php

						                    if ($_SESSION['_notify__']==="UsernameTerdaftar") {
						                        echo "<div class='alert alert-danger text-left my-2' role='alert'>";
						                        echo "<h4 class='alert-heading text-danger'><i class='fas fa-exclamation-triangle'></i> USERNAME SUDAH TERDAFTAR!</h4>";
						                        echo "<hr>";
						                        echo "<p class='mb-0'>Mohon gunakan <strong>username</strong> yang lain!</p>";
						                        echo "</div>";
						                        $_SESSION['_notify__'] = 0;
						                    }elseif ($_SESSION['_notify__']==="PasswordTidakSama") {
						                        echo "<div class='alert alert-danger text-left my-2' role='alert'>";
						                        echo "<h4 class='alert-heading text-danger'><i class='fas fa-exclamation-triangle'></i> PASSWORD TIDAK SAMA!</h4>";
						                        echo "<hr>";
						                        echo "<p class='mb-0'>Mohon masukkan <strong>password</strong> yang sama!</p>";
						                        echo "</div>";
						                        $_SESSION['_notify__'] = 0;
						                    }else{
						                    	echo "<div class='alert alert-warning my-2' role='alert'>";
						                    	echo "<i class='fas fa-exclamation-triangle text-warning'></i> Mohon isi <em><u><strong>Form</strong></u></em> dibawah ini dengan <strong>lengkap & benar!</strong>";
						                    	echo "</div>";
						                    }

						                ?>
				                        
				                        <hr />

				                        <!--Nama Admin-->
			                            <div class="form-group form-group-default">
			                                <label for="nama" class="font-weight-bold">Nama Admin</label>
			                                <input type="text" id="nama" name="___in_nama_special_SEMANAK" class="form-control" placeholder="Cth: John Die" required>
			                                <div class="invalid-feedback">
			                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
			                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
			                                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
			                                    </svg> 
			                                    Mohon masukkan nama admin!
			                                </div>
			                            </div>
				                        <!--Nama Admin-->

				                        <!-- Level Admin -->
			                            <div class="form-group form-group-default">
			                                <label>Level Admin</label>
			                                <select class="form-control" id="formGroupDefaultSelect" name="___in_level_special_SEMANAK" required>
			                                    <option value="">--Pilih Level Admin--</option>
			                                    <option value="Administrator">Administrator</option>
			                                    <option value="Penulis">Pegawai</option>
			                                </select>
			                                <div class="invalid-feedback">
			                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
			                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
			                                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
			                                    </svg> 
			                                    Mohon pilih 1!
			                                </div>
			                            </div>
				                        <!-- Level Admin -->

				                        <!--Username-->
			                            <div class="form-group form-group-default">
			                                <label for="username" class="font-weight-bold">Username</label>
			                                <input type="text" id="username" name="___in_username_special_SEMANAK" class="form-control" placeholder="Cth: bsunitkurnia01" autocomplete="Off" minlength="5" maxlength="20" onkeyup="this.value=this.value.replace(/[^a-z][^0-9]/g,'');" required>
			                                <div class="invalid-feedback">
			                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
			                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
			                                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
			                                    </svg> 
			                                    Mohon masukkan Min. 5 Karakter!
			                                </div>
			                            </div>
				                        <!--Username-->

			                            <!--Password-->
			                            <div class="form-group form-group-default">
			                                <label class="font-weight-bold" for="pass">Password <span id="buttonShowPassword" onclick="showPassword()"><i class="fas fa-eye-slash"></i></span></label>
			                                <input type="password" id="pass" name="___in_password_special_SEMANAK" class="form-control" placeholder="Masukkan Password anda..." pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" minlength="10" maxlength="20" required>
			                                <div id="message" class="p-2">
			                                    <h6 class="font-weight-bold text-primary"><i class="fas fa-exclamation-circle"></i> Ketentuan Password:</h6>

			                                    <span id="length" class="invalid">Minimal <strong>10 Karakter</strong>
			                                    </span>
			                                    <br />
			                                    <span id="letter" class="invalid">Kombinasi <strong>huruf kecil</strong></span>
			                                    <br />
			                                    <span id="capital" class="invalid">Kombinasi <strong>huruf besar</strong></span>
			                                    <br />
			                                    <span id="number" class="invalid">Kombinasi <strong>angka</strong>
			                                    </span>
			                                    <br />
			                                </div>
			                            </div>
			                            <!--Password-->

			                            <!--Ulangi Password-->
			                            <div class="form-group form-group-default">
			                                <label class="font-weight-bold" for="passUlangi">Ulangi Password <span id="buttonShowUlangiPassword" onclick="showUlangiPassword()"><i class="fas fa-eye-slash"></i></span></label>
			                                <input type="password" id="passUlangi" name="___in_ulangi_password_special_SEMANAK" class="form-control" placeholder="Ulangi Password anda..." pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" minlength="10" maxlength="20" required>
			                                <div class="form-text confirm-message p-2"></div>
			                            </div>
			                            <!--Ulangi Password-->

							      	</div>
							      	<div class="modal-footer">
							        	<button type="submit" name="_submit_special_SEMANAK_" class="btn btn-lg btn-primary"><i class="far fa-save"></i> SIMPAN PERUBAHAN</button>
							      	</div>
							    </form>
						  	</div>
						</div>
					</div>
					<div class="card-body">
                        <div class="table-responsive">
                            <table id="tabelPengaturan" class="table table-head-bg-primary table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th scope="col">No</th>
										<th scope="col">Username</th>
										<th scope="col">Nama Admin</th>
										<th scope="col">Level Admin</th>
										<th scope="col">Terakhir Login</th>
										<th scope="col">Status</th>
										<th style="width: 150px;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$no = 1;
										$query = $pdo->query("SELECT * FROM $database ORDER BY id_$database DESC");
										while($result = $query->fetch(PDO::FETCH_ASSOC)){
									?>
									<tr>
										<td><?= $no++; ?></td>
										<td class="fw-bold text-primary"><?= $result['username']; ?></td>
										<td class="fw-bold"><?= $result['nama']; ?></td>
										<td>
											<?php if ($result['level']=="Penulis"): ?>
												<span class="badge badge-info">Pegawai</span>
											<?php elseif ($result['level']=="Administrator"): ?>
												<span class="badge badge-secondary">Administrator</span>
											<?php endif ?>
										</td>
										<td><?= tgl2($result['terakhir_login']); ?></td>
										<td>
											<?php if ($result['status']=="Aktif"): ?>
												<span class="badge badge-success">Aktif</span>
											<?php elseif ($result['status']=="Blokir"): ?>
												<span class="badge badge-danger">Blokir</span>
											<?php endif ?>
										</td>
										<td class="text-center">
											<!-- Ubah Data -->
											<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ubah<?= $result['id_data_admin']; ?>">
											  	<i class="fas fa-edit"></i>
											</button>

											<!-- Modal Ubah Data-->
											<div class="modal fade" id="ubah<?= $result['id_data_admin']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											  	<div class="modal-dialog" role="document">
												    <form method="POST" action="actionEditDataAdmin" class="modal-content needs-validation" novalidate>
												      	<div class="modal-header">
												        	<h4 class="modal-title" id="exampleModalLabel">Ubah Data Admin <strong><?= $result['nama']; ?></strong></h4>
												        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												          		<span aria-hidden="true">&times;</span>
												        	</button>
												      	</div>
												    	<div class="modal-body text-left">

									                        <div class="alert alert-warning mt-2 mb-4" role="alert">
									                            <i class="fas fa-exclamation-triangle text-warning"></i> Mohon isi <em><u><strong>Form</strong></u></em> dibawah ini dengan <strong>lengkap & benar!</strong>
									                        </div>

									                        <hr />

									                        <input type="hidden" name="___in_id_data_admin_special_SEMANAK" value="<?= $result['id_data_admin'] ?>">

									                        <!--Nama Admin-->
								                            <div class="form-group form-group-default">
								                                <label for="nama" class="font-weight-bold">Nama Admin</label>
								                                <input type="text" id="nama" name="___in_nama_special_SEMANAK" class="form-control" placeholder="Cth: John Die" value="<?= $result['nama'] ?>" required>
								                                <div class="invalid-feedback">
								                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
								                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
								                                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
								                                    </svg> 
								                                    Mohon masukkan nama admin!
								                                </div>
								                            </div>
									                        <!--Nama Admin-->

									                        <!-- Level Admin -->
								                            <div class="form-group form-group-default">
								                                <label>Level Admin</label>
								                                <select class="form-control" id="formGroupDefaultSelect" name="___in_level_special_SEMANAK" required>
								                                    <option value="">--Pilih Level Admin--</option>
								                                    <option value="Administrator" <?php if ($result['level']=="Administrator") { echo "selected"; } ?>>Administrator</option>
								                                    <option value="Penulis" <?php if ($result['level']=="Penulis") {  echo "selected"; } ?>>Pegawai</option>
								                                </select>
								                                <div class="invalid-feedback">
								                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
								                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
								                                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
								                                    </svg> 
								                                    Mohon pilih 1!
								                                </div>
								                            </div>
									                        <!-- Level Admin -->

									                        <!--Username-->
								                            <div class="form-group form-group-default">
								                                <label for="username" class="font-weight-bold">Username</label>
								                                <input type="text" id="username" name="___in_username_special_SEMANAK" class="form-control" placeholder="Cth: bsunitkurnia01" value="<?= $result['username'] ?>" readonly>
								                                <div class="invalid-feedback">
								                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
								                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
								                                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
								                                    </svg> 
								                                    Mohon masukkan Min. 5 Karakter!
								                                </div>
								                            </div>
									                        <!--Username-->

									                        <!-- Status -->
								                            <div class="form-group form-group-default">
								                                <label>Status</label>
								                                <select class="form-control" id="formGroupDefaultSelect" name="___in_status_special_SEMANAK" required>
								                                    <option value="">--Pilih Status--</option>
								                                    <option value="Aktif" <?php if ($result['status']=="Aktif") { echo "selected"; } ?>>Aktif</option>
								                                    <option value="Blokir" <?php if ($result['status']=="Blokir") {  echo "selected"; } ?>>Blokir</option>
								                                </select>
								                                <div class="invalid-feedback">
								                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
								                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
								                                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
								                                    </svg> 
								                                    Mohon pilih 1!
								                                </div>
								                            </div>
									                        <!-- Status -->

												      	</div>
												      	<div class="modal-footer">
												        	<button type="submit" name="_submit_special_SEMANAK_" class="btn btn-lg btn-primary"><i class="far fa-save"></i> SIMPAN PERUBAHAN</button>
												      	</div>
												    </form>
											  	</div>
											</div>

											<a href="ubah-password-data-admin-<?= $result['id_data_admin']; ?>" class="btn btn-sm btn-warning"><i class="fas fa-lock"></i></a>
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
			case "add":

?>

<div class="content">
    <div class="panel-header bg-primary-gradient pb-5">
        <div class="page-inner py-5">
            <div class="text-center">
                <h5>
                    <a href="data-admin" class="text-light" style="text-decoration: none;"><i class="fas fa-arrow-left"></i> Kembali ke Daftar Data Admin</a>
                </h5>
                <h1 class="text-white pb-2 fw-bold text-uppercase"><i class="fas fa-user-plus"></i> Tambah Data Admin</h1>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
		<div class="row justify-content-center mt--5">
			<div class="col-md-10">
				<div class="card">
					<form method="POST" action="actionAddDataAdmin" class="modal-content needs-validation" novalidate>
						<div class="card-body">

							<?php

			                    if ($_SESSION['_notify__']==="UsernameTerdaftar") {
			                        echo "<div class='alert alert-danger text-left my-2' role='alert'>";
			                        echo "<h4 class='alert-heading text-danger'><i class='fas fa-exclamation-triangle'></i> USERNAME SUDAH TERDAFTAR!</h4>";
			                        echo "<hr>";
			                        echo "<p class='mb-0'>Mohon gunakan <strong>username</strong> yang lain!</p>";
			                        echo "</div>";
			                        $_SESSION['_notify__'] = 0;
			                    }elseif ($_SESSION['_notify__']==="PasswordTidakSama") {
			                        echo "<div class='alert alert-danger text-left my-2' role='alert'>";
			                        echo "<h4 class='alert-heading text-danger'><i class='fas fa-exclamation-triangle'></i> PASSWORD TIDAK SAMA!</h4>";
			                        echo "<hr>";
			                        echo "<p class='mb-0'>Mohon masukkan <strong>password</strong> yang sama!</p>";
			                        echo "</div>";
			                        $_SESSION['_notify__'] = 0;
			                    }else{
			                    	echo "<div class='alert alert-warning my-2' role='alert'>";
			                    	echo "<i class='fas fa-exclamation-triangle text-warning'></i> Mohon isi <em><u><strong>Form</strong></u></em> dibawah ini dengan <strong>lengkap & benar!</strong>";
			                    	echo "</div>";
			                    }

			                ?>
	                        
	                        <hr />

	                        <!--Nama Admin-->
                            <div class="form-group form-group-default">
                                <label for="nama" class="font-weight-bold">Nama Admin</label>
                                <input type="text" id="nama" name="___in_nama_special_SEMANAK" class="form-control" placeholder="Cth: John Die" required>
                                <div class="invalid-feedback">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                                    </svg> 
                                    Mohon masukkan nama admin!
                                </div>
                            </div>
	                        <!--Nama Admin-->

	                        <!-- Level Admin -->
                            <div class="form-group form-group-default">
                                <label>Level Admin</label>
                                <select class="form-control" id="formGroupDefaultSelect" name="___in_level_special_SEMANAK" required>
                                    <option value="">--Pilih Level Admin--</option>
                                    <option value="Administrator">Administrator</option>
                                    <option value="Penulis">Pegawai</option>
                                </select>
                                <div class="invalid-feedback">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                                    </svg> 
                                    Mohon pilih 1!
                                </div>
                            </div>
	                        <!-- Level Admin -->

	                        <!--Username-->
                            <div class="form-group form-group-default">
                                <label for="username" class="font-weight-bold">Username</label>
                                <input type="text" id="username" name="___in_username_special_SEMANAK" class="form-control" placeholder="Cth: bsunitkurnia01" autocomplete="Off" minlength="5" maxlength="20" onkeyup="this.value=this.value.replace(/[^a-z][^0-9]/g,'');" required>
                                <div class="invalid-feedback">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                                    </svg> 
                                    Mohon masukkan Min. 5 Karakter!
                                </div>
                            </div>
	                        <!--Username-->

                            <!--Password-->
                            <div class="form-group form-group-default">
                                <label class="font-weight-bold" for="pass">Password <span id="buttonShowPassword" onclick="showPassword()"><i class="fas fa-eye-slash"></i></span></label>
                                <input type="password" id="pass" name="___in_password_special_SEMANAK" class="form-control" placeholder="Masukkan Password anda..." pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" minlength="10" maxlength="20" required>
                                <div id="message" class="p-2">
                                    <h6 class="font-weight-bold text-primary"><i class="fas fa-exclamation-circle"></i> Ketentuan Password:</h6>

                                    <span id="length" class="invalid">Minimal <strong>10 Karakter</strong>
                                    </span>
                                    <br />
                                    <span id="letter" class="invalid">Kombinasi <strong>huruf kecil</strong></span>
                                    <br />
                                    <span id="capital" class="invalid">Kombinasi <strong>huruf besar</strong></span>
                                    <br />
                                    <span id="number" class="invalid">Kombinasi <strong>angka</strong>
                                    </span>
                                    <br />
                                </div>
                            </div>
                            <!--Password-->

                            <!--Ulangi Password-->
                            <div class="form-group form-group-default">
                                <label class="font-weight-bold" for="passUlangi">Ulangi Password <span id="buttonShowUlangiPassword" onclick="showUlangiPassword()"><i class="fas fa-eye-slash"></i></span></label>
                                <input type="password" id="passUlangi" name="___in_ulangi_password_special_SEMANAK" class="form-control" placeholder="Ulangi Password anda..." pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" minlength="10" maxlength="20" required>
                                <div class="form-text confirm-message p-2"></div>
                            </div>
                            <!--Ulangi Password-->

						</div>
						<div class="card-footer">
							<button type="submit" name="_submit_special_SEMANAK_" class="btn btn-primary"><i class="fas fa-check"></i> Selesai</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
	
			break;
			case "ubah-password":

	$query 	= $pdo->query("SELECT * FROM $database WHERE id_data_admin='$_GET[kode]'");
	$result = $query->fetch(PDO::FETCH_ASSOC);

?>

<div class="content">
    <div class="panel-header bg-primary-gradient pb-5">
        <div class="page-inner py-5">
            <div class="text-center">
                <h5>
                    <a href="data-admin" class="text-light" style="text-decoration: none;"><i class="fas fa-arrow-left"></i> Kembali ke Daftar Data Admin</a>
                </h5>
                <h1 class="text-white pb-2 fw-bold text-uppercase"><i class="fas fa-lock"></i> Ubah <em>Password</em> Data Admin <strong>"<?= $result['nama'] ?>"</strong></h1>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
		<div class="row justify-content-center mt--5">
			<div class="col-md-10">
				<div class="card">
					<form method="POST" action="actionEditPasswordDataAdmin" class="modal-content needs-validation" novalidate>
						<div class="card-body">
						    <?php

			                    if ($_SESSION['_notify__']==="PasswordTidakSama") {
			                        echo "<div class='alert alert-danger text-left my-2' role='alert'>";
			                        echo "<h4 class='alert-heading text-danger'><i class='fas fa-exclamation-triangle'></i> PASSWORD TIDAK SAMA!</h4>";
			                        echo "<hr>";
			                        echo "<p class='mb-0'>Mohon masukkan <strong>password</strong> yang sama!</p>";
			                        echo "</div>";
			                        $_SESSION['_notify__'] = 0;
			                    }else{
			                    	echo "<div class='alert alert-warning my-2' role='alert'>";
			                    	echo "<i class='fas fa-exclamation-triangle text-warning'></i> Mohon isi <em><u><strong>Form</strong></u></em> dibawah ini dengan <strong>lengkap & benar!</strong>";
			                    	echo "</div>";
			                    }

			                ?>

	                        <hr />

	                        <input type="hidden" name="___in_id_data_admin_special_SEMANAK" value="<?= $result['id_data_admin'] ?>">

                            <!--Password-->
                            <div class="form-group form-group-default">
                                <label class="font-weight-bold" for="pass">Password <span id="buttonShowPassword" onclick="showPassword()"><i class="fas fa-eye-slash"></i></span></label>
                                <input type="password" id="pass" name="___in_password_special_SEMANAK" class="form-control" placeholder="Masukkan Password anda..." pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" minlength="10" maxlength="20" required>
                                <div id="message" class="p-2">
                                    <h6 class="font-weight-bold text-primary"><i class="fas fa-exclamation-circle"></i> Ketentuan Password:</h6>

                                    <span id="length" class="invalid">Minimal <strong>10 Karakter</strong>
                                    </span>
                                    <br />
                                    <span id="letter" class="invalid">Kombinasi <strong>huruf kecil</strong></span>
                                    <br />
                                    <span id="capital" class="invalid">Kombinasi <strong>huruf besar</strong></span>
                                    <br />
                                    <span id="number" class="invalid">Kombinasi <strong>angka</strong>
                                    </span>
                                    <br />
                                </div>
                            </div>
                            <!--Password-->

                            <!--Ulangi Password-->
                            <div class="form-group form-group-default">
                                <label class="font-weight-bold" for="passUlangi">Ulangi Password <span id="buttonShowUlangiPassword" onclick="showUlangiPassword()"><i class="fas fa-eye-slash"></i></span></label>
                                <input type="password" id="passUlangi" name="___in_ulangi_password_special_SEMANAK" class="form-control" placeholder="Ulangi Password anda..." pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" minlength="10" maxlength="20" required>
                                <div class="form-text confirm-message p-2"></div>
                            </div>
                            <!--Ulangi Password-->
						</div>
						<div class="card-footer">
							<button type="submit" name="_submit_special_SEMANAK_" class="btn btn-block btn-lg btn-primary"><i class="fas fa-check"></i> Selesai</button>
						</div>
					</form>
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