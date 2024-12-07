<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StudentDocuments_Model extends CI_Model
{
    private $tableName = 'student_documents';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Upload a document
    public function upload_document($data)
    {
        return $this->db->insert($this->tableName, $data);
    }

    // Get all documents uploaded by a user
    public function get_documents_by_user($user_id)
    {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get($this->tableName);
        return $query->result_array();
    }

    // Delete a document by ID
    public function delete_document($document_id)
    {
        $this->db->where('document_id', $document_id);
        return $this->db->delete($this->tableName);
    }

    // Get document names uploaded by a user
    public function get_document_names_by_user($user_id)
    {
        $this->db->select('document_name');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get($this->tableName);
        return $query->result_array();
    }
}
