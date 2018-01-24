<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tools extends MY_Controller {

	public function index()
	{
		if($this->require_role('admin'))
		{
			$this->load->model('tools_model');
			$all_tools = $this->tools_model->select_all_from_tools();
			$tools_columns = $this->tools_model->get_columns('tools');

			$data['all_tools'] = $all_tools;
			$data['tools_columns'] = $tools_columns;

			$this->template->setAll('FSE Inventory: Tools', array('home'));
			$this->template->load('tools/tools', $data);
		}
	}

	public function add_new_entry_ajax() {
		
		$this->load->model('tools_model');
		
		// Modal Settings
		$data['modal_id'] = "tool_modal";
		$data['modal_title'] = "Add a New Tool Record";

		$data['columns'] = $this->tools_model->get_columns('tools');
		// columns that are either auto generated, or we just don't want to show
		$data['hidden_values'] = array("id", "date created");

		$this->load->view('template/modals/ajax_add_entry_form', $data);
	}

	public function edit_entry_ajax() {

		// Modal Settings
		$data['modal_id'] = "tool_modal";
		$data['modal_title'] = "Edit Tool Record";

		$this->load->model('tools_model');
		$data['tools_columns'] = $this->tools_model->get_columns('tools');
		
		// insert selected row data
		//$data['tool_data'] = $this->tools_model->select_tools();

		$this->load->view('template/modals/ajax_add_entry_form', $data);
	}
	
}
