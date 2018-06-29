<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userhistory extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library("InputArray");
		$this->table = 'orders';
	}

	public function index($user_id)
	{
		$this->redirect = base_url().'admin/userhistory/'.$user_id;
		$this->show_header();
		
	


		$this->load->view('/parts/table',[
				'headers'=>['id','id','date','payed','total'],
				'url' =>  base_url().'admin/userhistory/ajax/'.$user_id,
			]);


	
		$this->show_footer();

	}



	public function ajax($user_id)
	{


		$query = $this->Crud->get_all( $this->table,['user_id'=>$user_id]   );
		$data['data'] = [];
		/*
		echo "<pre>";
		var_dump($query);
		die();*/

		foreach($query as $table_row)
		{
			$row = [];

			array_push(
				$row,

				(int)$table_row['id'],
				anchor( base_url().'admin/orderview/'.$table_row['id'],$table_row['id'] ,
						['target'=>'_blank','title'=>lang('view_product')]  ),
				date('Y-m-d H:i:s',(int)$table_row['id']),
			    $this->orderstatus->status(	$table_row['payed']),
				$table_row['total']/100
			);
			array_push($data['data'],$row);
		}
		echo json_encode($data);
	}


}
