<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chat_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Chat_Model');
    }

    // Send a message
    public function send_message()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        if (isset($data['sender_id'], $data['receiver_id'], $data['message'])) {
            $message_data = [
                'sender_id' => $data['sender_id'],
                'receiver_id' => $data['receiver_id'],
                'message' => $data['message']
            ];
            $this->Chat_Model->send_message($message_data);

            echo json_encode(['status' => 'success', 'message' => 'Message sent successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
        }
    }

    // Get chat messages between two users
    public function get_messages($sender_id, $receiver_id)
    {
        $messages = $this->Chat_Model->get_messages($sender_id, $receiver_id);
        $this->Chat_Model->mark_as_read($sender_id, $receiver_id); // Mark as read
        echo json_encode(['status' => 'success', 'messages' => $messages]);
    }

    // Get unread messages count for a user
    public function get_unread_count($user_id)
    {
        $unread_messages = $this->Chat_Model->get_unread_count($user_id);
        echo json_encode(['status' => 'success', 'unread_messages' => $unread_messages]);
    }

    // Get messages by sender
    public function get_messages_by_sender($sender_id)
    {
        $messages = $this->Chat_Model->get_messages_by_sender($sender_id);
        echo json_encode(['status' => 'success', 'messages' => $messages]);
    }

    // Get messages by receiver
    public function get_messages_by_receiver($receiver_id)
    {
        $messages = $this->Chat_Model->get_messages_by_receiver($receiver_id);
        echo json_encode(['status' => 'success', 'messages' => $messages]);
    }
}
