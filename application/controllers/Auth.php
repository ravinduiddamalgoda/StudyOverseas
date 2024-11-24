<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    // Call parent constructor
    parent::__construct();
    $this->load->model('Auth_model'); // Load the Auth model
    $this->load->library(['form_validation', 'session', 'email']); // Load necessary libraries
    $this->load->helper('url'); // Load URL helper for redirects
  }

  // Display login form
  public function login()
  {
    // Check if the user is already logged in
    if ($this->session->userdata('logged_in')) {
      redirect('admin/dashboard'); // Redirect to dashboard if logged in
    }

    // Check for "Remember Me" cookies
    $remember_email = get_cookie('remember_email');
    $remember_password = get_cookie('remember_password');

    if ($remember_email && $remember_password) {
      // Pass the cookie values to the login view
      $data['remember_email'] = $remember_email;
      $data['remember_password'] = $remember_password;
    } else {
      $data['remember_email'] = '';
      $data['remember_password'] = '';
    }

    $this->load->view('admin/auth/login', $data);
  }

  // Display login form
  public function web_login()
  {
    // Check if the user is already logged in
    if ($this->session->userdata('logged_in')) {
      redirect('user/dashboard'); // Redirect to dashboard if logged in
    }

    // Check for "Remember Me" cookies
    $remember_email = get_cookie('remember_email');
    $remember_password = get_cookie('remember_password');

    if ($remember_email && $remember_password) {
      // Pass the cookie values to the login view
      $data['remember_email'] = $remember_email;
      $data['remember_password'] = $remember_password;
    } else {
      $data['remember_email'] = '';
      $data['remember_password'] = '';
    }

    $this->load->view('web/auth/login', $data);
  }


  // Handle login form submission
  public function login_process()
  {
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() == FALSE) {
      // Return validation errors without <p> tags
      $errors = [
        'email' => strip_tags(form_error('email')),
        'password' => strip_tags(form_error('password'))
      ];
      echo json_encode(['status' => 'error', 'errors' => $errors]);
    } else {
      $email = $this->input->post('email');
      $password = $this->input->post('password');
      $remember_me = $this->input->post('remember_me');

      // Get user by email
      $user = $this->Auth_model->get_user($email); // Ensure your model fetches the user's role too.

      if ($user && password_verify($password, $user->password)) {
        // Set user session data
        $user_data = [
          'user_id' => $user->id,
          'first_name' => $user->first_name,
          'last_name' => $user->last_name,
          'email' => $user->email,
          'role' => $user->role,  // Store the role in session
          'logged_in' => TRUE
        ];
        $this->session->set_userdata($user_data);

        // Handle "Remember Me" functionality
        if ($remember_me) {
          set_cookie('remember_email', $email, 86400 * 30); // Set email cookie for 30 days
          set_cookie('remember_password', $password, 86400 * 30); // Set password cookie for 30 days
        } else {
          // Delete cookies if "Remember Me" is unchecked
          delete_cookie('remember_email');
          delete_cookie('remember_password');
        }

        // Role-based redirection logic
        if ($user->role == 'student' || $user->role == 'customer') {
          $redirect_url = base_url('user/dashboard');  // Redirect students and customers to 'user/dashboard'
        } else {
          $redirect_url = base_url('admin/dashboard'); // All others go to 'admin/dashboard'
        }

        // Return success message with the appropriate redirect
        echo json_encode(['status' => 'success', 'redirect' => $redirect_url]);
        // echo json_encode(['status' => 'success', 'redirect' => base_url('admin/dashboard')]);

      } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid email or password']);
      }
    }
  }


  public function logout()
  {
    // Unset user session data
    $this->session->unset_userdata(['user_id', 'first_name', 'last_name', 'email', 'logged_in']);
    $this->session->sess_destroy(); // Destroy the session

    // Delete "Remember Me" cookies on logout
    delete_cookie('remember_email');
    delete_cookie('remember_password');

    $this->session->set_flashdata('success', 'You have been logged out successfully.');
    redirect('auth/login');
  }

  public function web_logout()
  {
    // Unset user session data
    $this->session->unset_userdata(['user_id', 'first_name', 'last_name', 'email', 'logged_in']);
    $this->session->sess_destroy(); // Destroy the session

    // Delete "Remember Me" cookies on logout
    delete_cookie('remember_email');
    delete_cookie('remember_password');

    $this->session->set_flashdata('success', 'You have been logged out successfully.');
    redirect('auth/web_login');
  }


  // Display registration form
  public function register()
  {
    // Check if the user is already logged in
    if ($this->session->userdata('logged_in')) {
      redirect('user/dashboard'); // Redirect to dashboard if logged in
    }

    $this->load->view('web/auth/register');
  }

  // Handle registration form submission
  public function register_process()
  {
    $this->form_validation->set_rules('first_name', 'First Name', 'required');
    $this->form_validation->set_rules('last_name', 'Last Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
    $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

    if ($this->form_validation->run() == FALSE) {
      // Reload registration form with validation errors
      $this->load->view('web/auth/register');
    } else {
      $data = [
        'first_name' => $this->input->post('first_name'),
        'last_name' => $this->input->post('last_name'),
        'email' => $this->input->post('email'),
        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        'role' => 'student',
      ];

      // Register new user
      $this->Auth_model->register_user($data);

      $this->session->set_flashdata('success', 'Registration successful, please login.');
      redirect('auth/login');
    }
  }

  // Handle user logout
  // public function logout()
  // {
  //   // Unset user session data
  //   $this->session->unset_userdata(['user_id', 'first_name', 'last_name', 'email', 'logged_in']);
  //   $this->session->sess_destroy(); // Destroy the session

  //   $this->session->set_flashdata('success', 'You have been logged out successfully.');
  //   redirect('auth/login');
  // }

  // Display forgot password form
  public function forgot_password()
  {
    // Check if the user is logged in
    if ($this->session->userdata('logged_in')) {
      // If logged in, redirect to the dashboard or another page
      redirect('admin/dashboard'); // Change 'admin/dashboard' to your desired route
    }
    // If not logged in, load the forgot password view
    $this->load->view('admin/auth/forgot_password');

  }

  // Process forgot password request (AJAX)
  public function forgot_password_process()
  {
    $email = $this->input->post('email');

    // Validate email
    if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo json_encode(['error' => true, 'message' => 'Invalid email address.']);
      return;
    }

    // Check if email exists in the database
    $user = $this->Auth_model->get_user_by_email($email);

    if (!$user) {
      echo json_encode(['error' => true, 'message' => 'Email not found in our records.']);
      return;
    }

    // Generate OTP
    $otp = rand(100000, 999999);
    $otp_expiration = time() + 300; // OTP is valid for 5 minutes

    // Save OTP and expiration in the database
    $this->Auth_model->save_otp($email, $otp, $otp_expiration);

    // Set the email in session for later verification
    $this->session->set_userdata('reset_email', $email); // Set the email in session

    // Send OTP to email
    if ($this->send_otp_email($email, $otp)) {
      echo json_encode(['error' => false, 'message' => 'OTP sent to your email.', 'redirect' => base_url('auth/verify_otp')]);
    } else {
      echo json_encode(['error' => true, 'message' => 'Failed to send OTP. Try again later.']);
    }
  }

  // Display OTP verification form
  public function verify_otp()
  {
    // Check if the user is already logged in
    if ($this->session->userdata('logged_in')) {
      redirect('admin/dashboard'); // Redirect to dashboard if logged in
    }
    // Check if the reset_email session variable is set
    if (!$this->session->userdata('reset_email')) {
      redirect('auth/login'); // Redirect to login or another appropriate page
    }

    // Load the OTP verification view
    $this->load->view('admin/auth/verify_otp');
  }

  // Validate OTP
  public function validate_otp()
  {
    $this->form_validation->set_rules('otp', 'OTP', 'required');

    if ($this->form_validation->run() == FALSE) {
      echo json_encode(['error' => true, 'message' => 'OTP is required.']);
      return;
    }

    $otp = $this->input->post('otp');
    $email = $this->session->userdata('reset_email');

    // Validate OTP using the model
    if ($this->Auth_model->validate_otp($email, $otp)) {
      echo json_encode(['error' => false, 'message' => 'OTP verified successfully.']);
    } else {
      // Include email and OTP in the response for the console
      echo json_encode(['error' => true, 'message' => 'Invalid OTP.', 'email' => $email, 'otp' => $otp]);
    }
  }


  // Display reset password form
  public function reset_password()
  {
    // Check if the user is already logged in
    if ($this->session->userdata('logged_in')) {
      redirect('admin/dashboard'); // Redirect to dashboard if logged in
    }
    // Check if the reset_email session variable is set
    if (!$this->session->userdata('reset_email')) {
      redirect('auth/login'); // Redirect to login or another appropriate page
    }

    $this->load->view('admin/auth/reset_password');
  }

  // Update the user's password
  public function update_password()
  {
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
    $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

    if ($this->form_validation->run() == FALSE) {
      echo json_encode(['error' => true, 'message' => validation_errors()]);
      return;
    }

    $email = $this->session->userdata('reset_email');
    $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

    // Update the password in the database
    $this->Auth_model->update_password($email, $password);

    // Clear reset_email session after password is updated
    $this->session->unset_userdata('reset_email');

    echo json_encode(['error' => false, 'message' => 'Password updated successfully.']);
  }


  // Private function to send OTP email
  private function send_otp_email($email, $otp)
  {
    // Load the email library
    $this->load->library('email');
    $fromEmail = 'n48428813@gmail.com';

    $config['protocol'] = 'smtp';
    $config['smtp_host'] = 'ssl://smtp.googlemail.com';
    $config['smtp_port'] = 465;
    $config['smtp_user'] = $fromEmail;
    $config['smtp_pass'] = 'qcnhgawmndmztlre'; // Consider using environment variables for sensitive data
    $config['mailtype'] = 'html';
    $config['charset'] = 'utf-8';
    $config['newline'] = "\r\n";

    $this->email->initialize($config);

    // Updated HTML email template
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
                  <h1 style="font-size: 28px; color: #252f57;">Your OTP Code</h1>
                  <p style="margin: 20px 0; font-size: 16px; color: #666666;">
                    Hello, <br>
                    To proceed with your password reset, please use the OTP code provided below. The code is valid for <strong>5 minutes</strong>.
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
                    ' . $otp . '
                  </p>
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
                  <a href="mailto:support@studyoverseas.com" style="color: #d4ba64; text-decoration: none;">support@studyoverseas.com</a>
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
                    <img src="https://your-facebook-icon-url.com" alt="Facebook" width="24">
                  </a>
                  <a href="#" style="margin: 0 10px;">
                    <img src="https://your-instagram-icon-url.com" alt="Instagram" width="24">
                  </a>
                  <a href="#" style="margin: 0 10px;">
                    <img src="https://your-twitter-icon-url.com" alt="Twitter" width="24">
                  </a>
                </div>
              </footer>
            </div>
          </body>
      
          ';

    $this->email->from($fromEmail, 'Study Overseas Team');
    $this->email->to($email);
    $this->email->subject('Password Reset OTP');
    $this->email->message($email_template);

    return $this->email->send(); // Returns true on success
  }

}
