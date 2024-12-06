<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Update Password</title>

    <!-- Include Stylesheets -->
    <?php $this->load->view('inc/user/user_styles'); ?>
</head>

<body>
    <!-- Wrapper -->
    <div class="wrapper">
        <!-- Sidebar -->
        <?php $this->load->view('inc/user/left_menu'); ?>
        <!-- End Sidebar -->

        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <!-- Header -->
            <?php $this->load->view('inc/user/header'); ?>
            <!-- End Header -->

            <!-- Page Content Wrapper -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <!-- Breadcrumb -->
                    <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Update Password</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item">
                                        <a href="<?php echo base_url('user/dashboard'); ?>"><i class='bx bx-home-alt'></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Update Password</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- End Breadcrumb -->

                    <!-- Update Password Form -->
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card shadow">
                                <div class="card-header bg-primary text-white">
                                    <h3 class="card-title">Update Password</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Display Success Message -->
                                    <?php if ($this->session->flashdata('success')): ?>
                                        <div class="alert alert-success">
                                            <?php echo $this->session->flashdata('success'); ?>
                                        </div>
                                    <?php endif; ?>

                                    <!-- Display Validation Errors -->
                                    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

                                    <form action="<?php echo base_url('user/update_password'); ?>" method="POST">
                                        <div class="mb-3">
                                            <label for="password" class="form-label">New Password</label>
                                            <input type="password" class="form-control" id="password" name="password" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="confirm_password" class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update Password</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Update Password Form -->
                </div>
            </div>
            <!-- End Page Content Wrapper -->
        </div>
        <!-- End Page Wrapper -->

        <!-- Overlay -->
        <div class="overlay toggle-btn-mobile"></div>
        <!-- End Overlay -->

        <!-- Back To Top Button -->
        <a href="javascript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!-- End Back To Top Button -->

        <!-- Footer -->
        <?php $this->load->view('inc/user/footer'); ?>
        <!-- End Footer -->
    </div>
    <!-- End Wrapper -->

    <!-- Include Scripts -->
    <?php $this->load->view('inc/user/user_scripts'); ?>
</body>

</html>
