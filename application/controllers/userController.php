<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('userModel');

    }


    public function profile()
    {

//        if ($_SESSION['user_logged'] == FALSE) {

//            $this->session->set_flashdata("error", "Please login first to view");
//            redirect('userController/login');


//        } else {
            $this->load->view('index');
//        }
    }

    public function signUp()
    {


        $this->form_validation->set_rules('username', 'User Name', 'trim|required|alpha|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email|is_unique[credential.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('cPassword', 'Confirm Password', 'trim|required|matches[password]');




        if($this->form_validation->run() == TRUE) {

            //load the model to connect to the db
            $this->load->model('userModel');
            $this->userModel->insertUser();


//            $this->session->set_flashdata('success','You are registered!');
            redirect('userController/profile');

        } else{

            $this->session->set_flashdata('error','User is already exists.!');
            $this->load->view('sign_up');

        }

    }


    public function login()
    {

        $this->form_validation->set_rules("email", "Email-ID", "trim|required");
        $this->form_validation->set_rules("password", "Password", "trim|required");
        echo "<h1>2</h1>";

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            // check for user credentials
           $this->load->model('userModel');
           $reslt = $this->userModel->checkLogin();
            if ($reslt != false) {
                    $this->session->set_flashdata("success","You are logged in");
                    redirect('userController/profile','refresh');
                }

            else {
                $this->session->set_flashdata('error','Username or Password invalid!');
                redirect('userController/login');


            }
        }
    }
}
?>