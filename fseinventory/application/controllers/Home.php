<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index()
	{
		if($this->require_role('admin')) {			
			
			$this->template->setAll('FSE');
			$this->template->load('home/home');
		}
	}

	
}
