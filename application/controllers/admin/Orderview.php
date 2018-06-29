<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orderview extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library("InputArray");

		$this->table = 'order_row';



	}

	public function index($order_id)
	{
		$this->redirect = base_url().'admin/orderview/'.$order_id;
		$this->show_header();
		
		if(isset($_POST['payed'])){
			$this->Crud->update(['id'=>$order_id],['payed'=>$_POST['payed']],'orders');
		}


		$this->load->view('/parts/table',[
				'headers'=>['product_id','product_id','title','price','qty','total'],
				'url' =>  base_url().'admin/Orderview//ajax/'.$order_id,
			]);


		$data = [];
		$order= $this->Crud->get_row(['id'=>$order_id],'orders');
		
		// more table

		$data['comment'] = $order['comment'];
		$data['shiping_address'] = $order['shiping_address'];
		$data['total'] = ($order['total']) / 100 - SHIPPING;
		$data['shipping'] = SHIPPING;
		$data['status'] = lang($this->orderstatus->status($order['payed'])) ;
		$data['grand_total'] = ($order['total']) / 100 ;
		$data['date'] = date(  "Y/m/d H:i:s",(int)$order['id'] );




		$this->load->view('parts/simple_table',['data'=>$data,'title'=>lang('order_total')]);

		// change status
		$this->data['form_url'] = $this->redirect;
		$this->data['title'] = lang('change_status');
		
		$this->data['controls']['category_id'] =
		form_dropdown('payed', $this->orderstatus->statuses(),$order['payed'],[
				'class'=>'selectpicker', 'data-live-search'=>true
			]);

		$this->load->view('parts/form_extended',$this->data);
		
		$this->show_footer();

	}



	public function ajax($order_id)
	{


		$query = $this->Crud->get_joins(
			$this->table,
			['products'=>"$this->table.product_id = products.id "],
			"$this->table.*,products.title as title ,products.price as price,$this->table.product_id as pid",
			["$this->table.product_id"=>"asc"],["pid","$this->table.order_id"],
			["$this->table.order_id"=>$order_id]
			
		);
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

				(int)$table_row['product_id'],
				anchor( base_url().'admin/product/edit/'.$table_row['product_id'],$table_row['product_id'],[
						'target'=>'_blank','title'=>lang('view_product')] ),
				$table_row['title'],
				$table_row['price'],
				$table_row['qty'],
				$table_row['total']


			);
			array_push($data['data'],$row);
		}
		echo json_encode($data);
	}


}
