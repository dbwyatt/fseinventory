<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends MY_Controller {

	public function index()
	{
		if($this->require_role('admin'))
		{
			$this->load->model('tools_model');
			$all_tools = $this->tools_model->select_all_from_tools();

			$data['all_tools'] = $all_tools;

			$this->template->setAll('FSE Inventory');
			$this->template->load('home', $data);
		}
	}
}
