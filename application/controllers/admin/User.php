<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library("InputArray");
        $this->redirect = base_url().'admin/user';
        $this->table = 'users';

        $this->data['title'] = lang('create_new_categorys');
        $this->data['more'] = lang('create_new_categorys');


    }

    public function index()
    {
        $this->show_header();


        $this->load->view('/parts/table',[
                'headers'=>['id','id','first_name','last_name','email','phone','active','view','orders','disable'],
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

        if ($this->form_validation->run() === TRUE) {

            $this->Crud->add($_POST,$this->table);
            redirect($this->redirect);
        }

        $this->load->view('parts/form_extended',$this->data);
        $this->load->view('store/footer');


    }

    public function edit($id)
    {
		
		$this->_set_form_validation();
        if ($this->form_validation->run() === TRUE) {

            $this->Crud->update(['id'=>$id],$_POST,$this->table);
            redirect($this->redirect);
        }

        $this->show_header();
        $this->data['form_url'] = $this->redirect.'/edit/'.$id;

        $row = $this->Crud->get_row(['id'=>$id],$this->table);
        $this->_set_data($row);

        $this->load->view('parts/form_extended',$this->data);
        $this->load->view('store/footer');

    }
    
   
    
    public function trash($id){
		
		$row = $this->Crud->get_row(['id'=>$id],$this->table);
		$this->Crud->update(['id'=>$id],['active'=>!$row['active']],$this->table);
		redirect($this->redirect);
	}

    public function ajax()
    {


        $query = $this->Crud->get_all($this->table,NULL,'id','asc');
        $data['data'] = [];

        foreach ($query as $table_row) {
            $row = [];

            array_push(
                $row,

                (int)$table_row['id'],
                (string)$table_row['id'],
                $table_row['first_name'],
                $table_row['last_name'],
                $table_row['email'],
                $table_row['phone'],
                $table_row['active'],
                $this->load->view("buttons/magnify",['url'=>base_url().'admin/userview/'.$table_row['id']],true),
                $this->load->view("buttons/magnify",['url'=>base_url().'admin/userhistory/'.$table_row['id']],true),
                $this->load->view("buttons/history",['url'=>$this->redirect.'/trash/'.$table_row['id']],true)


            );
            array_push($data['data'],$row);
        }


        echo json_encode($data);
    }
    
   
}
