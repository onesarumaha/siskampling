
<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="Responsive Bootstrap4 Dashboard Template">
		<meta name="author" content="ParkerThemes">
		<link rel="shortcut icon" href="<?= base_url('assets/frontend/') ?>img/fav.png" />

		<!-- Title -->
		<title><?= $title ?></title>
		

		<!-- *************
			************ Common Css Files *************
		************ -->
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?= base_url('assets/frontend/') ?>css/bootstrap.min.css" />

		<!-- Main CSS -->
		<link rel="stylesheet" href="<?= base_url('assets/frontend/') ?>css/main.css" />

	</head>

	<body class="authentication">

		<!-- Container start -->
		<div class="container">
			
			<form method="POST" action="<?= base_url('Auth/submit_daftar') ?>">
				<div class="row justify-content-md-center">
					<div class="col-xl-5 col-lg-6 col-md-6 col-sm-12">
						<div class="login-screen">
							<div class="login-box">
								<a href="#" class="login-logo">
									<img src="<?= base_url('assets/frontend/') ?>img/logo-dark.png" alt="Wafi Admin Dashboard" />
								</a>
								<h5>DAFTAR</h5>
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" />
									<?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
								</div>
								
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Username" / name="username">
									<?= form_error('username','<small class="text-danger pl-3">','</small>'); ?>
								</div>
								<div class="form-group">
									<div class="input-group">
										<input type="password" name="password" class="form-control" placeholder="Password" />
									
										<input type="password" name="password2" class="form-control" placeholder="Conform Password">

									</div>
									<?= form_error('password','<small class="text-danger pl-3">','</small>'); ?><br>
									<?= form_error('password2','<small class="text-danger pl-3">','</small>'); ?>
									<!-- <small id="passwordHelpInline" class="text-muted">
										Password must be 8-20 characters long.
									</small> -->
								</div>
								<div class="actions mb-4">
									
									<button type="submit" class="btn btn-primary">Daftar</button>
								</div>
								<hr>
								<div class="m-0">
									<span class="additional-link">Sudah punya akun ? <a href="<?= base_url('auth') ?>" class="btn btn-dark">Login</a></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>

		</div>
		<!-- Container end -->

	</body>
</html>