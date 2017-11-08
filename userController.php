    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class UserController extends CI_Controller
    {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('userModel');

        }


//        public function index()
//        {
//            if(($this->session->userdata('logged_in')!=""))
//            {
//                $data['title']= 'Home';
//                $this->load->view('topBar',$data);
//                $this->load->view("navigation");
//                $this->load->view('index');
//                $this->load->view('footer');
//            }
//            else{
//                $data1['Login']='Logout';
//                $data['title']= 'Home';
//                $this->load->view('topBar',$data);
//                $this->load->view("navigation",$data1);
//                $this->load->view('index');
//                $this->load->view('footer');
//            }
//        }
//


        public function profile()
        {

          if($this->session->userdata('logged_in')==True) {
                $data1['Login'] = 'LogOut';
                $data['title'] = 'German Fitness Center|Home';
                $this->load->view('topBar', $data);
                $this->load->view('navigation',$data1);
                $this->load->view('index');
                $this->load->view('footer');

           }else{

                $data['Login'] = 'Login';
                $this->load->view('topBar');
                $this->load->view('navigation',$data);
                $this->load->view('index');
                $this->load->view('footer');
            }


        }

        public function about()
        {

            $this->load->view('topBar');
            $this->load->view('navigation');
            $this->load->view('aboutUs');
            $this->load->view('footer');

        }

        public function features()
        {
            $this->load->view('topBar');
            $this->load->view('navigation');
            $this->load->view('Features');
            $this->load->view('footer');

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



            $this->session->set_userdata('logged_in',True);





            $this->form_validation->set_rules("email", "Email-ID", "trim|required");
            $this->form_validation->set_rules("password", "Password", "trim|required");


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