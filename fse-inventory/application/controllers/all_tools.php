<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class all_tools extends MY_Controller {

	public function index()
	{
		if($this->require_role('admin'))
		{
			$this->load->model('tools_model');
			$all_tools = $this->tools_model->select_all_from_tools();
			$tools_columns = $this->tools_model->get_columns();

			$data['all_tools'] = $all_tools;
			$data['tools_columns'] = $tools_columns;

			$this->template->setAll('FSE Inventory', array('home'));
			$this->template->load('all_tools/all_tools', $data);
		}
	}
}
