<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('directory');
	}
	public function index($category = 1 )
	{
		$this->show_header();
		
		
		$cat = $this->Crud->get_all('category',null,'id','asc');
		$products = $this->Crud->get_all('products',['category_id'=>$category],'price','desc');
		foreach($cat as $value){
			if($value['id'] == $category){
				$title = $value['category'];
			}
		}
		

		foreach($products as & $value)
		{
			$show_me = directory_map( PRODUCTS_FOLDER.$value['id'], 1);
			$value['img'] = base_url().PRODUCTS_URL.$value['id'].'/'.$show_me[0];
		}


		$this->load->view('store/list',
			[
				'title'=>$title,
				'cat'=>$cat,
				'products'=>$products,
				'show'=>$this->user_id
			]

		);
		$this->load->view('store/footer');
	}


}
