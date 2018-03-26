<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offices extends MY_Controller {

	public function index()
	{
		if($this->require_role('admin'))
		{
			$this->load->model('offices_model');
			$all_offices = $this->offices_model->select_all_from_offices();
			$offices_columns = $this->offices_model->get_columns('offices');

			$data['all_offices'] = $all_offices;
			$data['offices_columns'] = $offices_columns;

			$this->template->setAll('FSE Inventory: Offices', array('home'));
			$this->template->load('offices/offices', $data);
		}
	}

		public function add_new_entry_ajax() {
		
		$this->load->model('offices_model');
		
		// Modal Settings
		$data['modal_id'] = "add_office_item_modal";
		$data['modal_title'] = "Add a New Office Item";

		$data['columns_strrep'] = $this->offices_model->get_columns('offices');
		$data['columns'] = $this->offices_model->get_raw_columns('offices');

		// select dropdown and other options we'll need to display in the form
		$data['locations'] = $this->offices_model->get_options('location', 'location', 'ASC');
		$data['departments'] = $this->offices_model->get_options('department', 'department', 'ASC');
		$data['condition_assessments'] = $this->offices_model->get_options('condition_assessment', 'id', 'ASC');


		$this->load->view('template/modals/ajax_add_office_form', $data);
	}

	public function add_new_entry_to_db() {

		$this->load->model('offices_model');

		$success = $this->offices_model->add_db_entry($_POST, "offices");

		if ($success) {
			// message success
			redirect('offices');
		}
		else {
			// message failure
		}

	}

	public function edit_entry_ajax($row_id = NULL) {
		if ($row_id === NULL) {
			// THROW INFORMATION BOX "Please highlight the row you wish to edit"
			return;
		}

		$this->load->model('offices_model');

		// get current row data to edit
		$row_data = $this->offices_model->select_offices_by_id($row_id);

		// Modal Settings
		$data['modal_id'] = "edit_office_item_modal";
		$data['modal_title'] = "Edit Office Item - {$row_data['office_item']}";

		$data['columns_strrep'] = $this->offices_model->get_columns('offices');
		$data['columns'] = $this->offices_model->get_raw_columns('offices');

		// select dropdown and other options we'll need to display in the form
		$data['locations'] = $this->offices_model->get_options('location', 'location', 'ASC');
		$data['departments'] = $this->offices_model->get_options('department', 'department', 'ASC');
		$data['condition_assessments'] = $this->offices_model->get_options('condition_assessment', 'id', 'ASC');

		// and itemize each data value to display it in the form
		foreach ($row_data as $item => $val) {
			$data[$item] = $val;
		}

		$this->load->view('template/modals/ajax_edit_office_form', $data);
	}

	public function update_entry() {

		$this->load->model('offices_model');

		$success = $this->offices_model->update_db_entry($_POST, "offices");

		if ($success) {
			// message success
			redirect('offices');
		}
		else {
			// message failure
		}

	}
}
