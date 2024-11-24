<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Study Overseas - Contact</title>

    <!--include Stylesheets -->
    <?php $this->load->view('inc/web/web_styles'); ?>
    <style>
        .full-screen-map {
            width: 100vw;
            height: 75vh;
        }
    </style>
</head>

<!-- page wrapper -->

<body class="boxed_wrapper">

    <!-- Main Header -->
    <?php $this->load->view('inc/web/web_header'); ?>
    <!-- End Main Header -->

    <!-- page-title -->
    <section class="page-title"
        style="background-image: url(<?php echo base_url(); ?>assets/web/imgs/titel_image.jpg);">
        <div class="container">
            <div class="content-box">
                <h1 class="title">Contact us</h1>
                <ul class="bread-crumb">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li>Contact us</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- page-title end -->

    <!-- body content  -->
    <div>
        <!-- contact-section -->
        <section class="contact-section sec-pad">
            <div class="container">
                <div class="title-box centred">
                    <div class="title">
                        <h2><span>At StudyOverseas,</span> We are always<br />committed to protect you!</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12 contact-column">
                        <div class="contact-info">
                            <div class="title">
                                <h3>Contact Info</h3>
                            </div>
                            <div class="info-box">
                                <div class="single-info">
                                    <h5>Colombo Office</h5>
                                    <div class="text">Carlton House, 466, 2/2, Galle Road, Colombo 00300, Sri Lanka.
                                    </div>
                                    <div class="text"><strong>Phone:</strong> <a href="tel:+94777840028">+9477 784
                                            0028</a></div>
                                    <div class="text"><strong>Email:</strong> <a
                                            href="mailto:info@studyoverseas.lk">info@studyoverseas.lk</a></div>
                                </div>
                                <div class="single-info">
                                    <h5>Kandy Office</h5>
                                    <div class="text">170, DS Senanayake Veediya, Kandy 20000, Sri Lanka.</div>
                                    <div class="text"><strong>Phones:</strong> <a
                                            href="tel:+9477183082">+94777183082</a>, <a
                                            href="tel:+94770095767">+94770095767</a></div>
                                    <div class="text"><strong>Email:</strong> <a
                                            href="mailto:info@studyoverseas.lk">info@studyoverseas.lk</a></div>
                                </div>
                                <div class="single-info">
                                    <h5>Other Contact Info</h5>
                                    <div class="text">514 S. Magnolia St. Orlando, FL 32806</div>
                                    <div class="text"><strong>Phone:</strong> <a href="tel:0800564432">0800 564 432</a>,
                                        <a href="tel:1-789-415-639">1-789-415-639</a>
                                    </div>
                                    <div class="text"><strong>Email:</strong> <a
                                            href="mailto:support@example.com">support@example.com</a><br /><a
                                            href="mailto:inquiry@example.com">inquiry@example.com</a></div>
                                </div>
                            </div>
                            <ul class="social clearfix">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 form-column">
                        <div class="contact-form-area">
                            <form method="post" action="<?php echo base_url('contact/submit_inquiry'); ?>"
                                id="contact-form">
                                <div class="row">
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <input type="text" name="username" id="username" class="form-control"
                                            placeholder="Full Name" required>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="Email address" required>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <input type="text" name="phone" id="phone" class="form-control"
                                            placeholder="Phone Number" required>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <input type="text" name="subject" id="subject" class="form-control"
                                            placeholder="Subject" required>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <select name="inquiryType" id="inquiryType" class="form-control"
                                            style="background-color: #F2F2F2; height: 50px;"
                                            placeholder="Select Inquiry Type" required>
                                            <option value="" disabled selected>Select Inquiry Type</option>
                                            <option value="complaints">Complaints</option>
                                            <option value="suggestions">Suggestions</option>
                                            <option value="inquiry">Inquiry about university and courses</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <textarea name="message" id="message" class="form-control" placeholder="Message"
                                            required></textarea>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 clearfix">
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" name="submit-form" id="submitButton"
                                                class="btn btn-primary">SUBMIT</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- contact-section end -->


        <!-- google-map -->
        <section class="google-map-section">
            <div class="google-map-area">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253496.58204980174!2d79.54677079453126!3d6.904461499999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2595df1470d5d%3A0xfe393e393f8b1a0f!2sStudy%20Overseas!5e0!3m2!1sen!2slk!4v1728224449851!5m2!1sen!2slk"
                    class="full-screen-map" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </section>
        <!-- google-map end -->

    </div>

    <!-- Success Modal -->
    <div id="successModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #d4edda;">
                    <h5 class="modal-title" style="color: #28a745; font-size: 1.5rem;">Success</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="successMessage" style="font-size: 1.2rem; color: #155724;"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Error Modal -->
    <div id="errorModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #f8d7da;">
                    <h5 class="modal-title" style="color: #dc3545; font-size: 1.5rem;">Error</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="errorMessage" style="font-size: 1.2rem; color: #721c24;"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>





    <!-- footer-section -->
    <?php $this->load->view('inc/web/web_footer'); ?>
    <!-- footer-section end -->

    <!-- include Scripts  -->
    <?php $this->load->view('inc/web/web_scripts'); ?>

    <script>
        $(document).ready(function () {
            $('#contact-form').on('submit', function (e) {
                e.preventDefault(); // Prevent form from submitting normally

                var submitButton = $('#submitButton'); // Cache the submit button element
                submitButton.prop('disabled', true); // Disable the button
                submitButton.text('Processing...'); // Change button text to "Processing..."

                $.ajax({
                    url: '<?php echo base_url('contact/submit_inquiry'); ?>', // Controller method URL
                    type: 'POST',
                    data: $(this).serialize(), // Serialize form data
                    dataType: 'json',
                    success: function (response) {
                        if (response.status === 'success') {
                            $('#successMessage').text(response.message);
                            $('#successModal').modal('show'); // Show success modal
                            $('#contact-form')[0].reset(); // Clear form
                        } else {
                            $('#errorMessage').text(response.message);
                            $('#errorModal').modal('show'); // Show error modal
                        }
                    },
                    error: function (xhr, status, error) {
                        $('#errorMessage').text('An error occurred. Please try again.');
                        $('#errorModal').modal('show'); // Show error modal for AJAX failure
                    },
                    complete: function () {
                        submitButton.prop('disabled', false); // Re-enable the button
                        submitButton.text('Submit'); // Reset button text to "Submit"
                    }
                });
            });
        });
    </script>




</body><!-- End of .page_wrapper -->

</html>