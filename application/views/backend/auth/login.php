<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<title></title>
	<meta content="Admin Dashboard" name="description"/>
	<meta content="Themesbrand" name="author"/>
	<link rel="shortcut icon" href="<?= base_url() ?>assets/images/">

	<link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/css/icons.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet" type="text/css">
</head>

<body style="background-color: #141543">

<div class="wrapper-page">

	<div class="card overflow-hidden account-card mx-3">

		<div style="background-color: #272a57" class="p-4 text-white text-center position-relative">
			<h4 class="font-20 m-b-5"></h4>
		</div>
		<div class="account-card-content" style="background-color: #272a57">
			<form action="<?= base_url() ?>auth/login" method="post">
				<div class="form-group">
					<input type="text" class="form-control text-center" name="username" placeholder="Masukkan username">
				</div>

				<div class="form-group">
					<input type="password" class="form-control text-center" name="password" placeholder="Masukkan password">
				</div>
				<div class="form-group row m-t-20">
					<div class="col-sm-12 text-right">
						<button style="width: 100%" name="submit" class="btn btn-primary w-lg waves-effect waves-light" type="submit">
							Masuk
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<p class="text-center">© 2024</p>

</div>
<!-- end wrapper-page -->


<!-- jQuery  -->
<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/js/metisMenu.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.slimscroll.js"></script>
<script src="<?= base_url() ?>assets/js/waves.min.js"></script>

<!-- App js -->
<script src="<?= base_url() ?>assets/js/app.js"></script>

</body>

</html>
