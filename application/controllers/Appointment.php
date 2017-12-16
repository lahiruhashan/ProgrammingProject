<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment extends CI_Controller {

	public function index()
	{
        $this->load->view('layouts/header');
		$this->load->view('appointments');
        $this->load->view('layouts/footer');
	}

	public function values()
	{
		//print_r("hihihi");
		$date = trim($this->input->post('date'));
		$this->db->order_by('slot', 'ASC');
		//print_r("date : ". $date . "<br>");
		$data['app_list'] = $this->Appointment_Model->get_all_appointments($date);
		//print_r($data['app_list']);
		//header("content-type:application/json");
        echo json_encode($data['app_list']);
		//$this->load->view('appointments',$data);
	}
}
