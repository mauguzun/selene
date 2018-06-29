<?php


class Stripeconfig
{




	public function getconfig()
	{
		$config = [];
		$config['stripe_key_test_public'] = 'pk_test_eyHwA7uxvgfdNb9hdxoYYOOL';
        $config['stripe_key_test_secret'] = 'sk_test_gTDCsF57WlAAHqAhpPLAPasy';
        $config['stripe_key_live_public'] = '';
        $config['stripe_key_live_secret'] = '';
        $config['stripe_test_mode'] = TRUE;
        $config['stripe_verify_ssl'] = FALSE;
        
        return $config;

	}
}
?>