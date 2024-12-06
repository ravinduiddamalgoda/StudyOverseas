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

}
