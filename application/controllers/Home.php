<?php
class Home extends CI_Controller
{
	public function index()
	{
		
		$data['students'] = $this->myModel->getAllStudents();
		//var_dump($data['studetns']->num_rows());
		$this->load->view('header');
		$this->load->view('home',$data);
		$this->load->view('footer');
	}

	public function newStudent()
	{
		$this->load->view('header');
		$this->load->view('newStudent');
		$this->load->view('footer');
	}

	public function addUser()
	{
		$data['s_name'] = $this->input->post('name',true);
		$data['s_subject'] = $this->input->post('subject',true);
		$data['s_age'] = $this->input->post('age',true);
		$data['s_date'] = date('Y-m-d h:i:sa');
		if (
			empty($data['s_name']) || empty($data['s_subject']) ||
			empty($data['s_age'])
		) {
			$this->session->set_flashdata('error','Please check your fields.');
			redirect('home/newStudent');
		}
		else{
			$result = $this->myModel->addUser($data);
			if ($result) {
				$this->session->set_flashdata('error','Your have successfully inserted the student.');
				redirect('home');
			}
			else{
				$this->session->set_flashdata('error','Your can\'t insert the student right now.');
				redirect('home/newStudent');
			}
		}

	}

	public function editStudent($id = null)
	{
		if (!empty($id) && isset($id)) {
			$data['student']  = $this->myModel->checkStudent($id);
			if (count($data['student']) > 0) {
				$this->load->view('header');
				$this->load->view('editStudent',$data);
				$this->load->view('footer');
			}
			else{
				$this->session->set_flashdata('error','Student not available');
				redirect('home');
			}
		}
		else{
			$this->session->set_flashdata('error','Something went wrong.');
			redirect('home');
		}
	}

	public function updateUser()
	{
		$data['s_name'] = $this->input->post('name',true);
		$data['s_subject'] = $this->input->post('subject',true);
		$data['s_age'] = $this->input->post('age',true);
		$studentId = $this->input->post('oldId',true);//student Id
		if (
			empty($data['s_name']) || empty($data['s_subject']) ||
			empty($data['s_age']) || empty($studentId)
		) {
			$this->session->set_flashdata('error','Please check your required fields.');
			redirect('home/editStudent/'.$studentId);
		}
		else{
			$result = $this->myModel->updateStudent($data,$studentId);
			if ($result) {
				$this->session->set_flashdata('error','Your have successfully updated the student.');
				redirect('home');
			}
			else{
				$this->session->set_flashdata('error','Your can\'t updated the student right now.');
				redirect('home/editStudent/'.$studentId);
			}
		}
	}

	public function delete($id)
	{
		if (!empty($id) && isset($id)) {
			$data['student']  = $this->myModel->checkStudent($id);
			if (count($data['student']) > 0) {
				$result = $this->myModel->deleteStudent($id);
				if ($result) {
					$this->session->set_flashdata('error','You have successfully deleted');
					redirect('home');
				}
				else{
					$this->session->set_flashdata('error','You can\'t delete your student right now.');
					redirect('home');
				}
			}
			else{
				$this->session->set_flashdata('error','Student not available');
				redirect('home');
			}
		}
		else{
			$this->session->set_flashdata('error','Something went wrong.');
			redirect('home');
		}
	}
}//class here
