<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

	function checkLogin($email, $password)
	{
		$this->db->select('*');
		$this->db->from('admin');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
		$query = $this->db->get();
		if($query->num_rows() > 0)
			return $query->result();
		else
			return false;
	}

}
