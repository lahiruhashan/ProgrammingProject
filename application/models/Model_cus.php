<?php 

class Model_cus extends CI_Model
{
	
	function addcustomer()
	{
		$data = array(
			'fname' => $this->input->post('fname',TRUE),
			'lname' => $this->input->post('lname',TRUE),
			'address' => $this->input->post('address',TRUE),
			'gender' => $this->input->post('genderboxes',TRUE),
			'bday' => $this->input->post('bday',TRUE),
			'pnumber' => $this->input->post('pnumber'),
			'email' => $this->input->post('email',TRUE),
			'password' => sha1($this->input->post('password',TRUE)),
		);

		return $this->db->insert('addcustomer',$data);
	}

	function viewcustomer($email)
	{
    	$this->db->where("email","$email");
    	$query = $this->db->get('addcustomer');
    	return $query->result_array();
	}
}

 ?>