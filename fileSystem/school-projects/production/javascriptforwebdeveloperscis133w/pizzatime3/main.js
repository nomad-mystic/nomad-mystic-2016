/*
The purpose of this webpage is to demonstrate form validation and arrays.  The user will select a size, toppings and a smell for their pizza.  They will then enter their name and, if they want it delivered, check the Deliver to checkbox and enter and address.

Finally, they click the Place Order button.  This event causes the page the validate.  If the page is not valid, appropriate error msgs will be displayed.  Otherwise, we display their order back to them in the bottom box.

Read from top to bottom and follow the instructions.  Do NOT comment out a section of code unless you are instructed to do so.

Take a close look at the HTML.  It's probably a good idea to print it out so you can refer to it while you're working thru this.

This is a 2-part workout.  Don't do anything labeled Part 2 until the second week that this workout is assigned (unless you want to).
*/

/*jsl:option explicit*/
/*jsl:declare $*//*jsl:declare addEventListener*//*jsl:declare alert*//*jsl:declare blur*//*jsl:declare clearInterval*//*jsl:declare clearTimeout*//*jsl:declare close*//*jsl:declare closed*//*jsl:declare confirm*//*jsl:declare console*//*jsl:declare Debug*//*jsl:declare defaultStatus*//*jsl:declare document*//*jsl:declare event*//*jsl:declare focus*//*jsl:declare frames*//*jsl:declare getComputedStyle*//*jsl:declare history*//*jsl:declare Image*//*jsl:declare length*//*jsl:declare location*//*jsl:declare moveBy*//*jsl:declare moveTo*//*jsl:declare navigator*//*jsl:declare open*//*jsl:declare opener*//*jsl:declare opera*//*jsl:declare Option*//*jsl:declare parent*//*jsl:declare Number*//*jsl:declare parseInt*//*jsl:declare print*//*jsl:declare prompt*//*jsl:declare resizeBy*//*jsl:declare resizeTo*//*jsl:declare screen*//*jsl:declare scroll*//*jsl:declare scrollBy*//*jsl:declare scrollTo*//*jsl:declare setInterval*//*jsl:declare setTimeout*//*jsl:declare status*//*jsl:declare top*//*jsl:declare window*//*jsl:declare XMLHttpRequest*/


// Global vars
var ga_radSize; // this will store the radio buttons for Size
var ga_chkTopping; // this will store the checkboxes for toppings

var g_sMsg; // this will store the msg that we will display to the user (in the bottom box)


// NEXT: Set up onload event handler
window.onload = Init;

function Init() {

	// Grab the radio buttons (there's something special about this one)
	ga_radSize = document.getElementsByName("radSize");
	/*
	Notice that we are NOT using getElementById for the radio buttons -- getElementById doesn't work for radio buttons because there is more than one. 
	We need to grab the entire group of radio buttons (remember -- the group is an array). The getElementsByName() function allows us to grab the entire array.

	In the same line of code, we assign the radio button group to a variable. Since the group is an array, the variable instantly becomes an array 
	(just like when we assign a number to a variable, the variable becomes a number var).  Now, radSize is holding the entire radio button array.
	*/

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


	// NEXT: Preparing to validate: clear all previous error msgs.  Keep in mind that it's possible that this isn't the first time 
	// we're running this function. The user may have clicked Place Order before and had errors.  So we have to start with a fresh validation 
	// each time.  Clear out all possible error msgs.
	g_sMsg = "";
	divErrors.innerHTML = "";
	divErrors.style.display = "block";


	/* NEXT: Size
	Did they select a size?  Which one?
	Radio buttons are an array (a list of items).  Just like strings, each item is identified by a zero-based index.
	Using a multiple-choice IF, we find out which radio button they checked (if any), and then continue building our order msg.  
	Remember that ga_radSize[0] refers to the FIRST radio button, ga_radSize[1] refers to the SECOND, etc.

	Notice how we are building an entire HTML string.
	// */
	// if (ga_radSize[0].checked === true) {
	// 	g_sMsg += "<strong>" + txtName.value + " ordered a " + ga_radSize[0].value + " Pizza with:</strong><br>";
	// }
	// else if (ga_radSize[1].checked === true) {
	// 	g_sMsg += "<strong>" + txtName.value + " ordered a " + ga_radSize[1].value + " Pizza with:</strong><br>";
	// }
	// else if (ga_radSize[2].checked === true) {
	// 	g_sMsg += "<strong>" + txtName.value + " ordered a " + ga_radSize[2].value + " Pizza with:</strong><br>";
	// }
	// else if (ga_radSize[3].checked === true) {
	// 	g_sMsg += "<strong>" + txtName.value + " ordered a " + ga_radSize[3].value + " Pizza with:</strong><br>";
	// }
	// else {
	// 	// No size selected
	// 	divErrors.innerHTML = "Select a pizza size";
	// 	return;
	// }


	/* Version 2 - A better way
	Comment out the IF statement above and UNcomment the one below.  Look at the IF statement above and notice how each branch has EXACTLY the same code in it except for the index number of the radio button array.  That's a lot of redundancy.  And as you know by now, redundancy is bad.  Let's use a function to improve upon that. Peruse the IF statement below and when you feel comfortable with it, check out the AddSizeMsg() function.  Then get back to me.
	*/
	
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
	


	/* Version 3 - Here it is using loops
		Almost all the work is being done in the AddSizeMsg() function.  If AddSizeMsg() found a validation error (e.g. no size selected), it returns false.  Otherwise, it returns true.
		The next line of code does two things:
			1) calls AddSizeMsg()
			2) compares the return value of AddSizeMsg() to see if it equals false.
		If it returns false, we display an error msg.
	*/
	
	if (AddSizeMsg() === false) {
		divErrors.innerHTML = "Select a pizza size";
		return;
	}
	

	/*
	ADVANCED ONLY:
	If you're comfortable, you can replace that IF with the following code:
		if (!AddSizeMsg()) {
	The exclamation point that you see just before the function name is the NOT operator.  So essentially we're saying "if NOT AddSizeMsg()" which is exactly the same as saying "if AddSizeMsg() === false".   That's how we would do it in the real world.
	*/


	/*
	Take a look at the AddSizeMsg() function, then meet me back here...
	*/



	/*
	NEXT: Let's see what toppings they chose, if any
	Notice the SEPARATE, INDIVIDUAL IF statements, because (unlike radio buttons), the user can select more than one.  Also, we are not requiring them to select a topping.
	*/
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


	/*
	Question: So, btw, why are we writing our msg to a variable (g_sMsg) instead of writing it directly to divOrder.innerHTML?
	Answer: If we write directly to divOrder.innerHTML, we run into a problem if the user has any errors.  Suppose they check the Delivery checkbox but neglect to put in an address.  We give them an error msg, which is great.  But, we've already written a partial order to the Order div.  Tacky.

	To keep that from happening, we build our string to a variable instead.  If they make it thru without any errors, only then do we write from our global var to divOrder.
	*/



	// Version 2
	// Once again, we have some major redundancy.	Let's simplify the code by calling a function.  Comment out the previous group of IF statements and UNcomment the code below.   Check out the AddToppingMsg() function.  Then get back to me.
	/*
	AddToppingMsg(0);
	AddToppingMsg(1);
	AddToppingMsg(2);
	AddToppingMsg(3);
	AddToppingMsg(4);
	AddToppingMsg(5);
	AddToppingMsg(6);
	AddToppingMsg(7);
	*/



	/* Version 3
		Here it is using loops.  No need to call a function
		This is very similar to the loop in AddSizeMsg(), except that when we find a box that's checked, we DO NOT do a exit the loop because there may be more checkboxes that are checked, i.e. they could select multiple toppings.
	*/
	
	for (var i=0; i <= ga_chkTopping.length - 1; i++) {
		if (ga_chkTopping[i].checked === true) {
			g_sMsg += ga_chkTopping[i].value + "<br>";
		}
	}
	



	/* NEXT:
	if they haven't chosen a smell, display error msg and set focus
	The select dropdown element is an array, just like a group of radio buttons.
	The selectedIndex property of a select dropdown element gives us the index number of which item in that array is currently selected.  The first item has a selectedIndex of 0, the second item has a selectedIndex of 1, etc.
	*/
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


// Version 2
/*
function AddSizeMsg (p_iSizeIndex) {
	// This function takes one parameter - an integer which is the index of a specific radio button item that is checked.  Remember that the first radio button has an index of zero.

	g_sMsg += "<strong>" + txtName.value + " ordered a " + ga_radSize[p_iSizeIndex].value + " Pizza with:</strong><br>";
	// For example, ga_radSize[0].value gives us the html value attribute of the first radio button
}
*/


/* Version 3
  Comment out AddSizeMsg() function code above (Version 2)
  UNcomment out the following function code for Version 3
*/

 function AddSizeMsg () {

	// In this version, we are NOT passing in a parameter to the function
	//	Be sure to study up on loops in our notes before you try to understand what follows.
	//	ga_radSize is an array of radio button objects.  The length property gives us the number of elements in the array.  So we loop thru the array, one radio button at a time looking for a radio button that is checked, i.e. where the checked property is equal to true.
	//	When we find one that's checked, we concatentate to g_sMsg.  Then we return true, which causes us to exit the function immediately and return a value of true to whoever called us.

	for (var i=0; i <= ga_radSize.length - 1; i++) { // loop thru each radio button
		if (ga_radSize[i].checked === true) { // if it's checked...
			g_sMsg += "<strong>" + txtName.value + " ordered a " + ga_radSize[i].value + " Pizza with:</strong><br>";
			return true; // Now get out (returning true means they made a selection)
		}
	}

	// If we get this far, then they didn't select any of the size radio buttons
	return false;  // Now get out (returning false means they did NOT make any selection for size)

} // function AddSizeMsg()



// Version 2 - UNcomment out the following function code for Version 2
// Version 3 - This function is not needed for Version 3 -- Delete it.
/*
function AddToppingMsg (p_iToppingIndex) {
	// This function take one parameter - an integer which is the index of a specific checkbox item.  Remember that the first checkbox has an index of zero.

	// Let's see if this checkbox item is checked
	if (ga_chkTopping[p_iToppingIndex].checked === true) {
		// this one IS checked!  Concatenate the topping value to g_sMsg
		g_sMsg += ga_chkTopping[p_iToppingIndex].value + "<br>";
	}
}
*/
