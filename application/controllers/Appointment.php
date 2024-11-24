<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Appointment extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Appointment_model');
    $this->load->helper('url');
    $this->load->library(['form_validation', 'session', 'email']);
  }

  public function submit_appointment()
  {
    // Form validation
    $this->form_validation->set_rules('name', 'Full Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('phone', 'Phone Number', 'required');
    $this->form_validation->set_rules('interested_program', 'Interested Program', 'required');
    $this->form_validation->set_rules('interested_country', 'Interested Country', 'required');
    $this->form_validation->set_rules('highest_qualification', 'Highest Qualification', 'required');
    $this->form_validation->set_rules('appointment_date', 'Appointment Date', 'required');
    $this->form_validation->set_rules('appointment_time', 'Appointment Time', 'required');

    if ($this->form_validation->run() == FALSE) {
      // Fetch and clean validation errors (remove <p> tags)
      $errors = strip_tags(validation_errors());

      // Return validation errors as a JSON response
      echo json_encode([
        'status' => 'error',
        'message' => $errors // Send clean errors
      ]);
    } else {
      // Prepare data for saving
      $data = array(
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
        'phone' => $this->input->post('phone'),
        'interested_program' => $this->input->post('interested_program'),
        'interested_country' => $this->input->post('interested_country'),
        'highest_qualification' => $this->input->post('highest_qualification'),
        'appointment_date' => $this->input->post('appointment_date'),
        'appointment_time' => $this->input->post('appointment_time'),
        'other_info' => $this->input->post('other')
      );

      // Debugging: print data to check
      // echo '<pre>';
      // print_r($data);
      // echo '</pre>';
      // exit();

      // Call the model to save data
      if ($this->Appointment_model->save_appointment($data)) {
        // Send email after successful submission
        if ($this->send_email($data)) {
          // Success response
          echo json_encode([
            'status' => 'success',
            'message' => 'Appointment submitted successfully! Thank you, ' . $data['name'] . '. Your appointment has been recorded and an email confirmation has been sent.'
          ]);
        } else {
          // Email sending failed
          echo json_encode([
            'status' => 'success', // Still consider it a success for submission
            'message' => 'Appointment submitted successfully! However, we failed to send the email confirmation.'
          ]);
        }
      } else {
        // Failure response
        echo json_encode([
          'status' => 'error',
          'message' => 'Failed to submit appointment. Please try again.'
        ]);
      }
    }
  }

  // Delete appointment
  public function delete($id)
  {
    $result = $this->Appointment_model->delete_appointment($id);
    if ($result) {
      echo json_encode(['status' => 'success', 'message' => 'Appointment deleted successfully']);
    } else {
      echo json_encode(['status' => 'error', 'message' => 'Failed to delete appointment']);
    }
  }

  // View appointment
  public function view($id)
  {
    $data = $this->Appointment_model->get_appointment_by_id($id);
    echo json_encode($data);
  }

  // Edit appointment
  public function edit($id)
  {
    $data = $this->Appointment_model->get_appointment_by_id($id);
    echo json_encode($data);
  }

  // Update appointment
  public function update($id) {
    // Load model
    $this->load->model('Appointment_model');
    
    // Get data from POST request
    $data = array(
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
        'phone' => $this->input->post('phone'),
        'interested_program' => $this->input->post('interested_program'),
        'interested_country' => $this->input->post('interested_country'),
        'highest_qualification' => $this->input->post('highest_qualification'),
        'appointment_date' => $this->input->post('appointment_date'),
        'appointment_time' => $this->input->post('appointment_time'),
        'other_info' => $this->input->post('other_info'),
    );

    // Call model function to update the appointment
    if ($this->Appointment_model->updateAppointment($id, $data)) {
        echo json_encode(['status' => 'success', 'message' => 'Appointment updated successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update appointment.']);
    }
}


  public function get_appointments()
  {
    $date = $this->input->get('date'); // Get the selected date
    $this->load->model('Appointment_model'); // Load your model

    // Fetch appointments from the database
    $appointments = $this->Appointment_model->get_appointments_by_date($date);
    echo json_encode($appointments); // Return appointments as JSON
  }

  private function send_email($data)
  {
    // Load the email library
    $this->load->library('email');
    $fromEmail = 'n48428813@gmail.com';

    // Email configuration
    $config['protocol'] = 'smtp';
    $config['smtp_host'] = 'ssl://smtp.googlemail.com';
    $config['smtp_port'] = 465;
    $config['smtp_user'] = $fromEmail;
    $config['smtp_pass'] = 'qcnhgawmndmztlre'; // Consider using environment variables for sensitive data
    $config['mailtype'] = 'html';
    $config['charset'] = 'utf-8';
    $config['newline'] = "\r\n";

    $this->email->initialize($config);

    // Email template
    $email_template = '
      <body
  style="
    margin: 0;
    font-family: \'Poppins\', sans-serif;
    background: linear-gradient(to bottom, #d4ba64, #252f57);
    font-size: 14px;
    color: #fff;
  "
>
  <div
    style="
      max-width: 680px;
      margin: 0 auto;
      padding: 45px 30px 60px;
      background: linear-gradient(to bottom, #252f57, #35477d);
      border-radius: 20px;
      color: #f1f1f1;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    "
  >
    <header>
      <table style="width: 100%; margin-bottom: 30px;">
        <tbody>
          <tr>
            <td>
              <img alt="Company Logo" src="https://your-logo-url.com" height="40px" />
            </td>
            <td style="text-align: right;">
           <span style="font-size: 16px; color: #f1f1f1;">' . date("d M, Y") . '</span>
            </td>
          </tr>
        </tbody>
      </table>
    </header>

    <main>
      <div
        style="
          margin: 0;
          padding: 40px 30px;
          background: linear-gradient(to bottom, #ffffff, #eaeaea);
          border-radius: 20px;
          text-align: center;
          box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
          color: #252f57;
        "
      >
        <h1 style="font-size: 28px; color: #252f57;">Appointment Confirmation</h1>
        <p style="margin: 20px 0; font-size: 16px; color: #666666;">
             
            <p>Dear ' . $data['name'] . ',</p>
            <p>Thank you for reaching out to us! We have received your Appointment and will get back to you shortly.</p>
         
        </p>
        <p
          style="
            margin: 30px 0;
            font-size: 36px;
            font-weight: 600;
            letter-spacing: 5px;
            background: -webkit-linear-gradient(#d4ba64, #f39c12);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
          "
        >
          <?php echo $otp; ?>
        </p>
        <h3 style="margin-top: 40px; color: #252f57;">Appointment Details</h3>
        <p><strong>Full Name:</strong> ' . $data['name'] . '</p>
        <p><strong>Email:</strong> ' . $data['email'] . '</p>
        <p><strong>Phone:</strong> ' . $data['phone'] . '</p>
        <p><strong>Interested Program:</strong> ' . $data['interested_program'] . '</p>
        <p><strong>Interested Country:</strong> ' . $data['interested_country'] . '</p>
        <p><strong>Highest Qualification:</strong> ' . $data['highest_qualification'] . '</p>
        <p><strong>Appointment Date:</strong> ' . $data['appointment_date'] . '</p>
        <p><strong>Appointment Time:</strong> ' . $data['appointment_time'] . '</p>
        <p><strong>Other Info:</strong> ' . nl2br($data['other_info']) . '</p>
  
        <p style="color: #999999; font-size: 14px;">
          If you did not request this, please disregard this email.
        </p>
      </div>

      <p
        style="
          margin: 40px 0;
          text-align: center;
          font-size: 14px;
          color: #f1f1f1;
        "
      >
        Need assistance? Reach out to us at
        <a href="mailto:support@studyoverseas.com" style="color: #d4ba64; text-decoration: none;">
          support@studyoverseas.com
        </a>
      </p>
    </main>

    <footer
      style="
        text-align: center;
        margin-top: 40px;
        padding-top: 20px;
        border-top: 1px solid #dddddd;
        color: #f1f1f1;
      "
    >
      <p style="font-size: 14px;">
       © ' . date("Y") . ' Study Overseas. All Rights Reserved.
      </p>
      <div>
        <a href="#" style="margin: 0 10px;">
          <img src="https://your-facebook-icon-url.com" alt="Facebook" width="24" />
        </a>
        <a href="#" style="margin: 0 10px;">
          <img src="https://your-instagram-icon-url.com" alt="Instagram" width="24" />
        </a>
        <a href="#" style="margin: 0 10px;">
          <img src="https://your-twitter-icon-url.com" alt="Twitter" width="24" />
        </a>
      </div>
    </footer>
  </div>
</body>

        ';

    $this->email->from($fromEmail, 'Study Overseas Team');
    $this->email->to($data['email']);
    $this->email->subject('Appointment Confirmation');
    $this->email->message($email_template);

    return $this->email->send(); // Returns true on success
  }



}
