<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StudentApplication_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('StudentApplication_Model');
    }

    // Display all applications
    public function index()
    {
        $data['applications'] = $this->StudentApplication_Model->get_all_applications();
        $this->load->view('user/applications_list', $data);
    }

    // Create a new application
    public function create()
    {
        $this->form_validation->set_rules('user_id', 'User ID', 'required');
        $this->form_validation->set_rules('course_id', 'Course ID', 'required');
        $this->form_validation->set_rules('application_details', 'Application Details', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('user/application_form');
        } else {
            $data = [
                'user_id' => $this->input->post('user_id'),
                'course_id' => $this->input->post('course_id'),
                'application_details' => $this->input->post('application_details'),
                'application_status' => 'pending'
            ];
            $this->StudentApplication_Model->create_application($data);
            $this->session->set_flashdata('success', 'Application created successfully.');
            redirect('user/dashboard');
        }
    }

    // Update application
    public function update($id)
    {
        $this->form_validation->set_rules('application_status', 'Application Status', 'required');

        if ($this->form_validation->run() == false) {
            $data['application'] = $this->StudentApplication_Model->get_application_by_id($id);
            $this->load->view('user/update_application', $data);
        } else {
            $data = [
                'application_status' => $this->input->post('application_status'),
                'application_details' => $this->input->post('application_details')
            ];
            $this->StudentApplication_Model->update_application($id, $data);
            $this->session->set_flashdata('success', 'Application updated successfully.');
            redirect('user/dashboard');
        }
    }

    // Delete application
    public function delete($id)
    {
        $this->StudentApplication_Model->delete_application($id);
        $this->session->set_flashdata('success', 'Application deleted successfully.');
        redirect('user/dashboard');
    }
}
