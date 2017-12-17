<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {

	public function index()
	{
        $data = array('home' => '','training' => '','appointment' => '','booking' => 'selected','contact' => '','logout' => '');
        $this->load->view('layouts/logged_header',$data);
		$this->load->view('bookings');
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

	public function book(){
        $date = trim($this->input->post('date'));
        $slot = trim($this->input->post('slot'));
        $userId = $this->session->userdata('userId');

        $response = $this->Appointment_Model->insert_appointment($date,$slot,$userId);
        //echo $response;
        echo json_encode($response);

    }
}
