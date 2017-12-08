<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class all_vehicles extends MY_Controller {

	public function index()
	{
		if($this->require_role('admin'))
		{
			$this->load->model('vehicles_model');
			$all_vehicles = $this->vehicles_model->select_all_from_vehicles();
			$vehicles_columns = $this->vehicles_model->get_columns();

			$data['all_vehicles'] = $all_vehicles;
			$data['vehicles_columns'] = $vehicles_columns;

			$this->template->setAll('FSE Inventory');
			$this->template->load('all_vehicles/all_vehicles', $data);
		}
	}
}
