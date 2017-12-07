<?php defined('BASEPATH') OR exit('No direct script access allowed');

class user_management extends MY_Controller {

	public function index()
	{
		
	}

	public function create_new_user()
	{
		
		// take user to create_new_user view to fill out the form

		$this->template->setAll('Create New User');
		$this->template->load('user_management/create_new_user');
		
	}
}
