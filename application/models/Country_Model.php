<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Country_Model extends CI_Model
{
    private $tableName = 'country';
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Save form data to the database
    public function create_country($data)
    {
        return $this->db->insert($this->tableName, $data);
    }

    // Update country data in the database  
    public function update_country($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->tableName, $data);
    }

    // Fetch all countries from the database

    public function get_all_countries()
    {
        $query = $this->db->get($this->tableName);
        return $query->result_array();
    }

    // Delete an inquiry by ID

    public function delete_country($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->tableName); // Correct table name
    }

    // Get inquiry details by ID

    public function get_country_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->tableName); // Correct table name
        return $query->row_array();
    }
}

