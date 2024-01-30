<?php

class Validate {
	private $_passed = false,
			$_errors = array(),
			$_db = null;
			
	public function __construct(){
		$this->_db = DB::getInstance();
		 
	}
	
	public function check($source, $items = array()){
		foreach($items as $item => $rules){
			foreach ($rules as $rule => $rule_value){
				$value = trim(escape(decodeurl($source[$item])));
				if($rule == 'unique'){
					$check = $this->_db->get($rule_value, array($item, '=', $value));
					if($check->count()){
						if($item == 'email'){
							
							$this->addError("You cannot use the email address \"{$value}.\". Use another.");
						}
						else if($item == 'telephone'){
							
							$this->addError("You cannot use the telephone/mobile number \"{$value}\". Use another.");
						}
						else if($item == 'employee_number'){
							
							$this->addError("You cannot use the employee number \"{$value}\". Use another.");
						}
					}
				}
				else {
					$this->addError("{$item} is {$rule}.");				
				}
			}
		}
		
		if(empty($this ->_errors)){
			$this->_passed = true;
		}
		
		return $this;
	}
	
	private function addError($error){
		$this->_errors[] = $error;
	}
	
	public function errors(){
		return $this->_errors;
	}
	
	public function passed(){
		return $this->_passed;
	}
}

?>