function readDepartments() {
    let url;
    url = "index.php?departments";

    url = urlAPIRead + url;

    $.ajax({
        type: "GET",
        url: encodeURI(url),
        headers: { 'Access-Control-Allow-Origin': '*' },
        crossDomain: true,
        cache: false,
        success: function (data) {
            let items = null;
            if (data.code == 200) {
                items = data.data;
                $.each(items, function (i, item) {
                    $('#department').append($('<option>', {
                        value: item.id,
                        text: item.department
                    }));
                });

            }
            else {
                errorToast("An error occured.");
            }
        },
        error: function (err) {
            delay(function () {
                errorToast("An error occured.");
            }, 1500);
        },
        timeout: 60000 // sets timeout to 60 seconds
    });

    return false;

}

function readDepartmentPositions(department) {
    let url, dataString;
    url = "index.php?dpositions";

    url = urlAPIRead + url;
    dataString = { department: department };
    resetDepartmentPositionDefault();
    resetDepartmentPosition();
    if (department) {
        $.ajax({
            type: "POST",
            url: encodeURI(url),
            data: dataString,
            headers: { 'Access-Control-Allow-Origin': '*' },
            crossDomain: true,
            cache: false,
            success: function (data) {
                let items = null;
                if (data.code == 200) {
                    items = data.data;
                    $.each(items, function (i, item) {
                        $('#position').append($('<option>', {
                            value: item.id,
                            text: item.position
                        }));
                    });
                }
                else {
                    errorToast("An error occured.");
                }
            },
            error: function (err) {
                delay(function () {
                    errorToast("An error occured.");
                }, 1500);
            },
            timeout: 60000 // sets timeout to 60 seconds
        });
    }

    return false;

}
