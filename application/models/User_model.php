<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

	function check_existing_account($email)
	{
		$this->db->select('*');
		$this->db->from('user');
        $this->db->where('email', $email);
		$query = $this->db->get();
		if($query->num_rows() > 0)
			return $query->row();
		else
			return 0;
	}

	function create_user($data)
	{
		$this->db->trans_start();
		$this->db->insert('user', $data);
        $id = $this->db->insert_id();
		$this->db->trans_complete();

		if($this->db->trans_status() === "FALSE")
			return false;
		else
			return $id;

	}

	function add_stress_record($data)
	{
		$this->db->trans_start();
		$this->db->insert('user_records', $data);
		$this->db->trans_complete();

		if($this->db->trans_status() === "FALSE")
			return false;
		else
			return true;
	}

	function checkLogin($email, $password)
	{
		$this->db->select('*');
		$this->db->from('user');
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

	function get_stress_level_data_by_date($user_id, $date)
	{
        $this->db->select('stress_level');
        $this->db->from('user_records');
        $this->db->where('user_id', $user_id);
        $this->db->where('DATE(saved_at)', $date);
        $this->db->limit(1);
        $query = $this->db->get();
		if($query->num_rows() > 0)
			return $query->row()->stress_level;
		else
			return false;
	}

	function get_all_stress_records_by_userid($user_id)
	{
        $this->db->select('*');
        $this->db->from('user_records');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
		if($query->num_rows() > 0)
			return $query->result();
		else
			return false;
	}

	function delete_stress_record($id)
	{
		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->delete('user_records');
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
