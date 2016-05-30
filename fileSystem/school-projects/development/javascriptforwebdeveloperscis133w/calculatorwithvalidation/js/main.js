// Calculator
// when the page is finished loading into the browser, run the Init() function
window.onload = Init;

function Init() {
	document.forms[0].reset(); // set all form fields to their initial state
}

function Add() {

	var fNumber1;
	var fNumber2;
	var fResult;

	var txtNumber1;
	var txtNumber2;
	var txtResult;
	var divOutput;

	txtNumber1 = document.getElementById("txtNumber1");
	txtNumber2 = document.getElementById("txtNumber2");
	txtResult =  document.getElementById("txtResult");
	divOutput = document.getElementById("divOutput");

	if (txtNumber1.value === "") { // First, see if the first textbox is empty
		divOutput.innerHTML = "Enter a value for the first number";
		txtNumber1.focus(); // put focus on the textbox
		return; // exit this function immediately
	}
	else if (isNaN(txtNumber1.value)) { // did the user enter an invalid number? (is Not a Number)
		divOutput.innerHTML = "Enter a valid number for the first number";
		txtNumber1.focus();
		return;
	}
	else if (txtNumber2.value === "") { // see if the second textbox is empty
		divOutput.innerHTML = "Enter a value for the second number";
		txtNumber2.focus();
		return;
	}
	else if (isNaN(txtNumber2.value)) { // see if the second textbox has an invalid number
		divOutput.innerHTML = "Enter a valid number for the second number";
		txtNumber2.focus();
		return;
	}

	// if we made it this far, it means that the user entered a valid number in both fields. Convert them to real numbers - remember that anything coming from a textbox is a string, even if it looks numeric.
	fNumber1 = Number(txtNumber1.value);
	fNumber2 = Number(txtNumber2.value);
	fResult = fNumber1 + fNumber2; // Add them together.

	txtResult.value = fResult.toFixed(2); // Using toFixed, convert fResult to a string with 2 decimal points.  Then, stick it into the Result textbox.

	// display to divOutput
	divOutput.innerHTML = txtNumber1.value + " + " + txtNumber2.value + " = " + txtResult.value;
}