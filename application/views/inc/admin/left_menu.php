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
            <!-- <ul>
                <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Analytics</a>
                </li>
                <li> <a href="index2.html"><i class="bx bx-right-arrow-alt"></i>Sales</a>
                </li>
            </ul> -->
        </li>

        <!-- <li class="menu-label">Pages</li> -->
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon icon-color-3"><i class="bx bx-user"></i>
                </div>
                <div class="menu-title">User Management</div>
            </a>
            <ul>
                <?php if ($this->session->userdata('role') == 'admin'): ?> <!-- Check if the user is an admin -->
                    <li>
                        <a href="<?php echo base_url('admin/users'); ?>" target=""><i class="bx bx-right-arrow-alt"></i>User
                            List</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/user/add'); ?>" target=""><i class="bx bx-right-arrow-alt"></i>Create
                            User</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/appointments'); ?>" target=""><i
                                class="bx bx-right-arrow-alt"></i>Appointment
                            List</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/inqueries'); ?>" target=""><i
                                class="bx bx-right-arrow-alt"></i>Inquiry List</a>
                    </li>

                <?php else: ?>
                    <!-- Optionally, you can add alternative menu items for non-admin users here -->
                    <li>
                        <a href="<?php echo base_url('user/dashboard'); ?>" target=""><i
                                class="bx bx-right-arrow-alt"></i>Your Dashboard</a>
                    </li>
                <?php endif; ?>
            </ul>
        </li>

        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon icon-color-3"><i class="bx bx-book-bookmark"></i>
                </div>
                <div class="menu-title">Course Management</div>
            </a>
            <ul>
            <?php if ($this->session->userdata('role') == 'admin'): ?> <!-- Check if the user is an admin -->
                <li>
                    <a href="<?php echo base_url('admin/courses'); ?>" target="">
                        <i class="bx bx-right-arrow-alt"></i>
                        Course List
                    </a>
                </li>
                <?php endif?>
            </ul>
        </li>

        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon icon-color-3"><i class="bx bx-globe"></i>
                </div>
                <div class="menu-title">Country Management</div>
            </a>
            <ul>
            <?php if ($this->session->userdata('role') == 'admin'): ?> <!-- Check if the user is an admin -->
                <li>
                    <a href="<?php echo base_url('admin/countries'); ?>" target="">
                        <i class="bx bx-right-arrow-alt"></i>
                        Country List
                    </a>
                </li>
                <?php endif?>
            </ul>
        </li>

        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon icon-color-3"><i class="bx bxs-user-badge"></i>
                </div>
                <div class="menu-title">Employee Management</div>
            </a>
            <ul>
            <?php if ($this->session->userdata('role') == 'admin'): ?> <!-- Check if the user is an admin -->
                <li>
                    <a href="<?php echo base_url('admin/employees'); ?>" target="">
                        <i class="bx bx-right-arrow-alt"></i>
                        Employee List
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/employees/attendence'); ?>" target="">
                        <i class="bx bx-right-arrow-alt"></i>
                        Employee Attendance
                    </a>
                </li>
                <?php endif?>
            </ul>
        </li>

    </ul>
    <!--end navigation-->
</div>
<!--end sidebar-wrapper-->