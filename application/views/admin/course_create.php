<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Study Overseas - User Dashboard</title>

    <!-- Include Stylesheets -->
    <?php $this->load->view('inc/admin/admin_styles'); ?>
</head>

<body>
    <!-- Wrapper -->
    <div class="wrapper">
        <!-- Sidebar -->
        <?php $this->load->view('inc/admin/left_menu'); ?>
        <!-- End Sidebar -->

        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <!-- Header -->
            <?php $this->load->view('inc/admin/header'); ?>
            <!-- End Header -->

            <!-- Page Content Wrapper -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <!-- Breadcrumb -->
                    <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Admin Dashboard</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item">
                                        <a href="<?php echo base_url('admin/dashboard'); ?>"><i
                                                class='bx bx-home-alt'></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php
                                    if($this->uri->segment(2) == 'add') {
                                        echo 'Add';
                                    } else {
                                        echo 'Edit';
                                    }
                                    ?> Course</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- End Breadcrumb -->

                    <!-- Dashboard Content -->
                    <div class="row">
                        <!-- Form Section -->
                        <div class="container mt-5">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card shadow">
                                        <div class="card-header bg-primary text-white">
                                            <h3 class="card-title">Course Details</h3>
                                        </div>
                                        <div class="card-body">
                                            <form action="
                                            <?php
                                            if($this->uri->segment(3) == 'edit') {
                                                echo base_url('admin/course/edit/' . $user['id']);
                                            } else {
                                                echo base_url('admin/course/add');
                                            }?>
                                            " method="POST">
                                                <div class="mb-3">
                                                    <label for="Course_id" class="form-label">Course ID</label>
                                                    <input type="text" class="form-control" id="Course_id"
                                                        name="Course_id" value="<?php
                                                            if($this->uri->segment(3) == 'edit') {
                                                                echo $user['first_name'];
                                                            }?>"
                                                            placeholder="COUNTRY-UNI-COURSECODE Ex:- SL-UOC-IT101"
                                                     required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Course_name" class="form-label">Course Name</label>
                                                    <input type="text" class="form-control" id="Course_name"
                                                        name="Course_name" 
                                                        value="<?php
                                                            if($this->uri->segment(3) == 'edit') {
                                                                echo $user["last_name"];
                                                            }?>"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Country" class="form-label">Country</label>
                                                    <select class="form-select" id="Country" name="Country" required>
                                                        <option value="">Select Country</option>
                                                        <option value="Sri Lanka" <?php
                                                            if($this->uri->segment(3) == 'edit') {
                                                                if($user["role"] == 'Sri Lanka') {
                                                                    echo 'selected';
                                                                }
                                                            }?>>Sri Lanka</option>
                                                        <option value="Australia" <?php
                                                            if($this->uri->segment(3) == 'edit') {
                                                                if($user["role"] == 'Australia') {
                                                                    echo 'selected';
                                                                }
                                                            }?>>Australia</option>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Course_description" class="form-label">Description</label>
                                                    <textarea class="form-control" id="Course_description" name="Course_description"
                                                        required></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Course_requirements" class="form-label">Course Requirements</label>
                                                    <textarea class="form-control" id="Course_requirements" name="Course_requirements"
                                                        required></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="University" class="form-label">University</label>
                                                    <select class="form-select" id="University" name="University" required>
                                                        <option value="">Select University</option>
                                                        <option value="University of Colombo" <?php
                                                            if($this->uri->segment(3) == 'edit') {
                                                                if($user["role"] == 'University of Colombo') {
                                                                    echo 'selected';
                                                                }
                                                            }?>>University of Colombo</option>
                                                        <option value="University of Moratuwa" <?php
                                                            if($this->uri->segment(3) == 'edit') {
                                                                if($user["role"] == 'University of Moratuwa') {
                                                                    echo 'selected';
                                                                }
                                                            }?>>University of Moratuwa</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Intake" class="form-label">Intake</label>
                                                    <input type="text" class="form-control" id="Intake"
                                                        name="Intake" 
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Scholarship" class="form-label">Scholarship</label>
                                                    <input type="text" class="form-control" id="Scholarship"
                                                        name="Scholarship" 
                                                        required>
                                                </br>
                                                <div class="mb-3">
                                                    <label for="English_language_requirement" class="form-label">English Language Requirement</label>
                                                    <input type="text" class="form-control" id="English_language_requirement"
                                                        name="English_language_requirement" 
                                                        required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="Course_fee" class="form-label">Course Fee</label>
                                                    <input type="text" class="form-control" id="Course_fee"
                                                        name="Course_fee" 
                                                        required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="Years" class="form-label">Course Duration</label>
                                                    <input type="text" class="form-control" id="Years"
                                                        name="Years" 
                                                        required>
                                                </div>
                                                <!-- align the button to the right -->
                                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                    <button type="submit" name="submit" value="submit"
                                                        class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Form Section -->
                    </div>
                    <!-- End Dashboard Content -->

                </div>
            </div>
            <!-- End Page Content Wrapper -->
        </div>
        <!-- End Page Wrapper -->

        <!-- Overlay -->
        <div class="overlay toggle-btn-mobile"></div>
        <!-- End Overlay -->

        <!-- Back To Top Button -->
        <a href="javascript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!-- End Back To Top Button -->

        <!-- Footer -->
        <?php $this->load->view('inc/admin/footer'); ?>
        <!-- End Footer -->
    </div>
    <!-- End Wrapper -->

    <!-- Start Theme Switcher -->
    <?php $this->load->view('inc/web/theme_switcher'); ?>
    <!-- End Theme Switcher -->

    <!-- Include Scripts -->
    <?php $this->load->view('inc/admin/admin_scripts'); ?>
</body>

</html>