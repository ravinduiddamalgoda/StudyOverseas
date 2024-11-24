<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Study Overseas - Admin dashboard</title>

    <!--include Stylesheets -->
    <?php $this->load->view('inc/admin/admin_styles'); ?>

</head>

<body>
    <!-- wrapper -->
    <div class="wrapper">
        <!--sidebar-wrapper-->
        <?php $this->load->view('inc/admin/left_menu'); ?>
        <!--end sidebar-wrapper-->
        <!--header-->
        <?php $this->load->view('inc/admin/header'); ?>
        <!--end header-->
        <!--page-wrapper-->
        <div class="page-wrapper">
            <!--page-content-wrapper-->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <!--breadcrumb-->
                    <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Users</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i
                                                class='bx bx-home-alt'></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">User List</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="ms-auto">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary">Add New Member</button>
                                <button type="button"
                                    class="btn btn-primary bg-split-primary dropdown-toggle dropdown-toggle-split"
                                    data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                                </button>
                                <!-- <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-start"> <a
                                        class="dropdown-item" href="javascript:;">Action</a>
                                    <a class="dropdown-item" href="javascript:;">Another action</a>
                                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                                    <div class="dropdown-divider"></div> <a class="dropdown-item"
                                        href="javascript:;">Separated link</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <!--end breadcrumb-->

                    <!-- data table  -->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h4 class="mb-0">User List</h4>
                            </div>
                            <hr />
                            <div class="table-responsive">
                                <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($users as $user): ?>
                                            <tr>
                                                <td><?php echo $user['id']; ?></td>
                                                <td><?php echo $user['first_name']; ?></td>
                                                <td><?php echo $user['last_name']; ?></td>
                                                <td><?php echo $user['email']; ?></td>
                                                <td><?php echo isset($user['role']) ? $user['role'] : 'N/A'; ?></td>
                                                <!-- Ensure 'role' exists -->
                                                <td><?php echo $user['created_at']; ?></td>
                                                <td>
                                                    <div class="input-group">
                                                        <button class="btn  btn-secondary dropdown-toggle" type="button"
                                                            id="actionsDropdown<?php echo $user['id']; ?>"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            Actions
                                                        </button>
                                                        <div class="dropdown-menu"
                                                            aria-labelledby="actionsDropdown<?php echo $user['id']; ?>">
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="<?php echo base_url('user/edit/' . $user['id']); ?>">Edit</a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="<?php echo base_url('user/delete/' . $user['id']); ?>"
                                                                    onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="<?php echo base_url('user/view/' . $user['id']); ?>">View</a>
                                                            </li>
                                                        </div>

                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <!--end page-content-wrapper-->
            </div>
            <!--end page-wrapper-->
            <!--start overlay-->
            <div class="overlay toggle-btn-mobile"></div>
            <!--end overlay-->
            <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                    class='bx bxs-up-arrow-alt'></i></a>
            <!--End Back To Top Button-->
            <!--footer -->
            <?php $this->load->view('inc/admin/footer'); ?>
            <!-- end footer -->
        </div>
        <!-- end wrapper -->
        <!--start switcher-->
        <?php $this->load->view('inc/admin/theme_switcher'); ?>
        <!--end switcher-->
        <!-- JavaScript -->

        <!-- include Scripts  -->
        <?php $this->load->view('inc/admin/admin_scripts'); ?>

        <!--Data Tables js-->
        <script src="<?php echo base_url(); ?>assets/admin/plugins/datatable/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function () {
                // Initialize the default data table with responsive design
                $('#example').DataTable({
                    responsive: true // Enable responsiveness for this table
                });

                // Initialize the second data table with responsive design and buttons
                var table = $('#example2').DataTable({
                    responsive: true, // Enable responsiveness for this table
                    lengthChange: false,
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis'] // Add buttons
                });

                // Append buttons container to the correct location
                table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
            });
        </script>


        <script>
            new PerfectScrollbar('.dashboard-social-list');
            new PerfectScrollbar('.dashboard-top-countries');
        </script>
</body>

</html>