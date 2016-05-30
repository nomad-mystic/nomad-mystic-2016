// Global vars
var ga_radSize; // this will store the radio buttons for Size
var ga_chkTopping; // this will store the checkboxes for toppings

var g_sMsg; // this will store the msg that we will display to the user (in the bottom box)

window.onload = Init;

function Init() {

	// Grab the radio buttons (there's something special about this one)
	ga_radSize = document.getElementsByName("radSize");

	// NEXT: Same thing with the checkboxes
	ga_chkTopping = document.getElementsByName("chkTopping");

	// NEXT: Declare object variables first, i.e. variables you will need to hold objects that you get with getElementById(), and assign them
	var txtAddress = document.getElementById("txtAddress");

	// NEXT: Change the version number in the line below, if necessary, so it accurately reflects this particular version of PizzaTime.
	document.getElementById("h1Title").innerHTML = "PizzaTime 3.0";

	// NEXT: event handler hook-up: hook up the click event of the button to the Place Order() function
	document.getElementById("btnPlaceOrder").onclick = PlaceOrder;

	// NEXT: Delivery Address code
	// Disable txtAddress.  Every form element has a disabled property. When it is set to "disabled", the element is inaccessible to the user.
	txtAddress.disabled = "disabled";
	// Give txtAddress a class attribute of "disabled".  Why?  Take a look at the CSS code.
	txtAddress.className = "disabled";

	// NEXT: event handler hook-up for the "Deliver to:" checkbox
	document.getElementById("chkDelivery").onclick =
		function() {
			if (this.checked === true) {
				/* First of all, recall that *this* refers to the object/element that was the target of the event, i.e. the chkDelivery checkbox.  
				So we are asking if it's checked property is true, i.e. is it checked?
				If the checkbox is checked after the click, then we need to ENable txtAddress and set focus to it.
				While we're at it, let's change the CSS styling by removing the class attribute.
				*/
				txtAddress.disabled = "";
				txtAddress.className = "";
				txtAddress.focus();
			}
			else {
				// Not checked?  Then, disable txtAddress, set the class attribute, and clear any text in txtAddress.
				txtAddress.disabled = "disabled";
				txtAddress.className = "disabled";
				txtAddress.value = "";
			}
		};

} // function Init()

// ** FUNCTIONS ***************************************

function PlaceOrder() {
	// This event handler function executes when the user clicks the Place Order button.

	// Declare object variables and assign them
	var divErrors = document.getElementById("divErrors");
	var txtName = document.getElementById("txtName");
	var txtAddress = document.getElementById("txtAddress");

	g_sMsg = "";
	divErrors.innerHTML = "";
	divErrors.style.display = "block";


	if (ga_radSize[0].checked === true) {
		AddSizeMsg(0);
	}
	else if (ga_radSize[1].checked === true) {
		AddSizeMsg(1);
	}
	else if (ga_radSize[2].checked === true) {
		AddSizeMsg(2);
	}
	else if (ga_radSize[3].checked === true) {
		AddSizeMsg(3);
	}
	else {
		divErrors.innerHTML = "Select a pizza size";
		return;
	}
	

	if (AddSizeMsg() === false) {
		divErrors.innerHTML = "Select a pizza size";
		return;
	}
	

	if (ga_chkTopping[0].checked === true) {
		g_sMsg += ga_chkTopping[0].value + "<br>";
	}
	// NOTICE THE BLANK LINE BETWEEN EACH IF STATEMENT -- this reinforces to anyone reading the code (including ourselves) that these are **SEPARATE** IF statements
	if (ga_chkTopping[1].checked === true) {
		g_sMsg += ga_chkTopping[1].value + "<br>";
	}

	if (ga_chkTopping[2].checked === true) {
		g_sMsg += ga_chkTopping[2].value + "<br>";
	}

	if (ga_chkTopping[3].checked === true) {
		g_sMsg += ga_chkTopping[3].value + "<br>";
	}

	if (ga_chkTopping[4].checked === true) {
		g_sMsg += ga_chkTopping[4].value + "<br>";
	}

	if (ga_chkTopping[5].checked === true) {
		g_sMsg += ga_chkTopping[5].value + "<br>";
	}

	if (ga_chkTopping[6].checked === true) {
		g_sMsg += ga_chkTopping[6].value + "<br>";
	}

	if (ga_chkTopping[7].checked === true) {
		g_sMsg += ga_chkTopping[7].value + "<br>";
	}

	for (var i=0; i <= ga_chkTopping.length - 1; i++) {
		if (ga_chkTopping[i].checked === true) {
			g_sMsg += ga_chkTopping[i].value + "<br>";
		}
	}

	if (document.getElementById("selSmell").selectedIndex === 0) {
		// If the selectedIndex is zero, that means the first item is selected.  In this particular dropdown, the first item is blank (look back at the HTML), meaning that the user didn't really select anything. So display an error, set focus to the select box and get out of here.
		divErrors.innerHTML = "Select a smell";
		document.getElementById("selSmell").focus();
		return; // get out!
	}
	else {
		// The user DID select a smell, so let's continue building our display msg.
		g_sMsg += "<p>Your pizza will smell like <em>" + document.getElementById("selSmell").value + "</em>.</p>";
		// Note that the *value* property gives us the html value attribute of whichever item is selected
	}

	// NEXT:
	// if txtName is blank, display error msg and set focus
	if (txtName.value === "") {
		divErrors.innerHTML = "Enter a customer name";
		txtName.focus();
		return; // now get the hell out of here
	}

	// NEXT: Delivery Address code
	// Is the Delivery checkbox checked?
	if (document.getElementById("chkDelivery").checked === true) {
		// Yes: Check that txtAddress contains a value.  If it doesn't, display an error msg
		if (txtAddress.value === "") {
			// Bummer.  No address entered.
			divErrors.innerHTML = "Enter your address";
			txtAddress.focus();
			return;
		}
		else {
			// otherwise, display a nice msg to them
			g_sMsg += "<p>Your order will be delivered to:<br><em>" + txtAddress.value + "</em></p>";
		}
	}
	else {
		// The delivery checkbox is NOT checked, i.e. it's a pickup order
		g_sMsg += "<p>Your order will be ready for pickup in 20 minutes.</p>";
	}

	g_sMsg += "<h3>Thank you for coming to PizzaTime!</h3>";

	// We've finished building our display msg for the user.  Now we need to stick it into divOrder so they can see it
	document.getElementById("divOrder").innerHTML = g_sMsg;

	divErrors.style.display = "none"; // No errors, so hide divErrors.
	return;

} // function PlaceOrder()

function AddSizeMsg () {

	for (var i=0; i <= ga_radSize.length - 1; i++) { // loop thru each radio button
		if (ga_radSize[i].checked === true) { // if it's checked...
			g_sMsg += "<strong>" + txtName.value + " ordered a " + ga_radSize[i].value + " Pizza with:</strong><br>";
			return true; // Now get out (returning true means they made a selection)
		}
	}

	// If we get this far, then they didn't select any of the size radio buttons
	return false;  // Now get out (returning false means they did NOT make any selection for size)

} // function AddSizeMsg()