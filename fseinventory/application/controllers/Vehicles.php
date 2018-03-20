<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicles extends MY_Controller {

	public function index()
	{
		if($this->require_role('admin'))
		{
			$this->load->model('vehicles_model');
			$all_vehicles = $this->vehicles_model->select_all_from_vehicles();
			$vehicles_columns = $this->vehicles_model->get_columns('vehicles');

			$data['all_vehicles'] = $all_vehicles;
			$data['vehicles_columns'] = $vehicles_columns;

			$this->template->setAll('FSE Inventory: Vehicles', array('home'));
			$this->template->load('vehicles/vehicles', $data);
		}
	}

		public function add_new_entry_ajax() {
		
		$this->load->model('vehicles_model');
		
		// Modal Settings
		$data['modal_id'] = "add_vehicle_modal";
		$data['modal_title'] = "Add a New Vehicle";

		$data['columns_strrep'] = $this->vehicles_model->get_columns('vehicles');
		$data['columns'] = $this->vehicles_model->get_raw_columns('vehicles');

		// select dropdown and other options we'll need to display in the form
		$data['locations'] = $this->vehicles_model->get_options('location', 'location', 'ASC');
		$data['departments'] = $this->vehicles_model->get_options('department', 'department', 'ASC');
		$data['condition_assessments'] = $this->vehicles_model->get_options('condition_assessment', 'id', 'ASC');
		$data['states_index'] = $this->vehicles_model->get_options('states_index', 'state', 'ASC');


		$this->load->view('template/modals/ajax_add_vehicle_form', $data);
	}

	public function add_new_entry_to_db() {

		$this->load->model('vehicles_model');

		$success = $this->vehicles_model->add_db_entry($_POST, "vehicles");

		if ($success) {
			// message success
			redirect('vehicles');
		}
		else {
			// message failure
		}

	}

	public function edit_entry_ajax($vehicle = NULL, $row_id = NULL) {

		$this->load->model('vehicles_model');
		
		// Modal Settings
		$data['modal_id'] = "edit_vehicle_modal";
		$data['modal_title'] = "Edit Vehicle - <?php echo $vehicle; ?>"; //<-pass in name of item

		$data['columns_strrep'] = $this->vehicles_model->get_columns('vehicles');
		$data['columns'] = $this->vehicles_model->get_raw_columns('vehicles');

		// select dropdown and other options we'll need to display in the form
		$data['locations'] = $this->vehicles_model->get_options('location', 'location', 'ASC');
		$data['departments'] = $this->vehicles_model->get_options('department', 'department', 'ASC');
		$data['condition_assessments'] = $this->vehicles_model->get_options('condition_assessment', 'id', 'ASC');
		$data['states_index'] = $this->vehicles_model->get_options('states_index', 'state', 'ASC');

		// get current row data to edit
		$row_id = 17;
		if ($row_id !== NULL) {
			$row_data = $this->vehicles_model->select_vehicles_by_id($row_id);
		}
		else {
			// THROW INFORMATION BOX "Please highlight the row you wish to edit"
		}

		// and itemize each data value to display it in the form
		foreach ($row_data as $item => $val) {
			$data[$item] = $val;
		}
		debug($row_data);

		$this->load->view('template/modals/ajax_edit_vehicle_form', $data);
	}

	public function update_entry() {

		$this->load->model('vehicles_model');

		$success = $this->vehicles_model->update_db_entry($_POST, "vehicles");

		if ($success) {
			// message success
			redirect('vehicles');
		}
		else {
			// message failure
		}

	}
}
