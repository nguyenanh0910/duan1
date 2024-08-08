<?php
require_once './commons/function.php';

class GioiThieuController
{

	public function __construct()
	{
		
	}
	public function formGioiThieu()
	{
		require_once './views/gioithieu.php';
		deleteSessionError();
		
	}
	
}