<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdmissionTeam_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Ensure the user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login'); // Redirect to login if not logged in
        }
        $this->load->model('User_Model'); // Load the User_model
    }

    public function dashboard()
    {
        $role = $this->session->userdata('role');

        if ($role !== 'admission_team') {
            $this->session->set_flashdata('error', 'You do not have permission to access this page');
            redirect('auth/login');
        }

        $data['first_name'] = $this->session->userdata('first_name');
        $data['last_name'] = $this->session->userdata('last_name');
        $data['email'] = $this->session->userdata('email');
        $data['role'] = $role;

        $this->load->view('admission_team/dashboard', $data);
    }

}
