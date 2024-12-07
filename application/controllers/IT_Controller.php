<?php
defined('BASEPATH') or exit('No direct script access allowed');

class IT_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Ensure the user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login'); // Redirect to login if not logged in
        }
        $this->load->model('User_Model'); // Load the User_model
        $this->load->model('Course_Model'); // Load the Course_model
        $this->load->model('Country_Model'); // Load the Country_model
    }

    public function dashboard()
    {
        $role = $this->session->userdata('role');

        if ($role !== 'it') {
            $this->session->set_flashdata('error', 'You do not have permission to access this page');
            redirect('auth/login');
        }

        $data['first_name'] = $this->session->userdata('first_name');
        $data['last_name'] = $this->session->userdata('last_name');
        $data['email'] = $this->session->userdata('email');
        $data['role'] = $role;

        $this->load->view('it/dashboard', $data);
    }

    /************************************ Courses ************************************/
    /**
     * Summary of view_courses
     * @return void
     */
    public function course_list()
    {
        $data['courses'] = $this->Course_Model->get_all_courses();
        $this->load->view('it/course_list', $data);
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
                $this->load->view('it/course_create');
                $this->session->set_flashdata('error', validation_errors());
                $this->session->set_flashdata('form_data', $this->input->post());
                redirect('it/course/add');
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
            redirect('it/courses');
        } else {
            $data['countries'] = $this->Country_Model->get_all_countries();
            $this->load->view('it/course_create', $data);  
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
                $this->load->view('it/course_create');
                $this->session->set_flashdata('error', validation_errors());
                $this->session->set_flashdata('form_data', $this->input->post());
                redirect('it/course/edit/'.$id);
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
            redirect('it/courses');
        } else {
            $data['course'] = $this->Course_Model->get_course_by_id($id);
            $data['countries'] = $this->Country_Model->get_all_countries();
            $this->load->view('it/course_create', $data);
        }
    }

    public function course_delete($id)
    {
        $this->Course_Model->delete_course($id);
        $this->session->set_flashdata('success', 'Course deleted successfully');
        redirect('it/courses');
    }

    /************************************ Countries ************************************/
    public function country_list()
    {
        $data['countries'] = $this->Country_Model->get_all_countries();
        $this->load->view('it/country_list', $data);
    }

    public function country_create(){
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('name', 'Country Name', 'required|is_unique[country.name]');
            $this->form_validation->set_rules('iso_code', 'ISO Code', 'required|is_unique[country.iso_code]');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('it/country_create');
                $this->session->set_flashdata('error', validation_errors());
                $this->session->set_flashdata('form_data', $this->input->post());
                redirect('it/country/add');
            }

            $data = array(
                'name' => $this->input->post('name'),
                'iso_code' => $this->input->post('iso_code'),
            );

            $this->Country_Model->create_country($data);
            $this->session->set_flashdata('success', 'Country created successfully');
            redirect('it/countries');
        } else {
            $this->load->view('it/country_create');
        }
    }

    public function country_edit($id){
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('name', 'Country Name', 'required');
            $this->form_validation->set_rules('iso_code', 'ISO Code', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('it/country_create');
                $this->session->set_flashdata('error', validation_errors());
                $this->session->set_flashdata('form_data', $this->input->post());
                redirect('it/country/edit/'.$id);
            }

            $data = array(
                'name' => $this->input->post('name'),
                'iso_code' => $this->input->post('iso_code'),
            );

            $this->Country_Model->update_country($data, $id);
            $this->session->set_flashdata('success', 'Country updated successfully');
            redirect('it/countries');
        } else {
            $data['country'] = $this->Country_Model->get_country_by_id($id);
            $this->load->view('it/country_create', $data);
        }
    }

    public function country_delete($id)
    {
        $this->Country_Model->delete_country($id);
        $this->session->set_flashdata('success', 'Country deleted successfully');
        redirect('it/countries');
    }

}
