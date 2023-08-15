<!-- Content wrapper start -->
				<div class="content-wrapper">

					<!-- Row starts -->
					<div class="row gutters">
						<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class="card h-280">
								<div class="card-header">
									<div class="card-title">Jadwal Petugas</div>
								</div>
								<div class="card-body">
								
									<div class="table-responsive">
										<table class="table table-hover table-bordered">
											<thead>
												<tr>
													<th>#</th>
													<th>Nama</th>
													<th>Hari</th>
												</tr>
											</thead>
											<tbody>
												<?php 
												$no = 1;
												foreach($jadwalDas as $jad) : 
													$hariArr = explode(',', $jad['hari']);
												?>
												<tr>
													<td><?= $no++; ?></td>
													<td><?= $jad['nama'] ?></td>
													<td>
														<?php foreach ($hariArr as $hari) : ?>
											                <span class="badge badge-success"><?= $hari ?></span>
											            <?php endforeach; ?>
													</td>
												</tr>
											<?php endforeach ?>
											</tbody>
										</table>
									</div>



								</div>
							</div>
						</div>
						<div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card h-280 agenda-bg">
								<div class="card-body">
									<div class="agenda">
										<div class="todays-date">
											<h5>Data Patroli </h5>
										</div>
										<ul class="agenda-list">
											<?php foreach($patroli as $sh) : ?>
											<li>
												<span class="bullet">&nbsp;</span>
												<div class="details">
													<p>
														<b><?= $sh['waktu'] ?></b>

													</p>
													<small><?= $sh['ket'] ?></small>
													
												</div>
											</li>
											<?php endforeach; ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
						
						<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class="card h-280 agenda-bg">
								<div class="card-body">
									<div class="agenda">
										<div class="todays-date">
											<h5>Pergantian Shift </h5>
										</div>
										<ul class="agenda-list">
											<?php foreach($shift as $sh) : ?>
											<li>
												<span class="bullet">&nbsp;</span>
												<div class="details">
													<small><b><?= date('l, d-M-Y', strtotime($sh['tgl'])) ?></b></small>
													<p><b><?= $sh['nama'] ?></b> Melakukan pergantian shift dengan <b><?= $sh['nama_pengganti'] ?></b></p>
												</div>
											</li>
											<?php endforeach; ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Row end -->


				</div>
				<!-- Content wrapper end -->