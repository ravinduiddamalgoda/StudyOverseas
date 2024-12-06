<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Study Overseas - Login</title>

    <!-- Include Stylesheets -->
    <?php $this->load->view('inc/admin/admin_styles'); ?>
</head>

<body class="bg-login">
    <!-- wrapper -->
    <div class="wrapper">
        <div class="section-authentication-login d-flex align-items-center justify-content-center mt-4"
            style="min-height: 100vh;">
            <div class="row w-100">
                <div class="col-12 col-lg-8 mx-auto">
                    <div class="card radius-15 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-xl-6 d-flex align-items-center justify-content-center">
                                <div class="card-body p-5">
                                    <div class="text-center">
                                        <img src="<?php echo base_url(); ?>assets/imgs/logo/StudyOverseasLogo.png" width="80" alt="">
                                        <h3 class="mt-4 font-weight-bold mb-4">Welcome Student</h3>
                                    </div>
                                    <div class="">
                                        <!-- Display messages dynamically -->
                                        <p class="text-danger" id="error_message"></p>

                                        <div class="form-body">
                                            <form id="login_form" class="row g-3">
                                                <div class="col-12">
                                                    <label for="inputEmailAddress" class="form-label">Email Address</label>
                                                    <input type="email" class="form-control" name="email"
                                                        id="inputEmailAddress" placeholder="Email Address"
                                                        value="<?php echo set_value('email', $remember_email); ?>">
                                                    <span class="text-danger" id="email_error"></span>
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputChoosePassword" class="form-label">Password</label>
                                                    <div class="input-group" id="show_hide_password">
                                                        <input type="password" class="form-control border-end-0"
                                                            id="inputChoosePassword" name="password"
                                                            placeholder="Password"  value="<?php echo set_value('password', $remember_password); ?>">
                                                        <a href="javascript:;" class="input-group-text bg-transparent">
                                                            <i class="bx bx-hide"></i>
                                                        </a>
                                                    </div>
                                                    <span class="text-danger" id="password_error"></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                        name="remember_me" id="remember_me" <?php echo $remember_email ? 'checked' : ''; ?>>
                                                        <label class="form-check-label"
                                                            for="flexSwitchCheckChecked">Remember Me</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 text-end">
                                                    <a href="<?php echo base_url('web/auth/forgot_password'); ?>">Forgot Password?</a>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button type="submit" id="login_button" class="btn btn-primary">
                                                            <i class="bx bxs-lock-open"></i>Sign in
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-12 text-center">
                                                    <p>Don't have an account yet? <a
                                                            href="<?php echo base_url('auth/register'); ?>">Sign up here</a></p>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 d-none d-xl-flex bg-login-color justify-content-center align-items-center"
                                style="background-image: url('<?php echo base_url(); ?>assets/admin/imgs/login-images/login-frent-img.jpg'); background-size: cover; background-position: center;">
                                <img src="<?php echo base_url(); ?>assets/admin/imgs/login-images/login-frent-img.jpg"
                                    class="img-fluid" alt="Login Image" style="opacity: 0.5;">
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end wrapper -->

    <!-- Include Scripts -->
    <?php $this->load->view('inc/admin/admin_scripts'); ?>

    <script>
        $(document).ready(function () {
            // Toggle password visibility
            $("#show_hide_password a").on('click', function (event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });

            // Handle form submission via AJAX
            $('#login_form').on('submit', function (e) {
                e.preventDefault();
                $('#email_error').text(''); // Clear previous errors
                $('#password_error').text('');
                $('#error_message').text('');

                $.ajax({
                    url: '<?php echo base_url("auth/login_process"); ?>',
                    method: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 'error') {
                            if (response.errors) {
                                // Show form validation errors
                                if (response.errors.email) {
                                    $('#email_error').text(response.errors.email);
                                }
                                if (response.errors.password) {
                                    $('#password_error').text(response.errors.password);
                                }
                            }
                            if (response.message) {
                                // Show invalid email/password error
                                $('#error_message').text(response.message);
                            }
                        } else if (response.status == 'success') {
                            // Redirect on successful login
                            window.location.href = response.redirect;
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>
