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

	public function student_stress_level()
	{
		$sleep_quality = intval($this->input->post('sleep_quality'));
		$accedmic = intval($this->input->post('accedmic'));
		$study = intval($this->input->post('study'));
		$hedaches = intval($this->input->post('hedaches'));
		$extractivities = intval($this->input->post('extractivities'));

		$input_data = array('input_data'=>[$sleep_quality,$hedaches,$accedmic,$study,$extractivities]);
		$input_data = json_encode($input_data);
		$prdeiction = predict_student_stress_level($input_data);
		$data = json_decode($prdeiction, true);
		echo $data['predicted_stress_level'];
	}

	public function employee_stress_level()
	{
		$gender = $this->input->post('gender');
		$dob = $this->input->post('dob');
		$sleep_duration = intval($this->input->post('sleep_duration'));
		$quality_sleep = intval($this->input->post('quality_sleep'));
		$height = $this->input->post('height');
		$weight = $this->input->post('weight');
		$daily_steps = intval($this->input->post('daily_steps'));
		$sleep_disorder = $this->input->post('sleep_disorder');

		//Caclulate BMI
		$height_meters = $height*0.30480;
		$bmi = $weight/$height_meters*$height_meters;
		
		$bmi_category = 0; //Deafult Value
		if($bmi >= 30)
			$bmi_category = 2; //Obese
		elseif($bmi >= 25) 
			$bmi_category = 3; //Over Weight
		elseif($bmi >= 18.5)
			$bmi_category = 1; //Normal Weight
		else
			$bmi_category = 0; //Normal

		//Calculate Age
		$diff = date_diff(date_create($dob), date_create(date("d/m/Y")));
		$age = $diff->format('%y');
		$age = intval($age);

		if($gender == "Male")
			$gender = 1;
		elseif($gender == "Female")
			$gender = 0;

		if($sleep_disorder == "Insomnia")
			$sleep_disorder = 0;
		elseif($sleep_disorder == "None")
			$sleep_disorder = 1;
		elseif($sleep_disorder == "Sleep Apnea")
			$sleep_disorder = 2;

		$input_data = array('input_data'=>[$gender,$age,$sleep_duration,$quality_sleep,$bmi_category,$daily_steps,$sleep_disorder]);
		$input_data = json_encode($input_data);
		$prdeiction = predict_employee_stress_level($input_data);
		$data = json_decode($prdeiction, true);
		echo $data['predicted_stress_level'];
	}

	function get_stress_reduce_music()
	{	

		$query = "Stree Relief Music";
		$this->load->library('youtube');
		$data['response'] = $this->youtube->search($query,20,'');
		$this->load->view('music/musiclist', $data);

	}

	function get_next_music_list($token)
	{	
		$query = "Stree Relief Music";
		$this->load->library('youtube');
		$data['response'] = $this->youtube->search($query,20,$token);
		$this->load->view('music/musiclist',$data);
	}

    
	
}
