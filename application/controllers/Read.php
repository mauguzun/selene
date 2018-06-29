<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Read extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
	}
	public function index($slug = 'payed_done' )
	{
		$row = $this->Crud->get_row(['slug'=>$slug],'page');
		
		if($row){
			$this->show_header();
			$this->load->view('parts/page',['query'=>$row]);
			$this->load->view('store/footer');
		}
		else{
			
		}
	}


}
