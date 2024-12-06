<!-- Sidebar Wrapper -->
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
    <!-- Navigation -->
    <ul class="metismenu" id="menu">
        <!-- Dashboard Section -->
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon icon-color-1"><i class="bx bx-home-alt"></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
            <ul>
                <li>
                    <a href="<?php echo base_url('user/dashboard'); ?>"><i class="bx bx-right-arrow-alt"></i>Your Dashboard</a>
                </li>
            </ul>
        </li>

        <!-- Appointments Section -->
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon icon-color-3"><i class="bx bx-user"></i></div>
                <div class="menu-title">Appointments</div>
            </a>
            <ul>
                <li>
                    <a href="<?php echo base_url('user/appointment/view'); ?>"><i class="bx bx-right-arrow-alt"></i>View Appointments</a>
                </li>
                <li>
                    <a href="<?php echo base_url('user/appointment/add'); ?>"><i class="bx bx-right-arrow-alt"></i>New Appointment</a>
                </li>
            </ul>
        </li>

        <!-- Applications Section -->
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon icon-color-2"><i class="bx bx-file"></i></div>
                <div class="menu-title">Applications</div>
            </a>
            <ul>
                <li>
                    <a href="<?php echo base_url('user/application'); ?>"><i class="bx bx-right-arrow-alt"></i>View Applications</a>
                </li>
                <li>
                    <a href="<?php echo base_url('user/application/create'); ?>"><i class="bx bx-right-arrow-alt"></i>New Application</a>
                </li>
            </ul>
        </li>

        <!-- Account Section -->
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon icon-color-4"><i class="bx bx-lock"></i></div>
                <div class="menu-title">Account</div>
            </a>
            <ul>
                <li>
                    <a href="<?php echo base_url('user/update_password'); ?>"><i class="bx bx-right-arrow-alt"></i>Update Password</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- End Navigation -->
</div>
<!-- End Sidebar Wrapper -->
