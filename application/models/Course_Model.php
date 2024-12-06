<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Course_Model extends CI_Model
{
    private $tableName = 'courses';
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Save form data to the database
    public function create_course($data)
    {
        return $this->db->insert($this->tableName, $data);
    }

    // Fetch all contact inquiries from the database
    public function get_all_courses()
    {
        $query = $this->db->get($this->tableName); // Assuming 'contact_inquiries' is the correct table name
        return $query->result_array();
    }

    // Delete an inquiry by ID
    public function delete_course($id)
    {
        $this->db->where('Course_id', $id);
        $this->db->delete($this->tableName); // Correct table name
    }

    // Get inquiry details by ID
    public function get_course_by_id($id)
    {
        $this->db->where('Course_id', $id);
        $query = $this->db->get($this->tableName); // Correct table name
        return $query->row_array();
    }
}

