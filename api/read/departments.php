<?php
	
	$prf = new Employees();
	$prfr = $prf->find_all('departments', 'id');
	
	$read_arr = array();
    $read_arr['code'] = 200;
	$read_arr['data'] = array();
	
	if(count($prfr) > 0) {
		foreach($prfr as $pr){
            $item = (array) $pr;
			
			// Push Data
			array_push($read_arr['data'], $item);
		}
		//convert to json and output
		echo json_encode($read_arr);
	}
	else {
		// No data
		echo json_encode(array("message"=>"No data."));
	}
?>