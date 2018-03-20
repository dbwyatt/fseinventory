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
		$data['modal_id'] = "add_tool_modal";
		$data['modal_title'] = "Add a New Tool Record";

		$data['columns_strrep'] = $this->tools_model->get_columns('tools');
		$data['columns'] = $this->tools_model->get_raw_columns('tools');

		// select dropdown and other options we'll need to display in the form
		$data['locations'] = $this->tools_model->get_options('location', 'location', 'ASC');
		$data['departments'] = $this->tools_model->get_options('department', 'department', 'ASC');
		$data['condition_assessments'] = $this->tools_model->get_options('condition_assessment', 'id', 'ASC');


		$this->load->view('template/modals/ajax_add_tool_form', $data);
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

	public function edit_entry_ajax($tool = NULL, $row_id = NULL) {

		$this->load->model('tools_model');
		
		// Modal Settings
		$data['modal_id'] = "edit_tool_modal";
		$data['modal_title'] = "Edit Tool Record - <?php echo $tool; ?>"; //<-pass in name of item

		$data['columns_strrep'] = $this->tools_model->get_columns('tools');
		$data['columns'] = $this->tools_model->get_raw_columns('tools');

		// select dropdown and other options we'll need to display in the form
		$data['locations'] = $this->tools_model->get_options('location', 'location', 'ASC');
		$data['departments'] = $this->tools_model->get_options('department', 'department', 'ASC');
		$data['condition_assessments'] = $this->tools_model->get_options('condition_assessment', 'id', 'ASC');

		// get current row data to edit
		$row_id = 7;
		if ($row_id !== NULL) {
			$row_data = $this->tools_model->select_tools_by_id($row_id);
		}
		else {
			// THROW INFORMATION BOX "Please highlight the row you wish to edit"
		}

		// and itemize each data value to display it in the form
		foreach ($row_data as $item => $val) {
			$data[$item] = $val;
		}


		$this->load->view('template/modals/ajax_edit_tool_form', $data);
	}

	public function update_entry() {

		$this->load->model('tools_model');

		$success = $this->tools_model->update_db_entry($_POST, "tools");

		if ($success) {
			// message success
			redirect('tools');
		}
		else {
			// message failure
		}

	}
	
}
