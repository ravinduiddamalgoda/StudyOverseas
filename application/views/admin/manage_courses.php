<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Study Overseas - Course List</title>

    <!-- Include Stylesheets -->
    <?php $this->load->view('inc/admin/admin_styles'); ?>
</head>

<body>
    <!-- wrapper -->
    <div class="wrapper">
        <!-- sidebar-wrapper -->
        <?php $this->load->view('inc/admin/left_menu'); ?>
        <!-- end sidebar-wrapper -->

        <!-- header -->
        <?php $this->load->view('inc/admin/header'); ?>
        <!-- end header -->

        <!-- page-wrapper -->
        <div class="page-wrapper">
            <!-- page-content-wrapper -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <!-- breadcrumb -->
                    <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Course List</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i
                                                class='bx bx-home-alt'></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Course List</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="ms-auto">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary">Add New Course</button>
                                <!-- <button type="button"
                                    class="btn btn-primary bg-split-primary dropdown-toggle dropdown-toggle-split"
                                    data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                                </button> -->
                            </div>
                        </div>
                    </div>
                    <!-- end breadcrumb -->

                    <!-- data table  -->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h4 class="mb-0">Courses List</h4>
                            </div>
                            <hr />
                            <div class="table-responsive">
                                <table id="course-table" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Country</th>
                                            <th>Description</th>
                                            <th>Requirements</th>
                                            <th>University</th>
                                            <th>Scholarship</th>
                                            <th>English Requirement</th>
                                            <th>Fee</th>
                                            <th>Years</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($courses)): ?>
                                            <?php foreach ($courses as $course): ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($course['Course_id']); ?></td>
                                                    <td><?php echo htmlspecialchars($course['Course_name']); ?></td>
                                                    <td><?php echo htmlspecialchars($course['Country']); ?></td>
                                                    <td><?php echo htmlspecialchars($course['Course_description']); ?></td>
                                                    <td><?php echo htmlspecialchars($course['Course_requirements']); ?></td>
                                                    <td><?php echo htmlspecialchars($course['University']); ?></td>
                                                    <td><?php echo htmlspecialchars($course['Scholarship']); ?></td>
                                                    <td><?php echo htmlspecialchars($course['English_language_requirement']); ?></td>
                                                    <td><?php echo htmlspecialchars($course['Course_fee']); ?></td>
                                                    <td><?php echo htmlspecialchars($course['Years']); ?></td>

                                                    <td>
                                                        <div class="input-group">
                                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                                id="actionsDropdown<?php echo htmlspecialchars($course['Course_id']); ?>"
                                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">Actions</button>
                                                            <div class="dropdown-menu"
                                                                aria-labelledby="actionsDropdown<?php echo htmlspecialchars($course['Course_id']); ?>">
                                                                <!-- Delete action using SweetAlert2 -->
                                                                <a class="dropdown-item" href="javascript:void(0);"
                                                                    onclick="confirmDelete(<?php echo htmlspecialchars($course['Course_id']); ?>)">Delete</a>
                                                                <!-- <a class="dropdown-item" href="javascript:void(0);"
                                                                    onclick="viewCourse(<?php echo htmlspecialchars($course['Course_id']); ?>)">View</a> -->
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="9" class="text-center">No courses found</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page-content-wrapper -->
            </div>

            <!-- Inquiry View Modal -->
            <div class="modal fade" id="viewCourseModel" tabindex="-1" aria-labelledby="viewEmployeeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewEmployeeModalLabel">Course Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end page-wrapper -->
            <!-- start overlay -->
            <div class="overlay toggle-btn-mobile"></div>
            <!-- end overlay -->
            <!-- start Back To Top Button -->
            <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
            <!-- end Back To Top Button -->
            <!-- footer -->
            <?php $this->load->view('inc/admin/footer'); ?>
            <!-- end footer -->
        </div>
        <!-- end wrapper -->

        <!-- start switcher -->
        <?php $this->load->view('inc/web/theme_switcher'); ?>
        <!-- end switcher -->

        <!-- Include Scripts -->
        <?php $this->load->view('inc/admin/admin_scripts'); ?>

        <!-- Data Tables js -->
        <script src="<?php echo base_url(); ?>assets/admin/plugins/datatable/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function () {
                // Initialize the data table
                var table = $('#course-table').DataTable({
                    responsive: true,
                    lengthChange: false,
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis']
                });

                // Append buttons container
                table.buttons().container().appendTo('#course-table_wrapper .col-md-6:eq(0)');
            });

            function viewCourse(id) {
                $.ajax({
                    url: "<?php echo base_url('admin/view_course/'); ?>" + id,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        // Populate modal with data
                        

                        // Show the modal
                        $('#viewCourseModel').modal('show');
                    }
                });
            }

            function confirmDelete(id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect to the delete URL or make an AJAX call to delete the data
                        window.location.href = "<?php echo base_url('admin/delete_course/'); ?>" + id;
                    }
                });
            }

        </script>

        <script>
            new PerfectScrollbar('.dashboard-social-list');
            new PerfectScrollbar('.dashboard-top-countries');
        </script>
</body>

</html>