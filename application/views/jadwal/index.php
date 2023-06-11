<div class="notif-datajadwal" data-notifdatajadwal="<?= $this->session->flashdata('notif'); ?>"></div>

				<div class="content-wrapper">

					<!-- Row starts -->
					<div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<!-- Row start -->
							<div class="table-container">
								<div class="t-header"><?= $title ?>
									<button class="btn btn-primary float-right mb-0" type="button" data-toggle="modal" data-target="#exampleModal">Buat Jadwal Patroli</button>
								</div>

								<div class="table-responsive">
									<table id="basicExample" class="table custom-table">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Petugas</th>
												<th>Hari</th>
												<th>Shift </th>
												<th>Option</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											$no = 1;
											foreach($jadwal as $jdw ) : ?>
											
											<tr>

													<td><?= $no++ ?></td>
													<td><?= $jdw['nama'] ?></td>
													<td><?= $jdw['hari'] ?></td>
													<td><?= $jdw['shift'] ?></td>
													<td>
														<a class="hapus-jadwal" href="<?= base_url("Jadwal/hapus_jadwal/") ?><?= $jdw['id_jadwal'] ?>"><button class="btn btn-danger "><span class="icon-trash-2"></span></button></a>
														<button class="btn btn-warning" data-toggle="modal" data-target="#exampleModalganti<?= $jdw['id_jadwal'] ?>"><span class="icon-compare_arrows"></span></button>
													

													</td>


											</tr>



<!-- Ganti shift -->
<div class="modal fade" id="exampleModalganti<?= $jdw['id_jadwal'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ganti Shift Petugas </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
        	<form action="<?= base_url('User/edit_petugas/') ?><?= $jdw['id_jadwal'] ?>" method="POST">
						<div class="form-group">
							<label>Nama Lengkap</label>
							<input type="text" value="<?= $jdw['nama'] ?>" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
							<?php echo form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
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
        <h5 class="modal-title" id="exampleModalLabel">Buat Jadwal Petugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
        	<form action="<?= base_url('Jadwal/submit_jadwal') ?>" method="POST">

			<div class="form-group">
				<label>Nama Petugas</label>
					<select class="form-control selectpicker" data-live-search="true" name="id_user">
						<option>-- Pilih Petugas --</option>
						<?php foreach($petugas as $ptg) : ?>
						<option value="<?= $ptg['id_user'] ?>"><?= $ptg['nama'] ?></option>
						<?php endforeach ?>
					</select>
			</div>

			<div class="form-group">
				<label>Hari</label>
					<select class="form-control selectpicker" data-live-search="true" name="hari">
						<option>-- Pilih Hari --</option>
						<option value="Senin" >Senin</option>
						<option value="Selasa">Selasa</option>
						<option value="Rabu">Rabu</option>
						<option value="Kamis">Kamis</option>
						<option value="Jumat">Jumat</option>
						<option value="Sabtu">Sabtu</option>
						<option value="Minggu">Minggu</option>
					</select>
			</div>

			<div class="form-group">
				<label>Shift</label>
					<select class="form-control selectpicker" data-live-search="true" name="shift">
						<option>-- Pilih Shift --</option>
						<option value="Pagi" >Pagi</option>
						<option value="Malam" >Malam</option>
					</select>
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