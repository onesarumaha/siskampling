
		<!-- Header start -->
		<header class="header">
			<div class="logo-wrapper">
				<a href="index.html" class="logo">
					<img src="<?= base_url('assets/frontend/') ?>img/logo.png" alt="Wafi Admin Dashboard" />
				</a>
				<a href="#" class="quick-links-btn" data-toggle="tooltip" data-placement="right" title="" data-original-title="Quick Links">
					<i class="icon-menu1"></i>
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
						<a href="#" id="notifications" data-toggle="dropdown" aria-haspopup="true">
							<i class="icon-box"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right lrg" aria-labelledby="notifications">
							<div class="dropdown-menu-header">
								Tasks (05)
							</div>	
							<ul class="header-tasks">
								<li>
									<p>#48 - Dashboard UI<span>90%</span></p>
									<div class="progress">
										<div class="progress-bar bg-primary" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
											<span class="sr-only">90% Complete (success)</span>
										</div>
									</div>
								</li>
								<li>
									<p>#95 - Alignment Fix<span>60%</span></p>
									<div class="progress">
										<div class="progress-bar bg-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
											<span class="sr-only">60% Complete (success)</span>
										</div>
									</div>
								</li>
								<li>
									<p>#7 - Broken Button<span>40%</span></p>
									<div class="progress">
										<div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
											<span class="sr-only">40% Complete (success)</span>
										</div>
									</div>
								</li>
							</ul>
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
		<!-- Header end -->

		
		<!-- Screen overlay start -->
		<div class="screen-overlay"></div>
		<!-- Screen overlay end -->

		<!-- Quicklinks box start -->
		<div class="quick-links-box">
			<div class="quick-links-header">
				Pengaturan
				<a href="#" class="quick-links-box-close">
					<i class="icon-circle-with-cross"></i>
				</a>
			</div>

			<div class="quick-links-wrapper">
				<div class="fullHeight">
					<div class="quick-links-body">
						<div class="container-fluid p-0">
							<div class="row less-gutters">
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
									<a href="user-profile.html" class="quick-tile">
										<i class="icon-account_circle"></i>
										Profile
									</a>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
									<a href="contacts.html" class="quick-tile">
										<i class="icon-phone"></i>
										Contacts
									</a>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
									<a href="account-settings.html" class="quick-tile">
										<i class="icon-settings1"></i>
										Settings
									</a>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
									<a href="<?= base_url('Auth/logout') ?>" class="quick-tile">
										<i class="icon-lock2"></i>
										Logout
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Quicklinks box end -->
