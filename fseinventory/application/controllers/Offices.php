<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offices extends MY_Controller {

	public function index()
	{
		if($this->require_role('admin'))
		{
			$this->load->model('offices_model');
			$all_offices = $this->offices_model->select_all_from_office();
			$office_columns = $this->offices_model->get_columns();

			$data['all_offices'] = $all_offices;
			$data['office_columns'] = $office_columns;

			$this->template->setAll('FSE Inventory: Offices', array('home'));
			$this->template->load('offices/offices', $data);
		}
	}
}
