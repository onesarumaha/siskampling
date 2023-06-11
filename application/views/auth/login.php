
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

		<!-- Master CSS -->
		<link rel="stylesheet" href="<?= base_url('assets/frontend/') ?>css/main.css" />

	</head>

	<body class="authentication">

		<!-- Container start -->
		<div class="container">
			
			<form method="POST" action="<?= base_url("Auth") ?>">
				<div class="row justify-content-md-center">
					<div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
						<div class="login-screen">
							<div class="login-box">
								<a href="#" class="login-logo">
									<img src="<?= base_url('assets/frontend/') ?>img/logo-dark.png" alt="Wafi Admin Dashboard" />
								</a>
								<h5>LOGIN</h5>
                               <?= $this->session->flashdata('notif'); ?>

								<div class="form-group">
									<input type="text" class="form-control" placeholder="Username" / name="username">
									<?= form_error('username','<small class="text-danger pl-3">','</small>'); ?>

								</div>
								<div class="form-group">
									<input type="password" class="form-control" placeholder="Password" / name="password">
									<?= form_error('password','<small class="text-danger pl-3">','</small>'); ?>

								</div>
								<div class="actions mb-4">
									<button type="submit" class="btn btn-primary">Login</button>
								</div>
								
								<hr>
								<div class="actions align-left">
									<span class="additional-link">Belum punya akun ?</span>
									<a href="<?= base_url('auth/daftar') ?>" class="btn btn-dark">Buat akun</a>
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