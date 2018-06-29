<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->redirect = base_url().'admin/payments';
		$this->table = 'orders';

		$this->data['title'] = lang('payemnt');
		$this->data['more'] = lang('payment');


	}

	public function index()
	{
		$this->show_header();




		$this->load->view('/parts/table',[
				'headers'=>['id','payment_id','order_id','total','date','paid','refunded'],
				'url' => $this->redirect.'/ajax',
			]);

		$this->load->view('store/footer');

	}





	public function ajax()
	{


		$this->load->library("Stripeconfig");
		$this->load->library('Stripe',$this->stripeconfig->getconfig());

		$payment = json_decode($this->stripe->charge_list(),TRUE);
		$data['data'] = [];
		
		foreach($payment["data"] as $table_row){
			$row = [];
			array_push(
				$row,
				(int)$table_row['created'],
				$table_row['id'],
				anchor( base_url().'admin/orderview/'.$table_row['description'],$table_row['description'],['targe'=>"_blank"]),
				$table_row['amount'] / 100 . $table_row['currency'],
				date("Y/m/d H:i:s",(int)$table_row['created'] ),
				$table_row['paid'],
				$table_row['refunded']  );

			array_push($data['data'],$row);
		}


		echo json_encode($data);
	}


}
