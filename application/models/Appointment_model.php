<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Appointment_Model extends CI_Model
{

    public function save_appointment($data)
    {
        return $this->db->insert('appointments', $data);
    }

    public function get_appointments()
    {
        $date = $this->input->get('date'); // Get the selected date
        $this->load->model('Appointment_model'); // Load your model

        // Fetch appointments from the database
        $appointments = $this->Appointment_model->get_appointments_by_date($date);
        echo json_encode($appointments); // Return appointments as JSON
    }

    public function get_appointments_by_date($date)
    {
        $this->db->select('appointment_time');
        $this->db->from('appointments'); // Your appointments table name
        $this->db->where('appointment_date', $date);
        $query = $this->db->get();

        return $query->result_array(); // Return the result as an array
    }

    // Function to fetch all appointments
    public function get_all_appointments()
    {
        $this->db->select('*');
        $this->db->from('appointments'); // Assuming your table name is 'appointments'
        $query = $this->db->get();
        return $query->result(); // Return the result as an array of objects
    }

    // Fetch appointment by ID
    public function get_appointment_by_id($id)
    {
        return $this->db->get_where('appointments', ['id' => $id])->row_array();
    }

    // Delete appointment
    public function delete_appointment($id)
    {
        return $this->db->delete('appointments', ['id' => $id]);
    }

    // Update appointment
    public function update_appointment($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('appointments', $data); // Assuming your table name is appointments
    }
    

}
