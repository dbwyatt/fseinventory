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

		$data['columns_strrep'] = $this->tools_model->get_columns('tools');
		$data['columns'] = $this->tools_model->get_raw_columns('tools');

		// select dropdown and other options we'll need to display in the form
		$data['locations'] = $this->tools_model->get_options('location');
		$data['departments'] = $this->tools_model->get_options('department');
		// $data['tool_descriptions'] = $options[3];
		$data['condition_assessments'] = $this->tools_model->get_options('condition_assessment');

		$this->load->view('template/modals/ajax_add_entry_form', $data);
	}

	public function add_new_entry_to_db() {

		$this->load->model('tools_model');

		$success = $this->tools_model->add_db_entry($_POST, "tools");

		if ($success) {
			// message success
			redirect('tools');
		}
		else {
			// message failure
		}

	}

	public function edit_entry_ajax($tool_model = NULL) {

		$this->load->model('tools_model');
		
		// Modal Settings
		$data['modal_id'] = "tool_modal";
		$data['modal_title'] = "Edit Tool Record - <?php echo $tool_model; ?>";

		$data['columns_strrep'] = $this->tools_model->get_columns('tools');
		$data['columns'] = $this->tools_model->get_raw_columns('tools');

		// get current row data to edit
		$data['db_row'] = $this->tools_model->test();

		$this->load->view('template/modals/ajax_edit_entry_form', $data);
	}
	
}
