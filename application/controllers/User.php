<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
        $this->load->model('User_model');
    }

	public function index()
	{   
		$this->load->view('home');
	}

	function create_user()
	{
        $data['stress_level'] = $this->input->post('level_num');
        $data['user_type'] = $this->input->post('user_type');
        $this->load->view('users/register_user', $data);
	}

    function check_existing_account()
    {
        $email = $this->input->post('email');
        $result = $this->User_model->check_existing_account($email);
        if($result)
            echo 1;
        else
            echo 0;
    }

    function save_user_records()
    {   
        $email = $this->input->post('email');
        $level = $this->input->post('level');
        $user_type = $this->input->post('user_type');
        $result = $this->User_model->check_existing_account($email);
        $user_id = 0;
        if(!$result)
        {
            $name = $this->input->post('name');
            $mobile = $this->input->post('mobile');
            $password = $this->input->post('password');

            $user_data = array(
                'name' => $name,
                'email' => $email,
                'mobile' => $mobile,
                'password' => $this->encryption->encrypt($password),
                'user_type' => $user_type,
                'registered_at' => date("Y-m-d H:i:s"),
            );

            $user_id = $this->User_model->create_user($user_data);
        
        }
        else
            $user_id = $result->id;

        $result = false;
        if($user_id != 0)
        {
            $stress_data = array(
                'user_id' => $user_id,
                'stress_level' => $level,
                'saved_at' => date("Y-m-d H:i:s"),
            );

            $result = $this->User_model->add_stress_record($stress_data);
        }

        redirect("Login/user");

    }

    public function loginCheck()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $result = $this->User_model->checkLogin($email, $password);
        if($result)
		{	
			$this->session->set_userdata(array(
				'nameofuser'=>$result->name,
				'usertype'=>$result->user_type,
				'userid'=>$result->id,
			));

            $stress_data = null;
            $today = date("Y-m-d");
            $stdate = date('Y-m-d', strtotime('-7 days', strtotime($today)));
            while($stdate <= $today)
            {   
                $stress_data[$stdate] = $this->User_model->get_stress_level_data_by_date($result->id, $stdate);
                $stdate = date('Y-m-d', strtotime('+1 days', strtotime($stdate)));
            }

            // print_r($stress_data);
            // exit;
            $data['stress_data'] = $stress_data;
			$this->load->view('users/dashboard', $data);
		}
        else
        {
			$this->session->set_flashdata('error', 'Email or Password Incorrect. Please Try Again!');
			redirect("login/user");
        }
    }

    function logOut()
    {   
        $this->session->unset_userdata('nameofuser');
		$this->session->unset_userdata('usertype');
		$this->session->unset_userdata('userid');
        redirect("login/user");
    }

    function load_dasboard()
    {
        $stress_data = null;
        $today = date("Y-m-d");
        $stdate = date('Y-m-d', strtotime('-7 days', strtotime($today)));
        while($stdate <= $today)
        {   
            $stress_data[$stdate] = $this->User_model->get_stress_level_data_by_date($this->session->userdata('userid'), $stdate);
            $stdate = date('Y-m-d', strtotime('+1 days', strtotime($stdate)));
        }

        // print_r($stress_data);
        // exit;
        $data['stress_data'] = $stress_data;
        $this->load->view('users/dashboard', $data);
    }

    function users_stress_records()
    {
        $data['stress_data'] = $this->User_model->get_all_stress_records_by_userid($this->session->userdata('userid'));
        $this->load->view('users/stress_history', $data);
    }

    function delete_stress_record()
    {
        $id = $this->input->post('delete_id');

		$result = $this->User_model->delete_stress_record($id);
		if($result)
			$this->session->set_flashdata('msg', 'Record deleted sucsessfully!');
		else
			$this->session->set_flashdata('error', 'Something. Went Wrong Please Try Again!');

		redirect("User/users_stress_records");
    }
	
}
