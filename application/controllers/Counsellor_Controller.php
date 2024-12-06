<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Counsellor_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Ensure the user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login'); // Redirect to login if not logged in
        }
        $this->load->model('Appointment_Model');
        $this->load->model('Chat_Model');
        $this->load->model('User_Model');
    }

    // Admin dashboard method
    public function dashboard()
    {
        $role = $this->session->userdata('role');

        if ($role !== 'counsellor') {
            $this->session->set_flashdata('error', 'You do not have permission to access this page');
            redirect('auth/login');
        }

        $data['first_name'] = $this->session->userdata('first_name');
        $data['last_name'] = $this->session->userdata('last_name');
        $data['email'] = $this->session->userdata('email');
        $data['role'] = $role;

        $this->load->view('counsellor/dashboard', $data);
    }

    public function chat_list()
    {
        $role = $this->session->userdata('role');
        $id = $this->session->userdata('user_id');

        if ($role !== 'counsellor') {
            $this->session->set_flashdata('error', 'You do not have permission to access this page');
            redirect('auth/login');
        }

        $all_chat_list = $this->Chat_Model->get_all_messages_of($id, );

        //get unique sender ids and reciever ids, accept the current user id
        $sender_ids = array_unique(array_column($all_chat_list, 'sender_id'));
        $receiver_ids = array_unique(array_column($all_chat_list, 'receiver_id'));

        $chat_ids = array_merge($sender_ids, $receiver_ids);
        $chat_ids = array_unique(array_diff($chat_ids, [$id]));

        //create chat list array with object, one field is chat_id
        $chat_list = [];
        foreach ($chat_ids as $chat_id) {
            $chat = new stdClass();
            $chat->chat_id = $chat_id;
            $chat->student_name = '';
            $chat->unread_count = 0;
            $chat->first_message_time = '';
            $chat->last_message = '';
            $chat->last_message_by = '';
            $chat->last_message_time = '';

            //from chat list, get the last message of the chat
            $chat_messages = array_filter($all_chat_list, function ($chat) use ($chat_id) {
                return $chat['sender_id'] == $chat_id || $chat['receiver_id'] == $chat_id;
            });

            $chat_messages = array_values($chat_messages);
            $last_message = end($chat_messages);
            $first_message = reset($chat_messages);

            $chat->first_message_time = $first_message['sent_at'];
            $chat->last_message = $last_message['message'];
            $chat->last_message_time = $last_message['sent_at'];
            $chat->last_message_by = $last_message['sender_id'] == $id ? 'you' : 'student';

            //get unread count
            $unread_count = array_filter($chat_messages, function ($chat) use ($id) {
                return $chat['receiver_id'] == $id && $chat['is_read'] == 0;
            });

            $chat->unread_count = count($unread_count);

            //get student name
            $student = $this->User_Model->get_user_by_id($chat_id);
            $chat->student_name = $student['first_name'] . ' ' . $student['last_name'];

            $chat_list[$chat_id] = $chat;
        }

        $data['chats'] = $chat_list;
        $this->load->view('counsellor/chat_list', $data);
    }

    public function chat($student_id){
        $role = $this->session->userdata('role');
        $id = $this->session->userdata('user_id');

        if ($role !== 'counsellor') {
            $this->session->set_flashdata('error', 'You do not have permission to access this page');
            redirect('auth/login');
        }

        //set the chat as read
        $this->Chat_Model->mark_as_read($student_id, $id);

        $data['student_id'] = $student_id;
        $this->load->view('counsellor/chat', $data);
    }
}
