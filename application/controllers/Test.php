<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct() {
        parent::__construct();
		$this->load->model("User_model",'',TRUE);
		$this->load->model("Admin_model",'',TRUE);
		$this->load->library('unit_test');
    }

	//Testing Add User
	function add_user()
	{	
		$data = array(
			"name"=>"ABC",
			"email"=>"abc@gmail.com",
			"user_type"=>"STUDENT",
			"mobile"=>"123456789",
			"password"=>$this->encryption->encrypt("1234"),
			"registered_at"=>"2023-04-28 12:31:00",
		);
		$result = $this->User_model->create_user($data);
	
		$expected_result = true;
		$test_name = "Add User";
	
		echo $this->unit->run($result, $expected_result, $test_name);
	}	

	//Testing user records delete
	function user_records_delete()
	{
		$result = $this->User_model->delete_stress_record(7);

		$expected_result = true;
		$test_name = "Delete User Records";

		echo $this->unit->run($result, $expected_result, $test_name);
	}

	//Testing user login
	function login_user()
	{
		$result = $this->User_model->checkLogin('madushan@gmail.com','1234');
	
		$expected_result = true;
		$test_name = "User Login into System";
	
		echo $this->unit->run($result, $expected_result, $test_name);
	}

	//Testing Add Admin
	function add_admin()
	{	
		$data = array(
			"first_name"=>"ABC",
			"last_name"=>"DEF",
			"dob"=>"DEF",
			"nic"=>"DEF",
			"email"=>"test@abc.com",
			"password"=>$this->encryption->encrypt("1234"),
			"status"=>"CONFIRMED",
			"type"=>"NORMAL",
			"added_at"=>"2023-04-28 12:31:00",
			"added_by"=>"1",
		);
		$result = $this->Admin_model->add_admin($data);
	
		$expected_result = true;
		$test_name = "Add Admin";
	
		echo $this->unit->run($result, $expected_result, $test_name);
	}

		
		//Testing Update Admin
		function update_admin()
		{	
			$data = array(
				"first_name"=>"ABC",
				"last_name"=>"DEF",
				"dob"=>"1998-08-01",
				"nic"=>"123456789",
				"email"=>"test@abc.com",
				"password"=>$this->encryption->encrypt("1234"),
				"status"=>"CONFIRMED",
				"type"=>"NORMAL",
				"updated_at"=>"2024-04-23 12:31:00",
				"updated_by"=>"1",
			);
			$result = $this->Admin_model->update_admin($data, 12);
	
			$expected_result = true;
			$test_name = "Update Admin";
	
			echo $this->unit->run($result, $expected_result, $test_name);
		
		}
			
		//Testing Delete Admin
		function delete_admin()
		{	

			$result = $this->Admin_model->delete_admin(12);
	
			$expected_result = true;
			$test_name = "Delete Admin";
	
			echo $this->unit->run($result, $expected_result, $test_name);
		}

		//Testing admin login
		function login_admin()
		{
			$result = $this->User_model->checkLogin('mithila@gmail.com','1234');
		
			$expected_result = true;
			$test_name = "Admin Login into System";
		
			echo $this->unit->run($result, $expected_result, $test_name);
		}

		//Testing Add Quota
		function add_quota()
		{	
			$data = array(
				"title"=>"ABC",
				"description"=>"TEST QUOTA",
				"level"=>"LOW",
				"add_by"=>"10",
				"add_at"=>"2024-04-23 12:31:00",
			);
			$result = $this->Admin_model->add_stress_level_quote($data);
	
			$expected_result = true;
			$test_name = "Add Quota";
	
			echo $this->unit->run($result, $expected_result, $test_name);
		
		}

		//Testing Update Quota
		function update_quota()
		{	

			$data = array(
				"title"=>"TEST QUOTA",
				"description"=>"TEST QUOTA",
			);
			$result = $this->Admin_model->update_quote($data, 7);
	
			$expected_result = true;
			$test_name = "Update Quota";
	
			echo $this->unit->run($result, $expected_result, $test_name);
		}

		//Testing Delete Quota
		function delete_quota()
		{	

			$result = $this->Admin_model->delete_stress_level_quote(7);
	
			$expected_result = true;
			$test_name = "Delete Quota";
	
			echo $this->unit->run($result, $expected_result, $test_name);
		}
}
