<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! function_exists('date_to_db'))
{
	function date_to_db($date)
	{
		$date = trim($date);
		return date_format(date_create_from_format('d/m/Y', $date), 'Y-m-d');
	}
}

if( ! function_exists('date_to_input'))
{
	function date_to_input($date)
	{
		/* if (! $date instanceof DateTime) {
		var_dump($date);
		die();
		}*/

		$date = trim($date);
		return date_format(date_create_from_format('Y-m-d', $date), 'd/m/Y');
	}
}

if( ! function_exists('time_stamp_to_date'))
{
	function time_stamp_to_date($date)
	{
		/* if (! $date instanceof DateTime) {
		var_dump($date);
		die();
		}*/
		$date = trim($date);
		return date_format(date_create_from_format('Y-m-d H:i:s', $date), 'd/m/Y');
	}
}
if( ! function_exists('img_div'))
{
	function img_div($file)
	{

		$img = $file;
		if(@!is_array(getimagesize($file)))
		{
			$img = file_cover();
		}

		return  "<div data-img-url='".$file."' class='edit'>".
		"<img src='".$img."' />".
		"<i  class='fas fa-trash'></i>  
		</div>";

	}
}

if( ! function_exists('file_cover'))
{
	function file_cover()
	{
		return 'https://www.shareicon.net/data/128x128/2015/08/03/79466_file_512x512.png';
	}
}
