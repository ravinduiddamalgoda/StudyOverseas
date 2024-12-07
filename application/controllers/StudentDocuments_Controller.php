<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StudentDocuments_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('StudentDocuments_Model');
    }

    // Upload a document
    public function upload_document()
    {
        $user_id = $this->input->post('user_id');
        
        if (isset($_FILES['document']['name'])) {
            $config['upload_path'] = './uploads/student_documents/'; // Ensure this folder exists
            $config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';
            $config['max_size'] = 2048; // 2MB
            $config['file_name'] = time() . '_' . $_FILES['document']['name'];

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('document')) {
                $upload_data = $this->upload->data();
                $document_data = [
                    'user_id' => $user_id,
                    'document_name' => $upload_data['file_name'],
                    'document_path' => base_url('uploads/student_documents/' . $upload_data['file_name']),
                ];

                $this->StudentDocuments_Model->upload_document($document_data);

                echo json_encode(['status' => 'success', 'message' => 'Document uploaded successfully']);
            } else {
                echo json_encode(['status' => 'error', 'message' => $this->upload->display_errors()]);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No file uploaded']);
        }
    }

    // Get all documents uploaded by a user
    public function get_documents($user_id)
    {
        $documents = $this->StudentDocuments_Model->get_documents_by_user($user_id);
        echo json_encode(['status' => 'success', 'documents' => $documents]);
    }

    // Delete a document
    public function delete_document($document_id)
    {
        $result = $this->StudentDocuments_Model->delete_document($document_id);
        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Document deleted successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete document']);
        }
    }

    // Get document names uploaded by a user
    public function get_document_names($user_id)
    {
        $document_names = $this->StudentDocuments_Model->get_document_names_by_user($user_id);

        if (!empty($document_names)) {
            echo json_encode([
                'status' => 'success',
                'document_names' => $document_names,
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'No documents found for the given user ID.',
            ]);
        }
    }
}
