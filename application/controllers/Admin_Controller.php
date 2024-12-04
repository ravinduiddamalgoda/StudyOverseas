<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Ensure the user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login'); // Redirect to login if not logged in
        }
        $this->load->model('Appointment_Model');
        $this->load->model('Contact_Model'); // This model is used for inquiries
        $this->load->model('Course_Model'); // Load the CourseModel
        $this->load->model('Country_Model'); // Load the CountryModel
        $this->load->model('Employee_Model'); // Load the EmployeeModel
        $this->load->model('User_Model');
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

    public function user_list()
    {
        $data['users'] = $this->User_Model->get_all_users();
        $this->load->view('admin/user_list', $data);
    }

    // Function to view appointments
    public function view_appointments()
    {
        $data['appointments'] = $this->Appointment_Model->get_all_appointments();
        $this->load->view('admin/appointment_list', $data);
    }

    // Function to delete an appointment
    public function delete_appointment($id)
    {
        $this->Appointment_Model->delete_appointment($id);
        $this->session->set_flashdata('success', 'Appointment deleted successfully');
        redirect('admin/view_appointments');
    }

    // Function to view appointment details in a modal
    public function view_appointment($id)
    {
        $data['appointment'] = $this->Appointment_Model->get_appointment_by_id($id);
        echo json_encode($data['appointment']);
    }

    // Function to edit an appointment
    public function edit_appointment($id)
    {
        $data['appointment'] = $this->Appointment_Model->get_appointment_by_id($id);
        $this->load->view('admin/edit_appointment', $data);
    }

    // Function to update an appointment
    public function update_appointment($id)
    {
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'interested_program' => $this->input->post('interested_program'),
            'interested_country' => $this->input->post('interested_country'),
            'highest_qualification' => $this->input->post('highest_qualification'),
            'appointment_date' => $this->input->post('appointment_date'),
            'appointment_time' => $this->input->post('appointment_time'),
            'other_info' => $this->input->post('other_info'),
        );
    
        $this->Appointment_Model->update_appointment($id, $data);
        $this->session->set_flashdata('success', 'Appointment updated successfully');
        redirect('admin/view_appointments');
    }

    // Function to display contact inquiries
    public function view_inquiries()
    {
        $data['inquiries'] = $this->Contact_Model->get_all_inquiries();
        $this->load->view('admin/contact_inquiries', $data);
    }

    // Function to delete an inquiry
    public function delete_inquiry($id)
    {
        $this->Contact_Model->delete_inquiry($id);
        $this->session->set_flashdata('success', 'Inquiry deleted successfully');
        redirect('admin/view_inquiries');
    }

    // Function to view inquiry details in a modal
    public function view_inquiry($id)
    {
        $data['inquiry'] = $this->Contact_Model->get_inquiry_by_id($id); // Correct model name
        echo json_encode($data['inquiry']);
    }

    /************************************ Courses ************************************/
    /**
     * Summary of view_courses
     * @return void
     */
    public function view_courses()
    {
        $data['courses'] = $this->Course_Model->get_all_courses();
        $this->load->view('admin/manage_courses', $data);
    }

    public function delete_course($id)
    {
        $this->Course_Model->delete_course($id);
        $this->session->set_flashdata('success', 'Course deleted successfully');
        redirect('admin/view_courses');
    }

    public function view_course($id)
    {
        $data['course'] = $this->Course_Model->get_course_by_id($id);
        echo json_encode($data['course']);
    }

    /************************************ Countries ************************************/
    public function view_countries()
    {
        $data['countries'] = $this->Country_Model->get_all_countries();
        $this->load->view('admin/manage_countries', $data);
    }

    public function delete_country($id)
    {
        $this->Country_Model->delete_country($id);
        $this->session->set_flashdata('success', 'Country deleted successfully');
        redirect('admin/view_countries');
    }

    public function view_country($id)
    {
        $data['country'] = $this->Country_Model->get_country_by_id($id);
        echo json_encode($data['country']);
    }


    /************************************ Employees ************************************/
    public function view_employees()
    {
        $data['employees'] = $this->Employee_Model->get_all_employees();
        $this->load->view('admin/manage_employees', $data);
    }

    public function delete_employee($id)
    {
        $this->Employee_Model->delete_employee($id);
        $this->session->set_flashdata('success', 'Employee deleted successfully');
        redirect('admin/view_employees');
    }

    public function view_employee($id)
    {
        $data['employee'] = $this->Employee_Model->get_employee_by_id($id);
        echo json_encode($data['employee']);
    }
}
