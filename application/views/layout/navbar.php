<header class="header">
			<div class="logo-wrapper">
				<a href="#" class="logo">
					<img src="<?= base_url('assets/frontend/') ?>img/logo.png" alt="Wafi Admin Dashboard" />
				</a>
				
			</div>
			<div class="header-items">
				<!-- Custom search start -->
				<div class="custom-search">
					<input type="text" class="search-query" placeholder="Search here ...">
					<i class="icon-search1"></i>
				</div>
				<!-- Custom search end -->

				<!-- Header actions start -->
				<ul class="header-actions">
					
					<li class="dropdown">
						<a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
							<span class="user-name">Aktor</span>
							<span class="avatar"><img src="<?= base_url('assets/frontend/') ?>img/219988.png" alt="Admin Template" /><span class="status busy"></span></span>
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
							<div class="header-profile-actions">
								<div class="header-user-profile">
									<div class="header-user">
										<img src="<?= base_url('assets/frontend/') ?>img/219988.png" alt="Admin Template" />
									</div>
									<h5><?= $this->session->userdata('nama')?></h5>
									<p><?= $this->session->userdata('akses')?></p>
								</div>
								<!-- <a href="#"><i class="icon-user1"></i> My Profile</a>
								<a href="#"><i class="icon-settings1"></i> Account Settings</a> -->
								<a href="<?= base_url('auth/logout') ?>"><i class="icon-log-out1"></i> Logout</a>
							</div>
						</div>
					</li>
					<li>
						<a href="#" class="quick-settings-btn" data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick Settings">
							<i class="icon-list"></i>
						</a>
					</li>
				</ul>						
				<!-- Header actions end -->
			</div>
		</header>