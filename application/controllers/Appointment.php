<?php
class Appointment extends CI_Controller{

    public function index()
    {
        $data = array('home' => '', 'training' => '', 'appointment' => 'selected', 'booking' => '', 'contact' => '', 'logout' => '');
        $this->load->view('layouts/logged_header', $data);
        $this->load->view('appointments');
        $this->load->view('layouts/footer');
    }

    public function getAll()
    {
        $userId = $_SESSION['userId'];
        $data['app_list'] = $this->Appointment_Model->get_appointments($userId);
        echo json_encode($data['app_list']);
    }
}
