<!-- Container fluid start -->
		<div class="container-fluid">

			<!-- Navigation start -->
			<nav class="navbar navbar-expand-lg custom-navbar">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#WafiAdminNavbar" aria-controls="WafiAdminNavbar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i></i>
						<i></i>
						<i></i>
					</span>
				</button>
				<div class="collapse navbar-collapse" id="WafiAdminNavbar">
					<ul class="navbar-nav">

						<li class="nav-item">
							<a class="nav-link active-page " href="<?= base_url('Dashboard') ?>" aria-haspopup="true" aria-expanded="false">
								<i class="icon-devices_other nav-icon"></i>
								Dashboard
							</a>
							
						</li>

					

						<?php if($this->session->userdata('akses') == 'Admin'):  ?>
						<li class=" nav-item dropdown">
							<a class=" nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-package nav-icon"></i>
								Data Master
							</a>
							<ul class="dropdown-menu" aria-labelledby="appsDropdown">
								<li>
									<a class="dropdown-item" href="<?= base_url('User/petugas') ?>">Data Petugas</a>
								</li>
								
							</ul>
						</li>
						
						<li class=" nav-item dropdown">
							<a class=" nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-book-open nav-icon"></i>
								Jadwal
							</a>
							<ul class="dropdown-menu" aria-labelledby="appsDropdown">
								<li>
									<a class="dropdown-item" href="<?= base_url('Jadwal') ?>">Jadwal Patroli</a>
								</li>
								<li>
									<a class="dropdown-item" href="<?= base_url('Jadwal/ganti_shift') ?>">Pergantian Shift</a>
								</li>
								
							</ul>
						</li>

						

						<li class=" nav-item dropdown">
							<a class=" nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-package nav-icon"></i>
								Data Keuangan
							</a>
							<ul class="dropdown-menu" aria-labelledby="appsDropdown">
								<li>
									<a class="dropdown-item" href="<?= base_url('Keuangan') ?>">Pemasukan</a>
								</li>
								<li>
									<a class="dropdown-item" href="<?= base_url('Keuangan/pengeluaran') ?>">Pengeluaran</a>
								</li>
								
							</ul>
						</li>

					<?php endif ?>

					<?php if($this->session->userdata('akses') == 'Kepala Kelurahan'):  ?>
						

						<li class=" nav-item dropdown">
							<a class=" nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-package nav-icon"></i>
								Data Keuangan
							</a>
							<ul class="dropdown-menu" aria-labelledby="appsDropdown">
								<li>
									<a class="dropdown-item" href="<?= base_url('Keuangan/approve') ?>">Approve</a>
								</li>
							</ul>
						</li>

						<li class="nav-item ">
							<a class="nav-link" href="<?= base_url('Keuangan/laporan') ?>" >
								<i class="icon-book-open nav-icon"></i>
								Laporan
							</a>
							
						</li>

					<?php endif ?>

					<?php if($this->session->userdata('akses') == 'Petugas'):  ?>

						<li class="nav-item ">
							<a class="nav-link" href="<?= base_url('Data_patroli/') ?>" >
								<i class="icon-book-open nav-icon"></i>
								Data Patroli
							</a>
						</li>

						<li class=" nav-item dropdown">
							<a class=" nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-package nav-icon"></i>
								Shift
							</a>
							<ul class="dropdown-menu" aria-labelledby="appsDropdown">
								<li>
									<a class="dropdown-item" href="<?= base_url('Jadwal/ganti_shift') ?>">Pergantian Shift</a>
								</li>

								<li>
									<a class="dropdown-item" href="<?= base_url('Jadwal/approve_shift') ?>">Approve</a>
								</li>
								
							</ul>
						</li>

						

					<?php endif ?>
						
						
					</ul>
				</div>
			</nav>