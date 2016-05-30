/*jsl:option explicit*/
/*jsl:declare addEventListener*//*jsl:declare alert*//*jsl:declare blur*//*jsl:declare clearInterval*//*jsl:declare clearTimeout*//*jsl:declare close*//*jsl:declare closed*//*jsl:declare confirm*//*jsl:declare console*//*jsl:declare Debug*//*jsl:declare defaultStatus*//*jsl:declare document*//*jsl:declare event*//*jsl:declare focus*//*jsl:declare frames*//*jsl:declare getComputedStyle*//*jsl:declare history*//*jsl:declare Image*//*jsl:declare length*//*jsl:declare location*//*jsl:declare moveBy*//*jsl:declare moveTo*//*jsl:declare navigator*//*jsl:declare open*//*jsl:declare opener*//*jsl:declare opera*//*jsl:declare Option*//*jsl:declare parent*//*jsl:declare Number*//*jsl:declare parseInt*//*jsl:declare print*//*jsl:declare prompt*//*jsl:declare resizeBy*//*jsl:declare resizeTo*//*jsl:declare screen*//*jsl:declare scroll*//*jsl:declare scrollBy*//*jsl:declare scrollTo*//*jsl:declare setInterval*//*jsl:declare setTimeout*//*jsl:declare status*//*jsl:declare top*//*jsl:declare window*//*jsl:declare XMLHttpRequest*/

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