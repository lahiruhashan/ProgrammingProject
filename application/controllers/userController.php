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
            $this->load->view('index');
        }

        public function about()
        {
            $this->load->view('aboutUs');
        }

        public function signUp()
        {

            //validation
            $this->form_validation->set_rules('username', 'User Name', 'trim|required|alpha|min_length[3]|max_length[30]');
            $this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email|is_unique[credential.email]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('cPassword', 'Confirm Password', 'trim|required|matches[password]');


            if($this->form_validation->run() == TRUE) {

                //load the model to connect to the db
                $this->load->model('userModel');

                $reslt = $this->userModel->insertUser();

                

            } else{

                $this->session->set_flashdata('error','User is already exists.!');
                redirect('signUp');

            }

        }


        public function login()
        {

            $this->form_validation->set_rules("email", "Email-ID", "trim|required");
            $this->form_validation->set_rules("password", "Password", "trim|required");


            if ($this->form_validation->run() == FALSE) {
                redirect('signIn');
            } else {
                // check for user credentials
               $this->load->model('userModel');
               $reslt = $this->userModel->checkLogin();
                if ($reslt != false) {
                    $type = $reslt->type;
                    if($type == "member"){
                        $this->session->set_flashdata("success","You are logged in");
                        $this->session->set_userdata('userId', $this->input->post('email'));
                        redirect('appointment');
                    }else if($type == "admin"){
                        $this->session->set_flashdata("success","You are logged in");
                        $this->session->set_userdata('userId', $this->input->post('email'));
                        redirect('adminPanel');
                    }
                }
                //$data = array('home' => '','training' => '','appointment' => '','contact' => '','signIn' => '','signUp' => 'selected');
                else {
                    $this->session->set_flashdata('error','Username or Password invalid!');
                    redirect('signIn');


                }
            }
        }

        /** integration */


        public function addPackage()
        {

            $data = array(
                'package_name' => $this->input->post('pckname'),
                'start_date' => $this->input->post('datepicker1'),
                'end_date' => ($this->input->post('datepicker2')),
                'pck_fee' => $this->input->post('pckfee'),
                'description' => ($this->input->post('description'))
            );

            if (isset($_POST['searchbtn'])) {

                $searchkey = $this->input->post('search');
                $data['res'] = $this->userModel->searchPck($searchkey);
                $data = array('home' => 'selected','training' => '','contact' => '','signIn' => '','signUp' => '');
                $this->load->view('layouts/header',$data);
                $this->load->view('addPackage',$data);

            } else {

                $this->form_validation->set_rules('pckname', "Package Name", "required", "is_unique[package.package_name]");
                $this->form_validation->set_rules("pckfee", "Package Fee", "required");
                $this->form_validation->set_rules("description", "Description", "required");
                $this->form_validation->set_rules("datepicker1", "Start Date", "required");
                $this->form_validation->set_rules("datepicker2", "End Date", "required");


                if ($this->form_validation->run() == TRUE) {
                    $this->userModel->insertPckgData($data);
                    $this->session->set_flashdata('success', 'Successfully added!');
                    redirect('userController/addPackage', 'refresh');


                } else {
                    $data['res'] = $this->userModel->getPackageData();
                    $headerData = array('home' => 'selected','training' => '','contact' => '','signIn' => '','signUp' => '');
                    $this->load->view('layouts/header',$headerData);
                    $this->load->view('addPackage', $data);
                }
            }
        }





        public function addTrainer()
        {


            $data = array(
                'trainer_name' => $this->input->post('trainername'),
                'nic' => $this->input->post('nic'),
                'contact_no' => ($this->input->post('tpNo')),
                'email_address' => ($this->input->post('email')),

            );

            if (isset($_POST['searchbtn'])) {
                $searchkey = $this->input->post('search');
                $data['res'] = $this->userModel->Search($searchkey);
                $headerData = array('home' => 'selected','training' => '','contact' => '','signIn' => '','signUp' => '');
                $this->load->view('layouts/header',$headerData);
                $this->load->view('addTrainer', $data);

            }else{

                $this->form_validation->set_rules("trainername", "Trainer Name", "required","is_unique[trainer.trainer_name]");
                $this->form_validation->set_rules("nic", "NIC ", "required");
                $this->form_validation->set_rules("tpNo", "Contact Number", "required");
                $this->form_validation->set_rules("email", "Email Address", "required");

                if ($this->form_validation->run() == TRUE) {
                    $this->userModel->insertTrainerData($data);
                    $this->session->set_flashdata('success', 'Successfully added!');
                    redirect('userController/addTrainer','refresh');



                }else {
                    $data['res']=$this->userModel->getTrainerData();
                    $headerData = array('home' => 'selected','training' => '','contact' => '','signIn' => '','signUp' => '');
                    $this->load->view('layouts/header',$headerData);
                    $this->load->view('addTrainer', $data);



                }
            }}


        public function editTrainer($id)
        {


            if (isset($_POST['update'])) {


                if ($this->userModel->update($id)) {
                    $this->userModel->update($id);


                    $this->session->set_flashdata('success', 'Trainer is successfully updated');
                    redirect('userController/addTrainer', 'refresh');
                } else {

                    $this->session->set_flashdata('error', 'Trainer is not updated');
                    redirect('userController/editTrainer/'.$id, 'refresh');
                }
            }else{
                $data['res']=$this->userModel->edit($id);
                $headerData = array('home' => 'selected','training' => '','contact' => '','signIn' => '','signUp' => '');
                $this->load->view('layouts/header',$headerData);
                $this->load->view('editTrainer', $data);

            }}




        public function deleteTrainer($id)
        {
            $this->userModel->delete($id);
            $this->session->set_flashdata('success', 'Trainer is successfully removed');
            redirect('userController/addTrainer');

//        $data['res']=$this->userModel->getTrainerData();
//        $this->load->view('layout/header');
//        $this->load->view('addPackage', $data);

        }

        public function deletePackage($id)
        {
            $this->userModel->deletePck($id);
            $this->session->set_flashdata('success', 'Package is successfully removed');
            redirect('userController/addPackage');
//        $data['res']=$this->userModel->getPackageData();
//        $this->load->view('layouts/header');
//        $this->load->view('addPackage', $data);

        }


        public function editPackage($id)
        {


            if (isset($_POST['update'])) {


                if ($this->userModel->updatePck($id)) {
                    $this->userModel->updatePck($id);
                    $this->session->set_flashdata('success', 'Package is successfully updated');
                    redirect('userController/addPackage', 'refresh');
                } else {

                    $this->session->set_flashdata('error', 'Package is not updated');
                    redirect('userController/editPackage/'.$id, 'refresh');
                }
            }else{
                $data['res']=$this->userModel->editPck($id);
                $headerData = array('home' => 'selected','training' => '','contact' => '','signIn' => '','signUp' => '');
                $this->load->view('layouts/header',$headerData);
                $this->load->view('editPackage',$data);

            }}


        public function userRequests()
        {



            $this->load->library('pagination');
            $config['base_url'] = 'http://localhost/Projects/programmingGroup/index.php/userController/userRequests';
            $config['total_rows'] = $this->userModel->getUserRequestCount();
            $config['per_page'] = 5;
            $config['uri_segment'] = 3;
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['attributes'] = array('class' => 'page_link');
            $config['first_link'] = 'First';
            $config['last_link'] = 'Last';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['prev_link'] = '&laquo';
            $config['prev_tag_open'] = '<li class="prev">';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = '&raquo';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
            $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $this->pagination->initialize($config);
            $data['link'] = $this->pagination->create_links();



            $data['res'] = $this->userModel->getUserRequestPagintaion($config['per_page'], $page);
            $headerData = array('home' => 'selected','training' => '','contact' => '','signIn' => '','signUp' => '');
            $this->load->view('layouts/header',$headerData);
            $this->load->view('userRequest',$data);
        }

        public function acceptUser($id)
        {
            $this->userModel->acceptUser($id);
            redirect('userController/userRequests');
            $this->session->set_flashdata('success', 'Customer is accepted');


        }
        public function removeUser($id)
        {
            $this->userModel->removeUser($id);
            redirect('userController/userRequests');
            $this->session->set_flashdata('success', 'Customer is successfully removed');
        }
    }