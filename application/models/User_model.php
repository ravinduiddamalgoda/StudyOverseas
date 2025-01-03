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

    // Fetch all users except students
    public function get_all_employees() {
        $this->db->where('role !=', 'student'); // Get all users except students
        $query = $this->db->get('users'); // Get all users from the 'users' table
        return $query->result_array(); // Return the result as an array
    }

    public function create_user($data) {
        $this->db->insert('users', $data); // Insert the data into the 'users' table
    }

    public function get_user_by_id($id) {
        return $this->db->get_where('users', ['id' => $id])->row_array();
    }

    public function update_user($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    public function delete_user($id) {
        $this->db->where('id', $id);
        $this->db->delete('users');
    }

    public function update_password($id, $password) {
        $this->db->where('id', $id);
        $this->db->update('users', ['password' => $password]);
    }

    public function get_counsellor() {
        $this->db->where('role', 'counsellor');
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function get_user_by_email_json($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        return $query->row_array();
    }
}
