<!-- Admin loader script -->
<script src="<?php echo base_url(); ?>assets/admin/js/pace.min.js"></script>
<!-- Include other admin-specific scripts here -->
<!--plugins-->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?php echo base_url(); ?>assets/admin/js/jquery.min.js"></script>
<!--Password show & hide js -->

<!-- dashboard scripts  -->

<!-- Bootstrap JS -->
<script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.bundle.min.js"></script>

<!--plugins-->
<script src="<?php echo base_url(); ?>assets/admin/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/simplebar/js/simplebar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<!-- Vector map JavaScript -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/vectormap/jquery-jvectormap-in-mill.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/vectormap/jquery-jvectormap-us-aea-en.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/vectormap/jquery-jvectormap-uk-mill-en.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/vectormap/jquery-jvectormap-au-mill.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/index.js"></script>

<!-- App JS -->
<script src="<?php echo base_url(); ?>assets/admin/js/app.js"></script>
<script>
    new PerfectScrollbar('.dashboard-social-list');
    new PerfectScrollbar('.dashboard-top-countries');
</script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Notify JS -->
<script type="module">
    import Notify from '<?php echo base_url(); ?>assets/admin/js/Notify.js';
    <?php if ($this->session->flashdata('success')): ?>
        let successList = `<?php echo $this->session->flashdata('success'); ?>`.split('</p>');
        successList.pop();
        successList.forEach(success => {
            success = success.replace(/<[^>]*>?/gm, '').replace(/[\r\n]+/gm, '');
            Notify.success(success);
        });
        
    <?php elseif ($this->session->flashdata('error')): ?>
        //get the error message list from the session by splitting the string into an array using </p> as the delimiter
        let errorList = `<?php echo $this->session->flashdata('error'); ?>`.split('</p>');
        //remove the last element of the array as it is an empty string
        errorList.pop();
        //for each error message in the array, remove html tags and line breaks
        errorList.forEach(error => {
            error = error.replace(/<[^>]*>?/gm, '').replace(/[\r\n]+/gm, '');
            Notify.error(error);
        });
    <?php endif; ?>
</script>