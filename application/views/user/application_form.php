<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>New Application</title>

    <?php $this->load->view('inc/user/user_styles'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $this->load->view('inc/user/left_menu'); ?>
        <div class="page-wrapper">
            <?php $this->load->view('inc/user/header'); ?>
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">New Application</div>
                    </div>

                    <div class="card shadow">
                        <div class="card-header bg-primary text-white">
                            <h3 class="card-title">Submit Application</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo base_url('user/application/create'); ?>" method="POST">
                                <div class="mb-3">
                                    <label for="course_id" class="form-label">Course</label>
                                    <select class="form-select" id="course_id" name="course_id" required>
                                        <?php foreach ($courses as $course): ?>
                                            <option value="<?php echo $course['Course_id']; ?>"><?php echo $course['Course_name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="application_details" class="form-label">Details</label>
                                    <textarea class="form-control" id="application_details" name="application_details" rows="4" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('inc/user/user_scripts'); ?>
</body>

</html>
