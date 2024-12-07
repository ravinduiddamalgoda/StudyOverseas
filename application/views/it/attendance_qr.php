<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Study Overseas - Attendance</title>

    <!--include Stylesheets -->
    <?php $this->load->view('inc/admin/admin_styles'); ?>

</head>

<body>
    <!-- wrapper -->
    <div class="wrapper">
        <!--sidebar-wrapper-->
        <?php $this->load->view('inc/it/left_menu'); ?>
        <!--end sidebar-wrapper-->
        <!--header-->
        <?php $this->load->view('inc/it/header'); ?>
        <!--end header-->
        <!--page-wrapper-->
        <div class="page-wrapper">
            <!--page-content-wrapper-->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <!-- data table  -->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h4 class="mb-0">Scan the QR code to mark attendance</h4>
                            </div>
                            <hr />
                            <!-- container with flexbox centering -->
                            <div class="d-flex justify-content-center">
                                <div class="d-flex flex-column align-items-center">
                                    <div id="qrcode"></div>
                                    <p class="mt-3">Seed : <?php echo $secure_rand?></p>
                                </div>
                                <hr />
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
                <?php $this->load->view('inc/it/footer'); ?>
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
            <script type="module">
                import Notify from '<?php echo base_url(); ?>assets/admin/js/notify.js';

            </script>

            <script type="text/javascript">
                let qrContainer = document.getElementById("qrcode");

                let encodeUrl = "<?php echo base_url('user/attendance/').$secure_rand; ?>";
                //new QRCode(document.getElementById("qrcode"), "http://jindo.dev.naver.com/collie");

                var qrcode = new QRCode(qrContainer, {
                    text: encodeUrl,
                    width: 368,
                    height: 368,
                    colorDark: "#000000",
                    colorLight: "#ffffff",
                    correctLevel: QRCode.CorrectLevel.H
                });
            </script>

</body>

</html>