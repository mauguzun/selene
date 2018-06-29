<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
    	
    
        $this->load->view('store/header');

		$this->load->library("Stripeconfig");
		$config = $this->stripeconfig->getconfig();
		var_dump($config);
        $this->load->library('Stripe',$this->stripeconfig->getconfig());
        
        /*echo $this->stripe->charge_list();
        
        die();*/


        $card_data = array(
            'number' => '4242424242424242',
            'cvc'      => '123',
            'exp_month'=> '11',
            'exp_year' => '2019',
            'name'     => 'denis',

        );

        $dollars = 31232;

        $cents   = number_format((float)$dollars * 100., 0, '.', ''); // convert dollar to cent
        $tokenArray    = json_decode($this->stripe->card_token_create($card_data,$cents));
        
         
        $stripeToken   = $tokenArray->id;
        $amount        = $cents;
        $card          = $card_data;
        $desc          = 'this is my description';
		
		
	
        $payWithStripe = json_decode($this->stripe->charge_card($amount, $card, $desc));
        
         
        var_dump($payWithStripe);

       // We need to store the data into database and get the transaction id.
        $transaction_id = $payWithStripe->id;

		echo $transaction_id ;
        $this->load->view('store/footer');

    }


}
