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
			return $query->row();
		else
			return false;
	}

	function get_all_admins()
	{
		$this->db->select('*');
		$query = $this->db->get('admin');
		if($query->num_rows() > 0)
			return $query->result();
		else
			return false;

	}

	function add_admin($data)
	{
		$this->db->trans_start();
		$this->db->insert('admin', $data);
		$this->db->trans_complete();

		if($this->db->trans_status() === "FALSE")
			return false;
		else
			return true;
	}

	function get_admin_data_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('admin');
        $this->db->where('id', $id);
		$query = $this->db->get();
		if($query->num_rows() > 0)
			return $query->row();
		else
			return false;
	}

	function update_admin($data, $id)
	{
		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->update('admin', $data);
		$this->db->trans_complete();

		if($this->db->trans_status() === "FALSE")
			return false;
		else
			return true;
	}

	function delete_admin($id)
	{
		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->delete('admin');
		$this->db->trans_complete();

		if($this->db->trans_status() === "FALSE")
			return false;
		else
			return true;
	}

}
