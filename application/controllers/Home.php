<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{   
		$this->load->view('home');
	}

	function test()
	{
		$sleep_quality = 1;
		$accedmic = 2;
		$study = 1;
		$hedaches = 1;
		$extractivities = 1;

		$input_data = array('input_data'=>[1,27,6.5,6,0,4200,1]);
		$input_data = json_encode($input_data);
		$prdeiction = predict_employee_stress_level($input_data);
		$data = json_decode($prdeiction, true);
		print($data['predicted_stress_level']);
	}
	
}
