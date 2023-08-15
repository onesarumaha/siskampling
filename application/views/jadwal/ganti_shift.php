<div class="notif-gantishift" data-notifgantishift="<?= $this->session->flashdata('notif'); ?>"></div>

				<div class="content-wrapper">

					<!-- Row starts -->
					<div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<!-- Row start -->
							<div class="table-container">
								<!-- <div class="t-header"><?= $title ?>
									<button class="btn btn-primary float-right mb-0" type="button" data-toggle="modal" data-target="#exampleModal"><span class="icon-swap"></span> Pengajuan</button>
								</div> -->

								<div class="table-responsive">
									<table id="basicExample" class="table custom-table">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Petugas</th>
												<th>Option</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											$no = 1;
											foreach($petugas as $jdw ) : ?>
											
											<tr>

													<td><?= $no++ ?></td>
													<td><?= $jdw['nama'] ?></td>
													
													<td>
														
														<button class="btn btn-warning" data-toggle="modal" data-target="#exampleModal<?= $jdw['id_user'] ?>"><span class="icon-cycle"></span></button>
													

													</td>


											</tr>


								<!-- Ganti Shift -->
								<div class="modal fade" id="exampleModal<?= $jdw['id_user'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLabel">Pengajuan Ganti Shift Dengan <?= $jdw['nama'] ?></h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								        <div class="card-body">
								        	<form action="<?= base_url('Jadwal/submit_pengajuan_pergantian_shift') ?>" method="POST">
								    		<div class="form-group">
												<label>Tanggal Izin</label>
													<input type="date" name="tgl" class="form-control">
													<?= form_error('tgl','<small class="text-danger pl-3">','</small>'); ?>
											</div>
											<div class="form-group">
													<input type="hidden" name="nama_pemohon" value="<?= $this->session->userdata('id_user') ?>" class="form-control">
													<input type="hidden" name="pemohon" value="<?= $this->session->userdata('username') ?>" class="form-control">
													<input type="hidden" name="email" value="<?= $jdw['email'] ?>" class="form-control">
													<input type="hidden" name="nama_pengganti" value="<?= $jdw['username'] ?>" class="form-control">
											</div>
											<div class="form-group">
												<label>Alasan</label>
													<textarea class="form-control" name="alasan"></textarea>
											</div>

										</div>
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
								        <button type="submit" class="btn btn-primary">Ajukan</button>
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
			
