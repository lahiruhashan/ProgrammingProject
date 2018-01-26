<?php 

class AddCus extends CI_Controller
{
	
	function AddCustomer()
	{
	 $this->form_validation->set_rules('fname', 'First Name', 'required');
	 $this->form_validation->set_rules('lname', 'Last Name', 'required');
	 $this->form_validation->set_rules('address', 'Address', 'required');
	 $this->form_validation->set_rules('bday', 'Birth Day', 'required');
	 $this->form_validation->set_rules('pnumber', 'Phone Number', 'required|max_length(10)|numeric');
   $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

	    if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('addcustomer');
                }
                else
                {
                      	$this->load->model('Model_cus');
                      	$response = $this->Model_cus->addcustomer();

                      	if($response){
                      		$this->session->set_flashdata('msg','Registered Successfully...');
                      		redirect('Home/add');
                      	}     
                }
	}
}

