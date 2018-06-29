<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addtocart extends User_Controller
{


	public function index()
	{
		$already_exist = false;

		if(isset($_POST['id']) && isset($_POST['qty']) && $_POST['qty'] > 0 ){

			$row = $this->Crud->get_row(['id'=>$_POST['id']],'products');
			$data= array(
				'rowid'  => $_POST['id'],
				'id'     => $_POST['id'],
				'qty'    => $_POST['qty'],
				'price'  => $row['price'] ,
				'name'   => $row['id'],
				'options'=> ['title'=>$row['title']]
			);


			if($this->cart->contents()){
				foreach($this->cart->contents() as $value)
				{
					if($value['rowid'] == $data['rowid'])
					{
						$data['qty'] += $value['qty'];
						$data['price'] += $value['price'];
						$already_exist = TRUE;
					}
				}
			}

			if(!$this->cart->update($data))
			{
				$this->cart->insert($data);
			}

			echo json_encode(['done'=>$this->cart->total_items()]);
			return;
		}
		echo json_encode(['error'=>lang('some_error')]);
	}

	public function set($row_id,$value = 0 )
	{
		$row = $this->Crud->get_row(['id'=>$_POST['id']],'products');
		$data= array(
			'rowid'  => $_POST['id'],
			'id'     => $_POST['id'],
			'qty'    => $_POST['qty'],
			'price'  => $row['price'] ,
			'name'   => $row['id'],
			'options'=> ['title'=>$row['title']]
		);
		if ($this->cart->update($data)){
			echo json_encode(['done'=>$this->cart->total_items()]);
			return;
		}
		echo json_encode(['error'=>lang('some_error')]);
	}


}
