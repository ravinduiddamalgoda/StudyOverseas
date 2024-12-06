<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Applications</title>

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
                        <div class="breadcrumb-title pe-3">Applications</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('user/dashboard'); ?>"><i class='bx bx-home-alt'></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Applications</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                    <div class="card shadow">
                        <div class="card-header bg-primary text-white">
                            <h3 class="card-title">Your Applications</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Course</th>
                                        <th>Status</th>
                                        <th>Details</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($applications as $index => $app): ?>
                                        <tr>
                                            <td><?php echo $index + 1; ?></td>
                                            <td><?php echo $app['Course_name']; ?></td>
                                            <td><?php echo ucfirst($app['application_status']); ?></td>
                                            <td><?php echo $app['application_details']; ?></td>
                                            <td>
                                                <a href="<?php echo base_url('user/application/update/' . $app['application_id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="<?php echo base_url('user/application/delete/' . $app['application_id']); ?>" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('inc/user/user_scripts'); ?>
</body>

</html>
