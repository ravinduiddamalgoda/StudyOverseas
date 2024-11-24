<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Study Overseas - </title>

    <!--include Stylesheets -->
    <?php $this->load->view('inc/web/web_styles'); ?>

</head>

<!-- page wrapper -->

<body class="boxed_wrapper">

    <!-- Main Header -->
    <?php $this->load->view('inc/web/web_header'); ?>
    <!-- End Main Header -->

    <!-- page-title -->
    <section class="page-title"
        style="background-image: url(<?php echo base_url(); ?>assets/web/imgs/titel_image.jpg);">
        <div class="container">
            <div class="content-box">
                <h1 class="title">Course</h1>
                <ul class="bread-crumb">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li>Course</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- page-title end -->

    <!-- body content  -->
    <div>

    </div>


    <!-- footer-section -->
    <?php $this->load->view('inc/web/web_footer'); ?>
    <!-- footer-section end -->

    <!-- include Scripts  -->
    <?php $this->load->view('inc/web/web_scripts'); ?>

</body><!-- End of .page_wrapper -->

</html>