<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends Admin_Controller
{
	protected $data = [];
	public function __construct()
	{
		parent::__construct();
		$this->load->library("InputArray");
		$this->table = 'products';
		$this->redirect = base_url().'admin/product/';
	}

	public function index()
	{
		$this->show_header();



		$this->load->view('/parts/table',
			[
				'headers'=>['id','title','category','price','edit','delete'],
				'url' => $this->redirect.'/ajax',
			]);
		
		
		
		
		$this->load->view('store/footer');


	}

	public function add()
	{

		$this->show_header();

		$row = isset($_POST)?$_POST:null;
		$this->_set_data($row);
		$this->_set_form_validation();
		$this->data['form_url'] = $this->redirect.'add';


		if($this->form_validation->run() === TRUE){
			unset($_POST['file']);
			$this->Crud->add($_POST,$this->table);
			redirect ($this->redirect);
		}
		else
		{
			$this->data['message'] = (validation_errors() ? validation_errors() :
				($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
		}
		
		
		$this->load->view('parts/form_extended',$this->data);
		$this->load->view('store/footer');
	}

	public function upload($folder)
	{

		$path = PRODUCTS_FOLDER.$folder;
		if(!file_exists($path)){
			mkdir($path, 0777, true);
		}

		$config['encrypt_name'] = TRUE;
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'jpg|gif|png';

		$config['max_size'] = 5000;
		$config['max_width'] = 570;
		$config['max_height'] = 660;

		$this->load->library('upload', $config);
		if( ! $this->upload->do_upload('file'))
		{

			echo json_encode(['error'=> lang('file')."   ".lang("error").'<br>'.$this->upload->display_errors()]);
		}
		else
		{
			$data = $this->upload->data();
			$data['result'] = img_div(base_url().'/'.$path.'/'.$data['file_name']);

			echo  json_encode (['upload_data'=> $data]);
		}
	}
	public function trash($id)
	{

		$this->Crud->delete(['id'=>$id],$this->table);

		$this->load->helper("file"); // load the helper
		delete_files(PRODUCTS_FOLDER.$id, true); // delete all files / folders

		redirect($this->redirect);
	}

	//  ajax delete
	public function delete()
	{
		if($_GET['url']){
			$img = str_replace(base_url(),"",$_GET['url']);
			if(  unlink("./".$img)){
				$ext = pathinfo($img);
				$this->Crud->delete(['user_id'=>$this->_user_id,'file'=>$ext['basename']],$this->_table);
				echo json_encode(['done'=> 'ok']);
				return;
			}
		}
		echo json_encode(['error'=> 'error_on_action']);
	}
	// show all data
	public function ajax()
	{


		$query = $this->Crud->get_joins($this->table,
			['category'=>"$this->table.category_id = category.id" ],
			"$this->table.* ,category.category as category");
		$data['data'] = [];

		foreach($query as $table_row){
			$row = [];

			array_push(
				$row,

				(int)$table_row['id'],
				$table_row['title'],
				$table_row['category'],
				$table_row['price'],
				$this->load->view("buttons/edit",['url'=>$this->redirect.'/edit/'.$table_row['id']],true),
				$this->load->view("buttons/trash",['url'=>$this->redirect.'/trash/'.$table_row['id']],true)


			);
			array_push($data['data'],$row);
		}


		echo json_encode($data);
	}

	public function edit($id)
	{
		$row = $this->Crud->get_row(['id'=>$id],$this->table);
		$this->show_header();

		$this->_set_data($row);
		$this->_set_form_validation();
		$this->data['form_url'] = $this->redirect.'edit/'.$id;


		if($this->form_validation->run() === TRUE){
			unset($_POST['file']);
			$this->Crud->update(['id'=>$id],$_POST,$this->table);
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

	private function _set_form_validation()
	{

		$this->form_validation->set_rules('title', lang('title'), 'trim|required|max_length[255]');
		$this->form_validation->set_rules('price', lang('price'), 'trim|required|numeric');
		$this->form_validation->set_rules('text', lang('text'), 'trim|required|max_length[13000]');
		$this->form_validation->set_rules('desc', lang('desc'), 'trim|required|max_length[3000]');
		$this->form_validation->set_rules('category_id', lang('category_id'), 'trim|required|numeric');

	}

	private function _set_data($row = null )
	{
		$this->data['title'] = lang('create_new_product');
		$this->data['more'] = lang('create_user_heading');


		$folder = isset($row['id'])? $row['id'] : time();

		$this->data['controls']['id'] = form_input($this->inputarray->getArray(
				'id',  'hidden',null, $folder,TRUE
			));

		$categories     = $this->Crud->get_all('category');
		$all_categories = [];
		
		foreach($categories as $value){
			$all_categories[$value['id']]= $value['category'];
		}
		
		$def = isset($row['category_id'])? $row['category_id'] : 0;
		$this->data['controls']['category_id'] =
		form_dropdown('category_id', $all_categories,$def,[
				'class'=>'selectpicker', 'data-live-search'=>true
			]);


		foreach(['title'] as $value)
		$this->data['controls'][$value] =
		form_input($this->inputarray->getArray(
				$value,  'text',lang($value),  isset($row[$value])? $row[$value] : $this->form_validation->set_value($value),TRUE
			));

		foreach(['price'] as $value)
		$this->data['controls'][$value] =
		form_input($this->inputarray->getArray(
				$value,  'numeric',lang($value),  isset($row[$value])? $row[$value] : $this->form_validation->set_value($value),TRUE
			));

		foreach(['video'] as $value)
		$this->data['controls'][$value] =
		form_input($this->inputarray->getArray(
				$value,  'text',lang($value),  isset($row[$value])? $row[$value] : $this->form_validation->set_value($value),TRUE
			));

		//
		foreach(['desc','text'] as $value)
		$this->data['controls'][$value] =
		form_textarea($this->inputarray->getArray(
				$value,  'text',lang($value), isset($row[$value])? $row[$value] : $this->form_validation->set_value($value),TRUE
			));

		$this->load->helper('directory');
		$show_me = directory_map( PRODUCTS_FOLDER.$folder, 1);
		if($show_me)
		{
			foreach($show_me as & $value){
				$value = base_url().PRODUCTS_FOLDER.$folder.'/'.$value;
			}
		}


		$this->data['controls']['uploader'] = $this->load->view('parts/uploader',[
				'upload_id'=>'file',
				'upload_url'=>$this->redirect.'upload/'.$folder,
				'show_me'=>$show_me
			],TRUE);

	}
}
