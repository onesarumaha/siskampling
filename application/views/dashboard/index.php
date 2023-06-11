
				<!-- Content wrapper start -->
				<div class="content-wrapper">

					<!-- Row starts -->
					<div class="row gutters">
						<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
							<!-- Row start -->
							<div class="row gutters">
								<div class="col-xl-12 col-lg-4 col-md-4 col-sm-4 col-12">
									<div class="info-tiles">
										<div class="stats-detail">
											<h3>Jadwal Petugas</h3>
										</div>
									</div>
								</div>
								<div class="col-xl-6 col-lg-4 col-md-4 col-sm-4 col-12">
									<div class="info-tiles">
										<div class="info-icon">
											<i class="icon-account_circle"></i>
										</div>
										<div class="stats-detail">
											<h3>Senin</h3>
											<?php 
											$no = 1;
											foreach($senin as $sen ): ?>
											<p class="mb-2 "> <?= $no++ ?>. <?= $sen['nama'] ?></p>
										<?php endforeach ?>
										</div>
									</div>
								</div>
								<div class="col-xl-6 col-lg-4 col-md-4 col-sm-4 col-12">
									<div class="info-tiles">
										<div class="info-icon">
											<i class="icon-account_circle"></i>
										</div>
										<div class="stats-detail">
											<h3>Selasa</h3>
											<?php 
											$no = 1;
											foreach($selasa as $se ): ?>
											<p class="mb-2"> <?= $no++ ?>. <?= $sen['nama'] ?></p>
										<?php endforeach ?>
										</div>
									</div>
								</div>
								<div class="col-xl-6 col-lg-4 col-md-4 col-sm-4 col-12">
									<div class="info-tiles">
										<div class="info-icon">
											<i class="icon-account_circle"></i>
										</div>
										<div class="stats-detail">
											<h3>Rabu</h3>
											<?php 
											$no = 1;
											foreach($rabu as $ra ): ?>
											<p class="mb-2"> <?= $no++ ?>. <?= $ra['nama'] ?></p>
										<?php endforeach ?>
										</div>
									</div>
								</div>
								<div class="col-xl-6 col-lg-4 col-md-4 col-sm-4 col-12">
									<div class="info-tiles">
										<div class="info-icon">
											<i class="icon-account_circle"></i>
										</div>
										<div class="stats-detail">
											<h3>Kamis</h3>
											<?php 
											$no = 1;
											foreach($kamis as $ra ): ?>
											<p class="mb-2"> <?= $no++ ?>. <?= $ra['nama'] ?></p>
										<?php endforeach ?>
										</div>
									</div>
								</div>
								<div class="col-xl-6 col-lg-4 col-md-4 col-sm-4 col-12">
									<div class="info-tiles">
										<div class="info-icon">
											<i class="icon-account_circle"></i>
										</div>
										<div class="stats-detail">
											<h3>Jumat</h3>
											<?php 
											$no = 1;
											foreach($jumat as $ra ): ?>
											<p class="mb-2"> <?= $no++ ?>. <?= $ra['nama'] ?></p>
										<?php endforeach ?>
										</div>
									</div>
								</div>
								<div class="col-xl-6 col-lg-4 col-md-4 col-sm-4 col-12">
									<div class="info-tiles">
										<div class="info-icon">
											<i class="icon-account_circle"></i>
										</div>
										<div class="stats-detail">
											<h3>Sabtu</h3>
											<?php 
											$no = 1;
											foreach($sabtu as $ra ): ?>
											<p class="mb-2"> <?= $no++ ?>. <?= $ra['nama'] ?></p>
										<?php endforeach ?>
										</div>
									</div>
								</div>
								<div class="col-xl-6 col-lg-4 col-md-4 col-sm-4 col-12">
									<div class="info-tiles">
										<div class="info-icon">
											<i class="icon-account_circle"></i>
										</div>
										<div class="stats-detail">
											<h3>Minggu</h3>
											<?php 
											$no = 1;
											foreach($minggu as $ra ): ?>
											<p class="mb-2"> <?= $no++ ?>. <?= $ra['nama'] ?></p>
										<?php endforeach ?>
										</div>
									</div>
								</div>
							</div>
							<!-- Row ends -->
						</div>
						
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
							<div class="card h-280 agenda-bg">
								<div class="card-body">
									<div class="agenda">
										<div class="todays-date">
											<h5>Berita - <span class="date" id="todays-date"></span></h5>
										</div>
										<ul class="agenda-list">
											<li>
												<span class="bullet">&nbsp;</span>
												<div class="details">
													<p>Call with Willams</p>
													<small>09:00</small>
												</div>
											</li>
											<li>
												<span class="bullet">&nbsp;</span>
												<div class="details">
													<p>Book a Hotel for James</p>
													<small>09:30</small>
												</div>
											</li>
											<li>
												<span class="bullet">&nbsp;</span>
												<div class="details">
													<p>Book a Flight to California</p>
													<small>10:00</small>
												</div>
											</li>
											<li>
												<span class="bullet secondary">&nbsp;</span>
												<div class="details">
													<p>Call with Willams</p>
													<small>09:00</small>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Row end -->


				</div>
				<!-- Content wrapper end -->

			</div>
			