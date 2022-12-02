<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Todo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_todo', 'model');
	}

	public function index()
	{
		$data['title'] = "Todo List";

		$this->load->view('index', $data, FALSE);
	}

	public function list()
	{
		$list 			= $this->model->list()->result();
		$data['list'] 	= $list;

		$this->load->view('list', $data, FALSE);
	}

	public function save()
	{
		$todo = $this->input->post('todo');

		$data['name'] = $todo;

		$this->db->insert('d_todo', $data);
	}

	public function change_status()
	{
		$id = $this->input->post('id');
		$todo = $this->db->get_where('d_todo', ['id' => $id])->row();

		$status = 1;
		if($todo->status == 1) {
			$status = 0;
		}
		$data['status'] = $status;

		$this->db->update('d_todo', $data, ['id' => $id]);

		$output['status'] = $status;
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function delete()
	{
		$id = $this->input->post('id');

		$this->db->delete('d_todo', ['id' => $id]);
	}

}

/* End of file Todo.php */
/* Location: ./application/modules/todo/controllers/Todo.php */ ?>