<div class="container-fluid">
	<div class="container">
		<div class="row justify-content-center px-3 px-md-4 my-4">
			<div class="card border-0 border-top-2 col-md-11">
		  		<div class="row justify-content-end">
		  			<div class="col-2 col-sm-2 col-lg-1">
		  				<span class="ribbonTestimoni"><i class="fas fa-shopping-cart fa-2x"></i></span>
		  			</div>
		  			<div class="col-10 col-sm-10 col-lg-11">

					<div class="card-body">
						<h1 class="text-success">Keranjang Belanjaan Saya</h1>
					</div>
				</div>
		  	</div>

		  	<div class="col-11 border-dotted-5"></div>
		</div>
	</div>
</div>

<div class="container my-5">
	<div class="row justify-content-center px-3 px-md-4">
	  	<div class="card col-md-11 bg-white rounded-100 border-start-7 shadow p-2 p-md-4 my-2">
	  		<?php if ($_SESSION['qty_FamillyFood']==="0"): ?>
	  			<div class="row justify-content-center">
	  				<div class="col-10 col-sm-8 col-lg-6 text-center">
	  					<img src="assets/images/empty_cart.png" alt="Keranjang Saya Kosong" class="img-fluid">
	  					<h2 class="text-warning">Yahhh! Keranjang Anda Masih Kosong</h2>
	  					<a href="produk/" class="btn btn-lg btn-success my-4">Yuk Belanja <i class="fas fa-cart-plus"></i></a>
	  				</div>
	  			</div>
	  		<?php else: ?>
	  			<div class="row justify-content-center mt-2">

	  				<?php
	  					$totalBayar=0;
	  					$subBerat=0;
	  					$totalBerat=0;
	  					$totalQty=0;
			            $Keranjang 			= $pdo->query("SELECT nama_produk, harga, diskon, harga_final, berat, gambar, id_keranjang, qty, sub_harga FROM keranjang INNER JOIN produk ON keranjang.id_produk=produk.id_produk WHERE kode_invoice='$_SESSION[kode_invoice_FamillyFood]' AND keranjang.status='Proses' ORDER BY id_keranjang DESC ");
			            while ($resultKeranjang 	= $Keranjang->fetch(PDO::FETCH_ASSOC)) {
			            	$totalBayar += $resultKeranjang['sub_harga'];
			            	$subBerat 	= $resultKeranjang['berat']*$resultKeranjang['qty'];
			            	$totalBerat	+= $subBerat;
			            	$totalQty	+= $resultKeranjang['qty'];
			            	$subBerat	= 0;
			        ?>

	  				<div class="col-3 col-lg-2">
	  					<img src="assets/images/produk/<?= $resultKeranjang['gambar'] ?>" alt="Gambar Produk <?= $resultKeranjang['nama_produk'] ?>" class="img-thumbnail">
	  				</div>
	  				<div class="col-9 col-lg-10">
	  					<h4 class="text-success"><?= $resultKeranjang['nama_produk'] ?></h4>
	  					<hr class="my-2" />
	  					<div class="row">
	  						<div class="col-10 d-block d-md-none">
		  						<?php if ($resultKeranjang['diskon']==="0" OR $resultKeranjang['diskon']===NULL OR empty($resultKeranjang['diskon'])): ?>
			  						<h6 class="text-success">Rp <?= rp($resultKeranjang['harga_final']) ?>,00</h6>
			  					<?php else: ?>
			  						<small><del class="text-muted">Rp <?= rp($resultKeranjang['harga_final']) ?>,00</del> <span class="text-danger">Disc. <?=$resultKeranjang['diskon'] ?>%</span></small>
			  						<h6 class="text-success">Rp <?= rp($resultKeranjang['harga_final']) ?>,00</h6>
			  					<?php endif ?>
			  				</div>
	  						<div class="col-10 d-none d-md-block">
		  						<?php if ($resultKeranjang['diskon']==="0" OR $resultKeranjang['diskon']===NULL OR empty($resultKeranjang['diskon'])): ?>
			  						<h5 class="text-success">Rp <?= rp($resultKeranjang['harga_final']) ?>,00</h5>
			  					<?php else: ?>
			  						<h6><del class="text-muted">Rp <?= rp($resultKeranjang['harga_final']) ?>,00</del> <span class="text-danger">Disc. <?=$resultKeranjang['diskon'] ?>%</span></h6>
			  						<h5 class="text-success">Rp <?= rp($resultKeranjang['harga_final']) ?>,00</h5>
			  					<?php endif ?>
			  				</div>
	  						<div class="col-2">
	  							<h6 class="text-danger">x<?= $resultKeranjang['qty'] ?></h6>
	  						</div>
	  					</div>
	  					<hr class="my-2" />
						<!-- Button trigger modal -->
						<a href="#modalEdit<?= $resultKeranjang['id_keranjang']; ?>" data-bs-toggle="modal" role="button" class="nav-link-info"><i class="fas fa-edit"></i></a>

						<!-- Modal -->
						<div class="modal fade" id="modalEdit<?= $resultKeranjang['id_keranjang']; ?>" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
						  	<div class="modal-dialog">
							    <form method="POST" action="actionEditKeranjang" class="modal-content">
							      	<div class="modal-header">
								        <h5 class="modal-title text-success" id="modalEditLabel"><i class="fas fa-pencil-alt"></i> Ubah Jumlah Pembelian</h5>
								        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							      	</div>
							      	<div class="modal-body">
							        	<div class="quantity-block row">
							        		<div class="col-3 col-md-2 text-center">
							        			<button type="button" class="quantity-arrow-minus"> - </button>
							        		</div>
							        		<div class="col-6 col-md-8 text-center">
							        			<input class="quantity-num" type="number" value="<?= $resultKeranjang['qty'] ?>" name="___in_qty_special_FamilyFood" />
							        		</div>
							        		<div class="col-3 col-md-2 text-center">
							        			<button type="button" class="quantity-arrow-plus"> + </button>
							        		</div>
										</div>
							      	</div>
							      	<div class="modal-footer">
							      		<input type="hidden" name="___in_harga_final_special_FamilyFood" value="<?= $resultKeranjang['harga_final'] ?>">
							      		<input type="hidden" name="___in_id_keranjang_special_FamilyFood" value="<?= $resultKeranjang['id_keranjang'] ?>">
								        <button type="button" class="btn btn-sm btn-secondary fw-normal" data-bs-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
								        <button type="submit" name="_submit_special_FamilyFood_" class="btn btn-success fw-normal"><i class="fas fa-save"></i> Simpan Perubahan</button>
							      	</div>
							    </form>
						  	</div>
						</div>

						<a onclick="confirmHapusKeranjang('<?= $resultKeranjang['id_keranjang']; ?>')" class="nav-link-danger">
							<i class="fas fa-trash-alt"></i>
						</a>
	  				</div>

	  				<div class="col-11 col-md-12 border-dotted-3 my-3"></div>

	  				<?php } ?>

	  			</div>

	  			<!-- Button trigger modal -->
				<a href="#bayarSekarang" data-bs-toggle="modal" role="button" title="Bayar Sekarang" class="btn btn-lg btn-danger my-2"><i class="fas fa-wallet"></i> BAYAR SEKARANG</a>

				<!-- Modal -->
				<div class="modal fade" id="bayarSekarang" tabindex="-1" aria-labelledby="bayarSekarangLabel" aria-hidden="true">
				  	<div class="modal-dialog modal-lg">
					    <form method="POST" action="actionTransaksi" class="modal-content needs-validation" novalidate>
					      	<div class="modal-header">
						        <h4 class="modal-title text-success" id="bayarSekarangLabel"><i class="fas fa-shopping-cart"></i> CHECKOUT</h4>
						        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					      	</div>
					      	<div class="row modal-body">
					      		<div class="col-md-6 my-2">
					      			<div class="form-floating">
									  	<input type="text" id="nama_penerima" class="form-control" name="___in_nama_penerima_special_FamilyFood" placeholder="Cth: Muhammad Mustofa" required>
									  	<label for="nama_penerima">Nama Penerima</label>
                                        <div class="invalid-feedback fw-normal">
                                            <i class="fas fa-exclamation-triangle"></i> Mohon Masukkan Nama Penerima!
                                        </div>
									</div>
                                </div>
					      		<div class="col-md-6 my-2">
					      			<div class="form-floating">
									  	<input type="tel" id="nomor_whatsapp" class="form-control" name="___in_nomor_whatsapp_special_FamilyFood" placeholder="Cth: 085701311015" pattern="^(0)8[1-9][0-9]{6,9}$" required>
									  	<label for="nomor_whatsapp">Nomor WhatsApp Penerima</label>
                                        <div class="invalid-feedback fw-normal">
                                            <i class="fas fa-exclamation-triangle"></i> Mohon Masukkan Nomor WhatsApp!
                                            <br /> <i class="fas fa-exclamation-triangle"></i> Nomor <u>tidak boleh</u> menggunakan spasi!
                                            <br /> <i class="fas fa-exclamation-triangle"></i> Cth: 085701311015
                                        </div>
									</div>
                                </div>

					      		<div class="col-md-4 my-2">
					      			<div class="form-floating">
	                                	<select name="nama_provinsi" id="" class="form-select" aria-label="Floating label select example" required>
										</select>
						      			<label for="">Provinsi Penerima</label>
	                                    <div class="invalid-feedback fw-normal">
	                                        <i class="fas fa-exclamation-triangle"></i> Mohon Pilih Provinsi Penerima!
	                                    </div>
	                                </div>
								</div>
					      		<div class="col-md-5 my-2">
					      			<div class="form-floating">
	                                	<select name="nama_distrik" id="" class="form-select" aria-label="Floating label select example" required>
										</select>
						      			<label for="">Kabupaten/Kota Penerima</label>
	                                    <div class="invalid-feedback fw-normal">
	                                        <i class="fas fa-exclamation-triangle"></i> Mohon Pilih Kabupaten/Kota Penerima!
	                                    </div>
	                                </div>
								</div>
					      		<div class="col-md-3 my-2">
                                    <div class="form-floating">
                                        <input id="kode_pos" name="kodepos" type="number" class="form-control input-border-bottom" placeholder="Cth: 55122" required>
                                        <label for="kode_pos" class="text-success">Kode Pos</label>
                                        <div class="invalid-feedback fw-normal">
                                            <i class="fas fa-exclamation-triangle"></i> Mohon Masukkan Kode Pos!
                                        </div>
                                    </div>
                                </div>
					      		<div class="col-md-12 my-2">
	                                <div class="form-floating">
									  	<textarea class="form-control" placeholder="Masukkan alamat lengkap penerima ..." name="___in_detail_alamat_special_FamilyFood" id="floatingTextarea" style="height: 100px" required></textarea>
									  	<label for="floatingTextarea">Detail Alamat Lengkap Penerima</label>
                                        <div class="invalid-feedback fw-normal">
                                            <i class="fas fa-exclamation-triangle"></i> Mohon Masukkan Detail Alamat Lengkap Penerima!
                                        </div>
									</div>
								</div>

					      		<div class="col-md-6 my-2">
					      			<div class="form-floating">
	                                	<select name="nama_ekspedisi" id="" class="form-select" aria-label="Default select example" required>
										</select>
						      			<label for="">Ekspedisi Pengiriman</label>
	                                    <div class="invalid-feedback fw-normal">
	                                        <i class="fas fa-exclamation-triangle"></i> Mohon Pilih Ekspedisi Pengiriman!
	                                    </div>
	                                </div>
								</div>
					      		<div class="col-md-6 my-2">
					      			<div class="form-floating">
	                                	<select name="nama_paket" id="" class="form-select" aria-label="Default select example" required>
										</select>
						      			<label for="">Jenis Pengiriman</label>
	                                    <div class="invalid-feedback fw-normal">
	                                        <i class="fas fa-exclamation-triangle"></i> Mohon Pilih Jenis Pengiriman!
	                                    </div>
	                                </div>
								</div>
					      	</div>
					      	<div class="modal-body border">
					      		<div class="row justify-content-center border">
					      			<div class="col-6 text-muted"><small>Subtotal Produk (<?= rp($totalQty) ?>)</small></div>
					      			<div class="col-6 text-end"><small>Rp <?= rp($totalBayar) ?>,00</small></div>

					      			<div class="col-6 text-muted"><small>Biaya Pengiriman</small></div>
					      			<div class="col-6 text-end"><span class="small" id="SubtotalPengiriman">Rp -</span></div>

					      			<hr class="my-2" />

					      			<div class="col-6 text-success h5"><small>Total Pembayaran</small></div>
					      			<div class="col-6 text-end text-success h5"><span class="small" id="TotalPembayaran">Rp -</span></div>
					      		</div>
					      	</div>
					      	<div class="modal-footer">

					      		<input type="hidden" name="___in_qty_special_FamilyFood" value="<?= $totalQty ?>">

					      		<input type="hidden" name="___in_sub_harga_special_FamilyFood" value="<?= $totalBayar ?>">

					      		<input type="hidden" name="___in_total_berat_special_FamilyFood" value="<?= $totalBerat ?>">

					      		<input type="hidden" id="ongkir" name="ongkir">

					      		<input type="hidden" id="total_pembayaran" name="total_pembayaran">

					      		<input type="hidden" id="provinsi" name="provinsi">

					      		<input type="hidden" id="kab_kota" name="kab_kota">

					      		<input type="hidden" id="ekspedisi" name="ekspedisi">

					      		<!-- <input type="text" id="id_distrik" name="id_distrik"> -->

						        <button type="button" class="btn btn-sm btn-secondary fw-normal" data-bs-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
						        <button type="submit" name="_submit_special_FamilyFood_" class="btn btn-lg btn-success fw-normal"><i class="fas fa-shopping-cart"></i> BELI SEKARANG</button>
					      	</div>
					    </form>
				  	</div>
				</div>
	  		<?php endif ?>
	  	</div>
	</div>

	<div class="row justify-content-center my-4">
		<div class="col-11 border-dotted-5"></div>
	</div>
</div>