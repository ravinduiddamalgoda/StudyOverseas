<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Study Overseas - Admin Registration</title>

    <!--include Stylesheets -->
    <?php $this->load->view('inc/admin/admin_styles'); ?>
</head>

<body class="bg-register">
    <!-- wrapper -->
    <div class="wrapper">
        <div class="section-authentication-register d-flex align-items-center justify-content-center">
            <div class="row">
                <div class="col-12 col-lg-10 mx-auto">
                    <div class="card radius-15 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-xl-6">
                                <div class="card-body p-md-5" style="padding: 0;">
                                    <div class="text-center">
                                        <img src="<?php echo base_url(); ?>assets/imgs/logo/StudyOverseasLogo.png"
                                            width="80" alt="">
                                        <h3 class="mt-4 font-weight-bold mb-4">Create an Account</h3>
                                    </div>

                                    <div class="">
                                        <?php if ($this->session->flashdata('success')): ?>
                                            <p style="color: green;"><?php echo $this->session->flashdata('success'); ?></p>
                                        <?php endif; ?>
                                        <div class="form-body">
                                            <form class="row g-3"
                                                action="<?php echo base_url('auth/register_process'); ?>" method="post">
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label">First Name</label>
                                                    <input type="text" class="form-control" id="inputFirstName"
                                                        name="first_name" value="<?php echo set_value('first_name'); ?>"
                                                        placeholder="First Name">
                                                    <span
                                                        style="color: red;"><?php echo form_error('first_name'); ?></span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputLastName" class="form-label">Last Name</label>
                                                    <input type="text" class="form-control" id="inputLastName"
                                                        name="last_name" value="<?php echo set_value('last_name'); ?>"
                                                        placeholder="Last Name">
                                                    <span
                                                        style="color: red;"><?php echo form_error('last_name'); ?></span>
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputEmailAddress" class="form-label">Email
                                                        Address</label>
                                                    <input type="email" class="form-control" id="inputEmailAddress"
                                                        name="email" value="<?php echo set_value('email'); ?>"
                                                        placeholder="Email Address">
                                                    <span style="color: red;"><?php echo form_error('email'); ?></span>
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputChoosePassword" class="form-label">Password</label>
                                                    <div class="input-group" id="show_hide_password">
                                                        <input type="password" class="form-control border-end-0"
                                                            id="inputChoosePassword" value="" name="password"
                                                            placeholder="Enter Password"> <a href="javascript:;"
                                                            class="input-group-text bg-transparent"><i
                                                                class="bx bx-hide"></i></a>
                                                    </div>
                                                    <span
                                                        style="color: red;"><?php echo form_error('password'); ?></span>
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputConfirmPassword" class="form-label">Confirm
                                                        Password</label>
                                                    <div class="input-group" id="show_hide_password">
                                                        <input type="password" class="form-control"
                                                            id="inputConfirmPassword" name="confirm_password"
                                                            placeholder="Confirm Password"><a href="javascript:;"
                                                            class="input-group-text bg-transparent"><i
                                                                class="bx bx-hide"></i></a>
                                                    </div>
                                                    <span
                                                        style="color: red;"><?php echo form_error('confirm_password'); ?></span>
                                                </div>
                                                <div class="col-12">
                                                    <!-- <label for="inputSelectCountry" class="form-label">Country</label>
                                                    <select class="form-select" id="inputSelectCountry"
                                                        aria-label="Default select example">
                                                        <option selected="">India</option>
                                                        <option value="1">United Kingdom</option>
                                                        <option value="2">America</option>
                                                        <option value="3">Dubai</option>
                                                    </select> -->
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="flexSwitchCheckChecked">
                                                        <label class="form-check-label" for="flexSwitchCheckChecked">I
                                                            read and agree to Terms &amp; Conditions</label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-primary"><i
                                                                class="bx bx-user me-1"></i>Sign up</button>
                                                    </div>
                                                </div>
                                                <div class="col-12 text-center">
                                                    <p>Already have an account?
                                                        <a href="<?php echo base_url('auth/login'); ?>"
                                                            style="color: #997912;">
                                                            Sign In here
                                                        </a>
                                                    </p>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-xl-6 bg-login-color d-flex align-items-center justify-content-center">
                                <img src="<?php echo base_url(); ?>assets/admin/imgs/login-images/register-frent-img.jpg"
                                    class="img-fluid" alt="...">
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end wrapper -->
    <!-- JavaScript -->

    <!-- include Scripts  -->
    <?php $this->load->view('inc/admin/admin_scripts'); ?>

    <script>
        $(document).ready(function () {
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
        });
    </script>
</body>

</html>