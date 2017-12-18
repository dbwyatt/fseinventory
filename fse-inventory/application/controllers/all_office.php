<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class all_office extends MY_Controller {

	public function index()
	{
		if($this->require_role('admin'))
		{
			$this->load->model('office_model');
			$all_office = $this->office_model->select_all_from_office();
			$office_columns = $this->office_model->get_columns();

			$data['all_office'] = $all_office;
			$data['office_columns'] = $office_columns;

			$this->template->setAll('FSE Inventory: Office', array('home'));
			$this->template->load('all_office/all_office', $data);
		}
	}
}
