/*PREVENT FORM FROM SUBMITTING*/

function preventdeafaultaction(action) {
	document.addEventListener(action, function (ev) {
		ev.preventDefault();
	}, false);
}

/*PREVENT FORM FROM SUBMITTING*/



var currentUrl = window.location.pathname;
//var currentUrlFilename = currentUrl.substring(currentUrl.lastIndexOf('/') - 1);
var currentUrlFilenames = currentUrl.split('/');
//var urlfilename =  currentUrlFilenames[ currentUrlFilenames.length - 2 ];
//var urlfilename =  currentUrlFilenames[ currentUrlFilenames.length - 2 ];
//console.log(currentUrlFilenames);
const recordurl = window.location.protocol + '//' + window.location.hostname + '/' + currentUrlFilenames[1] + '/' + currentUrlFilenames[2] + '/';

/*TIMEZONE VARIABLES*/

var zone_name = moment.tz.guess();
var timezone_abbreviation = moment.tz(zone_name).zoneAbbr();

var dtsmp = moment().format('DD/MM/YYYY h:mm:ss A').toString();

/*TIMEZONE VARIABLES*/


/*CHECK IF AJAX IS STILL PROCESSING*/

var stillsubmitting = false;

/*CHECK IF AJAX IS STILL PROCESSING*/




/*DEFUALT ROOT LINKS*/


const urlHome = "https://localhost/erp-php/";

const urlAPIRead = urlHome+"api/read/";

const urlAPICreate = urlHome+"api/create/";

const urlAPIUpdate = urlHome+"api/update/";

const urlAPIDelete = urlHome+"api/delete/";


/*DEFUALT ROOT LINKS*/


var delay = (function () {
	var timer = 0;
	return function (callback, ms) {
		clearTimeout(timer);
		timer = setTimeout(callback, ms);
	};
})();

//  get year for copyright
var curyear = new Date().getFullYear();

$(".currentyear").text(curyear);



/*UNFOCUS FUNCTION*/

// function unfocusfunction() {
// 	$('button, input').trigger('blur');
// }

// $("form").submit(function () {
// 	unfocusfunction();
// 	//console.log("submit test")
// });

/*UNFOCUS FUNCTION*/



/*RESET CERTAIN FIELDS IN FORM*/

function resetFormField(field) {
	$(field).val(function () {
		return this.defaultValue;
	});
}

/*RESET CERTAIN FIELDS IN FORM*/


/*KEYBOARD BUTTONS FUNCTIONS*/

function keyboardbuttonfunction(thekey, btnselector) {
	// Execute a function when the user releases a key on the keyboard
	document.addEventListener("keyup", function (event) {
		// Cancel the default action, if needed
		event.preventDefault();

		switch (thekey) {
			case "enter":
				// Number 13 is the "Enter" key on the keyboard
				if (event.keyCode === 13) {
					// Trigger the button element with a click
					//document.getElementById("myBtn").click();
					$(btnselector).trigger('click');
				}
				break;
			case "escape":
				// Number 27 is the "Escape" key on the keyboard
				if (event.keyCode === 27) {
					// Trigger the button element with a click
					$(btnselector).trigger('click');
				}
				break;
		}
	});
}

/*KEYBOARD BUTTONS FUNCTIONS*/


/*DEFAULT DATE FUNCTION*/

function defaultdatetime() {
	var date = new Date();

	var day = date.getDate();
	var month = date.getMonth() + 1;
	var year = date.getFullYear();

	var hour = date.getHours();
	var minutes = date.getMinutes();
	var seconds = date.getSeconds();

	if (month < 10) month = "0" + month;
	if (day < 10) day = "0" + day;

	if (hour < 10) hour = "0" + hour;
	if (minutes < 10) minutes = "0" + minutes;
	if (seconds < 10) seconds = "0" + seconds;

	var today = year + "-" + month + "-" + day;

	var timenow = hour + ":" + minutes;//+":"+seconds;

	$(".addnewdate").attr("value", today);
	$(".addnewtime").attr("value", timenow);
}

/*DEFAULT DATE FUNCTION*/


/*CHECK FOR ODD NUMBERS*/

function isOdd(num) {
	return num % 2;
}

/*CHECK FOR ODD NUMBERS*/


/*GET TEXT OF SELECTED OPTION*/

function selectText(sel) {
	if (!sel.options[sel.selectedIndex].value) {
		return false;
	}
	else {
		return sel.options[sel.selectedIndex].text;
	}
}

/*GET TEXT OF SELECTED OPTION*/


/*CHECK IF OBJECT IS EMPTY*/

function emptyObject(obj) {
	for (var key in obj) {
		if (obj.hasOwnProperty(key))
			return false;
	}
	return true;
}

/*CHECK IF OBJECT IS EMPTY*/


/*CHECK OBJECT LENGTH*/

function objectLength(object) {
	var length = 0;
	for (var key in object) {
		if (object.hasOwnProperty(key)) {
			++length;
		}
	}
	return length;
};

/*CHECK OBJECT LENGTH*/


/* ESCAPE HTML CHARACTERS */

function escapeHtml(str) {
	return str
		.replace(/&/g, "&amp;")
		.replace(/</g, "&lt;")
		.replace(/>/g, "&gt;")
		.replace(/"/g, "&quot;")
		.replace(/'/g, "&#039;");
}

/* ESCAPE HTML CHARACTERS */


function capitalizeWord(word) {

const capitalized =
  word.charAt(0).toUpperCase()
  + word.slice(1);
  return capitalized;
}



/*CURRENCY FUNCTION*/

// Jquery Dependency

$("input[data-type='currency']").on({
    keyup: function() {
      formatCurrency($(this));
    },
    blur: function() { 
      formatCurrency($(this), "blur");
    }
});


function formatNumber(n) {
  // format number 1000000 to 1,234,567
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}


function formatCurrency(input, blur) {
  // appends $ to value, validates decimal side
  // and puts cursor back in right position.
  
  // get input value
  var input_val = input.val();
  
  // don't validate empty input
  if (input_val === "") { return; }
  
  // original length
  var original_len = input_val.length;

  // initial caret position 
  var caret_pos = input.prop("selectionStart");
    
  // check for decimal
  if (input_val.indexOf(".") >= 0) {

    // get position of first decimal
    // this prevents multiple decimals from
    // being entered
    var decimal_pos = input_val.indexOf(".");

    // split number by decimal point
    var left_side = input_val.substring(0, decimal_pos);
    var right_side = input_val.substring(decimal_pos);

    // add commas to left side of number
    left_side = formatNumber(left_side);

    // validate right side
    right_side = formatNumber(right_side);
    
    // On blur make sure 2 numbers after decimal
    if (blur === "blur") {
      right_side += "00";
    }
    
    // Limit decimal to only 2 digits
    right_side = right_side.substring(0, 2);

    // join number by .
    input_val = "KES " + left_side + "." + right_side;

  } else {
    // no decimal entered
    // add commas to number
    // remove all non-digits
    input_val = formatNumber(input_val);
    input_val = "KES " + input_val;
    
    // final formatting
    if (blur === "blur") {
      input_val += ".00";
    }
  }
  
  // send updated string to input
  input.val(input_val);

  // put caret back in the right position
  var updated_len = input_val.length;
  caret_pos = updated_len - original_len + caret_pos;
  input[0].setSelectionRange(caret_pos, caret_pos);
}

/*CURRENCY FUNCTION*/
