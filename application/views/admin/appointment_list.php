<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Study Overseas - Appointment List</title>

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
                        <div class="breadcrumb-title pe-3">Appointment List</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i
                                                class='bx bx-home-alt'></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Appointment List</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="ms-auto">
                            <div class="btn-group">
                                <!-- <button type="button" class="btn btn-primary">Add New Member</button>
                                <button type="button"
                                    class="btn btn-primary bg-split-primary dropdown-toggle dropdown-toggle-split"
                                    data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                                </button> -->
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
                                <h4 class="mb-0">Appointment List</h4>
                            </div>
                            <hr />
                            <div class="table-responsive">
                                <!-- Appointment List Table (existing code) -->
                                <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Program</th>
                                            <th>Country</th>
                                            <th>Qualification</th>
                                            <th>Appointment Date</th>
                                            <th>Appointment Time</th>
                                            <th>Other Info</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($appointments)): ?>
                                            <?php foreach ($appointments as $appointment): ?>
                                                <tr>
                                                    <td><?php echo $appointment->id; ?></td>
                                                    <td><?php echo $appointment->name; ?></td>
                                                    <td><?php echo $appointment->email; ?></td>
                                                    <td><?php echo $appointment->phone; ?></td>
                                                    <td><?php echo $appointment->interested_program; ?></td>
                                                    <td><?php echo $appointment->interested_country; ?></td>
                                                    <td><?php echo $appointment->highest_qualification; ?></td>
                                                    <td><?php echo $appointment->appointment_date; ?></td>
                                                    <td><?php echo $appointment->appointment_time; ?></td>
                                                    <td><?php echo $appointment->other_info; ?></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                                id="actionsDropdown<?php echo $appointment->id; ?>"
                                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">Actions</button>
                                                            <div class="dropdown-menu"
                                                                aria-labelledby="actionsDropdown<?php echo $appointment->id; ?>">
                                                                <a class="dropdown-item" href="javascript:void(0);"
                                                                    onclick="viewAppointment(<?php echo $appointment->id; ?>)">View</a>
                                                                <a class="dropdown-item" href="javascript:void(0);"
                                                                    onclick="editAppointment(<?php echo $appointment->id; ?>)">Edit</a>
                                                                <a class="dropdown-item" href="javascript:void(0);"
                                                                    onclick="deleteAppointment(<?php echo $appointment->id; ?>)">Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="11" class="text-center">No appointments found</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>
                </div>
                <!-- Modal for Edit and View -->
                <div class="modal fade" id="appointmentModal" tabindex="-1" role="dialog"
                    aria-labelledby="appointmentModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="appointmentModalLabel">Appointment Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="modalBodyContent">
                                <!-- Modal content will be loaded via AJAX -->
                            </div>
                        </div>
                    </div>
                </div>

                <script></script>

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
        <?php $this->load->view('inc/web/theme_switcher'); ?>
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

            function deleteAppointment(id) {
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
                        $.ajax({
                            url: '<?php echo base_url("appointment/delete/"); ?>' + id,
                            type: 'POST',
                            success: function (response) {
                                Swal.fire('Deleted!', 'Appointment has been deleted.', 'success')
                                location.reload();
                            }
                        });
                    }
                })
            }

            // View Appointment
            function viewAppointment(id) {
                $.ajax({
                    url: '<?php echo base_url("admin/view_appointment/"); ?>' + id,
                    type: 'GET',
                    dataType: 'json', // Expect JSON data from the server
                    success: function (response) {
                        // Construct the HTML content from the JSON response
                        let modalContent = `
                <table class="table table-bordered">
                    <tr><th>ID</th><td>${response.id}</td></tr>
                    <tr><th>Full Name</th><td>${response.name}</td></tr>
                    <tr><th>Email</th><td>${response.email}</td></tr>
                    <tr><th>Phone</th><td>${response.phone}</td></tr>
                    <tr><th>Interested Program</th><td>${response.interested_program}</td></tr>
                    <tr><th>Interested Country</th><td>${response.interested_country}</td></tr>
                    <tr><th>Highest Qualification</th><td>${response.highest_qualification}</td></tr>
                    <tr><th>Appointment Date</th><td>${response.appointment_date}</td></tr>
                    <tr><th>Appointment Time</th><td>${response.appointment_time}</td></tr>
                    <tr><th>Other Info</th><td>${response.other_info}</td></tr>
                    <tr><th>Created At</th><td>${response.created_at}</td></tr>
                </table>
            `;

                        // Insert the content into the modal body
                        $('#modalBodyContent').html(modalContent);
                        // Show the modal
                        $('#appointmentModal').modal('show');
                    }
                });
            }

            // Edit Appointment (Similar to View but with editable fields)
            function editAppointment(id) {
                $.ajax({
                    url: '<?php echo base_url("admin/edit_appointment/"); ?>' + id,
                    type: 'GET',
                    dataType: 'json', // Expect JSON data from the server
                    success: function (response) {
                        // Construct the HTML form for editing
                        let modalContent = `
                <form id="editAppointmentForm">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" id="name" value="${response.name}" />
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" value="${response.email}" />
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" value="${response.phone}" />
                    </div>
                    <div class="form-group">
                        <label for="interested_program">Interested Program</label>
                        <input type="text" class="form-control" id="interested_program" value="${response.interested_program}" />
                    </div>
                    <div class="form-group">
                        <label for="interested_country">Interested Country</label>
                        <input type="text" class="form-control" id="interested_country" value="${response.interested_country}" />
                    </div>
                    <div class="form-group">
                        <label for="highest_qualification">Highest Qualification</label>
                        <input type="text" class="form-control" id="highest_qualification" value="${response.highest_qualification}" />
                    </div>
                    <div class="form-group">
                        <label for="appointment_date">Appointment Date</label>
                        <input type="date" class="form-control" id="appointment_date" value="${response.appointment_date}" />
                    </div>
                    <div class="form-group">
                        <label for="appointment_time">Appointment Time</label>
                        <input type="text" class="form-control" id="appointment_time" value="${response.appointment_time}" />
                    </div>
                    <div class="form-group">
                        <label for="other_info">Other Info</label>
                        <textarea class="form-control" id="other_info">${response.other_info}</textarea>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="saveAppointment(${response.id})">Save</button>
                </form>
            `;

                        // Insert the content into the modal body
                        $('#modalBodyContent').html(modalContent);
                        // Show the modal
                        $('#appointmentModal').modal('show');
                    }
                });
            }

            function saveAppointment(id) {
                var formData = {
                    name: $('#name').val(),
                    email: $('#email').val(),
                    phone: $('#phone').val(),
                    interested_program: $('#interested_program').val(),
                    interested_country: $('#interested_country').val(),
                    highest_qualification: $('#highest_qualification').val(),
                    appointment_date: $('#appointment_date').val(),
                    appointment_time: $('#appointment_time').val(),
                    other_info: $('#other_info').val()
                };

                $.ajax({
                    url: '<?php echo base_url("admin/update_appointment/"); ?>' + id,
                    type: 'POST',
                    data: formData,
                    dataType: 'json', // Expect JSON response from the server
                    success: function (response) {
                        if (response.status === 'success') {
                            // Show success message
                            Swal.fire('Success!', response.message, 'success');
                            // Reload the page or update the table
                            location.reload();
                        } else {
                            // Show error message
                            Swal.fire('Error!', response.message, 'error');
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('AJAX error:', status, error);
                        Swal.fire('Error!', 'Something went wrong. Please try again.', 'error');
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