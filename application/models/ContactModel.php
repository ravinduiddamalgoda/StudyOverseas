<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ContactModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Save form data to the database
    public function save_inquiry($data)
    {
        return $this->db->insert('contact_inquiries', $data);
    }

    // Fetch all contact inquiries from the database
    public function get_all_inquiries()
    {
        $query = $this->db->get('contact_inquiries'); // Assuming 'contact_inquiries' is the correct table name
        return $query->result_array();
    }

    // Delete an inquiry by ID
    public function delete_inquiry($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('contact_inquiries'); // Correct table name
    }

    // Get inquiry details by ID
    public function get_inquiry_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('contact_inquiries'); // Correct table name
        return $query->row_array();
    }
}

