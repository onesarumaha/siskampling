<div class="notif-datakeluar" data-notifdatakeluar="<?= $this->session->flashdata('notif'); ?>"></div>

				<div class="content-wrapper">

					<!-- Row starts -->
					<div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<!-- Row start -->
							<div class="table-container">
								<div class="t-header"><?= $title ?>
									<button class="btn btn-primary float-right mb-0" type="button" data-toggle="modal" data-target="#exampleModal">+ Pengeluaran</button>
								</div>

								<div class="table-responsive">
									<table id="basicExample" class="table custom-table">
										<thead>
											<tr>
												<th>No</th>
												<th>No Transaksi</th>
												<th>Tanggal</th>
												<th>Jenis Transaksi </th>
												<th>Kategori Transaksi </th>
												<th>Nominal</th>
												<th>Status</th>
												<th>Keterangan</th>
												<th>Option</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											$no = 1;
											foreach($keluar as $iu ) : ?>
											
											<tr>

													<td><?= $no++ ?></td>
													<td><?= $iu['no_transaksi'] ?></td>
													<td><?= $iu['tgl'] ?></td>
													<td><?= $iu['jns_trans'] ?></td>
													<td><?= $iu['kategori_trans'] ?></td>
													<td>Rp. <?= number_format($iu['nominal']) ?></td>
													<td>
														<?php if($iu['status'] == 'Approve') {
																echo '<i class="icon-check_circle"></i> ' . $iu['status'];

														}elseif($iu['status'] == 'Reject'){
																echo '<i class="icon-circle-with-cross"></i> ' . $iu['status'];
														}elseif($iu['status'] == 'Menunggu') {
																echo '<i class="icon-info1"></i> ' . $iu['status'];
														} ?>
																													
														</td>
													<td><?= $iu['ket'] ?></td>
													
													<td>
														<a class="hapus-keluar" href="<?= base_url("Keuangan/hapus_keluar/") ?><?= $iu['id_keuangan'] ?>"><button class="btn btn-danger "><span class="icon-trash-2"></span></button></a>
													
														<button class="btn btn-warning" data-toggle="modal" data-target="#exampleModal<?= $iu['id_keuangan'] ?>"><span class="icon-edit"></span></button>

														<button class="btn btn-success" data-toggle="modal" data-target="#exampleModalbukti<?= $iu['id_keuangan'] ?>"><span class="icon-eye"></span></button>
													</td>
											</tr>



<!-- Edit Data Iuran -->
<div class="modal fade" id="exampleModal<?= $iu['id_keuangan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Pengeluaran </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
        	<form action="<?= base_url('Keuangan/submit_editpengeluaran') ?>" method="POST" enctype="multipart/form-data">
        		<input type="hidden" name="id_keuangan" value="<?= $iu['id_keuangan']  ?>">
        		<div class="form-group">
							<label>Nominal</label>
								<input type="number" class="form-control" id="nominal" name="nominal" value="<?= $iu['nominal'] ?>" required>
								<?= form_error('nominal','<small class="text-danger pl-3">','</small>'); ?>
						</div>
						
						<div class="form-group">
							<label>Kategori Transaksi</label>
								<select class="form-control " name="kategori_trans">
									<option value="<?=$iu['kategori_trans'] ?>"><?=$iu['kategori_trans'] ?></option>
									<option value="Kebersihan">Kebersihan</option>
									<option value="Keamanan">Keamanan</option>
									<option value="Santunan">Santunan</option>
									<option value="Lainnya">Lainnya</option>
								</select>
						</div>

						<div class="form-group">
							<label>Keterangan (Optional)</label>
								<textarea class="form-control" id="ket" name="ket"><?= $iu['ket'] ?></textarea>
								<?= form_error('ket','<small class="text-danger pl-3">','</small>'); ?>
						</div>

						<div class="form-group">
							<label>Bukti </label>
								<input type="file" class="form-control" id="bukti" name="bukti" required>
								<?= form_error('bukti','<small class="text-danger pl-3">','</small>'); ?>
						</div>
					</div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			        <button type="submit" class="btn btn-primary">Simpan</button>
			      </div>
			      </form>
			    </div>
			  </div>
			</div>



<!-- Edit Data bukti -->
<div class="modal fade" id="exampleModalbukti<?= $iu['id_keuangan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bukti  </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
			      <div class="form-group">
								<img src="<?= base_url() . '/assets/bukti_bayar/' . $iu['bukti'] ?>" class="img-fluid rounded avatar-70 mr-3" alt="image" style="width: 220px; height: 200px;">
						</div>
				</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <!-- <button type="submit" class="btn btn-primary">Approve</button> -->

      </div>
      </form>
      </div>

    </div>
  </div>
</div>


										<?php endforeach ?>

										</tbody>
									</table>
								</div>
							</div>
							<!-- Row ends -->
						</div>
						
						
					</div>
					<!-- Row end -->


				</div>
				<!-- Content wrapper end -->

			</div>
			

<!-- Buat Jadwal Petugas -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pengeluaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
        	<form action="<?= base_url('Keuangan/submit_pengeluaran') ?>" method="POST" enctype="multipart/form-data">

        		<div class="form-group">
							<label>Nominal</label>
								<input type="number" class="form-control" id="nominal" name="nominal" required>
								<?= form_error('nominal','<small class="text-danger pl-3">','</small>'); ?>
						</div>
						
						<div class="form-group">
							<label>Kategori Transaksi</label>
								<select class="form-control selectpicker" data-live-search="true" name="kategori_trans">
									<option>-- Pilih Kategori --</option>
									<option value="Kebersihan">Kebersihan</option>
									<option value="Keamanan">Keamanan</option>
									<option value="Santunan">Santunan</option>
									<option value="Lainnya">Lainnya</option>
								</select>
						</div>

						<div class="form-group">
							<label>Keterangan (Optional)</label>
								<textarea class="form-control" id="ket" name="ket"></textarea>
								<?= form_error('ket','<small class="text-danger pl-3">','</small>'); ?>
						</div>

						<div class="form-group">
							<label>Bukti </label>
								<input type="file" class="form-control" id="bukti" name="bukti" required>
								<?= form_error('bukti','<small class="text-danger pl-3">','</small>'); ?>
						</div>


					</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
	        <button type="submit" class="btn btn-primary">Simpan</button>
	      </div>
	      </form>
	    </div>
	  </div>
	</div>