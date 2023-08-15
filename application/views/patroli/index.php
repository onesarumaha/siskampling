<div class="notif-datapatroli" data-notifdatapatroli="<?= $this->session->flashdata('notif'); ?>"></div>

				<div class="content-wrapper">

					<!-- Row starts -->
					<div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<!-- Row start -->
							<div class="table-container">
								<div class="t-header"><?= $title ?>
									<button class="btn btn-primary float-right mb-0" type="button" data-toggle="modal" data-target="#exampleModal">Tambah Patroli</button>
								</div>

								<div class="table-responsive">
									<table id="basicExample" class="table custom-table">
										<thead>
											<tr>
												<th>No</th>
												<th>Tanggal / Waktu</th>
												<th>Petugas Patroli</th>
												<th>Keterangan</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											$no = 1;
											foreach($patroli as $iu ) : ?>
											
											<tr>

													<td><?= $no++ ?></td>
													<td><?= date("d/m/Y", strtotime( $iu['tgl']))?> <?= $iu['waktu'] ?></td>
													<td><?= $iu['nama'] ?></td>
													<td><?= $iu['ket'] ?></td>
													
													<td>
														<a class="hapus-patroli" href="<?= base_url("Data_patroli/hapus_patroli/") ?><?= $iu['id_patroli'] ?>"><button class="btn btn-danger "><span class="icon-trash-2"></span></button></a>
													
														<button class="btn btn-warning" data-toggle="modal" data-target="#exampleModal<?= $iu['id_patroli'] ?>"><span class="icon-edit"></span></button>

														
													</td>
											</tr>


<!-- Buat Jadwal Petugas -->
<div class="modal fade" id="exampleModal<?= $iu['id_patroli'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Patroli</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
        	<form action="<?= base_url('Data_patroli/edit_patroli') ?>" method="POST" enctype="multipart/form-data">
        		<input type="hidden" name="id_patroli" value="<?= $iu['id_patroli'] ?>">

						<div class="form-group">
							<?php if($this->session->userdata('akses') == 'Admin'):  ?>

							<label>Nama Petugas</label>
								<select class="form-control" data-live-search="true" name="id_user" required>
									<?php foreach($warga as $ptg) : ?>
									<option value="<?= $ptg['id_user'] ?>"><?= $ptg['nama'] ?></option>
									<?php endforeach ?>
								</select>
							<?php endif ?>
							<?php if($this->session->userdata('akses') == 'Petugas'):  ?>

								<input type="hidden" class="form-control" value="<?= $this->session->userdata('id_user') ?>" id="id_user" name="id_user" >
							<?php endif ?>
						</div>


						<div class="form-group">
							<label>Waktu</label>
								<input type="time" class="form-control" value="<?= $iu['waktu'] ?>" id="waktu" name="waktu" required>
								<?= form_error('waktu','<small class="text-danger pl-3">','</small>'); ?>
						</div>


						<div class="form-group">
							<label>Keterangan</label>
							<textarea class="form-control" name="ket"><?= $iu['ket'] ?></textarea>
								<?= form_error('ket','<small class="text-danger pl-3">','</small>'); ?>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Patroli</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
        	<form action="<?= base_url('Data_patroli/submit_patroli') ?>" method="POST" enctype="multipart/form-data">

						<div class="form-group">
							<?php if($this->session->userdata('akses') == 'Admin'):  ?>

								<label>Nama Petugas</label>
									<select class="form-control selectpicker" data-live-search="true" name="id_user" required>
										<option>-- Pilih Petugas --</option>
										<?php foreach($warga as $ptg) : ?>
										<option value="<?= $ptg['id_user'] ?>"><?= $ptg['nama'] ?></option>
										<?php endforeach ?>
									</select>
								<?php endif ?>
							<?php if($this->session->userdata('akses') == 'Petugas'):  ?>

								<input type="hidden" class="form-control" value="<?= $this->session->userdata('id_user') ?>" id="id_user" name="id_user" >
							<?php endif ?>
						</div>


						<div class="form-group">
							<label>Waktu</label>
								<input type="time" class="form-control" id="waktu" name="waktu" required>
								<?= form_error('waktu','<small class="text-danger pl-3">','</small>'); ?>
						</div>


						<div class="form-group">
							<label>Keterangan</label>
							<textarea class="form-control" name="ket"></textarea>
								<?= form_error('ket','<small class="text-danger pl-3">','</small>'); ?>
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