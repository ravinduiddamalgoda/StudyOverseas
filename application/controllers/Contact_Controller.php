<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Contact_Model');
        $this->load->library(['form_validation', 'session', 'email']); // Load necessary libraries
        $this->load->helper('url'); // Load URL helper for redirects
    }

    public function submit_inquiry()
    {
        // Set form validation rules
        $this->form_validation->set_rules('username', 'Full Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required');
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('inquiryType', 'Inquiry Type', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');

        // Check if validation fails
        if ($this->form_validation->run() == FALSE) {
            // Fetch and clean validation errors (remove <p> tags)
            $errors = strip_tags(validation_errors());

            // Return validation errors as a JSON response
            echo json_encode([
                'status' => 'error',
                'message' => $errors // Send clean errors
            ]);
        } else {
            // Prepare data to be saved
            $data = array(
                'full_name' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'subject' => $this->input->post('subject'),
                'inquiry_type' => $this->input->post('inquiryType'),
                'message' => $this->input->post('message')
            );

            // Call the model to save data
            if ($this->Contact_Model->save_inquiry($data)) {
                // Send email after successful submission
                if ($this->send_email($data)) {
                    // Success response
                    echo json_encode([
                        'status' => 'success',
                        'message' => 'Inquiry submitted successfully! Thank you, ' . $data['full_name'] . '. Your message has been recorded and an email confirmation has been sent.'
                    ]);
                } else {
                    // Email sending failed
                    echo json_encode([
                        'status' => 'success', // Still consider it a success for submission
                        'message' => 'Inquiry submitted successfully! However, we failed to send the email confirmation.'
                    ]);
                }
            } else {
                // Failure response
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Failed to submit inquiry. Please try again.'
                ]);
            }
        }
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
        <h1 style="font-size: 28px; color: #252f57;">Inquiry Confirmation</h1>
        <p style="margin: 20px 0; font-size: 16px; color: #666666;">
             
            <p>Dear ' . $data['full_name'] . ',</p>
            <p>Thank you for reaching out to us! We have received your inquiry and will get back to you shortly.</p>
         
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
        <h3 style="margin-top: 40px; color: #252f57;">Inquiry Details</h3>
            <p><strong>Full Name:</strong> ' . $data['full_name'] . '</p>
            <p><strong>Email:</strong> ' . $data['email'] . '</p>
            <p><strong>Phone:</strong> ' . $data['phone'] . '</p>
            <p><strong>Subject:</strong> ' . $data['subject'] . '</p>
            <p><strong>Inquiry Type:</strong> ' . $data['inquiry_type'] . '</p>
            <p><strong>Message:</strong> ' . nl2br($data['message']) . '</p>

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
        $this->email->subject('Inquiry Confirmation');
        $this->email->message($email_template);

        return $this->email->send(); // Returns true on success
    }
}
