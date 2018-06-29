<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends User_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->show_header();
	}

	public function index()
	{
		$this->_set_validation();
		


		if($this->form_validation->run() === TRUE )
		{
			unset($_POST['submit']);
			$this->session->set_flashdata('message',lang('updated'));
			$this->Crud->update(['id'=>$this->user_id],$_POST,'users');
		}
		
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
		

		$this->load->library("InputArray");

		$this->data['title'] = lang('edit_user_heading');
		$this->data['more'] = lang('edit_user_heading');
		$this->data['form_url'] = base_url('user/settings');


		$user = $this->Crud->get_row(['id'=>$this->user_id],'users');
		

		foreach(['first_name','last_name','email','phone'] as $value)

		$this->data['controls'][$value] =
		form_input($this->inputarray->getArray(
				$value, $value == 'email'? 'email' : 'text',lang($value), $user[$value],TRUE
			));

		foreach(['company','company_num'] as $value)

		$this->data['controls'][$value] =

		form_input($this->inputarray->getArray(
				$value, $value == 'email'? 'email' : 'text',lang($value),$user[$value],FALSE
			));


		foreach([ 'country','city','zip','address'] as $value)

		$this->data['controls'][$value] =
		form_input($this->inputarray->getArray(
				$value, 'search',lang($value),$user[$value],NULL,TRUE
			));





		$this->data['controls']['submit'] =
		form_submit('submit', lang('edit_user_submit_btn'),['class'=>"btn btn-inverse"]);;


		
		$this->load->view('parts/form',$this->data);
		$this->load->view('store/footer');
	}

	private function _set_validation()
	{
		$this->form_validation->set_rules('first_name', lang('create_user_validation_fname_label'), 'trim|required');
		$this->form_validation->set_rules('last_name', lang('create_user_validation_lname_label'), 'trim|required');

		$this->form_validation->set_rules('phone', lang('create_user_validation_phone_label'), 'trim');

		$this->form_validation->set_rules('country', lang('country'), 'required|trim|min_length[5]');
		$this->form_validation->set_rules('city', lang('city'), 'required|trim|min_length[3]');
		$this->form_validation->set_rules('zip', lang('zip'), 'required|trim|min_length[4]');
		$this->form_validation->set_rules('address', lang('address'), 'required|trim|min_length[10]');

	}
}
