<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Study Overseas - User Dashboard</title>

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
                        <div class="breadcrumb-title pe-3">User Dashboard</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item">
                                        <a href="<?php echo base_url('user/dashboard'); ?>"><i
                                                class='bx bx-home-alt'></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- End Breadcrumb -->

                    <!-- Dashboard Content -->
                    <div class="row">
                        <!-- Appointments Card -->
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card shadow-sm border-0">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary p-3 rounded-circle">
                                            <i class="bx bx-calendar text-white"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h6 class="mb-0">Your Appointments</h6>
                                            <h4 class="mb-0"><?php echo $user_appointments; ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Enrolled Courses Card -->
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card shadow-sm border-0">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-success p-3 rounded-circle">
                                            <i class="bx bx-book text-white"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h6 class="mb-0">Enrolled Courses</h6>
                                            <h4 class="mb-0"><?php echo $user_courses; ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Inquiries Card -->
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card shadow-sm border-0">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-warning p-3 rounded-circle">
                                            <i class="bx bx-envelope text-white"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h6 class="mb-0">Your Inquiries</h6>
                                            <h4 class="mb-0"><?php echo $user_inquiries; ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Notifications Card -->
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card shadow-sm border-0">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-danger p-3 rounded-circle">
                                            <i class="bx bx-bell text-white"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h6 class="mb-0">Notifications</h6>
                                            <h4 class="mb-0"><?php echo $user_notifications; ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Dashboard Content -->

                    <!-- Recent Activities -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow-sm border-0">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="card-title mb-0">Recent Activities</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <?php if (!empty($recent_activities)): ?>
                                            <?php foreach ($recent_activities as $activity): ?>
                                                <li class="list-group-item">
                                                    <i class="bx bx-time-five"></i>
                                                    <?php echo $activity; ?>
                                                </li>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <li class="list-group-item text-center">No recent activities.</li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Recent Activities -->
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

    <!-- Start Theme Switcher -->
    <?php $this->load->view('inc/web/theme_switcher'); ?>
    <!-- End Theme Switcher -->

    <!-- Include Scripts -->
    <?php $this->load->view('inc/user/user_scripts'); ?>

    <script>
        new PerfectScrollbar('.dashboard-social-list');
        new PerfectScrollbar('.dashboard-top-countries');
    </script>
</body>

</html>