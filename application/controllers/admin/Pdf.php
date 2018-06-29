<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();

	}

	public function index($order_id)
	{

		// 1 get User
		// 2 get order
		// 3 get order item
		// 4 get total and grand total
		require_once("application/libraries/dompdf/vendor/autoload.php");


		// instantiate and use the dompdf class


		$order = $this->Crud->get_row(['id'=>$order_id] , 'orders');

		$query = $this->Crud->get_joins(
			'order_row',
			['products'=>"order_row.product_id = products.id and order_row.order_id = $order_id"],
			"order_row.*,products.title as title ,products.price as price",
			["order_row.product_id"=>"asc"]
		);
		$user  = $this->Crud->get_row(['id'=>$order['user_id']] , 'users');

		;


		$dompdf= new  Dompdf\Dompdf();
		$dompdf->loadHtml( $this->load->view('admin/printer',[
					'query'=>$query,
					'user'=>$user,
					'order'=>$order
				],TRUE));


		  // (Optional) Setup the paper size and orientation
		$dompdf->setPaper('A4');

		// Render the HTML as PDF
		$dompdf->render();
		$dompdf->stream(url_title($order['id']), array("Attachment"=> false));

		exit(0);

	}



}
