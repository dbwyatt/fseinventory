<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MY_Controller {

	private $template_data = array('_css' => array(), '_js' => array());
	private $controller;
	private $CI;
	private $default_title;
	
	function __construct() {
		$this->CI =& get_instance();
		$this->controller = $this->CI->router->fetch_class();
		$this->default_title = 'FSE Inventory';
	}
	
	private function set_defaults() {
		$this->add('_css', 'header');
		$this->add('_css', 'footer');
		$this->add('_css', 'global');
		$this->add('_css', $this->controller);

		$this->add('_js', 'global');
		$this->add('_js', $this->controller);

		if ( !$this->template_data['_title'] ) {
			$this->template_data['_title'] = $this->default_title;
		}
	}

	private function set_user_data() {
		$this->set('_user_data', $this->CI->is_logged_in());
	}

	public function add($name, $value) {
		array_push($this->template_data[$name], $value);
	}

	public function set($name, $value) {
		$this->template_data[$name] = $value;
	}

	public function setAll($title = '', $css = array(), $js = array()) {
		$this->set('_title', $title);
		$this->set('_css', $css);
		$this->set('_js', $js);

		return $this->template_data;
	}

	public function load($view = '', $view_data = array(), $return = FALSE) {
		$this->set_defaults();
		$this->set_user_data();

		//load the view as a string into 'contents'
		//$this->set('payload', $this->CI->load->view($view, $view_data, TRUE));

		if ($return) {
			$payload = $this->CI->load->view("template/head", $this->template_data, TRUE);
			$payload .= $this->CI->load->view("template/header", array(), TRUE);
			$payload .= $this->CI->load->view($view, $view_data, TRUE);
			$payload .= $this->CI->load->view("template/footer", array(), TRUE);
			return $payload;
		}
		else {
			$this->CI->load->view("template/head", $this->template_data);
			$this->CI->load->view("template/header");
			$this->CI->load->view($view, $view_data);
			$this->CI->load->view("template/footer");
			return;
		}
	}
}
