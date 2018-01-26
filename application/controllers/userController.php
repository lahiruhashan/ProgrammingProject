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

/*
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
    }*/

/** integration 2 */

        public function validate_money($input)
        {
            if (preg_match('/^[0-9]*\.?[0-9]/', $input)) {
                return true;
            } else {
                $this->form_validation->set_message('validate_money', 'Please enter valid value for price!');
                return false;
            }
        }



        function checkDateFormat($date) {
            if (preg_match("/[0-31]{2}\/[0-12]{2}\/[0-9]{4}/", $date)) {
                if(checkdate(substr($date, 3, 2), substr($date, 0, 2), substr($date, 6, 4)))
                    return true;
                else
                    return false;
            } else {
                return false;
            }
        }

        public function addPackage()
        {


            $dateS = strtotime($this->input->post('datepicker1'));

            $start_date = date('Y-m-d', $dateS);


            $dateE = strtotime($this->input->post('datepicker2'));
            $end_date = date('Y-m-d', $dateE);


            $data = array(
                'package_name' => $this->input->post('pckname'),
                'start_date' => $start_date,
                'end_date' => $end_date,
                'pck_fee' => $this->input->post('pckfee'),
                'description' => ($this->input->post('description'))
            );

            if (isset($_POST['searchbtn'])) {

                $searchkey = $this->input->post('search');
                $data['res'] = $this->userModel->searchPck($searchkey);
                $data_header = array('package' => '', 'trainers' => '', 'events' => '', 'users' => '', 'notifications' => 'selected', 'logout' => '');
                $this->load->view('layouts/admin_header', $data_header);
                $this->load->view('addPackage', $data);

            } else {

                $this->form_validation->set_rules('pckname', "Package Name", "required", "is_unique[package.package_name]");
                $this->form_validation->set_rules("pckfee", "Package Fee", "required",'callback_validate_money');
                $this->form_validation->set_rules("description", "Description", "required");
                $this->form_validation->set_rules("datepicker1", "Start Date", "required",'callback_checkDateFormat');
                $this->form_validation->set_rules("datepicker2", "End Date", "required");


                if ($this->form_validation->run() == TRUE) {
                    $this->userModel->insertPckgData($data);
                    $this->session->set_flashdata('success', 'Successfully added!');
                    redirect('userController/addPackage', 'refresh');


                } else {
                    $data['res'] = $this->userModel->getPackageData();
                    $data_header = array('package' => '', 'trainers' => '', 'events' => '', 'users' => '', 'notifications' => 'selected', 'logout' => '');
                    $this->load->view('layouts/admin_header', $data_header);
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
                $data_header = array('package' => '', 'trainers' => '', 'events' => '', 'users' => '', 'notifications' => 'selected', 'logout' => '');
                $this->load->view('layouts/admin_header', $data_header);
                $this->load->view('addTrainer', $data);

            } else {

                $this->form_validation->set_rules("trainername", "Trainer Name", "required", "is_unique[trainer.trainer_name]");
                $this->form_validation->set_rules("nic", "NIC ", 'required|min_length[9]|max_length[9]|is_natural[trainer.nic]');
                $this->form_validation->set_rules("tpNo", "Contact Number", 'required|min_length[10]|max_length[10]|is_natural[trainer.contact_no]');
                $this->form_validation->set_rules("email", "Email Address", 'trim|required|valid_email');

                if ($this->form_validation->run() == TRUE) {
                    $this->userModel->insertTrainerData($data);
                    $this->session->set_flashdata('success', 'Successfully added!');
                    redirect('userController/addTrainer', 'refresh');


                } else {
                    $data['res'] = $this->userModel->getTrainerData();
                    $data_header = array('package' => '', 'trainers' => '', 'events' => '', 'users' => '', 'notifications' => 'selected', 'logout' => '');
                    $this->load->view('layouts/admin_header', $data_header);
                    $this->load->view('addTrainer', $data);


                }
            }
        }


        public function editTrainer($id)
        {


            if (isset($_POST['update'])) {


                if ($this->userModel->update($id)) {
                    $this->userModel->update($id);


                    $this->session->set_flashdata('success', 'Trainer is successfully updated');
                    redirect('userController/addTrainer', 'refresh');
                } else {

                    $this->session->set_flashdata('error', 'Trainer is not updated');
                    redirect('userController/editTrainer/' . $id, 'refresh');
                }
            } else {
                $data['res'] = $this->userModel->edit($id);
//                $headerData = array('home' => 'selected','training' => '','contact' => '','signIn' => '','signUp' => '');
//                $this->load->view('layouts/header',$headerData);
                $data_header = array('package' => '', 'trainers' => '', 'events' => '', 'users' => '', 'notifications' => 'selected', 'logout' => '');
                $this->load->view('layouts/admin_header', $data_header);
                $this->load->view('editTrainer', $data);

            }
        }


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
                    redirect('userController/editPackage/' . $id, 'refresh');
                }
            } else {
                $data['res'] = $this->userModel->editPck($id);
//                $headerData = array('home' => 'selected','training' => '','contact' => '','signIn' => '','signUp' => '');
//                $this->load->view('layouts/header',$headerData);
                $data_header = array('package' => '', 'trainers' => '', 'events' => '', 'users' => '', 'notifications' => 'selected', 'logout' => '');
                $this->load->view('layouts/admin_header', $data_header);
                $this->load->view('editPackage', $data);

            }
        }


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
//            $headerData = array('home' => 'selected','training' => '','contact' => '','signIn' => '','signUp' => '');
//            $this->load->view('layouts/header',$headerData);
            $this->load->view('userRequest', $data);
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

        public function checkAttendance()
        {
            $data['res'] = $this->userModel->checkAttendance();
            $headerData = array('home' => 'selected', 'training' => '', 'contact' => '', 'signIn' => '', 'signUp' => '');
            $this->load->view('layouts/header', $headerData);
            $this->load->view('membershipRequest', $data);
        }


        public function markAttendance()
        {
            if (isset($_POST['searchbtn'])) {
                $data['res'] = $this->userModel->markAttendance();
                var_dump($data);
                $headerData = array('home' => 'selected', 'training' => '', 'contact' => '', 'signIn' => '', 'signUp' => '');
                $this->load->view('layouts/header', $headerData);
                $this->load->view('checkAttendance', $data);
            }else{
                $headerData = array('home' => 'selected', 'training' => '', 'contact' => '', 'signIn' => '', 'signUp' => '');
                $this->load->view('layouts/header', $headerData);
                $this->load->view('markAttendance');
            }





        }


//
//        public function getMembershipRequest()
//        {
//
//
//            $data['res'] = $this->userModel->markAttendance();
//            print_r($data);
//            $headerData = array('home' => 'selected', 'training' => '', 'contact' => '', 'signIn' => '', 'signUp' => '');
//            $this->load->view('layouts/header', $headerData);
//            $this->load->view('membershipRequest', $data);
//        }


        public function attendance($id)
        {


            $attendance=$this->input->$_POST('attendance');
            if($attendance=='Present'){
                $this->userModel->attendance();
                redirect('checkAttendance');



            }

        }









    }
