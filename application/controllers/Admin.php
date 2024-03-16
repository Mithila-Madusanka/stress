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
		$type = $this->input->post('type');

		$data = array(
			'first_name'=>$first_name,
			'last_name'=>$last_name,
			'dob'=>date("Y-m-d", strtotime($dob)),
			'nic'=>$nic,
			'email'=>$email,
			'password'=>$nic,
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
			'password'=>$nic,
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
    
	
}
