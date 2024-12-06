<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Study Overseas - Add Country</title>

    <!-- Include Stylesheets -->
    <?php $this->load->view('inc/admin/admin_styles'); ?>
</head>

<body>
    <!-- Wrapper -->
    <div class="wrapper">
        <!-- Sidebar -->
        <?php $this->load->view('inc/admin/left_menu'); ?>
        <!-- End Sidebar -->

        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <!-- Header -->
            <?php $this->load->view('inc/admin/header'); ?>
            <!-- End Header -->

            <!-- Page Content Wrapper -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <!-- Breadcrumb -->
                    <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Admin Dashboard</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item">
                                        <a href="<?php echo base_url('admin/dashboard'); ?>"><i
                                                class='bx bx-home-alt'></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php
                                    if ($this->uri->segment(2) == 'add') {
                                        echo 'Add';
                                    } else {
                                        echo 'Edit';
                                    }
                                    ?> Country</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- End Breadcrumb -->

                    <!-- Dashboard Content -->
                    <div class="row">
                        <!-- Form Section -->
                        <div class="container mt-5">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card shadow">
                                        <div class="card-header bg-primary text-white">
                                            <h3 class="card-title">Country Details</h3>
                                        </div>
                                        <div class="card-body">
                                            <form action="
                                            <?php
                                            if ($this->uri->segment(3) == 'edit') {
                                                echo base_url('admin/country/edit/' . $country['id']);
                                            } else {
                                                echo base_url('admin/country/add');
                                            } ?>
                                            " method="POST">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Country Name</label>
                                                    <input type="text" class="form-control" id="name"
                                                        name="name" value="<?php
                                                        if ($this->uri->segment(3) == 'edit') {
                                                            echo $country["name"];
                                                        } ?>" placeholder="Enter Country Name"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="iso_code" class="form-label">ISO Code</label>
                                                    <input type="text" class="form-control" id="iso_code"
                                                        name="iso_code" value="<?php
                                                        if ($this->uri->segment(3) == 'edit') {
                                                            echo $country["iso_code"];
                                                        } ?>" placeholder="Ex:- lk" required>
                                                </div>
                                               
                                                    <!-- align the button to the right -->
                                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                        <button type="submit" name="submit" value="submit"
                                                            class="btn btn-primary">Submit</button>
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Form Section -->
                    </div>
                    <!-- End Dashboard Content -->

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
        <?php $this->load->view('inc/admin/footer'); ?>
        <!-- End Footer -->
    </div>
    <!-- End Wrapper -->

    <!-- Start Theme Switcher -->
    <?php $this->load->view('inc/web/theme_switcher'); ?>
    <!-- End Theme Switcher -->

    <!-- Include Scripts -->
    <?php $this->load->view('inc/admin/admin_scripts'); ?>
</body>

</html>