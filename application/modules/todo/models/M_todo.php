<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_todo extends CI_Model {

	public function list()
	{
		$this->db->order_by('status', 'asc');
		$this->db->order_by('created_at', 'desc');

		return $this->db->get('d_todo');
	}

}

/* End of file M_todo.php */
/* Location: ./application/modules/todo/models/M_todo.php */ ?>