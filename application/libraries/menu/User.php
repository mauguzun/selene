<?php

class User
{

	public function menu($user)
	{

		$menu =
		[
			"Store"=>'store',
			"Checkout"=>'user/checkout',
			"Settings"=>'user/settings'
		];
		
		
		if($user)
		$menu['Logout'] = 'auth/logout';
		else
		$menu['Login'] = 'auth/login';



		return $menu;




	}





}
?>