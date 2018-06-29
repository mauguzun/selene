<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pay extends User_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->show_header([lang('pay_via_credit_cart'),lang('pay_via_credit_cart'),lang('pay_via_credit_cart')]);
		$this->load->library("Stripeconfig");
		$this->load->library('Stripe',$this->stripeconfig->getconfig());
	}

	public function index()
	{
		$this->_set_validation();



		if($this->form_validation->run() === true){

			$card_data = array(
				'number'   => $_POST['number'],
				'cvc'      => $_POST['cvc'],
				'exp_month'=> $_POST['exp_month'],
				'exp_year' => $_POST['exp_year'],
				'name'     => $_POST['name'],
			);

			$total = $this->cart->total() + SHIPPING;
			$cents = number_format((float)$total * 100., 0, '.', '');
			$tokenArray = json_decode($this->stripe->card_token_create($card_data,$cents));

			if(!isset($tokenArray->error))
			{

				$unique_id     = time();
				$stripeToken   = $tokenArray->id;
				$amount        = $cents;
				$card          = $card_data;
				$desc          = $unique_id;


				$payWithStripe = json_decode($this->stripe->charge_card($amount, $card, $desc));
				if(!isset($payWithStripe->error)){
					$this->Crud->add([
							'id'=>$unique_id,
							'user_id'=>$this->user_id,
							'payed'=>1,
							'comment'=>$_POST['comment'],
							'total'=>$cents,
							'shiping_address'=>$_POST['shiping_address']

						],'orders')	;

					$multiple = [];
					foreach($this->cart->contents() as $value)
					{
						$multiple[] =
						['order_id'=>$unique_id,
							'product_id'=>$value['id'],
							'qty'=>$value['qty'],
							'total'=>$value['subtotal']];

					}
					$this->Crud->add_many($multiple,'order_row');
					// send email
					$this->cart->destroy();
					redirect(base_url().'read/payed_done');

				}
				else
				$this->data['message'] = $payWithStripe->error->message;
			}
			else
			$this->data['message'] = $tokenArray->error->message;



		}
		else
		{
			$this->data['message'] = (validation_errors() ? validation_errors() :
				($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
		}

		$this->data['title'] = lang('pay_via_credit_cart');
		$this->data['more'] = lang('pay_via_credit_cart');


		$key = [
			'number'=>14,
			'cvc'=>3,
			'exp_year'=>4,
			'exp_month'=>2

		];

		$this->load->library("Inputarray");

		foreach(['name'] as $value){
			$this->data['controls'][$value] =
			form_input($this->inputarray->getArray(
					$value,  'text',lang($value), isset($row[$value])? $row[$value] : $this->form_validation->set_value($value),TRUE
					
				));

		}


		foreach($key as $value=>$length){
			$this->data['controls'][$value] =
			form_input($this->inputarray->getArray(
					$value,  'numeric',lang($value),  isset($row[$value])? $row[$value] : $this->form_validation->set_value($value),TRUE,
					['minlength'=>$length]
				));
		}


		foreach(['comment','shiping_address'] as $value){
			$this->data['controls'][$value] =
			form_textarea($this->inputarray->getArray(
					$value,  'text',lang($value), isset($row[$value])? $row[$value] : $this->form_validation->set_value($value),FALSE
				));

		}

		$this->data['controls']['submit'] =
		form_submit('submit', lang('pay'),['class'=>"btn btn-inverse"]);;

		$this->data['form_url'] = base_url().'user/pay/';
		$this->load->view('parts/form',$this->data);
		$this->load->view('store/footer');


	}
	private function _set_validation()
	{
		$this->form_validation->set_rules('name', lang('name'), 'trim|required|max_length[100]');
		/*$this->form_validation->set_rules('number', lang('number'), 'trim|required|number|exact_length[16]');
		$this->form_validation->set_rules('cvc', lang('cvc'), 'trim|required|number|exact_length[3]');
		$this->form_validation->set_rules('exp_year', lang('exp_year'), 'trim|required|numeric|exact_length[4]');
		$this->form_validation->set_rules('exp_month', lang('exp_month'), 'trim|required|numeric|exact_length[2]');*/
	}


}
