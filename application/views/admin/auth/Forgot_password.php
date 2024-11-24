<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Study Overseas - Forgot Password</title>

    <!-- Include Stylesheets -->
    <?php $this->load->view('inc/admin/admin_styles'); ?>
</head>

<body class="bg-forgot">
    <!-- wrapper -->
    <div class="wrapper_center">
        <div class="authentication-forgot d-flex align-items-center justify-content-center">
            <div class="card shadow-lg forgot-box">
                <div class="card-body p-md-5">
                    <div class="text-center">
                        <img src="<?php echo base_url(); ?>assets/admin/imgs/icons/forgot-2.png" width="140" alt="" />
                    </div>
                    <h4 class="mt-5 font-weight-bold">Forgot Password?</h4>
                    <p class="text-muted">Enter your registered email ID to reset the password</p>

                    <div class="mb-3 mt-4">
                        <label class="form-label">Email ID</label>
                        <input type="email" id="email" class="form-control form-control-lg radius-30"
                            placeholder="example@user.com" />
                        <span id="email_error" class="text-danger"></span>
                    </div>
                    <div class="d-grid gap-2">
                        <button id="send_otp" class="btn btn-primary btn-lg radius-30">Send</button>
                        <a href="<?php echo base_url('auth/login'); ?>" class="btn btn-light radius-30"><i
                                class='bx bx-arrow-back mr-1'></i>Back to Login</a>
                    </div>
                    <div id="response_message" class="text-success mt-3"></div>
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
        // Function to send OTP
        function sendOtp() {
            var email = $('#email').val();

            // Clear previous error message
            $('#email_error').text('');
            $('#response_message').text('');

            if (email === '') {
                $('#email_error').text('Please enter your email.');
                return;
            }

            // Send AJAX request to reset password
            $.ajax({
                url: '<?php echo base_url("auth/forgot_password_process"); ?>',
                method: 'POST',
                data: { email: email },
                dataType: 'json',
                success: function (response) {
                    if (response.error) {
                        $('#email_error').text(response.message);
                    } else {
                        $('#response_message').text('OTP has been sent to your email.');
                        $('#email').val('');

                        // Redirect to verify OTP page
                        window.location.href = response.redirect;
                    }
                },
                error: function () {
                    $('#email_error').text('There was an error processing your request. Please try again later.');
                }
            });
        }

        // Trigger Send OTP on button click
        $('#send_otp').click(function (e) {
            e.preventDefault();
            sendOtp();
        });

        // Trigger Send OTP on pressing Enter key in the email field
        $('#email').keypress(function (e) {
            if (e.which == 13) {  // Check if Enter key (key code 13) is pressed
                e.preventDefault();
                sendOtp();
            }
        });
    });
</script>


</html>