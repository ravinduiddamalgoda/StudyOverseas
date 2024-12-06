<!--header-->
<header class="top-header">
    <nav class="navbar navbar-expand">
        <div class="left-topbar d-flex align-items-center">
            <a href="javascript:;" class="toggle-btn"> <i class="bx bx-menu"></i>
            </a>
        </div>
        <div class="flex-grow-1 search-bar">
            <div class="input-group">
                <button class="btn btn-search-back search-arrow-back" type="button"><i
                        class="bx bx-arrow-back"></i></button>
                <input type="text" class="form-control" placeholder="search" />
                <button class="btn btn-search" type="button"><i class="lni lni-search-alt"></i></button>
            </div>
        </div>
        <div class="right-topbar ms-auto">
            <ul class="navbar-nav">
                <li class="nav-item search-btn-mobile">
                    <a class="nav-link position-relative" href="javascript:;"> <i
                            class="bx bx-search vertical-align-middle"></i>
                    </a>
                </li>
                <li class="nav-item dropdown dropdown-lg">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="javascript:;"
                        data-bs-toggle="dropdown">
                        <!-- <span class="msg-count">6</span> -->
                        <i class="bx bx-comment-detail vertical-align-middle"></i>
                    </a>

                </li>
                <li class="nav-item dropdown dropdown-lg">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="javascript:;"
                        data-bs-toggle="dropdown"> <i class="bx bx-bell vertical-align-middle"></i>
                        <!-- <span class="msg-count">8</span> -->
                    </a>

                </li>
                <li class="nav-item dropdown dropdown-user-profile">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                        data-bs-toggle="dropdown">
                        <div class="d-flex user-box align-items-center">
                            <div class="user-info">
                                <p class="user-name mb-0">
                                    <?php echo $this->session->userdata('first_name') . ' ' . $this->session->userdata('last_name'); ?>
                                </p>
                                <p class="designattion mb-0">Available</p>
                            </div>
                            <img src=" <?php echo base_url(); ?>assets/admin/imgs/avatars/avatar-1.png" class="user-img"
                                alt="user avatar">
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="javascript:;"><i
                                class=""></i><span><?php echo $this->session->userdata('email'); ?></span></a>
                        <a class="dropdown-item" href="javascript:;"><i class=""></i><span>
                                <?php echo $this->session->userdata('role'); ?></span></a>
                        <a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
                        <a class="dropdown-item" href="javascript:;"><i class="bx bx-cog"></i><span>Settings</span></a>
                        <a class="dropdown-item" href="javascript:;"><i
                                class="bx bx-tachometer"></i><span>Dashboard</span></a>

                        <div class="dropdown-divider mb-0"></div>


                        <?php if ($this->session->userdata('role') == 'admin'): ?>
                            <!-- Check if the user is an admin -->
                            <a class="dropdown-item" href="<?php echo base_url('auth/logout'); ?>">
                                <i class="bx bx-power-off"></i><span>Logout</span>
                            </a>

                        <?php else: ?>
                            <a class="dropdown-item" href="<?php echo base_url('auth/logout'); ?>">
                                <i class="bx bx-power-off"></i><span>Logout</span>
                            </a>
                        <?php endif; ?>

                    </div>
                </li>

            </ul>
        </div>
    </nav>
</header>
<!--end header-->