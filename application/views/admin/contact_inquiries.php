<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Study Overseas - Inquiries List</title>

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
                        <div class="breadcrumb-title pe-3">Inquiries List</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i
                                                class='bx bx-home-alt'></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Inquiries List</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- end breadcrumb -->

                    <!-- data table  -->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h4 class="mb-0">Inquiries List</h4>
                            </div>
                            <hr />
                            <div class="table-responsive">
                                <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Subject</th>
                                            <th>Inquiry Type</th>
                                            <th>Message</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($inquiries)): ?>
                                            <?php foreach ($inquiries as $inquiry): ?>
                                                <tr>
                                                    <td><?php echo $inquiry['id']; ?></td>
                                                    <td><?php echo $inquiry['full_name']; ?></td>
                                                    <td><?php echo $inquiry['email']; ?></td>
                                                    <td><?php echo $inquiry['phone']; ?></td>
                                                    <td><?php echo $inquiry['subject']; ?></td>
                                                    <td><?php echo $inquiry['inquiry_type']; ?></td>
                                                    <td><?php echo $inquiry['message']; ?></td>
                                                    <td><?php echo $inquiry['created_at']; ?></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                                id="actionsDropdown<?php echo htmlspecialchars($inquiry['id']); ?>"
                                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">Actions</button>
                                                            <div class="dropdown-menu"
                                                                aria-labelledby="actionsDropdown<?php echo htmlspecialchars($inquiry['id']); ?>">
                                                                <!-- Delete action using SweetAlert2 -->
                                                                <a class="dropdown-item" href="javascript:void(0);"
                                                                    onclick="confirmDelete(<?php echo htmlspecialchars($inquiry['id']); ?>)">Delete</a>
                                                                <a class="dropdown-item" href="javascript:void(0);"
                                                                    onclick="viewInquiry(<?php echo htmlspecialchars($inquiry['id']); ?>)">View</a>
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="9" class="text-center">No inquiries found</td>
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
            <div class="modal fade" id="viewInquiryModal" tabindex="-1" aria-labelledby="viewInquiryModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewInquiryModalLabel">Inquiry Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Full Name: </strong><span id="inquiryFullName"></span></p>
                            <p><strong>Email: </strong><span id="inquiryEmail"></span></p>
                            <p><strong>Phone: </strong><span id="inquiryPhone"></span></p>
                            <p><strong>Subject: </strong><span id="inquirySubject"></span></p>
                            <p><strong>Inquiry Type: </strong><span id="inquiryType"></span></p>
                            <p><strong>Message: </strong><span id="inquiryMessage"></span></p>
                            <p><strong>Created At: </strong><span id="inquiryCreatedAt"></span></p>
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
                var table = $('#example2').DataTable({
                    responsive: true,
                    lengthChange: false,
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis']
                });

                // Append buttons container
                table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
            });

            function viewInquiry(id) {
                $.ajax({
                    url: "<?php echo base_url('admin/view_inquiry/'); ?>" + id,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        // Populate modal with data
                        $('#inquiryFullName').text(data.full_name);
                        $('#inquiryEmail').text(data.email);
                        $('#inquiryPhone').text(data.phone);
                        $('#inquirySubject').text(data.subject);
                        $('#inquiryType').text(data.inquiry_type);
                        $('#inquiryMessage').text(data.message);
                        $('#inquiryCreatedAt').text(data.created_at);

                        // Show the modal
                        $('#viewInquiryModal').modal('show');
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
                        window.location.href = "<?php echo base_url('admin/delete_inquiry/'); ?>" + id;
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