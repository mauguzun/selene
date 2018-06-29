<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library("InputArray");
		$this->redirect = base_url().'admin/order';
		$this->table = 'orders';

		$this->data['title'] = lang('orders');
		$this->data['more'] = lang('orders');


	}

	public function index()
	{
		$this->show_header();




		$this->load->view('/parts/table',[
				'headers'=>['id','id','date','user','email','payed','total','pdf'],
				'url' => $this->redirect.'/ajax',
			]);
			
		

		$this->load->view('store/footer');

	}

	public function add()
	{
		$this->show_header();
		$this->_set_form_validation();
		$this->_set_data();


		$this->data['form_url'] = $this->redirect.'/add';

		if($this->form_validation->run() === TRUE){

			$this->Crud->add($_POST,$this->table);
			redirect($this->redirect);
		}
		else
		{
			$this->data['message'] = (validation_errors() ? validation_errors() :
				($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
		}

		$this->load->view('parts/form_extended',$this->data);
		$this->load->view('store/footer');


	}



	public function trash($id)
	{
		$this->Crud->delete(['id'=>$id],$this->table);
		redirect($this->redirect);
	}

	public function ajax()
	{


		$query = $this->Crud->get_joins(
			$this->table,
			[
				'users'=>"$this->table.user_id = users.id",

			],
			"$this->table.*,users.*,$this->table.id as oid",
			['orders.id'=>'desc'],"oid"

		);
		$data['data'] = [];

		foreach($query as $table_row){
			$row = [];
			
			
			array_push(
				$row,

			(int)$table_row['oid'],
			anchor( base_url().'admin/orderview/'.$table_row['oid'],$table_row['oid'],['targe'=>"_blank"]),
		
			date(  "Y/m/d H:i:s",(int)$table_row['oid'] ),
			anchor( base_url().'admin/userview/'.$table_row['id'],$table_row['first_name'].' '.$table_row['last_name'],['targe'=>"_blank"]),
		
			$table_row['email'],
			$table_row['payed'],
			$table_row['total'] / 100,

			$this->load->view("buttons/print",['url'=>base_url().'admin/pdf/'.$table_row['oid']],true)


			);
			array_push($data['data'],$row);
		}


		echo json_encode($data);
	}

	private function _set_form_validation()
	{

		$this->form_validation->set_rules('title',lang('title'), 'trim|required');
		$this->form_validation->set_rules('slug',lang('slug'), 'trim|required');
		$this->form_validation->set_rules('text',lang('text'), 'trim|required');

	}
	private function _set_data($row = null )
	{

		foreach(['title','slug'] as $value){
			$def = isset($row[$value])? $row[$value] : $this->form_validation->set_value($value);
			$this->data['controls'][$value] =
			form_input($this->inputarray->getArray(
					$value, 'search',lang($value), $def,TRUE
				));
		}

		foreach(['text'] as $value){
			$def = isset($row[$value])? $row[$value] : $this->form_validation->set_value($value);
			$this->data['controls'][$value] =
			form_textarea($this->inputarray->getArray(
					$value, 'search',lang($value), $def,TRUE
				));
		}
	}
}
