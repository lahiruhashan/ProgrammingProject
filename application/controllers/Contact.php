<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function viewcontact()
	{
		if(isset($_SESSION['userId'])){
            $data = array('home' => '','training' => '','appointment' => '','booking' => '','contact' => 'selected','logout' => '');
            $this->load->view('layouts/logged_header',$data);
            $this->load->view('contact');
            $this->load->view('layouts/footer');
        }else{
            $data = array('home' => '','training' => '','contact' => 'selected','signIn' => '','signUp' => '');
            $this->load->view('layouts/header',$data);
            $this->load->view('contact');
            $this->load->view('layouts/footer');
        }
	}

    public function index(){
        if(isset($_SESSION['userId'])){
            $data = array('home' => '','training' => '','appointment' => '','booking' => '','contact' => 'selected','logout' => '');
            $this->load->view('layouts/logged_header',$data);
            $this->load->view('contact');
            $this->load->view('layouts/footer');
        }else{
            $data = array('home' => '','training' => '','contact' => 'selected','signIn' => '','signUp' => '');
            $this->load->view('layouts/header',$data);
            $this->load->view('contact');
            $this->load->view('layouts/footer');
        }
        }

    public function addmessage(){                                    //validation add customer
                $this->form_validation->set_rules('name', 'First Name', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required');
                $this->form_validation->set_rules('message', 'Message', 'required');
        

                if ($this->form_validation->run() == FALSE)    // if validation is false
                {
                         $this->load->view('Contact');
                }
                else   //if validation is false
                {
                        $name = $this->input->post('name',TRUE);
                        $email = $this->input->post('email',TRUE);
                        $message = $this->input->post('message',TRUE);


                        $this->load->model('userModel');
                        $response = $this->userModel->addmessage($name,$email,$message);
                        
                        if ($response){
                                $this->session->set_flashdata('msg','Message Success');
                                redirect('Contact/index');
                        }

        }
        }

}
