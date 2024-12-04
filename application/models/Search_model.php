<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_Model extends CI_Model {

    public function getSearchResults($query) {
        // Sample query to fetch search results from the database
        $this->db->like('first_name', $query);
        $this->db->or_like('last_name', $query);
        $query = $this->db->get('users'); // Replace 'your_table_name' with the actual table
        return $query->result_array();
    }
}
