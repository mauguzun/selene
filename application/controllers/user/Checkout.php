<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends User_Controller
{

	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		if(!$this->cart->contents())
		redirect(base_url().'read/empty_cart');

		$my_cart = [];

		$this->show_header([lang('checkout')]);
		$this->load->helper('directory');
		$total   = [
			'total' => $this->cart->total(),
			'total_shipping' => SHIPPING,
			'grand_total' => $this->cart->total() + SHIPPING,
		];



		foreach($this->cart->contents() as $value)
		{
			$show_me = directory_map( PRODUCTS_FOLDER.$value['id'], 1);
			$value['img'] = base_url().PRODUCTS_URL.$value['id'].'/'.$show_me[0];
			$my_cart[$value['id']] = $value;
			$my_cart[$value['id']]['title'] = $value['options']['title'];
		}


		$this->load->view('store/checkout',[
				'cart'=>$my_cart,
				'total'=>$total,
			]);
		$this->load->view('store/footer');
	}


}
