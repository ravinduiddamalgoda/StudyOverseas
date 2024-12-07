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
        <!-- Dashboard Content -->
        <div class="page-wrapper">
            <!-- Page Content Wrapper -->
            <div class="page-content-wrapper" style="margin:0px; padding: 0px 200px">
                <div class="page-content">
                    <div class="row">
                        <div class="container mt-5">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card shadow">
                                        <div class="card-header bg-primary text-white">
                                            <h3 class="card-title">Mark Attendance</h3>
                                        </div>
                                        <div class="card-body">
                                            <form action="" method="POST">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Email Address</label>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                        placeholder="Email">
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
                    </div>

                </div>
            </div>
        </div>

        <!-- Overlay -->
        <div class="overlay toggle-btn-mobile"></div>
        <!-- End Overlay -->

        <!-- Back To Top Button -->
        <a href="javascript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!-- End Back To Top Button -->

        <!-- Footer -->
        <?php $this->load->view('inc/it/footer'); ?>

        <style>
            .footer {
                margin: 0px !important;
            }
        </style>
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