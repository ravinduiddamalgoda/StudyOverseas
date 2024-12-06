<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Study Overseas - Verify OTP</title>

    <!-- Include Stylesheets -->
    <?php $this->load->view('inc/admin/admin_styles'); ?>
</head>

<body class="bg-forgot">
    <!-- wrapper -->
    <div class="wrapper_center">
        <div class="authentication-reset-password d-flex align-items-center justify-content-center">
            <div class="card shadow-lg verify-box card radius-15">
                <div class="card-body p-md-5 ">
                    <div class="text-center">
                        <img src="<?php echo base_url(); ?>assets/admin/imgs/icons/verify.png" width="140"
                            alt="verify image" />
                    </div>
                    <h4 class="mt-5 font-weight-bold">Verify OTP</h4>
                    <p class="text-muted">Enter the OTP sent to your registered email ID</p>

                    <div class="mb-3 mt-4">
                        <label class="form-label">OTP</label>
                        <input type="text" id="otp" class="form-control form-control-lg radius-30"
                            placeholder="Enter OTP" />
                        <span id="otp_error" class="text-danger"></span>
                    </div>
                    <div class="d-grid gap-2">
                        <button id="verify_otp" class="btn btn-primary btn-lg radius-30">Verify OTP</button>
                        <a href="<?php echo base_url('auth/forgot_password'); ?>" class="btn btn-light radius-30"><i
                                class='bx bx-arrow-back mr-1'></i>Back to Forgot Password</a>
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
        // Function to verify OTP
        function verifyOtp() {
            var otp = $('#otp').val();

            // Clear previous error message
            $('#otp_error').text('');
            $('#response_message').text('');

            if (otp === '') {
                $('#otp_error').text('Please enter the OTP.');
                return;
            }

            // Send AJAX request to verify OTP
            $.ajax({
                url: '<?php echo base_url("auth/validate_otp"); ?>',
                method: 'POST',
                data: { otp: otp },
                dataType: 'json',
                success: function (response) {
                    if (response.error) {
                        $('#otp_error').text(response.message);

                        // // Log email and OTP to the console
                        // console.log('Email:', response.email);
                        // console.log('OTP:', response.otp);
                    } else {
                        $('#response_message').text('OTP verified successfully. Redirecting to reset password...');
                        setTimeout(function () {
                            window.location.href = '<?php echo base_url("auth/reset_password"); ?>';
                        }, 2000); // Redirect after 2 seconds
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log("AJAX Error: " + textStatus + " : " + errorThrown);
                    $('#otp_error').text('There was an error processing your request. Please try again later.');
                }
            });
        }

        // Trigger OTP verification on button click
        $('#verify_otp').click(function (e) {
            e.preventDefault();
            verifyOtp();
        });

        // Trigger OTP verification on pressing Enter key in the OTP field
        $('#otp').keypress(function (e) {
            if (e.which == 13) {  // Check if Enter key (key code 13) is pressed
                e.preventDefault();
                verifyOtp();
            }
        });
    });
</script>


</html>