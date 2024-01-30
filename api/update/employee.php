<?php
sleep(2);
function getEmployeeData()
{
    $employee = new Employees();
    if ($employee->find("employees", Input::get('employeed')))
        return $employee->data();
}

function updateEmployee()
{
    $employee = new Employees();
    $employee->update("employees", array(
        'position_id' =>     Input::get('position'),
        'firstname' =>     ucwords(strtolower(Input::get('firstname'))),
        'lastname' => ucwords(strtolower(Input::get('lastname'))),
        'recruitment_date' =>     Input::get('recruitment_date'),
        'onboarding_date' =>     Input::get('onboarding_date')
    ), Input::get('employeed'));
}

function updatePayroll()
{
    $payroll = new Employees();
    $payroll->update("employee_payroll", array(
        'gross_salary' => Input::get('gross_salary')
    ), Input::get('prd'));
}

function updatingEmployee()
{
    $updQ = new Queue;

    $updQ->enqueue(updateEmployee());
    $updQ->enqueue(updatePayroll());

    do {
        $updQ->dequeue();
    } while (!($updQ->isEmpty()));
}

if (Input::exists()) {
    // print_r($_POST);
    // die();
    if (isset($_POST['updating'])) {
        $read_arr = array();
        try {
            updatingEmployee();
            $read_arr['code'] = 200;
            $read_arr['data'] = "success";

            //convert to json and output
            echo json_encode($read_arr);
        } catch (Exception $e) {
            $read_arr['code'] = 201;
            $read_arr['data'] = $e->getMessage();

            //convert to json and output
            echo json_encode($read_arr);
        }
    }
}
