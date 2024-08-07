<?php
require_once './commons/function.php';

class LienHeController
{

	public function __construct()
	{
		
	}
	public function formLienHe()
	{
		require_once './views/lienHe.php';
		deleteSessionError();
		
	}
	
}