<?php


class MyModel extends CI_Model
{
	public function addUser($data)
	{
		return $this->db->insert('students',$data);
	}

	public function getAllStudents()
	{
		return $this->db->select('*')
			->from('students')
			->order_by('s_id','desc')
			->get();
		//return $this->db->get('students')->order_by('s_id','desc');
	}

	public function checkStudent($id)
	{
		return $this->db->get_where('students',array('s_id'=>$id))->result_array();
	}

	public function updateStudent($data,$id)
	{
		$this->db->where('s_id',$id);
		return $this->db->update('students',$data);
	}

	public function deleteStudent($id)
	{
		return $this->db->delete('students',array('s_id'=>$id));
	}
}
