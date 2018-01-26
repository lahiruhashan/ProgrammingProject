<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('home');
	}

	public function add()
	{
		$this->load->view('addcustomer');
	}

	public function view()
	{
		$this->load->view('viewcustomer');
	}

	public function update()
	{
		$this->load->view('updatecustomer');
	}


	public function addpost()
	{
		$this->load->view('addpost');
	}

	public function viewpost()
	{
		$this->load->view('viewpost');
	}



	public function updateprofile()
	{
		$this->load->view('updateprofile');
	}

	public function addreception()
	{
		$this->load->view('addreception');
	}

	public function updatereception()
	{
		$this->load->view('updatereception');
	}

	public function viewreception()
	{
		$this->load->view('viewreception');
	}

	public function viewcontact()
	{
		$this->load->view('contact');
	}
}
