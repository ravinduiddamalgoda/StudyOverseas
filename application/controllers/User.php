<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Ensure the user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login'); // Redirect to login if not logged in
        }
        $this->load->model('User_model'); // Load the User_model
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

        $this->load->view('web/user/dashboard', $data);

        // Load the dashboard view and pass the user data
        $this->load->view('web/user/dashboard', $data);
    }

    // Load user list view
    public function user_list()
    {
        $data['users'] = $this->User_model->get_users(); // Fetch users from the model
        $this->load->view('admin/user_list', $data); // Load the view with user data
    }
}
