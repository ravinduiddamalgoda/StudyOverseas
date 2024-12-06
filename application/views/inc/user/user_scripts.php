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
        //get the success message from the session, remove html tags and line breaks
        let success = "<?php echo strip_tags(str_replace(array("\r", "\n"), '', $this->session->flashdata('success'))); ?>";
        Notify.success(success);
    <?php elseif ($this->session->flashdata('error')): ?>
        //get the error message from the session, remove html tags and line breaks
        let error = "<?php echo strip_tags(str_replace(array("\r", "\n"), '', $this->session->flashdata('error'))); ?>";
        Notify.error("An error occurred");
        Notify.error(error);
    <?php endif; ?>
</script>