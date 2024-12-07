<!--sidebar-wrapper-->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div class="">
            <img src="<?php echo base_url(); ?>assets/imgs/logo/StudyOverseasLogo.png" class="logo-icon-2" alt="" />
        </div>
        <div>
            <h4 class="logo-text">Study Overseas</h4>
        </div>
        <a href="javascript:;" class="toggle-btn ms-auto"> <i class="bx bx-menu"></i>
        </a>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="<?php echo base_url('it/dashboard'); ?>" class="">
                <div class="parent-icon icon-color-1"><i class="bx bx-home-alt"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon icon-color-3"><i class="bx bx-book-bookmark"></i>
                </div>
                <div class="menu-title">Course Management</div>
            </a>
            <ul>
                <?php if ($this->session->userdata('role') == 'it'): ?> <!-- Check if the user is an admin -->
                    <li>
                        <a href="<?php echo base_url('it/courses'); ?>" target="">
                            <i class="bx bx-right-arrow-alt"></i>
                            Course List
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('it/course/add'); ?>" target="">
                            <i class="bx bx-right-arrow-alt"></i>
                            Add Course
                        </a>
                    </li>
                <?php endif ?>
            </ul>
        </li>

        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon icon-color-3"><i class="bx bx-globe"></i>
                </div>
                <div class="menu-title">Country Management</div>
            </a>
            <ul>
                <?php if ($this->session->userdata('role') == 'it'): ?> <!-- Check if the user is an admin -->
                    <li>
                        <a href="<?php echo base_url('it/countries'); ?>" target="">
                            <i class="bx bx-right-arrow-alt"></i>
                            Country List
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('it/country/add'); ?>" target="">
                            <i class="bx bx-right-arrow-alt"></i>
                            Add Countries
                        </a>
                    </li>
                <?php endif ?>
            </ul>
        </li>

        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon icon-color-3"><i class="bx bxs-user-badge"></i>
                </div>
                <div class="menu-title">Employee Management</div>
            </a>
            <ul>
                <?php if ($this->session->userdata('role') == 'it'): ?> <!-- Check if the user is an admin -->
                    <li>
                        <a href="<?php echo base_url('it/attendance/qr'); ?>" target="">
                            <i class="bx bx-right-arrow-alt"></i>
                            Attendance QR
                        </a>
                    </li>
                <?php endif ?>
            </ul>
        </li>
    </ul>
    <!--end navigation-->
</div>
<!--end sidebar-wrapper-->