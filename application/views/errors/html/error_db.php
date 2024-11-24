<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php
include(APPPATH . 'config/config.php');
$base_url = $config['base_url'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Study Overseas - Database Error</title>

	<!-- Admin favicon -->
	<link rel="icon" href="<?php echo $base_url; ?>assets/imgs/logo/StudyOverseasLogo.png" type="image/png" />
	<!-- Admin loader -->
	<link rel="stylesheet" href="<?php echo $base_url; ?>assets/admin/css/pace.min.css" />
	<!-- Admin Bootstrap CSS -->
	<link rel="stylesheet" href="<?php echo $base_url; ?>assets/admin/css/bootstrap.min.css" />
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Roboto&display=swap" />
	<!-- Admin Icons CSS -->
	<link rel="stylesheet" href="<?php echo $base_url; ?>assets/admin/css/icons.css" />
	<!-- Admin App CSS -->
	<link rel="stylesheet" href="<?php echo $base_url; ?>assets/admin/css/app.css" />

</head>

<body>
	<!-- wrapper -->
	<div class="wrapper_center">

		<div class="error-404 d-flex align-items-center justify-content-center">
			<div class="container">
				<div class="card radius-15 shadow-none">
					<div class="row g-0">
						<div class="col-lg-6">
							<div class="card-body p-5">

								<h1><?php echo $heading; ?></h1>
								<hr>
								<h3>Oops! Something went wrong.</h3>
								<!-- <?php echo $message; ?> -->
								<br>The page you requested could not be found.
								<br>Dont'worry and return to the previous page.
								</p>

								<div class="mt-5">
									<!-- Go Home button -->
									<a href="<?php echo $base_url; ?>"
										class="btn btn-lg btn-primary px-md-5 radius-30">Go Home</a>

									<!-- Back button using JavaScript -->
									<a href="javascript:history.back()"
										class="btn btn-lg btn-outline-dark ms-3 px-md-5 radius-30">Back</a>
								</div>

							</div>
						</div>
						<div class="col-lg-6">
							<!-- <img src="<?php echo $base_url; ?>assets/admin/images/errors-images/404-error.png"
								class="card-img" alt=""> -->
						</div>
					</div>
					<!--end row-->
				</div>
			</div>
		</div>
		<div class="bg-white p-3 fixed-bottom border-top">
			<div class="d-flex align-items-center justify-content-between flex-wrap">
				<ul class="list-inline mb-0">
					<li class="list-inline-item">Follow Us :</li>
					<li class="list-inline-item"><a href="javascript:;"><i class='bx bxl-facebook me-1'></i>Facebook</a>
					</li>
					<li class="list-inline-item"><a href="javascript:;"><i class='bx bxl-twitter me-1'></i>Twitter</a>
					</li>
					<li class="list-inline-item"><a href="javascript:;"><i class='bx bxl-google me-1'></i>Google</a>
					</li>
				</ul>
				<p class="mb-0">Study Overseas @2024</p>
			</div>
		</div>
	</div>
	<!-- end wrapper -->
	<!-- JavaScript -->
	<!-- Admin loader script -->
	<script src="<?php echo $base_url; ?>assets/admin/js/pace.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="<?php echo $base_url; ?>assets/admin/js/bootstrap.bundle.min.js"></script>

	<!--plugins-->
	<script src="<?php echo $base_url; ?>assets/admin/js/jquery.min.js"></script>
	<script src="<?php echo $base_url; ?>assets/admin/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="<?php echo $base_url; ?>assets/admin/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="<?php echo $base_url; ?>assets/admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
</body>

</html>