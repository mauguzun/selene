<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library("InputArray");
        $this->redirect = base_url().'admin/page';
        $this->table = 'page';

        $this->data['title'] = lang('create_new_page');
        $this->data['more'] = lang('create_new_page');


    }

    public function index()
    {
        $this->show_header();


        $this->load->view('/parts/table',[
                'headers'=>['id','title','slug','edit','trash'],
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
        }else
		{
			$this->data['message'] = (validation_errors() ? validation_errors() :
				($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
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
		$this->Crud->delete(['id'=>$id],$this->table);
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
                $table_row['title'],
                $table_row['slug'],
 
                $this->load->view("buttons/edit",['url'=>$this->redirect.'/edit/'.$table_row['id']],true),
                $this->load->view("buttons/trash",['url'=>$this->redirect.'/trash/'.$table_row['id']],true)


            );
            array_push($data['data'],$row);
        }


        echo json_encode($data);
    }
    
    private function _set_form_validation(){
		
        $this->form_validation->set_rules('title',lang('title'), 'trim|required');
        $this->form_validation->set_rules('slug',lang('slug'), 'trim|required');
        $this->form_validation->set_rules('text',lang('text'), 'trim|required');

	}
    private function _set_data($row = null )
    {

        foreach (['title','slug'] as $value) {
            $def = isset($row[$value])? $row[$value] : $this->form_validation->set_value($value);
            $this->data['controls'][$value] =
            form_input($this->inputarray->getArray(
                    $value, 'search',lang($value), $def,TRUE
                ));
        }
        
        foreach (['text'] as $value) {
            $def = isset($row[$value])? $row[$value] : $this->form_validation->set_value($value);
            $this->data['controls'][$value] =
            form_textarea($this->inputarray->getArray(
                    $value, 'search',lang($value), $def,TRUE
                ));
        }
    }
}
