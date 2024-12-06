<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Study Overseas - View Appointments</title>

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
                                        <a href="<?php echo base_url('user/dashboard'); ?>"><i class='bx bx-home-alt'></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">View Appointments</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- End Breadcrumb -->

                    <!-- Appointment List Section -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow">
                                <div class="card-header bg-primary text-white">
                                    <h3 class="card-title">Your Appointments</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="table-primary">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Date</th>
                                                    <th>Message</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($appointment)) : ?>
                                                    <?php foreach ($appointment as $index => $app) : ?>
                                                        <tr>
                                                            <td><?php echo $index + 1; ?></td>
                                                            <td><?php echo htmlspecialchars($app['name']); ?></td>
                                                            <td><?php echo htmlspecialchars($app['email']); ?></td>
                                                            <td><?php echo htmlspecialchars($app['phone']); ?></td>
                                                            <td><?php echo htmlspecialchars($app['date']); ?></td>
                                                            <td><?php echo htmlspecialchars($app['message']); ?></td>
                                                            <td>
                                                                <?php if ($app['status'] === 'confirmed') : ?>
                                                                    <span class="badge bg-success">Confirmed</span>
                                                                <?php elseif ($app['status'] === 'pending') : ?>
                                                                    <span class="badge bg-warning text-dark">Pending</span>
                                                                <?php else : ?>
                                                                    <span class="badge bg-danger">Cancelled</span>
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php else : ?>
                                                    <tr>
                                                        <td colspan="7" class="text-center">No appointments found.</td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Appointment List Section -->

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
</body>

</html>
