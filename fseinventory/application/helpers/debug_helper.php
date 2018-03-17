<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('debug')) {
	
	function debug($value) {

		echo '<div class="debugger">';
		echo '<pre>';
		echo(print_r($value,true));
		echo '</pre>';
		echo '</div>';

		return;
	}
}