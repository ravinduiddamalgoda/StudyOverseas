<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- wrapper -->
<div class="wrapper_center" style="margin-bottom: -150px;">

	<div class="error-404 d-flex align-items-center justify-content-center">
		<div class="container">
			<div class="card radius-15 shadow-none">
				<div class="row g-0">
					<div class="col-lg-6">
						<div class="card-body p-5">

							<h2>A PHP Error was encountered</h2>
							<hr>
							<h3>Oops! Something went wrong.</h3>
							<p>Severity: <?php echo $severity; ?></p>
							<p>Message: <?php echo $message; ?></p>
							<p>Filename: <?php echo $filepath; ?></p>
							<p>Line Number: <?php echo $line; ?></p>

							<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>

								<p>Backtrace:</p>
								<?php foreach (debug_backtrace() as $error): ?>

									<?php if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>

										<p style="margin-left:10px">
											File: <?php echo $error['file'] ?><br />
											Line: <?php echo $error['line'] ?><br />
											Function: <?php echo $error['function'] ?>
										</p>

									<?php endif ?>

								<?php endforeach ?>

							<?php endif ?>
							<!-- <?php echo $message; ?> -->
						
				

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
	<!-- <div class="bg-white p-3 fixed-bottom border-top">
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
	</div> -->
</div>