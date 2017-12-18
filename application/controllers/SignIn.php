<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SignIn extends CI_Controller {

    public function index()
    {

        if(isset($_SESSION['userId'])){
            redirect('welcome');
        }else{
            $data = array('home' => '','training' => '','appointment' => '','contact' => '','signIn' => 'selected','signUp' => '');
            $this->load->view('layouts/header',$data);
            $this->load->view('login');
            $this->load->view('layouts/footer');
        }


    }
}
