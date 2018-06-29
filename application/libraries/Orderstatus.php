<?php


class Orderstatus
{

	/**
	*
	* @var statuses array
	*
	*/
	private $_status =
	[
	
		0=>'Not Payed',
		1=>'Payed not checked',
		2=>'Payed ,ok',
		3=>'Payed ,sended',
		4=>'Payed ,some error',
	];

	/**
	* array of statuses
	*
	* @return
	*/
	public function statuses()
	{
	
		return $this->_status;
	}

	/**
	*
	* @param int $id
	*
	* @return string status | NULL
	*/
	public function status($id)
	{
		if(array_key_exists($id,$this->_status)){
			return $this->_status[$id];
		}
		else
		{
			return NULL;
		}
	}
}
?>