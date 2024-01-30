function updateEmployee(firstname, lastname, onrecruitment, onboarding, position, salary,employeed, prd) {

    let url,
        dataString;
    url = "index.php?uemployee";

    url = urlAPIUpdate + url;

    dataString = { firstname: firstname, lastname: lastname, recruitment_date: onrecruitment, onboarding_date: onboarding, position: position, gross_salary: salary, employeed: employeed, prd: prd, updating: "" };

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
                successToast(' Updated record saved successfully');
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
