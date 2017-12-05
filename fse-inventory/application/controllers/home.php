<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends MY_Controller {

	public function index()
	{
		
	}

	public function all_tools()
	{
		if($this->require_role('admin'))
		{
			$this->load->model('tools_model');
			$all_tools = $this->tools_model->select_all_from_tools();
			$tool_columns = $this->tools_model->get_columns();

			$data['all_tools'] = $all_tools;
			$data['tool_columns'] = $tool_columns;

			$this->template->setAll('FSE Inventory');
			$this->template->load('home', $data);
		}
	}

	public function all_office()
	{
		if($this->require_role('admin'))
		{
			$this->load->model('tools_model');
			$all_tools = $this->tools_model->select_all_from_tools();
			$tool_columns = $this->tools_model->get_columns();

			$data['all_tools'] = $all_tools;
			$data['tool_columns'] = $tool_columns;

			$this->template->setAll('FSE Inventory');
			$this->template->load('home', $data);
		}
	}

	public function all_vehicle()
	{
		if($this->require_role('admin'))
		{
			$this->load->model('tools_model');
			$all_tools = $this->tools_model->select_all_from_tools();
			$tool_columns = $this->tools_model->get_columns();

			$data['all_tools'] = $all_tools;
			$data['tool_columns'] = $tool_columns;

			$this->template->setAll('FSE Inventory');
			$this->template->load('home', $data);
		}
	}


}
