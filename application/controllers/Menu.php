<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

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

    function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
    }

	public function index()
	{   
		$this->load->view('admin/dashboard');
	}

    public function profiles()
    {
        $data['admins'] = $this->Admin_model->get_all_admins();
        $this->load->view('admin/profiles', $data);
    }

	function add_stress_level_low()
	{	
		$data['level'] = $level = 'LOW'; 
		$data['datalist'] = $this->Admin_model->get_quota_by_level($level);
		$this->load->view('admin/add_stress_level', $data);
	}

	function add_stress_level_mid()
	{	
		$data['level'] = $level = 'MID'; 
		$data['datalist'] = $this->Admin_model->get_quota_by_level($level);
		$this->load->view('admin/add_stress_level', $data);
	}

	function add_stress_level_high()
	{	
		$data['level'] = $level = 'HIGH'; 
		$data['datalist'] = $this->Admin_model->get_quota_by_level($level);
		$this->load->view('admin/add_stress_level', $data);
	}

	
}
