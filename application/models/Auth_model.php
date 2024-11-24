<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    // Fetch a user by email
    public function get_user($email) {
        // Use get_where for a more readable query structure
        $query = $this->db->get_where('users', ['email' => $email]);
        return $query->row(); // Return the single row (user) if found
    }

    // Insert a new user into the database
    public function register_user($data) {
        return $this->db->insert('users', $data); // Return true if insert successful
    }

    public function get_user_by_email($email)
    {
        return $this->db->get_where('users', ['email' => $email])->row();
    }

    public function save_otp($email, $otp)
    {
        // Save OTP to the database
        $data = ['otp' => $otp, 'otp_created_at' => date('Y-m-d H:i:s')];
        $this->db->where('email', $email);
        $this->db->update('users', $data);
    }

    public function validate_otp($email, $otp)
    {
        $this->db->where('email', $email);
        $this->db->where('otp', $otp);
        $this->db->where('otp_created_at >=', date('Y-m-d H:i:s', strtotime('-10 minutes')));
        return $this->db->get('users')->row();
    }

    public function update_password($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->update('users', ['password' => $password]);
    }
}
