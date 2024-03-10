<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller {

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

    public function userForm()
	{   
        $type = $this->input->post('userType');
        $username = $this->input->post('username');
        $this->load->library('session');
        $this->session->set_userdata(array('username'=>$username));
        if($type == 'student')
		    $this->load->view('student/questionform');
        elseif($type == 'employee')
            $this->load->view('employee/questionform');
	}

    public function about()
	{   
        $this->load->view('about');
	}

    
	
}
