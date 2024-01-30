let sweet_loader = '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';

let Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 5000
});

let departmentInput = document.getElementById("department"),
    positionInput = document.getElementById("position"),
    firstnameInput = document.getElementById("firstname"),
    lastnameInput = document.getElementById("lastname"),
    emailInput = document.getElementById("email"),
    telephoneInput = document.getElementById("telephone"),
    recruitmentInput = document.getElementById("onrecruitment"),
    onboardingInput = document.getElementById("onboarding"),
    employeeNumberInput = document.getElementById("employee_number"),
    salaryInput = document.getElementById("salary");

function resetDefaultValues() {
    firstnameInput.value = "";
    lastnameInput.value = "";
    emailInput.value = "";
    telephoneInput.value = "";

    recruitmentInput.valueAsDate = new Date();
    onboardingInput.valueAsDate = new Date();

    employeeNumberInput.value = "";
    salaryInput.value = "";

    resetDepartmentDefault();
    resetDepartmentPositionDefault();

}

function resetDepartmentDefault(indx = 0) {
    departmentInput.selectedIndex = indx;
}

function resetDepartmentPositionDefault(indx = 0) {
    positionInput.selectedIndex = indx;
}

function resetDepartmentPosition() {
    $(positionInput).find('option').not(':first').remove();
}

function loadingToast() {
    Toast.fire({
        html: '<h5>Loading...</h5>',
        showConfirmButton: false,
        onRender: function () {
            // there will only ever be one sweet alert open.
            $('.swal2-content').prepend(sweet_loader);
        }
    });
}

function successToast(msg) {
    Toast.fire({
        type: 'success',
        title: msg + " saved successfully."
    });
}

function errorToast(msg) {
    Toast.fire({
        type: 'error',
        title: msg + " Please try again."
    });
}


let employeed = null,
    editFlag = false,
    prd = null;

function formCloseDefaults() {
    resetDefaultValues();
    resetDepartmentPosition();
    reloadTable(table1);
    editFlag = false;
    emailInput.removeAttribute('readonly');
    telephoneInput.removeAttribute('readonly');
    employeeNumberInput.removeAttribute('readonly');
}

function setEmployeeForm(str) {
    //convert string to JSON Object
    $obj = JSON.parse(str);
    delay(function () {
        emailInput.readOnly = true;
        telephoneInput.readOnly = true;
        employeeNumberInput.readOnly = true;

        employeed = $obj.id;
        prd = $obj.payroll_id;
        firstnameInput.value = $obj.firstname;
        lastnameInput.value = $obj.lastname;
        emailInput.value = $obj.email;
        telephoneInput.value = $obj.telephone;
        recruitmentInput.value = $obj.recruitment_date;
        onboardingInput.value = $obj.onboarding_date;

        departmentInput.value = $obj.department_id;
        $("#department").trigger('change', function () { });
        delay(function () {
            positionInput.value = $obj.position_id;
        }, 200);

        employeeNumberInput.value = $obj.employee_number;
        salaryInput.value = $obj.gross_salary;

    }, 500);
}

let table1 = $('#table1');

function tableButtons(thetable) {
    delay(function () {
        thetable.buttons().container().appendTo('#table1_wrapper .col-md-6:eq(0)')
    }, 1000);
}

function reloadTable(thetable) {
    delay(function () {
        thetable.ajax.reload();
    }, 1000);
}

$(function () {
    resetDefaultValues();
    readDepartments();
    $('#department').change(function () {
        readDepartmentPositions($(this).val());
    });
    // });

    // $(function () {
    table1 = table1.DataTable({
        "ajax": urlAPIRead + "index.php?dashboard",
        "columns": [{
            'data': 'num'
        },
        {
            'data': 'organizatoin_setup',
            render: function (data, type, row) {
                return "<button class='btn btn-link text-primary pointer' title='Edit' data-toggle='modal' data-target='#employeeForm' data-info='" + JSON.stringify(row.info) + "' onclick='setEmployeeForm(this.dataset.info); editFlag = true;'>" + data + "</button>";
            }
        },
        {
            'data': 'employee',
            render: function (data, type, row) {
                return "<button class='btn btn-link text-primary pointer' title='Edit' data-toggle='modal' data-target='#employeeForm' data-info='" + JSON.stringify(row.info) + "' onclick='setEmployeeForm(this.dataset.info); editFlag = true;'>" + data + "</button>";
            }
        },
        {
            'data': 'payroll_settings',
            render: function (data, type, row) {
                return "<button class='btn btn-link text-primary pointer' title='Edit' data-toggle='modal' data-target='#employeeForm' data-info='" + JSON.stringify(row.info) + "' onclick='setEmployeeForm(this.dataset.info); editFlag = true;'><i class='nav-icon fas fa-cog'></i> Settings</button>"
            }
        },
        {
            'data': 'payroll'
        },
        {
            'data': 'leave',
            render: function (data, type, row) {
                return '<button class="btn btn-link text-primary pointer" title="View" data-toggle="modal" data-target="#comingSoon" onclick="$(\'.coming-type\').text(\'Leave\');"><i class="nav-icon fas fa-eye"></i> View</button>';
            }
        },
        {
            'data': 'recruitment',
            render: function (data, type, row) {
                let date = new Date(data);
                let day = date.getDate(),
                    month = date.getMonth() + 1,
                    year = date.getFullYear();
                return day + "-" + month + "-" + year;
            }
        },
        {
            'data': 'attendance',
            render: function (data, type, row) {
                return '<button class="btn btn-link text-primary pointer" title="View" data-toggle="modal" data-target="#comingSoon" onclick="$(\'.coming-type\').text(\'Attendance\');"><i class="nav-icon fas fa-eye"></i> View</button>';
            }
        },
        {
            'data': 'performance',
            render: function (data, type, row) {
                return '<button class="btn btn-link text-primary pointer" title="View" data-toggle="modal" data-target="#comingSoon" onclick="$(\'.coming-type\').text(\'Performance\');"><i class="nav-icon fas fa-eye"></i> View</button>';
            }
        },
        {
            'data': 'onboarding',
            render: function (data, type, row) {
                let date = new Date(data);
                let day = date.getDate(),
                    month = date.getMonth() + 1,
                    year = date.getFullYear();
                return day + "-" + month + "-" + year;
            }
        },
        {
            'data': 'training',
            render: function (data, type, row) {
                return '<button class="btn btn-link text-primary pointer" title="View" data-toggle="modal" data-target="#comingSoon" onclick="$(\'.coming-type\').text(\'Training\');"><i class="nav-icon fas fa-eye"></i> View</button>';
            }
        }
        ],
        "lengthMenu": [25, 50, 75, 100],
        "responsive": false,
        "lengthChange": true,
        "autoWidth": false,
        "info": true,
        "processing": true,
        "serverSide": true,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    });

    tableButtons(table1);


    $.validator.setDefaults({
        submitHandler: function (e) {
            let firstname = firstnameInput.value.toString(),
                lastname = lastnameInput.value.toString(),
                email = emailInput.value.toString(),
                telephone = telephoneInput.value.toString(),
                onrecruitment = recruitmentInput.value.toString(),
                onboarding = onboardingInput.value.toString(),
                position = positionInput.value.toString(),
                employee_number = employeeNumberInput.value.toString(),
                salary = salaryInput.value.toString();

            delay(function () {
                switch (editFlag) {
                    case true:
                        // update employee
                            updateEmployee(firstname, lastname, onrecruitment, onboarding, position, salary, employeed, prd)
                        break;
                    default:
                        // create employee
                        createEmployee(firstname, lastname, email, telephone, onrecruitment, onboarding, position, employee_number, salary);
                        break;
                }

            }, 1000);
        }
    });

    $('#quickEmployeeForm').validate({
        rules: {
            firstname: {
                required: true,
                minlength: 2,
                maxlength: 20,
            },
            lastname: {
                required: true,
                minlength: 2,
                maxlength: 20,
            },
            email: {
                required: true,
                email: true,
            },
            telephone: {
                required: true,
            },
            onrecruitment: {
                required: true,
            },
            onboarding: {
                required: true,
            },
            department: {
                required: true,
            },
            position: {
                required: true,
            },
            employee_number: {
                required: true,
            },
            salary: {
                required: true,
            },
        },
        messages: {
            firstname: {
                required: "Please enter first name",
                minlength: "Your first name must be at least 5 characters",
                maxlength: "Your first name must not be more than 20 characters"
            },
            lastname: {
                required: "Please enter last name",
                minlength: "Your last name must be at least 5 characters",
                maxlength: "Your last name must not be more than 20 characters"
            },
            email: {
                required: "Please enter a email address",
                email: "Please enter a valid email address"
            },
            telephone: {
                required: "Please enter a telephone/mobile number"
            },
            onrecruitment: {
                required: "Please enter the recruitment date"
            },
            onboarding: {
                required: "Please enter the onboarding date"
            },
            department: {
                required: "Choose a department"
            },
            position: {
                required: "Choose a position"
            },
            employee_number: {
                required: "Please enter the employee number"
            },
            salary: {
                required: "Please enter the gross salary"
            },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });

});





