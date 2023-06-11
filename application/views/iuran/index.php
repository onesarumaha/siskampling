<div class="notif-dataiuran" data-notifdataiuran="<?= $this->session->flashdata('notif'); ?>"></div>

				<div class="content-wrapper">

					<!-- Row starts -->
					<div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<!-- Row start -->
							<div class="table-container">
								<div class="t-header"><?= $title ?>
									<button class="btn btn-primary float-right mb-0" type="button" data-toggle="modal" data-target="#exampleModal">+ Iuran</button>
								</div>

								<div class="table-responsive">
									<table id="basicExample" class="table custom-table">
										<thead>
											<tr>
												<th>No</th>
												<th>No Tagihan</th>
												<th>Nama Warga</th>
												<th>Tanggal</th>
												<th>Jenis Iuran </th>
												<th>Nominal</th>
												<th>Metode Pembayaran</th>
												<th>Option</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											$no = 1;
											foreach($iuran as $iu ) : ?>
											
											<tr>

													<td><?= $no++ ?></td>
													<td><?= $iu['no_tagihan'] ?></td>
													<td><?= $iu['nama'] ?></td>
													<td><?= $iu['tgl'] ?></td>
													<td><?= $iu['jenis_iuran'] ?></td>
													<td>Rp. <?= number_format($iu['nominal']) ?></td>
													<td><?= $iu['metode_byr'] ?></td>
													
													<td>
														<a class="hapus-iuran" href="<?= base_url("Iuran/hapus_iuran/") ?><?= $iu['id_iuran'] ?>"><button class="btn btn-danger "><span class="icon-trash-2"></span></button></a>
													
														<button class="btn btn-warning" data-toggle="modal" data-target="#exampleModal<?= $iu['id_iuran'] ?>"><span class="icon-edit"></span></button>

														<button class="btn btn-success" data-toggle="modal" data-target="#exampleModalbukti<?= $iu['id_iuran'] ?>"><span class="icon-eye"></span></button>
													</td>
											</tr>



<!-- Edit Data Iuran -->
<div class="modal fade" id="exampleModal<?= $iu['id_iuran'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Iuran </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
        	<form action="<?= base_url('Iuran/edit_iuran/') ?><?= $iu['id_iuran'] ?>" method="POST" enctype="multipart/form-data">
        		<input type="hidden" name="id_iuran" value="<?= $iu['id_iuran'] ?>">
						
						<div class="form-group">
							<label>Nama Warga</label>
								<select class="form-control" name="id_user" required>
									<option value="<?= $iu['id_user'] ?>"><?= $iu['nama'] ?></option>
									<?php foreach($warga as $ptg) : ?>
									<option value="<?= $ptg['id_user'] ?>"><?= $ptg['nama'] ?></option>
									<?php endforeach ?>
								</select>
						</div>

						<div class="form-group">
							<label>Tanggal Bayar</label>
								<input type="date" value="<?= $iu['tgl'] ?>" class="form-control" id="tgl" name="tgl" required>
								<?= form_error('tgl','<small class="text-danger pl-3">','</small>'); ?>
						</div>

						<div class="form-group">
							<label>Jenis Iuran</label>
								<select class="form-control" name="jenis_iuran" required>
									<option value="<?= $iu['jenis_iuran'] ?>"><?= $iu['jenis_iuran'] ?></option>
									<option value="Kebersihan">Kebersihan</option>
									<option value="Keamanan">Keamanan</option>
									<option value="Santunan">Santunan</option>
									<option value="Lainnya">Lainnya</option>
								</select>
						</div>

						<div class="form-group">
							<label>Nominal</label>
								<input type="number" value="<?= $iu['nominal'] ?>" class="form-control" id="nominal" name="nominal" required>
								<?= form_error('nominal','<small class="text-danger pl-3">','</small>'); ?>
						</div>

						<div class="form-group">
							<label>Metode Pembayaran</label>
								<select class="form-control" name="metode_byr" required>
									<option value="<?= $iu['metode_byr'] ?>"><?= $iu['metode_byr'] ?></option>
									<option value="Tunai">Tunai</option>
									<option value="Transfer">Transfer</option>
								</select>
						</div>

						<div class="form-group">
							<label>Bukti Bayar</label>
								<input type="file" value="<?= $iu['bukti_byr'] ?>" class="form-control" id="bukti_byr" name="bukti_byr" required>
								<?= form_error('bukti_byr','<small class="text-danger pl-3">','</small>'); ?>
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
<div class="modal fade" id="exampleModalbukti<?= $iu['id_iuran'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran  </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
			      <form>

						<div class="form-group">
								<img src="<?= base_url() . '/assets/bukti_bayar/' . $iu['bukti_byr'] ?>" class="img-fluid rounded avatar-70 mr-3" alt="image" style="width: 220px; height: 200px;">
						</div>
					</div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			        <button type="submit" class="btn btn-primary">Approve</button>

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
        <h5 class="modal-title" id="exampleModalLabel">Buat Jadwal Petugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
        	<form action="<?= base_url('Iuran/submit_iuran') ?>" method="POST" enctype="multipart/form-data">

						<div class="form-group">
							<label>Nama Warga</label>
								<select class="form-control selectpicker" data-live-search="true" name="id_user" required>
									<option>-- Pilih Warga --</option>
									<?php foreach($warga as $ptg) : ?>
									<option value="<?= $ptg['id_user'] ?>"><?= $ptg['nama'] ?></option>
									<?php endforeach ?>
								</select>
						</div>

						<div class="form-group">
							<label>Tanggal Bayar</label>
								<input type="date" class="form-control" id="tgl" name="tgl" required>
								<?= form_error('tgl','<small class="text-danger pl-3">','</small>'); ?>
						</div>

						<div class="form-group">
							<label>Jenis Iuran</label>
								<select class="form-control selectpicker" data-live-search="true" name="jenis_iuran" required>
									<option>-- Pilih Jenis Iuran --</option>
									<option value="Kebersihan">Kebersihan</option>
									<option value="Keamanan">Keamanan</option>
									<option value="Santunan">Santunan</option>
									<option value="Lainnya">Lainnya</option>
								</select>
						</div>

						<div class="form-group">
							<label>Nominal</label>
								<input type="number" class="form-control" id="nominal" name="nominal" required>
								<?= form_error('nominal','<small class="text-danger pl-3">','</small>'); ?>
						</div>

						<div class="form-group">
							<label>Metode Pembayaran</label>
								<select class="form-control selectpicker" data-live-search="true" name="metode_byr" required>
									<option>-- Pilih Metode Pembayaran --</option>
									<option value="Tunai">Tunai</option>
									<option value="Transfer">Transfer</option>
								</select>
						</div>

						<div class="form-group">
							<label>Bukti Bayar</label>
								<input type="file" class="form-control" id="bukti_byr" name="bukti_byr" required>
								<?= form_error('bukti_byr','<small class="text-danger pl-3">','</small>'); ?>
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