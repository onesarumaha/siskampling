<div class="notif-datawarga" data-notifdatawarga="<?= $this->session->flashdata('notif'); ?>"></div>

				<!-- Content wrapper start -->
				<div class="content-wrapper">

					<!-- Row starts -->
					<div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<!-- Row start -->
							<div class="table-container">
								<div class="t-header"><?= $title ?> 
									<button class="btn btn-primary float-right" type="button" data-toggle="modal" data-target="#exampleModal">Tambah Warga</button>
								</div>
								<div class="table-responsive">
									<table id="basicExample" class="table custom-table">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Lengkap</th>
												<th>Tempat / Tanggal Lahir</th>
												<th>Alamat</th>
												<th>Option</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											$no = 1;
											foreach($warga as $ptg) : ?>
											<tr>
												<td><?= $no++; ?></td>
												<td><?= $ptg['nama'] ?></td>
												<td><?= $ptg['tmpt_lahir'] ?>, <?= date("d-m-Y", strtotime( $ptg['tgl_lahir']))?></td>
												<td><?= $ptg['alamat'] ?></td>
												<td>
													<a class="hapus-warga" href="<?= base_url("User/hapus_warga/") ?><?= $ptg['id_user'] ?>"><button class="btn btn-danger "><span class="icon-trash-2"></span></button></a>
													<button class="btn btn-warning " data-toggle="modal" data-target="#exampleModal<?= $ptg['id_user'] ?>"><span class="icon-edit"></span></button>
												</td>
											</tr>


<!-- Edit Warga -->
<div class="modal fade" id="exampleModal<?= $ptg['id_user'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Warga </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
        	<form action="<?= base_url('User/edit_warga/') ?><?= $ptg['id_user'] ?>" method="POST">
        		<input type="hidden" name="id_user" value="<?= $ptg['id_user'] ?>">
			<div class="form-group">
				<label>Nama Lengkap</label>
				<input type="text" value="<?= $ptg['nama'] ?>" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
				<?php echo form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
			</div>

			<div class="form-group">
				<label>Tempat Lahir</label>
				<input type="text" class="form-control" id="tmpt_lahir" name="tmpt_lahir" placeholder="Tempat Lahir" value="<?= $ptg['tmpt_lahir'] ?>">
				<?php echo form_error('tmpt_lahir','<small class="text-danger pl-3">','</small>'); ?>
			</div>
			
			<div class="form-group">
				<label>Tanggal Lahir</label>
				<input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir" value="<?= $ptg['tgl_lahir'] ?>">
				<?php echo form_error('tgl_lahir','<small class="text-danger pl-3">','</small>'); ?>
			</div>

			<div class="form-group">
				<label>Username</label>
				<input type="text" value="<?= $ptg['username'] ?>" class="form-control" id="username" name="username" placeholder="Username">
				<?php echo form_error('username','<small class="text-danger pl-3">','</small>'); ?>
			</div>

			<div class="form-group">
				<label>Alamat</label>

				<textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat" rows="4"><?= $ptg['alamat'] ?></textarea>
				<?php echo form_error('alamat','<small class="text-danger pl-3">','</small>'); ?>
			</div>
			<input type="hidden" class="form-control" id="password" value="12345" name="password" placeholder="Username">
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
			

<!-- Tambah warga -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Warga</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
        	<form action="<?= base_url('User/submit_warga') ?>" method="POST">
			<div class="form-group">
				<label>Nama Lengkap</label>
				<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
				<?php echo form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
			</div>

			<div class="form-group">
				<label>Tempat Lahir</label>
				<input type="text" class="form-control" id="tmpt_lahir" name="tmpt_lahir" placeholder="Tempat Lahir">
				<?php echo form_error('tmpt_lahir','<small class="text-danger pl-3">','</small>'); ?>
			</div>
			
			<div class="form-group">
				<label>Tanggal Lahir</label>
				<input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir">
				<?php echo form_error('tgl_lahir','<small class="text-danger pl-3">','</small>'); ?>
			</div>

			<div class="form-group">
				<label>Username</label>
				<input type="text" class="form-control" id="username" name="username" placeholder="Username">
				<?php echo form_error('username','<small class="text-danger pl-3">','</small>'); ?>
			</div>

			<div class="form-group">
				<label>Alamat</label>

				<textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat" rows="4"></textarea>
				<?php echo form_error('alamat','<small class="text-danger pl-3">','</small>'); ?>
			</div>
			<input type="hidden" class="form-control" id="password" value="12345" name="password" placeholder="Username">
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