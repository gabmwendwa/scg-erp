<?php
sleep(2);
function createEmployee()
{
    $employee = new Employees();
    $employee->create("employees", array(
        'position_id' =>     Input::get('position'),
        'employee_number' =>     Input::get('employee_number'),
        'firstname' =>     ucwords(strtolower(Input::get('firstname'))),
        'lastname' => ucwords(strtolower(Input::get('lastname'))),
        'email' =>     Input::get('email'),
        'telephone' =>     Input::get('telephone'),
        'recruitment_date' =>     Input::get('recruitment_date'),
        'onboarding_date' =>     Input::get('onboarding_date'),
        'browser_timezone' =>     Input::get('browser_timezone'),
        'browser_timestamp' =>     Input::get('browser_timestamp')
    ));
}
function getEmployeeId()
{
    $employee = new Employees();
    if ($employee->find("employees", Input::get('email')))
        return escape($employee->data()->id);
}
function createPayroll()
{
    $payroll = new Employees();
    $employee_id = getEmployeeId();
    $payroll->create("employee_payroll", array(
        'employee_id' =>     $employee_id,
        'gross_salary' =>     Input::get('gross_salary')
    ));
}

function registerEmployee()
{
    $regQ = new Queue;

    $regQ->enqueue(createEmployee());
    $regQ->enqueue(createPayroll());

    do {
        $regQ->dequeue();
    } while (!($regQ->isEmpty()));
}

if (Input::exists()) {
    $validate = new Validate();
    $validation = $validate->check($_POST, array(
        'email' => array(
            'unique' => 'employees', //unique to the employees table
        ),
        'telephone' => array(
            'unique' => 'employees', //unique to the employees table
        ),
        'employee_number' => array(
            'unique' => 'employees', //unique to the employees table
        )
    ));
    if ($validation->passed()) {
        if (isset($_POST['creating'])) {
            $read_arr = array();
            try {
                registerEmployee();
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
    } else {

        foreach ($validation->errors() as $error) {
            $read_arr['code'] = 201;
            $read_arr['data'] = $error;

            //convert to json and output
            echo json_encode($read_arr);
            break;
        }
    }
}

?>
