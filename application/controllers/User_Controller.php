<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Ensure the user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login'); // Redirect to login if not logged in
        }
        $this->load->model('User_Model'); // Load the User_model
        $this->load->model('Appointment_Model'); // Load the Appointment_model
    }

    // User dashboard method
    public function dashboard()
    {
        // Get user role from session
        $role = $this->session->userdata('role');

        // Check if the user is authorized to access this dashboard
        if ($role !== 'student' && $role !== 'customer') {
            // Redirect to the appropriate dashboard based on the role
            if ($role == 'admin') {
                redirect('admin/dashboard'); // Redirect admin to admin dashboard
            } else {
                redirect('auth/login'); // Redirect to login if role is not recognized
            }
        }

        // If user is authorized, get user data from session
        $data['first_name'] = $this->session->userdata('first_name');
        $data['last_name'] = $this->session->userdata('last_name');
        $data['email'] = $this->session->userdata('email');
        $data['role'] = $role; // No need to get it again from session
        $data['total_users'] = 10;
        $data['total_appointments'] = 5;
        $data['total_inquiries'] = 3;
        $data['total_courses'] = 7;

        $data['user_appointments'] = 2;
        $data['user_courses'] = 3;
        $data['user_inquiries'] = 1;
        $data['user_notifications'] = 4;

        // $total_users = $this->db->count_all('users'); // Example query for counting users
        // $total_appointments = $this->db->count_all('appointments'); // Example query for appointments
        // $total_inquiries = $this->db->count_all('inquiries'); // Example query for inquiries
        // $total_courses = $this->db->count_all('courses'); // Example query for courses

        // // Pass the data to the view
        // $data = [
        //     'total_users' => $total_users,
        //     'total_appointments' => $total_appointments,
        //     'total_inquiries' => $total_inquiries,
        //     'total_courses' => $total_courses
        // ];

        $this->load->view('user/dashboard', $data);
    }

    // Function to view appointments
    public function view_appointments()
    {

        $data['appointments'] = $this->Appointment_Model->get_appointments_by_email();
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
    public function view_appointment()
    {
        $id = $this->session->userdata('email');
        $data['appointment'] = $this->Appointment_Model->get_appointments_by_email($id);
        echo json_encode($data['appointment']);
        $this->load->view('user/view_appointment', $data);
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
        $this->form_validation->set_rules('appointment_date', 'Appointment Date', 'required');
        $this->form_validation->set_rules('appointment_time', 'Appointment Time', 'required');
        $this->form_validation->set_rules('appointment_type', 'Appointment Type', 'required');
        $this->form_validation->set_rules('appointment_reason', 'Appointment Reason', 'required');

        if ($this->form_validation->run() == false) {
            $data['appointment'] = $this->Appointment_Model->get_appointment_by_id($id);
            $this->load->view('admin/edit_appointment', $data);
        } else {
            $data = [
                'appointment_date' => $this->input->post('appointment_date'),
                'appointment_time' => $this->input->post('appointment_time'),
                'appointment_type' => $this->input->post('appointment_type'),
                'appointment_reason' => $this->input->post('appointment_reason')
            ];

            $this->Appointment_Model->update_appointment($id, $data);
            $this->session->set_flashdata('success', 'Appointment updated successfully');
            redirect('admin/view_appointments');
        }
    }

    // Function to create a new appointment
    public function new_appointment()
    {
        $this->form_validation->set_rules('appointment_date', 'Appointment Date', 'required');
        $this->form_validation->set_rules('appointment_time', 'Appointment Time', 'required');
        $this->form_validation->set_rules('appointment_type', 'Appointment Type', 'required');
        $this->form_validation->set_rules('appointment_reason', 'Appointment Reason', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('user/new_appointment');
        } else {
            $data = [
                'appointment_date' => $this->input->post('appointment_date'),
                'appointment_time' => $this->input->post('appointment_time'),
                'appointment_type' => $this->input->post('appointment_type'),
                'appointment_reason' => $this->input->post('appointment_reason')
            ];

            $this->Appointment_Model->create_appointment($data);
            $this->session->set_flashdata('success', 'Appointment created successfully');
            redirect('admin/view_appointments');
        }
    }


    public function view_courses()
    {
        $data['courses'] = $this->Course_Model->get_all_courses();
        $this->load->view('admin/course_list', $data);
    }


    public function update_password()
    {
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == false) {
            $this->load->view('user/update_password');
        } else {
            $id = $this->session->userdata('id');
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $this->User_Model->update_password($id, $password);
            $this->session->set_flashdata('success', 'Password updated successfully');
            redirect('user/dashboard');
        }
    }

    public function get_counsellor()
    {
        $counsellor = $this->User_Model->get_counsellor();
        echo json_encode($counsellor);
    }

    public function getUserJSON($email)
    {
        $user = $this->User_Model->get_user_by_email_json($email);
        echo json_encode($user);
    }

    public function calculate_funds()
    {
        // Check if form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve form data
            $country = $this->input->post('country');
            $tuition_fee = $this->input->post('tuition_fee');
            $deposit_paid = $this->input->post('deposit_paid');
            $location = $this->input->post('location');
            $dependents = $this->input->post('dependents'); // Number of dependents
            $children = $this->input->post('children'); // Number of children

            $funds = []; // Result array

            if ($country === 'UK') {
                // Calculate tuition fee balance
                $tuition_balance = $tuition_fee - $deposit_paid;

                // Living costs
                $monthly_living_cost = ($location === 'inside_london') ? 1334 : 1023;
                $living_costs = $monthly_living_cost * 9;

                // Dependents cost
                $dependent_cost_per_month = ($location === 'inside_london') ? 845 : 680;
                $dependent_cost = $dependents * $dependent_cost_per_month * 9;

                // Total funds
                $total_funds = $tuition_balance + $living_costs + $dependent_cost;

                $funds = [
                    'tuition_balance' => $tuition_balance,
                    'living_costs' => $living_costs,
                    'dependent_cost' => $dependent_cost,
                    'total_funds' => $total_funds
                ];
            } elseif ($country === 'Australia') {
                // Calculate tuition fee balance
                $tuition_balance = $tuition_fee - $deposit_paid;

                // Living costs
                $primary_living_cost = 24505;
                $dependent_living_cost = 7515;
                $child_living_cost = 3720;

                $dependent_cost = ($dependents * $dependent_living_cost) + ($children * $child_living_cost);
                $living_costs = $primary_living_cost + $dependent_cost;

                // Schooling costs for children
                $schooling_cost = $children * 8000;

                // Travel costs
                $travel_cost = 2000 + ($dependents * 2000) + ($children * 1500);

                // Total funds
                $total_funds = $tuition_balance + $living_costs + $schooling_cost + $travel_cost;

                $funds = [
                    'tuition_balance' => $tuition_balance,
                    'living_costs' => $living_costs,
                    'schooling_cost' => $schooling_cost,
                    'travel_cost' => $travel_cost,
                    'total_funds' => $total_funds
                ];
            }

            // Pass calculated funds to the view
            $data['funds'] = $funds;
            $this->load->view('user/calculate_funds', $data);
        } else {
            // Show the form
            $this->load->view('user/calculate_funds');
        }
    }

    public function mark_attendance($secure_rand)
    {
        $submit = $this->input->post('submit');
        if(isset($submit)){
            
        }else{
            $this->load->view('web/mark_attendance');
        }
    }
}
