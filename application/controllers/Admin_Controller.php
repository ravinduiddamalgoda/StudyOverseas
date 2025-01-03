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

    public function user_create()
    {
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('role', 'Role', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/user_create');
                $this->session->set_flashdata('error', validation_errors());
                $this->session->set_flashdata('form_data', $this->input->post());
                redirect('admin/user/add');
            }

            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => $this->input->post('role'),
                'created_at' => date('Y-m-d H:i:s')
            );

            $this->User_Model->create_user($data);
            $this->session->set_flashdata('success', 'User created successfully');
            redirect('admin/users');
        } else {
            $this->load->view('admin/user_create');
        }
    }

    public function user_edit($id)
    {
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('role', 'Role', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', validation_errors());
                $this->session->set_flashdata('form_data', $this->input->post());
                redirect('admin/user/edit/' . $id);
            }

            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'role' => $this->input->post('role'),
            );

            $this->User_Model->update_user($id, $data);
            $this->session->set_flashdata('success', 'User updated successfully');
            redirect('admin/users');
        } else {
            $data['user'] = $this->User_Model->get_user_by_id($id);
            $this->load->view('admin/user_create', $data);
        }
    }

    public function user_delete($id)
    {
        $this->User_Model->delete_user($id);
        $this->session->set_flashdata('success', 'User deleted successfully');
        redirect('admin/users');
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
    public function course_list()
    {
        $data['courses'] = $this->Course_Model->get_all_courses();
        $this->load->view('admin/course_list', $data);
    }

    public function course_create()
    {
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('Course_id', 'Course ID', 'required|is_unique[courses.Course_id]');
            $this->form_validation->set_rules('Course_name', 'Course Name', 'required');
            $this->form_validation->set_rules('Country', 'Country', 'required');
            $this->form_validation->set_rules('Course_description', 'Course Description', 'required');
            $this->form_validation->set_rules('Course_requirements', 'Course Requirements', 'required');
            $this->form_validation->set_rules('University', 'University', 'required');
            $this->form_validation->set_rules('Intake', 'Intake', 'required');
            $this->form_validation->set_rules('Scholarship', 'Scholarship', 'required');
            $this->form_validation->set_rules('English_language_requirement', 'English Language Requirement', 'required');
            $this->form_validation->set_rules('Course_fee', 'Course Fee', 'required');
            $this->form_validation->set_rules('Years', 'Course Duration', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/course_create');
                $this->session->set_flashdata('error', validation_errors());
                $this->session->set_flashdata('form_data', $this->input->post());
                redirect('admin/course/add');
            }

            $data = array(
                'Course_id' => $this->input->post('Course_id'),
                'Course_name' => $this->input->post('Course_name'),
                'Country' => $this->input->post('Country'),
                'Course_description' => $this->input->post('Course_description'),
                'Course_requirements' => $this->input->post('Course_requirements'),
                'University' => $this->input->post('University'),
                'Intake' => $this->input->post('Intake'),
                'Scholarship' => $this->input->post('Scholarship'),
                'English_language_requirement' => $this->input->post('English_language_requirement'),
                'Course_fee' => $this->input->post('Course_fee'),
                'Years' => $this->input->post('Years'),
            );

            $this->Course_Model->create_course($data);
            $this->session->set_flashdata('success', 'Course created successfully');
            redirect('admin/courses');
        } else {
            $data['countries'] = $this->Country_Model->get_all_countries();
            $this->load->view('admin/course_create', $data);  
        }
    }

    public function course_edit($id){
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('Course_name', 'Course Name', 'required');
            $this->form_validation->set_rules('Country', 'Country', 'required');
            $this->form_validation->set_rules('Course_description', 'Course Description', 'required');
            $this->form_validation->set_rules('Course_requirements', 'Course Requirements', 'required');
            $this->form_validation->set_rules('University', 'University', 'required');
            $this->form_validation->set_rules('Intake', 'Intake', 'required');
            $this->form_validation->set_rules('Scholarship', 'Scholarship', 'required');
            $this->form_validation->set_rules('English_language_requirement', 'English Language Requirement', 'required');
            $this->form_validation->set_rules('Course_fee', 'Course Fee', 'required');
            $this->form_validation->set_rules('Years', 'Course Duration', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/course_create');
                $this->session->set_flashdata('error', validation_errors());
                $this->session->set_flashdata('form_data', $this->input->post());
                redirect('admin/course/edit/'.$id);
            }

            $data = array(
                'Course_id' => $id,
                'Course_name' => $this->input->post('Course_name'),
                'Country' => $this->input->post('Country'),
                'Course_description' => $this->input->post('Course_description'),
                'Course_requirements' => $this->input->post('Course_requirements'),
                'University' => $this->input->post('University'),
                'Intake' => $this->input->post('Intake'),
                'Scholarship' => $this->input->post('Scholarship'),
                'English_language_requirement' => $this->input->post('English_language_requirement'),
                'Course_fee' => $this->input->post('Course_fee'),
                'Years' => $this->input->post('Years'),
            );

            $this->Course_Model->update_course($id, $data);
            $this->session->set_flashdata('success', 'Course updated successfully');
            redirect('admin/courses');
        } else {
            $data['course'] = $this->Course_Model->get_course_by_id($id);
            $data['countries'] = $this->Country_Model->get_all_countries();
            $this->load->view('admin/course_create', $data);
        }
    }

    public function course_delete($id)
    {
        $this->Course_Model->delete_course($id);
        $this->session->set_flashdata('success', 'Course deleted successfully');
        redirect('admin/courses');
    }

    /************************************ Countries ************************************/
    public function country_list()
    {
        $data['countries'] = $this->Country_Model->get_all_countries();
        $this->load->view('admin/country_list', $data);
    }

    public function country_create(){
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('name', 'Country Name', 'required|is_unique[country.name]');
            $this->form_validation->set_rules('iso_code', 'ISO Code', 'required|is_unique[country.iso_code]');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/country_create');
                $this->session->set_flashdata('error', validation_errors());
                $this->session->set_flashdata('form_data', $this->input->post());
                redirect('admin/country/add');
            }

            $data = array(
                'name' => $this->input->post('name'),
                'iso_code' => $this->input->post('iso_code'),
            );

            $this->Country_Model->create_country($data);
            $this->session->set_flashdata('success', 'Country created successfully');
            redirect('admin/countries');
        } else {
            $this->load->view('admin/country_create');
        }
    }

    public function country_edit($id){
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('name', 'Country Name', 'required');
            $this->form_validation->set_rules('iso_code', 'ISO Code', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/country_create');
                $this->session->set_flashdata('error', validation_errors());
                $this->session->set_flashdata('form_data', $this->input->post());
                redirect('admin/country/edit/'.$id);
            }

            $data = array(
                'name' => $this->input->post('name'),
                'iso_code' => $this->input->post('iso_code'),
            );

            $this->Country_Model->update_country($data, $id);
            $this->session->set_flashdata('success', 'Country updated successfully');
            redirect('admin/countries');
        } else {
            $data['country'] = $this->Country_Model->get_country_by_id($id);
            $this->load->view('admin/country_create', $data);
        }
    }

    public function country_delete($id)
    {
        $this->Country_Model->delete_country($id);
        $this->session->set_flashdata('success', 'Country deleted successfully');
        redirect('admin/countries');
    }

    /************************************ Employees ************************************/
    public function employee_list()
    {
        $data['users'] = $this->User_Model->get_all_employees();
        $this->load->view('admin/employee_list', $data);
    }

    public function employee_create(){
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('role', 'Role', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/employee_create');
                $this->session->set_flashdata('error', validation_errors());
                $this->session->set_flashdata('form_data', $this->input->post());
                redirect('admin/employee/add');
            }

            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => $this->input->post('role'),
                'created_at' => date('Y-m-d H:i:s')
            );

            $this->User_Model->create_user($data);
            $this->session->set_flashdata('success', 'Employee created successfully');
            redirect('admin/employees');
        } else {
            $this->load->view('admin/employee_create');
        }
    }

    public function employee_edit($id){
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('role', 'Role', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', validation_errors());
                $this->session->set_flashdata('form_data', $this->input->post());
                redirect('admin/employee/edit/' . $id);
            }

            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'role' => $this->input->post('role'),
            );

            $this->User_Model->update_user($id, $data);
            $this->session->set_flashdata('success', 'Employee updated successfully');
            redirect('admin/employees');
        } else {
            $data['user'] = $this->User_Model->get_user_by_id($id);
            $this->load->view('admin/employee_create', $data);
        }
    }

    public function employee_delete($id)
    {
        $this->User_Model->delete_user($id);
        $this->session->set_flashdata('success', 'Employee deleted successfully');
        redirect('admin/employees');
    }
}
