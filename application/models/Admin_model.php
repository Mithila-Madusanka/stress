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
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{	
			$data =  $query->row();

			if($this->encryption->decrypt($data->password) == $password)
				return $data;
			else
				return false;
		}
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

	function add_stress_level_quote($data)
	{
		$this->db->trans_start();
		$this->db->insert('best_practise', $data);
		$this->db->trans_complete();

		if($this->db->trans_status() === "FALSE")
			return false;
		else
			return true;
	}

	function get_quota_by_level($level)
	{
		$this->db->select('best_practise.*, admin.first_name, admin.last_name');
		$this->db->join('admin', 'admin.id = best_practise.add_by');
		$this->db->where('best_practise.level', $level);
		$query = $this->db->get('best_practise');
		if($query->num_rows() > 0)
			return $query->result();
		else
			return false;
	}

	function delete_stress_level_quote($id)
	{
		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->delete('best_practise');
		$this->db->trans_complete();

		if($this->db->trans_status() === "FALSE")
			return false;
		else
			return true;
	}

	function get_quote_data_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('best_practise');
        $this->db->where('id', $id);
		$query = $this->db->get();
		if($query->num_rows() > 0)
			return $query->row();
		else
			return false;
	}

	function update_quote($data, $id)
	{
		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->update('best_practise', $data);
		$this->db->trans_complete();

		if($this->db->trans_status() === "FALSE")
			return false;
		else
			return true;
	}

	function get_quote_by_level($level)
	{
		$this->db->select('*');
		$this->db->from('best_practise');
        $this->db->where('level', $level);
		$query = $this->db->get();
		if($query->num_rows() > 0)
			return $query->result();
		else
			return false;
	}

}
