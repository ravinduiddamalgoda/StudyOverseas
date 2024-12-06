<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chat_Model extends CI_Model
{
    private $tableName = 'chat_messages';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Send a message
    public function send_message($data)
    {
        return $this->db->insert($this->tableName, $data);
    }

    // Fetch messages between two users
    public function get_messages($sender_id, $receiver_id)
    {
        $this->db->select('*');
        $this->db->from($this->tableName);
        $this->db->group_start()
            ->where('sender_id', $sender_id)
            ->where('receiver_id', $receiver_id)
        ->group_end()
        ->or_group_start()
            ->where('sender_id', $receiver_id)
            ->where('receiver_id', $sender_id)
        ->group_end();
        $this->db->order_by('sent_at', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    // Mark messages as read
    public function mark_as_read($sender_id, $receiver_id)
    {
        $this->db->set('is_read', true);
        $this->db->where('sender_id', $sender_id);
        $this->db->where('receiver_id', $receiver_id);
        $this->db->update($this->tableName);
    }

    // Get unread message count for a user
    public function get_unread_count($user_id)
    {
        $this->db->select('sender_id, COUNT(*) as unread_count');
        $this->db->from($this->tableName);
        $this->db->where('receiver_id', $user_id);
        $this->db->where('is_read', false);
        $this->db->group_by('sender_id');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_messages_by_sender($sender_id)
    {
        $this->db->select('*');
        $this->db->from($this->tableName);
        $this->db->where('sender_id', $sender_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_messages_by_receiver($receiver_id)
    {
        $this->db->select('*');
        $this->db->from($this->tableName);
        $this->db->where('receiver_id', $receiver_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_all_messages_of($id)
    {
        $this->db->select('*');
        $this->db->from($this->tableName);
        $this->db->where('sender_id', $id);
        $this->db->or_where('receiver_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
}
