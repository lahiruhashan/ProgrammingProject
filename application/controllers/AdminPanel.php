<?php
class AdminPanel extends CI_Controller{

    public function index()
    {
        $data = array('package' => '', 'trainers' => '', 'events' => '', 'users' => '', 'notifications' => 'selected', 'logout' => '');
        $this->load->view('layouts/admin_header', $data);
        $this->load->view('index');
        //$this->load->view('layouts/footer');
    }

}
