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

        <!--page-wrapper-->
        <div class="page-wrapper">
            <!--header-->
            <?php $this->load->view('inc/admin/header'); ?>
            <!--end header-->

            <!--page-content-wrapper-->
            <div class="page-content-wrapper">
                <div class="page-content">
                         <!--breadcrumb-->
                         <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Admin dashboard</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i
                                                class='bx bx-home-alt'></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Admin dashboard</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="ms-auto">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary">Add New</button>
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

    <script>
        new PerfectScrollbar('.dashboard-social-list');
        new PerfectScrollbar('.dashboard-top-countries');
    </script>
</body>

</html>