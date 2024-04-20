<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		$this->load->view('admin/login');
	}

    public function loginCheck()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $result = $this->Admin_model->checkLogin($email, $password);
        if($result)
		{	
			$this->session->set_userdata(array(
				'adminusername'=>$result->first_name." ".$result->last_name,
				'admintype'=>$result->type,
				'userid'=>$result->id,
			));
			$this->load->view('admin/dashboard');
		}
        else
        {
			$this->session->set_flashdata('error', 'Email or Password Incorrect. Please Try Again!');
			redirect("Admin");
        }
    }

	public function logOut()
	{	
		$this->session->unset_userdata('adminusername');
		$this->session->unset_userdata('admintype');
		$this->session->unset_userdata('userid');
        redirect('admin');
	}

	public function addAdmin()
	{
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$nic = $this->input->post('nic');
		$dob = $this->input->post('dob');
		$email = $this->input->post('email');
		$password = $this->encryption->encrypt($this->input->post('password'));
		$type = $this->input->post('type');

		$data = array(
			'first_name'=>$first_name,
			'last_name'=>$last_name,
			'dob'=>date("Y-m-d", strtotime($dob)),
			'nic'=>$nic,
			'email'=>$email,
			'password'=>$password,
			'status'=>'CONFIRMED',
			'type'=>$type,
			'added_by'=>$this->session->userdata('userid'),
			'added_at'=>date("Y-m-d H:i:s"),
		);

		$result = $this->Admin_model->add_admin($data);
		if($result)
			$this->session->set_flashdata('msg', 'Admin added sucsessfully!');
		else
			$this->session->set_flashdata('error', 'Something. Went Wrong Please Try Again!');

		redirect("Menu/profiles");
	}

	public function editAdmin($id)
	{	
		$data['admin'] = $this->Admin_model->get_admin_data_by_id($id);
		$this->load->view('admin/edit_admin', $data);
	}

	function updateAdmin()
	{	
		$id = $this->input->post('id');
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$nic = $this->input->post('nic');
		$dob = $this->input->post('dob');
		$email = $this->input->post('email');
		$type = $this->input->post('type');

		$data = array(
			'first_name'=>$first_name,
			'last_name'=>$last_name,
			'dob'=>date("Y-m-d", strtotime($dob)),
			'email'=>$email,
			'password'=>$this->encryption->encrypt($password),
			'type'=>$type,
			'updated_by'=>$this->session->userdata('userid'),
			'updated_at'=>date("Y-m-d H:i:s"),
		);

		$result = $this->Admin_model->update_admin($data, $id);
		if($result)
			$this->session->set_flashdata('msg', 'Admin data sucsessfully updated!');
		else
			$this->session->set_flashdata('error', 'Something. Went Wrong Please Try Again!');

		redirect("Menu/profiles");
	}

	function deleteAdmin()
	{	
		$id = $this->input->post('delete_id');

		$result = $this->Admin_model->delete_admin($id);
		if($result)
			$this->session->set_flashdata('msg', 'Admin deleted sucsessfully!');
		else
			$this->session->set_flashdata('error', 'Something. Went Wrong Please Try Again!');

		redirect("Menu/profiles");
	}

	function add_stress_level_quote()
	{
		$level = $this->input->post('level');
		$title = $this->input->post('title');
		$description = $this->input->post('description');

		$data = array(
			'title' => $title,
			'description' => $description,
			'level' => $level,
			'add_by' =>$this->session->userdata('userid'),
			'add_at' => date("Y-m-d H:i:s"),
		);

		$result = $this->Admin_model->add_stress_level_quote($data);
		if($result)
			$this->session->set_flashdata('msg', 'Quota Added sucsessfully!');
		else
			$this->session->set_flashdata('error', 'Something. Went Wrong Please Try Again!');
		if($level == "LOW")
			redirect("Menu/add_stress_level_low");
		elseif($level == "MID")
			redirect("Menu/add_stress_level_mid");
		elseif($level == "HIGH")
			redirect("Menu/add_stress_level_high");

	}

	function delete_stress_level_quote()
	{	

		$id = $this->input->post('delete_id');
		$level = $this->input->post('level_del');

		$result = $this->Admin_model->delete_stress_level_quote($id);
		if($result)
			$this->session->set_flashdata('msg', 'Quota Deleted sucsessfully!');
		else
			$this->session->set_flashdata('error', 'Something. Went Wrong Please Try Again!');
		if($level == "LOW")
			redirect("Menu/add_stress_level_low");
		elseif($level == "MID")
			redirect("Menu/add_stress_level_mid");
		elseif($level == "HIGH")
			redirect("Menu/add_stress_level_high");

	}

	function edit_quote($id)
	{	
		
		$data['quote'] = $this->Admin_model->get_quote_data_by_id($id);
		$this->load->view('admin/edit_quote', $data);

	}

	function updateQuote()
	{	
		$id = $this->input->post('id');
		$title = $this->input->post('title');
		$description = $this->input->post('description');
		$level = $this->input->post('level');

		$data = array(
			'title' => $title,
			'description' => $description,
			'level' => $level,
		);

		$result = $this->Admin_model->update_quote($data, $id);
		if($result)
			$this->session->set_flashdata('msg', 'Quote data sucsessfully updated!');
		else
			$this->session->set_flashdata('error', 'Something. Went Wrong Please Try Again!');

		if($level == "LOW")
			redirect("Menu/add_stress_level_low");
		elseif($level == "MID")
			redirect("Menu/add_stress_level_mid");
		elseif($level == "HIGH")
			redirect("Menu/add_stress_level_high");

	}
    
    
	
}
