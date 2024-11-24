<?php
// application/core/My_Controller.php
defined('BASEPATH') or exit('No direct script access allowed');

class Base_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Check if the user is logged in
        if (!$this->session->userdata('logged_in')) {
            // Redirect to the login page if not logged in
            redirect('auth/login');
        }
    }
}

?>