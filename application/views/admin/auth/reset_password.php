<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Study Overseas - Reset Password</title>

    <!-- Include Stylesheets -->
    <?php $this->load->view('inc/admin/admin_styles'); ?>
</head>

<body>
    <!-- wrapper -->
    <div class="wrapper">
        <div class="authentication-reset-password d-flex align-items-center justify-content-center">
            <div class="row">
                <div class="col-12 col-lg-10 mx-auto">
                    <div class="card radius-15">
                        <div class="row g-0">
                            <div class="col-lg-5">
                                <div class="card-body p-md-5">
                                    <div class="text-left">
                                        <img src="<?php echo base_url(); ?>assets/imgs/logo/StudyOverseasLogo_removeBack.png" width="180" alt="">
                                    </div>
                                    <h4 class="mt-5 font-weight-bold">Generate New Password</h4>
                                    <p class="text-muted">We received your reset password request. Please enter your new password!</p>
                                    <div class="mb-3 mt-5">
                                        <label class="form-label">New Password</label>
                                        <input type="password" id="password" class="form-control" placeholder="Enter new password" />
                                        <span id="password_error" class="text-danger"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" id="confirm_password" class="form-control" placeholder="Confirm password" />
                                        <span id="confirm_password_error" class="text-danger"></span>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button id="change_password" class="btn btn-primary">Change Password</button>
                                        <a href="<?php echo base_url('auth/login'); ?>" class="btn btn-light"><i class='bx bx-arrow-back mr-1'></i>Back to Login</a>
                                    </div>
                                    <div id="response_message" class="text-success mt-3"></div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <img src="<?php echo base_url(); ?>assets/admin/imgs/login-images/forgot-password-frent-img.jpg" class="card-img login-img h-100" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end wrapper -->

    <!-- Include Scripts -->
    <?php $this->load->view('inc/admin/admin_scripts'); ?>
</body>

<script>
    $(document).ready(function () {
        $('#change_password').click(function (e) {
            e.preventDefault();
            var password = $('#password').val();
            var confirm_password = $('#confirm_password').val();

            // Clear previous error messages
            $('#password_error').text('');
            $('#confirm_password_error').text('');
            $('#response_message').text('');

            if (password === '') {
                $('#password_error').text('Please enter your password.');
                return;
            }
            if (confirm_password === '') {
                $('#confirm_password_error').text('Please confirm your password.');
                return;
            }
            if (password !== confirm_password) {
                $('#confirm_password_error').text('Passwords do not match.');
                return;
            }

            // Send AJAX request to update the password
            $.ajax({
                url: '<?php echo base_url("auth/update_password"); ?>',
                method: 'POST',
                data: { password: password, confirm_password: confirm_password },
                dataType: 'json',
                success: function (response) {
                    if (response.error) {
                        $('#response_message').text(response.message);
                    } else {
                        $('#response_message').text('Password updated successfully. Redirecting to login...');
                        setTimeout(function() {
                            window.location.href = '<?php echo base_url("auth/login"); ?>';
                        }, 2000); // Redirect after 2 seconds
                    }
                },
                error: function () {
                    $('#response_message').text('There was an error processing your request. Please try again later.');
                }
            });
        });
    });
</script>

</html>
