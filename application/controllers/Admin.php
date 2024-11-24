<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Ensure the user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login'); // Redirect to login if not logged in
        }
        $this->load->model('Appointment_model');
        $this->load->model('ContactModel'); // This model is used for inquiries
    }

    // Admin dashboard method
    public function dashboard()
    {
        $role = $this->session->userdata('role');

        if ($role !== 'admin') {
            if ($role == 'student' || $role == 'customer') {
                redirect('user/dashboard');
            } else {
                redirect('auth/login');
            }
        }

        $data['first_name'] = $this->session->userdata('first_name');
        $data['last_name'] = $this->session->userdata('last_name');
        $data['email'] = $this->session->userdata('email');
        $data['role'] = $role;

        $this->load->view('admin/dashboard', $data);
    }

    // Function to view appointments
    public function view_appointments()
    {
        $data['appointments'] = $this->Appointment_model->get_all_appointments();
        $this->load->view('admin/appointment_list', $data);
    }

    // Function to display contact inquiries
    public function view_inquiries()
    {
        $data['inquiries'] = $this->ContactModel->get_all_inquiries();
        $this->load->view('admin/contact_inquiries', $data);
    }

    // Function to delete an inquiry
    public function delete_inquiry($id)
    {
        $this->ContactModel->delete_inquiry($id);
        $this->session->set_flashdata('success', 'Inquiry deleted successfully');
        redirect('admin/view_inquiries');
    }

    // Function to view inquiry details in a modal
    public function view_inquiry($id)
    {
        $data['inquiry'] = $this->ContactModel->get_inquiry_by_id($id); // Correct model name
        echo json_encode($data['inquiry']);
    }
}
