<?php
class Membership extends CI_Controller{

    public function index()
    {
        if(isset($_SESSION['userId'])){
            $userId = $_SESSION['userId'];
            if($this->userModel->checkMembership($userId)){
                echo json_encode("already");
            }
        }

    }

    public function getMembership(){
        if(!isset($_SESSION['userId'])){
            $data = array('home' => '','training' => '','appointment' => '','contact' => '','signIn' => 'selected','signUp' => '');
            $this->load->view('layouts/admin_header', $data);
            $this->load->view('signIn');
            $this->load->view('layouts/footer');
        }else{
            $userId = $_SESSION['userId'];
            if($this->userModel->checkMembership($userId)){
                echo json_encode("already");
            }else{
                $this->userModel->applyMembership($userId);
                echo json_encode("success");
            }

        }
    }

}