<div class="notif-gantishift" data-notifgantishift="<?= $this->session->flashdata('notif'); ?>"></div>

				<div class="content-wrapper">

					<!-- Row starts -->
					<div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<!-- Row start -->
							<div class="table-container">

								<div class="table-responsive">
									<table id="basicExample" class="table custom-table">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Pemohon</th>
												<th>Tanggal Izin </th>
												<th>Alasan</th>
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
													<td><?= date('l, d/m/Y', strtotime($jdw['tgl'])) ?></td>
													<td><?= $jdw['alasan'] ?></td>
													
													<td>
														
														<button class="btn btn-success" data-toggle="modal" data-target="#customModalTwo<?= $jdw['id_ganti_shift'] ?>"><span class="icon-check"></span></button>
													</td>
											</tr>


									<!-- Approve shift -->
									<div class="modal fade" id="customModalTwo<?= $jdw['id_ganti_shift'] ?>" tabindex="-1" role="dialog" aria-labelledby="customModalTwoLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="customModalTwoLabel">Permohonan Pergantian Shift</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
														
												</div>
												<div class="modal-footer custom">
													
													<div class="left-side">
														<a href="<?= base_url('Jadwal/tolak_permohonan/') ?><?= $jdw['id_ganti_shift'] ?>"><button type="button" class="btn btn-link danger">Tolak</button></a>
													</div>
													<div class="divider"></div>
													<div class="right-side">
														<a href="<?= base_url('Jadwal/approve_permohonan/') ?><?= $jdw['id_ganti_shift'] ?>"><button type="button" class="btn btn-link success">Approve</button></a>
													</div>
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
			
