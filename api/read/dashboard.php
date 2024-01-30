<?php

$prf = new Employees();
$prfr = $prf->find_all('dashboard_view', 'id');

$read_arr = array();
$read_arr['code'] = 200;
$read_arr['data'] = array();

if (count($prfr) > 0) {
	foreach ($prfr as $pr) {
		// $pra = (array) $pr;

		$item = array(
			'num' => $pr->id,
			'organizatoin_setup' => $pr->department . ' |•| ' . $pr->position . ' |•| ' . $pr->employee_number,
			'employee' =>  $pr->firstname . ' ' . $pr->lastname,
			'payroll_settings' => $pr->id,
			'payroll' => 'KES ' . $pr->gross_salary,
			'leave' => $pr->id,
			'recruitment' => $pr->recruitment_date,
			'attendance' => $pr->id,
			'performance' => $pr->id,
			'onboarding' => $pr->onboarding_date,
			'training' => $pr->id,
			'info' => (array) $pr
		);

		// array_push($item, (array) $pr);

		// Push Data
		array_push($read_arr['data'], $item);
	}
	//convert to json and output
	echo json_encode($read_arr);
} else {
	// No data
	$read_arr['code'] = 201;
	$read_arr['data'] = "No data.";

	//convert to json and output
	echo json_encode($read_arr);
}
