<?php

class Admin
{

	public function menu()
	{

		$menu =

		[
			"Products"=>

			[
				'admin/product'=>"List of product",
				'admin/product/add'=>"Add new  product",

			],
			
			"Pages"=>
			[
				'admin/page'=>"List of pages",
				'admin/page/add'=>"Add new  page",
			],
			
			"Categories"=>
			[
				'admin/category'=>"Categories",	
			],
			
			"Orders"=>
			[
				'admin/order'=>"List of order",	
				'admin/payments'=>"List of payments",	
			],
			
			"Users"=>'admin/user',
			"Logout"=>'auth/logout',
			
		];


		return $menu;




	}





}
?>