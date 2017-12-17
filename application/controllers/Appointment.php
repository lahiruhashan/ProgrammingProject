<?php
class Appointment extends CI_Controller{

    public function index()
    {
        $data = array('home' => '', 'training' => '', 'appointment' => 'selected', 'booking' => '', 'contact' => '', 'logout' => '');
        $this->load->view('layouts/logged_header', $data);
        $this->load->view('appointments');
        $this->load->view('layouts/footer');
    }
}
