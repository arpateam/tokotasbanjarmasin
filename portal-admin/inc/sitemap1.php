<?php

	$aksi 				= "inc/act-sitemap1.php";
	$hal 				= "Sitemap 1";
	$module 			= "sitemap_one";
	$database 			= "sitemap_1";
	$link 				= "sitemap-one";

	switch($_GET['act']){
		case "view":

?>

<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title text-primary"><i class="fas fa-tags"></i> <?= $hal; ?></h4>
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
					<a href="#"><u>Daftar <?= $hal; ?></u></a>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="card-title">Daftar <?= $hal; ?></div>
					</div>

					<div class="card-body">

						<a href="tambah-<?= $link; ?>" role="button" class="btn btn-block btn-primary mb-4"><i class="fas fa-plus-circle"></i> Tambah <?= $hal; ?></a>

						<div class="alert alert-success" role="alert">
							<?php
								$SUMpage = $pdo->query("SELECT * FROM $database WHERE id_sub_sitemap='1'");
								$resultSUMpage = $SUMpage->rowCount();
							?>

						  	<p>Jumlah URL <strong class="text-success">Page 1</strong> Saat Ini <i>(max. <?= rp(50000); ?> Urls)</i></p>
						  	<h3 class="text-success font-weight-bold"><?= $resultSUMpage; ?> URLS &nbsp;&nbsp;&nbsp; <span class="border"></span> &nbsp;&nbsp;&nbsp; <a data-toggle="collapse" href="#collapsePage" role="button" aria-expanded="false" aria-controls="collapsePage"><i class="fas fa-caret-square-down"></i></a> </h3>
						  	<div class="card-body border-top border-success shadow collapse" id="collapsePage">
								<div class="table-responsive">
									<table id="tabelSitemapPage" class="table table-striped table-bordered py-2" style="width:100%">
								        <thead>
											<tr>
												<th scope="col">No</th>
												<th scope="col" style="width: 250px;">Link/Location</th>
												<th scope="col" style="min-width: 80px;">Lastmod</th>
												<th scope="col" style="min-width: 50px;width:auto;">Priority</th>
												<th scope="col" style="min-width: 80px;">Aksi</th>
											</tr>
										</thead>
										<tbody>

											<?php

												$no=1;
												$Page = $pdo->query("SELECT * FROM $database WHERE id_sub_sitemap='1'");
												while($resultPage = $Page->fetch(PDO::FETCH_ASSOC)){

											?>

											<tr>
												<th scope="row"><?= $no++; ?></th>
												<td><?= $resultPage['loc_1']; ?></td>
												<td><?= $resultPage['lastmod_1']; ?></td>
												<td><?= $resultPage['priority_1']; ?></td>
												<td>
													<a href="edit-<?= $link; ?>-<?= $resultPage['id_sitemap_1']; ?>" role="button" class="btn btn-sm btn-primary px-3"><i class="fas fa-edit"></i></a>
													<a href="<?= $aksi; ?>?module=<?= $module; ?>&act=delete&id_sitemap_1=<?= $resultPage['id_sitemap_1']; ?>" role="button" class="btn btn-sm btn-danger px-3"><i class="fas fa-trash-alt"></i></a>
												</td>
											</tr>

											<?php } ?>

										</tbody>
								        <tfoot>
								            <tr>
								                <th class="border-bottom-0" scope="col">No</th>
												<th class="border-bottom-0" scope="col" style="min-width: 300px;width: auto;">Link/Location</th>
												<th class="border-bottom-0" scope="col" style="min-width: 100px;width: auto;">Lastmod</th>
												<th class="border-bottom-0" scope="col" style="min-width: 50px;width: auto;">Priority</th>
												<th class="border-bottom-0" scope="col" style="min-width: 100px;width: auto;">Aksi</th>
								            </tr>
								        </tfoot>
								    </table>
								</div>
							</div>
						  	<hr />
						  	<span>Ukuran <strong class="text-success">sitemappage1.php</strong> adalah <strong class="text-success"><?= rp(filesize("../sitemappage1.php")); ?> Bytes</strong> <i>(max. <?= rp(50000000); ?> Bytes)</i></span>
						</div>

						<div class="alert alert-secondary" role="alert">
							<?php
								$SUMproduk = $pdo->query("SELECT * FROM $database WHERE id_sub_sitemap='2'");
								$resultSUMproduk = $SUMproduk->rowCount();
							?>

						  	<p>Jumlah URL <strong class="text-secondary">Produk 1</strong> Saat Ini <i>(max. <?= rp(50000); ?> Urls)</i></p>
						  	<h3 class="text-secondary font-weight-bold"><?= $resultSUMproduk; ?> URLS &nbsp;&nbsp;&nbsp; <span class="border"></span> &nbsp;&nbsp;&nbsp; <a data-toggle="collapse" href="#collapseProduk" role="button" aria-expanded="false" aria-controls="collapseProduk"><i class="fas fa-caret-square-down"></i></a> </h3>
						  	<div class="card-body border-top border-secondary shadow collapse" id="collapseProduk">
								<div class="table-responsive">
									<table id="tabelSitemapProduk" class="table table-striped table-bordered py-2" style="width:100%">
								        <thead>
											<tr>
												<th scope="col">No</th>
												<th scope="col" style="width: 250px;">Link/Location</th>
												<th scope="col" style="min-width: 80px;">Lastmod</th>
												<th scope="col" style="min-width: 50px;width:auto;">Priority</th>
												<th scope="col" style="min-width: 80px;">Aksi</th>
											</tr>
										</thead>
										<tbody>

											<?php

												$no=1;
												$Produk = $pdo->query("SELECT * FROM $database WHERE id_sub_sitemap='2'");
												while($resultProduk = $Produk->fetch(PDO::FETCH_ASSOC)){

											?>

											<tr>
												<th scope="row"><?= $no++; ?></th>
												<td><?= $resultProduk['loc_1']; ?></td>
												<td><?= $resultProduk['lastmod_1']; ?></td>
												<td><?= $resultProduk['priority_1']; ?></td>
												<td>
													<a href="edit-<?= $link; ?>-<?= $resultProduk['id_sitemap_1']; ?>" role="button" class="btn btn-sm btn-primary px-3"><i class="fas fa-edit"></i></a>
													<a href="<?= $aksi; ?>?module=<?= $module; ?>&act=delete&id_sitemap_1=<?= $resultProduk['id_sitemap_1']; ?>" role="button" class="btn btn-sm btn-danger px-3"><i class="fas fa-trash-alt"></i></a>
												</td>
											</tr>

											<?php } ?>

										</tbody>
								        <tfoot>
								            <tr>
								                <th class="border-bottom-0" scope="col">No</th>
												<th class="border-bottom-0" scope="col" style="min-width: 300px;width: auto;">Link/Location</th>
												<th class="border-bottom-0" scope="col" style="min-width: 100px;width: auto;">Lastmod</th>
												<th class="border-bottom-0" scope="col" style="min-width: 50px;width: auto;">Priority</th>
												<th class="border-bottom-0" scope="col" style="min-width: 100px;width: auto;">Aksi</th>
								            </tr>
								        </tfoot>
								    </table>
								</div>
							</div>
						  	<hr />
						  	<span>Ukuran <strong class="text-secondary">sitemapproduk1.php</strong> adalah <strong class="text-secondary"><?= rp(filesize("../sitemapproduk1.php")); ?> Bytes</strong> <i>(max. <?= rp(50000000); ?> Bytes)</i></span>
						</div>

						<div class="alert alert-primary" role="alert">
							<?php
								$SUMpromo = $pdo->query("SELECT * FROM $database WHERE id_sub_sitemap='3'");
								$resultSUMpromo = $SUMpromo->rowCount();
							?>

						  	<p>Jumlah URL <strong class="text-primary">Promo 1</strong> Saat Ini <i>(max. <?= rp(50000); ?> Urls)</i></p>
						  	<h3 class="text-primary font-weight-bold"><?= $resultSUMpromo; ?> URLS &nbsp;&nbsp;&nbsp; <span class="border"></span> &nbsp;&nbsp;&nbsp; <a data-toggle="collapse" href="#collapsePromo" role="button" aria-expanded="false" aria-controls="collapsePromo"><i class="fas fa-caret-square-down"></i></a> </h3>
						  	<div class="card-body border-top border-primary shadow collapse" id="collapsePromo">
								<div class="table-responsive">
									<table id="tabelSitemapPromo" class="table table-striped table-bordered py-2" style="width:100%">
								        <thead>
											<tr>
												<th scope="col">No</th>
												<th scope="col" style="width: 250px;">Link/Location</th>
												<th scope="col" style="min-width: 80px;">Lastmod</th>
												<th scope="col" style="min-width: 50px;width:auto;">Priority</th>
												<th scope="col" style="min-width: 80px;">Aksi</th>
											</tr>
										</thead>
										<tbody>

											<?php

												$no=1;
												$Promo = $pdo->query("SELECT * FROM $database WHERE id_sub_sitemap='3'");
												while($resultPromo = $Promo->fetch(PDO::FETCH_ASSOC)){

											?>

											<tr>
												<th scope="row"><?= $no++; ?></th>
												<td><?= $resultPromo['loc_1']; ?></td>
												<td><?= $resultPromo['lastmod_1']; ?></td>
												<td><?= $resultPromo['priority_1']; ?></td>
												<td>
													<a href="edit-<?= $link; ?>-<?= $resultPromo['id_sitemap_1']; ?>" role="button" class="btn btn-sm btn-primary px-3"><i class="fas fa-edit"></i></a>
													<a href="<?= $aksi; ?>?module=<?= $module; ?>&act=delete&id_sitemap_1=<?= $resultPromo['id_sitemap_1']; ?>" role="button" class="btn btn-sm btn-danger px-3"><i class="fas fa-trash-alt"></i></a>
												</td>
											</tr>

											<?php } ?>

										</tbody>
								        <tfoot>
								            <tr>
								                <th class="border-bottom-0" scope="col">No</th>
												<th class="border-bottom-0" scope="col" style="min-width: 300px;width: auto;">Link/Location</th>
												<th class="border-bottom-0" scope="col" style="min-width: 100px;width: auto;">Lastmod</th>
												<th class="border-bottom-0" scope="col" style="min-width: 50px;width: auto;">Priority</th>
												<th class="border-bottom-0" scope="col" style="min-width: 100px;width: auto;">Aksi</th>
								            </tr>
								        </tfoot>
								    </table>
								</div>
							</div>
						  	<hr />
						  	<span>Ukuran <strong class="text-primary">sitemappromo1.php</strong> adalah <strong class="text-primary"><?= rp(filesize("../sitemappromo1.php")); ?> Bytes</strong> <i>(max. <?= rp(50000000); ?> Bytes)</i></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php

	break;
	case "add":

	$action	= "add";

?>

<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title text-primary"><i class="fas fa-tags"></i> Tambah <?= $hal; ?></h4>
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
					<a href="#"><u>Tambah <?= $hal; ?></u></a>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="card-title">Form Menambah <?= $hal; ?></div>
						<div class="alert alert-warning mt-4" role="alert">
						  	<i class="fas fa-exclamation-triangle"></i> Mohon isi form dibawah ini dengan lengkap & benar!
						</div>
					</div>
					<div class="card-body">
						<form action="<?= $aksi; ?>?module=<?= $module; ?>&act=<?= $action; ?>" method="POST" class="needs-validation" novalidate>

							<!--Sub-Sitemap-->
			                <div class="mb-4">
								<div class="form-group form-floating-label">
									<select class="form-control input-border-bottom" id="id_sub_sitemap" name="___in_id_sub_sitemap_special_SEMANAK" required>
										<option value="">&nbsp;</option>
										<?php

											$no=1;
											$SubSitemap = $pdo->query("SELECT * FROM sub_sitemap");
											while($resultSubSitemap = $SubSitemap->fetch(PDO::FETCH_ASSOC)){

										?>
										<option value="<?= $resultSubSitemap['id_sub_sitemap']; ?>"><?= $resultSubSitemap['judul']; ?></option>
										<?php } ?>
									</select>
									<label for="id_sub_sitemap" class="placeholder">Sub Sitemap</label>
							      	<div class="invalid-feedback">
				                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
				                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
				                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
				                        </svg> 
							          	Mohon pilih sub sitemap!
							        </div>
								</div>
			                </div>

			                <!--Link/Loc-->
			                <div class="mb-4">
			                    <div class="form-group form-floating-label">
									<input id="loc" name="___in_loc_special_SEMANAK" type="text" class="form-control input-border-bottom" value="<?= $link1; ?>/" required>
									<label for="loc" class="placeholder">Link</label>
							      	<div class="invalid-feedback">
				                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
				                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
				                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
				                        </svg> 
							          	Mohon masukkan link!
							        </div>
								</div>
			                </div>

							<!--Priority-->
			                <div class="mb-4">
								<div class="form-group form-floating-label">
									<select class="form-control input-border-bottom" id="priority" name="___in_priority_special_SEMANAK" required>
										<option value="">&nbsp;</option>
										<option value="1.00">1.00</option>
										<option value="0.90">0.90</option>
										<option value="0.80">0.80</option>
										<option value="0.70">0.70</option>
										<option value="0.60">0.60</option>
										<option value="0.50">0.50</option>
									</select>
									<label for="priority" class="placeholder">Priority?</label>
							      	<div class="invalid-feedback">
				                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
				                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
				                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
				                        </svg> 
							          	Mohon pilih Priority!
							        </div>
								</div>
			                </div>
              
			                <!--footer button-->
			                <div class="mt-4 pt-4 border-top">
			                    <a href="<?= $link; ?>" role="button" class="btn btn-warning">
			                        <i class="fas fa-arrow-left"></i> Batal
			                    </a>
			                    <button type="submit" name="_submit_special_SEMANAK_" class="btn btn-success">
			                        <i class="fas fa-check"></i> Selesai
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
	case "edit":

	$queryEdit	= $pdo->query("SELECT id_$database, id_sub_sitemap, loc_1, priority_1 FROM $database WHERE id_$database='$_GET[id]'");
	$resultEdit	= $queryEdit->fetch(PDO::FETCH_ASSOC);

	$action	= "edit";

?>

<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title text-primary"><i class="fas fa-tags"></i> <?= $hal; ?></h4>
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
						<form action="<?= $aksi; ?>?module=<?= $module; ?>&act=<?= $action; ?>" method="POST" class="needs-validation" novalidate>

							<input type="hidden" name="___in_id_sitemap_1_special_SEMANAK" value="<?= $resultEdit['id_sitemap_1']; ?>">

							<!--Sub-Sitemap-->
			                <div class="mb-4">
								<div class="form-group form-floating-label">
									<select class="form-control input-border-bottom" id="id_sub_sitemap" name="___in_id_sub_sitemap_special_SEMANAK" required>
										<option value="">&nbsp;</option>
										<?php

											$no=1;
											$SubSitemap = $pdo->query("SELECT * FROM sub_sitemap");
											while($resultSubSitemap = $SubSitemap->fetch(PDO::FETCH_ASSOC)){

										?>
										<option value="<?= $resultSubSitemap['id_sub_sitemap']; ?>" <?php if ($resultEdit['id_sub_sitemap']===$resultSubSitemap['id_sub_sitemap']) { echo "selected"; } ?>><?= $resultSubSitemap['judul']; ?></option>
										<?php } ?>
									</select>
									<label for="id_sub_sitemap" class="placeholder">Sub Sitemap</label>
							      	<div class="invalid-feedback">
				                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
				                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
				                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
				                        </svg> 
							          	Mohon pilih sub sitemap!
							        </div>
								</div>
			                </div>

			                <!--Link/Loc-->
			                <div class="mb-4">
			                    <div class="form-group form-floating-label">
									<input id="loc" name="___in_loc_special_SEMANAK" type="text" class="form-control input-border-bottom" value="<?= $resultEdit['loc_1']; ?>" required>
									<label for="loc" class="placeholder">Link</label>
							      	<div class="invalid-feedback">
				                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
				                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
				                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
				                        </svg> 
							          	Mohon masukkan link!
							        </div>
								</div>
			                </div>

							<!--Priority-->
			                <div class="mb-4">
								<div class="form-group form-floating-label">
									<select class="form-control input-border-bottom" id="priority" name="___in_priority_special_SEMANAK" required>
										<option value="1.00" <?php if ($resultEdit['priority_1']==="1.00") { echo "selected"; } ?>>1.00</option>
										<option value="0.90" <?php if ($resultEdit['priority_1']==="0.90") { echo "selected"; } ?>>0.90</option>
										<option value="0.80" <?php if ($resultEdit['priority_1']==="0.80") { echo "selected"; } ?>>0.80</option>
										<option value="0.70" <?php if ($resultEdit['priority_1']==="0.70") { echo "selected"; } ?>>0.70</option>
										<option value="0.60" <?php if ($resultEdit['priority_1']==="0.60") { echo "selected"; } ?>>0.60</option>
										<option value="0.50" <?php if ($resultEdit['priority_1']==="0.50") { echo "selected"; } ?>>0.50</option>
									</select>
									<label for="priority" class="placeholder">Priority?</label>
							      	<div class="invalid-feedback">
				                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
				                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
				                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
				                        </svg> 
							          	Mohon pilih Priority!
							        </div>
								</div>
			                </div>
              
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
	}
?>