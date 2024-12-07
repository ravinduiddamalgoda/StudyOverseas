<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Counsellor_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Ensure the user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login'); // Redirect to login if not logged in
        }
        $this->load->model('Appointment_Model');
        $this->load->model('Contact_Model'); // This model is used for inquiries
        $this->load->model('Course_Model'); // Load the CourseModel
        $this->load->model('Country_Model'); // Load the CountryModel
        $this->load->model('Employee_Model'); // Load the EmployeeModel
        $this->load->model('User_Model');
    }

    // Admin dashboard method
    public function dashboard()
    {
        $role = $this->session->userdata('role');

        if ($role !== 'counsellor') {
            $this->session->set_flashdata('error', 'You do not have permission to access this page');
            redirect('auth/login');
        }

        $data['first_name'] = $this->session->userdata('first_name');
        $data['last_name'] = $this->session->userdata('last_name');
        $data['email'] = $this->session->userdata('email');
        $data['role'] = $role;

        $this->load->view('counsellor/dashboard', $data);
    }
}
