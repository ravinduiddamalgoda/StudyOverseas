<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Welcome to Dashboard</h1>
            <p>Logged in as: <?php echo $this->session->userdata('first_name') . ' ' . $this->session->userdata('last_name'); ?></p>
            <p>Email: <?php echo $this->session->userdata('email'); ?></p>
            <p>Role: <?php echo $this->session->userdata('role'); ?></p>

            <hr>

            <h3>Actions</h3>
            <ul>
                <li><a href="#">Manage Users</a></li>
                <li><a href="#">View Reports</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="<?php echo base_url('auth/logout'); ?>">Logout</a></li>
            </ul>
        </div>
    </div>
</div>
