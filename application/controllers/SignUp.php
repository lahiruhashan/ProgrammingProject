<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SignUp extends CI_Controller {

    public function index()
    {

        if(isset($_SESSION['userId'])){
            $data = array('home' => 'selected','training' => '','appointment' => '','contact' => '','logout' => '');
            $this->load->view('layouts/logged_header',$data);
            $this->load->view('index');
            $this->load->view('layouts/footer');
        }else{
            $data = array('home' => '','training' => '','appointment' => '','contact' => '','signIn' => '','signUp' => 'selected');
            $this->load->view('layouts/header',$data);
            $this->load->view('sign_up');
            $this->load->view('layouts/footer');
        }


    }
}
