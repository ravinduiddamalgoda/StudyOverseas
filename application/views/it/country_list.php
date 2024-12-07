<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Study Overseas - Country List</title>

    <!-- Include Stylesheets -->
    <?php $this->load->view('inc/admin/admin_styles'); ?>
</head>

<body>
    <!-- wrapper -->
    <div class="wrapper">
        <!-- sidebar-wrapper -->
        <?php $this->load->view('inc/it/left_menu'); ?>
        <!-- end sidebar-wrapper -->

        <!-- header -->
        <?php $this->load->view('inc/it/header'); ?>
        <!-- end header -->

        <!-- page-wrapper -->
        <div class="page-wrapper">
            <!-- page-content-wrapper -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <!-- breadcrumb -->
                    <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Country List</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i
                                                class='bx bx-home-alt'></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Country List</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="ms-auto">
                            <div class="btn-group">
                                <a href="<?php echo base_url('/it/country/add') ?>" class="btn btn-primary">Add New
                                    Country</a>
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
                                <h4 class="mb-0">Country List</h4>
                            </div>
                            <hr />
                            <div class="table-responsive">
                                <table id="country-table" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>ISO Code</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($countries)): ?>
                                            <?php foreach ($countries as $country): ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($country['id']); ?></td>
                                                    <td><?php echo htmlspecialchars($country['name']); ?></td>
                                                    <td><?php echo htmlspecialchars($country['iso_code']); ?></td>

                                                    <td>
                                                        <div class="input-group">
                                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                                id="actionsDropdown<?php echo htmlspecialchars($country['id']); ?>"
                                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">Actions</button>
                                                            <div class="dropdown-menu"
                                                                aria-labelledby="actionsDropdown<?php echo htmlspecialchars($country['id']); ?>">
                                                                <li>
                                                                    <a class="dropdown-item"
                                                                        href="<?php echo base_url('it/country/edit/' . $country['id']); ?>">Edit</a>
                                                                </li>
                                                                <li>
                                                                <a class="dropdown-item" href="javascript:void(0);"
                                                                    onclick="confirmDelete(<?php echo htmlspecialchars($country['id']); ?>)">Delete</a>
                                                                </li>
                                                            </l>
                                                        </div>
                                                    </td>

                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="9" class="text-center">No Countries found</td>
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
            <div class="modal fade" id="viewCountryModel" tabindex="-1" aria-labelledby="viewCountryModelLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewCountryModelLabel">Country Details</h5>
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
            <?php $this->load->view('inc/it/footer'); ?>
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
                var table = $('#country-table').DataTable({
                    responsive: true,
                    lengthChange: false,
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis']
                });

                // Append buttons container
                table.buttons().container().appendTo('#country-table_wrapper .col-md-6:eq(0)');
            });

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
                        window.location.href = "<?php echo base_url('it/country/delete/'); ?>" + id;
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