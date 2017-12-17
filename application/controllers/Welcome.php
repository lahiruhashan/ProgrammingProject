<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{

        if(isset($_SESSION['userId'])){
            $data = array('home' => 'selected','training' => '','appointment' => '','booking' => '','contact' => '','logout' => '');
            $this->load->view('layouts/logged_header',$data);
            $this->load->view('index');
            $this->load->view('layouts/footer');
        }else{
            $data = array('home' => 'selected','training' => '','contact' => '','signIn' => '','signUp' => '');
            $this->load->view('layouts/header',$data);
            $this->load->view('index');
            $this->load->view('layouts/footer');
        }

	}
}
