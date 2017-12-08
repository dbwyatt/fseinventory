<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class all_offices extends MY_Controller {

	public function index()
	{
		if($this->require_role('admin'))
		{
			$this->load->model('offices_model');
			$all_offices = $this->offices_model->select_all_from_offices();
			$offices_columns = $this->offices_model->get_columns();

			$data['all_offices'] = $all_offices;
			$data['offices_columns'] = $offices_columns;

			$this->template->setAll('FSE Inventory');
			$this->template->load('all_offices/all_offices', $data);
		}
	}
}
