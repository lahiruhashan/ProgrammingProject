<?php 

class ViewCus extends CI_Controller
{
	
	function ViewCustomer()
	{
        $email = $this->input->post('email');
	  $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

	    if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('viewcustomer');
                }
                else
                {
                      $this->load->model('Model_cus');
                      $data['customer'] = $this->Model_cus->viewcustomer($email);
                      // var_dump($data);
                      $this->load->view('viewcustomer',$data);
                }
	}
}
 ?>