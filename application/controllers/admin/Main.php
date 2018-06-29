<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends Admin_Controller
{

    public function index()
    {
        $this->load->view('store/header');
       
        
        $this->load->view('store/footer');
    }

   
}
