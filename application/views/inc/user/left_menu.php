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
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon icon-color-1"><i class="bx bx-home-alt"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
            <li>
                <a href="<?php echo base_url('user/dashboard'); ?>" target=""><i
                                class="bx bx-right-arrow-alt"></i>Your Dashboard</a>
            </li>
        </li>

        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon icon-color-3"><i class="bx bx-user"></i>
                </div>
                <div class="menu-title">Appointments</div>
            </a>
            <ul>
                <?php if ($this->session->userdata('role') == 'student'): ?> <!-- Check if the user is an admin -->
                    <li>
                        <a href="<?php echo base_url('user/appointment/add'); ?>" target=""><i
                                class="bx bx-right-arrow-alt"></i>New Appointment</a>
                    </li>

                <?php else: ?>
                    <!-- Optionally, you can add alternative menu items for non-admin users here -->

                <?php endif; ?>
            </ul>
        </li>
    </ul>
    <!--end navigation-->
</div>
<!--end sidebar-wrapper-->