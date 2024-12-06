<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StudentApplication_Model  extends CI_Model
{
    private $tableName = 'student_applications';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Create a new application
    public function create_application($data)
    {
        return $this->db->insert($this->tableName, $data);
    }

    // Fetch all applications with user and course details
    public function get_all_applications()
    {
        $this->db->select('student_applications.*, users.first_name, users.last_name, users.email, courses.Course_name');
        $this->db->from($this->tableName);
        $this->db->join('users', 'student_applications.user_id = users.id', 'left');
        $this->db->join('courses', 'student_applications.course_id = courses.Course_id', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }

    // Fetch applications by user ID
    public function get_applications_by_user($user_id)
    {
        $this->db->select('student_applications.*, courses.Course_name');
        $this->db->from($this->tableName);
        $this->db->join('courses', 'student_applications.course_id = courses.Course_id', 'left');
        $this->db->where('student_applications.user_id', $user_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    // Update an application by ID
    public function update_application($id, $data)
    {
        $this->db->where('application_id', $id);
        $this->db->update($this->tableName, $data);
        return $this->db->affected_rows();
    }

    // Delete an application by ID
    public function delete_application($id)
    {
        $this->db->where('application_id', $id);
        $this->db->delete($this->tableName);
        return $this->db->affected_rows();
    }

    // Get application by ID
    public function get_application_by_id($id)
    {
        $this->db->select('student_applications.*, users.first_name, users.last_name, users.email, courses.Course_name');
        $this->db->from($this->tableName);
        $this->db->join('users', 'student_applications.user_id = users.id', 'left');
        $this->db->join('courses', 'student_applications.course_id = courses.Course_id', 'left');
        $this->db->where('application_id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
}
