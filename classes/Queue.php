<?php
class Queue extends SplQueue
{
	private $_registration_count,
			$_db = null;
			
	public function __construct(){
		$this->_db = DB::getInstance();
		$_registration_count = 0;
		 
	}
}
?>