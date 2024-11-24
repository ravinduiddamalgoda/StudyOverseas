<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Study Overseas - </title>

    <!--include Stylesheets -->
    <?php $this->load->view('inc/web/web_styles'); ?>

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
                <h1 class="title">Appointment</h1>
                <ul class="bread-crumb">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li>Appointment</li>
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

                    <div class="col-lg-8 col-md-12 col-sm-12 form-column">
                        <div class="contact-form-area">
                            <form method="post" action="<?php echo base_url('appointment/submit_appointment'); ?>"
                                id="appointment-form">
                                <div class="row">
                                    <!-- Full Name -->
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Full Name" required>
                                    </div>

                                    <!-- Email -->
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="Email address" required>
                                    </div>

                                    <!-- Phone Number -->
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <input type="text" name="phone" id="phone" class="form-control"
                                            placeholder="Phone Number" required>
                                    </div>

                                    <!-- Interested Program -->
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <input type="text" name="interested_program" id="interested_program"
                                            class="form-control" placeholder="Interested Program" required>
                                    </div>

                                    <!-- Interested Country -->
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <input type="text" name="interested_country" id="interested_country"
                                            class="form-control" placeholder="Interested Country" required>
                                    </div>

                                    <!-- Highest Qualification -->
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <input type="text" name="highest_qualification" id="highest_qualification"
                                            class="form-control" placeholder="Highest Qualification" required>
                                    </div>

                                    <!-- Date Selection -->
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <input type="date" name="appointment_date" id="appointment_date"
                                            style="background-color: #F2F2F2; height: 50px;" class="form-control"
                                            required>
                                    </div>

                                    <!-- Time Slot Selection -->
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <select name="appointment_time" id="appointment_time" class="form-control"
                                            style="background-color: #F2F2F2; height: 50px;" required>
                                            <option value="" disabled selected>Select Appointment Time</option>
                                            <option value="09:00 AM - 10:00 AM">09:00 AM - 10:00 AM</option>
                                            <option value="10:00 AM - 11:00 AM">10:00 AM - 11:00 AM</option>
                                            <option value="11:00 AM - 12:00 PM">11:00 AM - 12:00 PM</option>
                                            <option value="01:00 PM - 02:00 PM">01:00 PM - 02:00 PM</option>
                                            <option value="02:00 PM - 03:00 PM">02:00 PM - 03:00 PM</option>
                                            <option value="03:00 PM - 04:00 PM">03:00 PM - 04:00 PM</option>
                                            <option value="04:00 PM - 05:00 PM">04:00 PM - 05:00 PM</option>
                                            <option value="05:00 PM - 06:00 PM">05:00 PM - 06:00 PM</option>
                                        </select>
                                    </div>


                                    <!-- Other Information -->
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <textarea name="other" id="other" class="form-control"
                                            placeholder="Other Information"></textarea>
                                    </div>

                                    <!-- Submit Button -->
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
                    <div class="col-lg-4 col-md-12 col-sm-12 contact-column">
                        <div class="contact-info">
                            <div class="title">
                                <h3>Schedule an Appointment</h3>
                            </div>
                            <div class="info-box">
                                <div class="single-info">
                                    <h5>Need Assistance?</h5>
                                    <div class="text">Our dedicated team is here to help you navigate your study abroad
                                        journey. Schedule an appointment with us to discuss your options and get
                                        personalized advice.</div>
                                </div>
                                <div class="single-info">
                                    <h5>Office Locations</h5>
                                    <div class="text"><strong>Colombo Office:</strong> Carlton House, 466, 2/2, Galle
                                        Road, Colombo 00300, Sri Lanka.</div>
                                    <div class="text"><strong>Kandy Office:</strong> 170, DS Senanayake Veediya, Kandy
                                        20000, Sri Lanka.</div>
                                </div>
                                <div class="single-info">
                                    <h5>Contact Us</h5>
                                    <div class="text"><strong>Phone:</strong> <a href="tel:+94777840028">+9477 784
                                            0028</a>, <a href="tel:+94777183082">+94777183082</a></div>
                                    <div class="text"><strong>Email:</strong> <a
                                            href="mailto:info@studyoverseas.lk">info@studyoverseas.lk</a></div>
                                </div>
                                <div class="single-info">
                                    <h5>Available Appointment Times</h5>
                                    <div class="text">We are available for appointments:</div>
                                    <ul>
                                        <li>Monday - Friday: 9:00 AM - 5:00 PM</li>
                                        <li>Saturday: 10:00 AM - 2:00 PM</li>
                                    </ul>
                                    <div class="text">Please fill out the appointment form to reserve your spot.</div>
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

                </div>
            </div>
        </section>

        <!-- contact-section end -->
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
            // Function to fetch available appointment times
            function fetchAvailableTimes(selectedDate) {
                $.ajax({
                    url: "<?php echo base_url('appointment/get_appointments'); ?>", // Change to your endpoint
                    type: "GET",
                    data: { date: selectedDate },
                    success: function (response) {
                        var existingAppointments = JSON.parse(response);
                        var times = [
                            "09:00 AM - 10:00 AM",
                            "10:00 AM - 11:00 AM",
                            "11:00 AM - 12:00 PM",
                            "01:00 PM - 02:00 PM",
                            "02:00 PM - 03:00 PM",
                            "03:00 PM - 04:00 PM",
                            "04:00 PM - 05:00 PM",
                            "05:00 PM - 06:00 PM"
                        ];

                        // Remove existing appointment times from the options
                        existingAppointments.forEach(function (appointment) {
                            var index = times.indexOf(appointment.appointment_time);
                            if (index > -1) {
                                times.splice(index, 1); // Remove the time from the options
                            }
                        });

                        // Populate the dropdown with available times
                        $('#appointment_time').empty(); // Clear existing options
                        $('#appointment_time').append('<option value="" disabled selected>Select Appointment Time</option>');
                        times.forEach(function (time) {
                            $('#appointment_time').append('<option value="' + time + '">' + time + '</option>');
                        });
                    },
                    error: function (xhr, status, error) {
                        console.log("Error fetching appointments: ", error);
                    }
                });
            }

            // Function to submit the appointment form
            function submitAppointmentForm() {
                $('#appointment-form').on('submit', function (e) {
                    e.preventDefault(); // Prevent form from submitting normally

                    var submitButton = $('#submitButton'); // Cache the submit button element
                    submitButton.prop('disabled', true); // Disable the button
                    submitButton.text('Processing...'); // Change button text to "Processing..."

                    $.ajax({
                        url: '<?php echo base_url('appointment/submit_appointment'); ?>', // Update to the appropriate URL
                        type: 'POST',
                        data: $(this).serialize(), // Serialize form data
                        dataType: 'json',
                        success: function (response) {
                            if (response.status === 'success') {
                                $('#successMessage').text(response.message);
                                $('#successModal').modal('show'); // Show success modal
                                $('#appointment-form')[0].reset(); // Clear form
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
            }

            // Event listener for date selection
            $('#appointment_date').on('change', function () {
                var selectedDate = $(this).val();
                fetchAvailableTimes(selectedDate); // Call the function to fetch available times
            });

            // Initialize form submission
            submitAppointmentForm(); // Call the function to handle form submission
        });
    </script>

</body><!-- End of .page_wrapper -->

</html>