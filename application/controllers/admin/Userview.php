<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userview extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library("InputArray");

		$this->table = 'users';



	}

	public function index($user_id)
	{

		$this->redirect = base_url().'admin/userview/'.$user_id;
		if(isset($_POST['comment'])){
			$this->Crud->update(['id'=>$user_id],['comment'=>$_POST['comment']],$this->table);
		}


		$this->show_header();
		
		$query = $this->Crud->get_row(['id'=>$user_id],$this->table);
		foreach(['username','first_name','last_name','phone','email','city','country','zip','address','company',
				'company_num','created_on','comment'] as $value){
					
			$data[$value] = $query[$value];
		}
		
		$data['created_on'] = date("d/m/Y H:i:s",(int)$data['created_on']);
		$this->load->view('parts/simple_table',['data'=>$data,'title'=>lang('user_data')]);


		$this->load->library("Inputarray");
		
		$this->data['title'] = lang('comment_for_current_user');
		$this->data['form_url'] = $this->redirect;
		foreach(['comment'] as $value)
		$this->data['controls'][$value] =
		form_textarea($this->inputarray->getArray(
				$value,  'text',lang($value), $query[$value],TRUE
			));

		$this->load->view('parts/form_extended',$this->data);

		$this->show_footer();
	}



}
