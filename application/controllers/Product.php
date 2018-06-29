<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}


	public function index($id = null)
	{



		$query = $this->Crud->get_row(['id'=>$id],'products');

		if(!$query)
		redirect (base_url());

		$this->show_header([$query['title'],$query['desc'],$query['title']]);
		$this->load->helper('directory');



		$this->load->view('store/product',
			[
				'category'=>$this->Crud->get_row(['id'=>$query['category_id']],'category'),
				'show'=>$this->user_id,
				'product'=>$query,
				'images'=>directory_map('./static/products/'.$query['id'])
			]
		);

		$this->load->view('store/footer');
	}


}
