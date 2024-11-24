<!-- Main Header -->
<header class="main-header header-style-two" style=" box-shadow: 0 0 100px 40px black;">
    <!-- header-top -->
    <div class="header-top">
        <div class="container clearfix">
            <div class="left-column">
                <ul class="clearfix">
                    <li class="upper-column">
                        <i class="fa fa-phone-volume"></i>
                        Call Us!: <a href="tel:+94777840028">+94 77 7840028</a>
                    </li>
                    <li class="upper-column">
                        <i class="fa fa-envelope-square"></i>
                        <a href="mailto:info@studyoverseas.lk">info@studyoverseas.lk</a>
                    </li>
                </ul>
            </div>
            <div class="right-column clearfix">
                <ul class="social clearfix">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div><!-- header-top end -->

    <!-- header-bottom -->
    <div class="container">
        <div class="header-bottom">
            <div class="nav-outer clearfix" style="padding: 0;">
                <div class="logo-outer" style="padding: 0;">
                    <figure class="logo-box">
                        <a href="<?php echo base_url(); ?>">
                            <img src="<?php echo base_url(); ?>assets/imgs/logo/StudyOverseasLogo_removeBack.png"
                                alt="Study Overseas Logo" style="width:150px; height:auto;">
                        </a>
                    </figure>
                </div>
                <div class="menu-area clearfix">
                    <nav class="main-menu navbar-expand-lg">
                        <div class="navbar-header">
                            <!-- Toggle Button -->
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation clearfix" style="padding-top: 13px;">
                                <li class="current dropdown"><a href="<?php echo base_url(); ?>">Home</a></li>
                                <li class="dropdown"><a href="<?php echo base_url('about'); ?>">About Us</a></li>
                                <li class="dropdown"><a href="<?php echo base_url('courses'); ?>">Courses</a></li>
                                <li><a href="<?php echo base_url('contact'); ?>">Contact Us</a></li>
                                <li><a href="<?php echo base_url('appointment'); ?>">Appointment</a></li>
                                <li><a href="<?php echo base_url('auth/web_login'); ?>">Student Portal</a></li>
                            </ul>
                        </div>


                    </nav>
                </div>
            </div>
        </div>
    </div><!-- header-bottom end -->

    <!--Sticky Header-->
    <div class="sticky-header" style="background-color: whitesmoke;">
        <div class="container clearfix">
            <figure class="logo-box">
                <a href="#">
                    <img src="<?php echo base_url(); ?>assets/imgs/logo/StudyOverseasLogo_removeBack.png"
                        alt="Study Overseas Logo" style="width:120px; height:auto;">
                </a>
            </figure>
            <div class="menu-area" style="padding-top: 20px">
                <nav class="main-menu navbar-expand-lg">
                    <div class="navbar-header">
                        <!-- Toggle Button -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse clearfix">
                        <ul class="navigation clearfix">
                            <li class="dropdown <?php echo ($this->uri->segment(1) == '' ? 'current' : ''); ?>">
                                <a href="<?php echo base_url(); ?>">Home</a>
                            </li>
                            <li class="dropdown <?php echo ($this->uri->segment(1) == 'about' ? 'current' : ''); ?>">
                                <a href="<?php echo base_url('about'); ?>">About Us</a>
                            </li>
                            <li class="dropdown <?php echo ($this->uri->segment(1) == 'courses' ? 'current' : ''); ?>">
                                <a href="<?php echo base_url('courses'); ?>">Courses</a>
                            </li>
                            <li class="<?php echo ($this->uri->segment(1) == 'contact' ? 'current' : ''); ?>">
                                <a href="<?php echo base_url('contact'); ?>">Contact Us</a>
                            </li>
                            <li class="<?php echo ($this->uri->segment(1) == 'appointment' ? 'current' : ''); ?>">
                                <a href="<?php echo base_url('appointment'); ?>">Appointment</a>
                            </li>
                            <li
                                class="<?php echo ($this->uri->segment(1) == 'auth' && $this->uri->segment(2) == 'web_login' ? 'current' : ''); ?>">
                                <a href="<?php echo base_url('auth/web_login'); ?>">Student Portal</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>

        </div>
    </div><!-- sticky-header end -->
</header>
<!-- End Main Header -->