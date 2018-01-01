<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AllOffices extends MY_Controller {

	public function index()
	{
		if($this->require_role('admin'))
		{
			$this->load->model('offices_model');
			$all_offices = $this->office_model->select_all_from_office();
			$office_columns = $this->office_model->get_columns();

			$data['all_offices'] = $all_office;
			$data['office_columns'] = $office_columns;

			$this->template->setAll('FSE Inventory: Office', array('home'));
			$this->template->load('all_offices/all_offices', $data);
		}
	}
}
