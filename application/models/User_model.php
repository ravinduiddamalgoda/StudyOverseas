<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load the database
    }

    // Fetch users from the database
    public function get_all_users() {
        $query = $this->db->get('users'); // Get all users from the 'users' table
        return $query->result_array(); // Return the result as an array
    }
}
