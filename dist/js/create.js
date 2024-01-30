function createEmployee(firstname, lastname, email, telephone, onrecruitment, onboarding, position, employee_number, salary) {

    let url,
    dataString,
    tz = zone_name,
    ts = moment().format('M/D/YYYY h:mm:ss A').toString();
    url = "index.php?cemployee";

    url = urlAPICreate + url;

    dataString = { firstname: firstname, lastname: lastname, email: email, telephone: telephone, recruitment_date: onrecruitment, onboarding_date: onboarding, position: position, employee_number: employee_number, gross_salary: salary, browser_timezone: tz, browser_timestamp: ts, creating: "" };

    $.ajax({
        type: "POST",
        url: encodeURI(url),
        data: dataString,
        headers: { 'Access-Control-Allow-Origin': '*' },
        crossDomain: true,
        cache: false,
        beforeSend: function() {
            loadingToast();
        },
        success: function (data) {
            //enable buttons
            //remover loader
            data = JSON.parse(data)
           if (data.code == 200) {
                successToast(' New record saved successfully');
                
                resetDefaultValues();
                resetDepartmentPosition();
                reloadTable(table1);
            }
            else {
                errorToast(data.data);
            }
        },
        error: function (err) {
            //enable buttons
            //remover loader
            delay(function () {
                errorToast("An error occured.");
            }, 1500);
        },
        timeout: 60000 // sets timeout to 60 seconds
    });

    return false;
}
