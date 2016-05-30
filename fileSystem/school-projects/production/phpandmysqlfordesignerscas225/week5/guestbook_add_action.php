<?php

/* guestbook_add_action.php Starter file Revision 6 10-21-15 10:00 am

Requirements:
a) Please do not remove any of my comments in this code. I need them for grading.
b) Type code for only one step at a time, then run it in your browser to test it before moving to the next step.
Some of the code will not display any output, but you still need to test it to be sure there are no error messages.
Trouble-shooting is very difficult if many steps are entered at once. Do not ask me for help with your code if you are
not testing one step at a time!

==========================================================================================================
PLEASE DO NOT ATTEMPT TO WORK THROUGH THIS FILE WITHOUT FOLLOWING MY INSTRUCTIONS IN ASSIGNMENT 5, PART 2.
I HAVE A SPECIFIC SERIES OF STEPS I WOULD LIKE YOU TO FOLLOW.
==========================================================================================================

*/

// HEADER

// 1. Update the Header information below (all 3 lines).

/*
File Name: guestbook_add_action.php
Date: 10/09/2015
Programmer: Keith Murphy
*/

// ==========================================================
// VARIABLES

include_once "includes/php_header.php";

$styles_page = "home.css";
$heading = "Contact Us";
$missing_count = 0;

// ==========================================================
// FUNCTIONS

include_once "includes/cas225_functions.php";

// =======================================
// HTML HEADER ?>

<?php include_once "includes/html_header.php" ?>

<!-- ====================================== -->

<!-- The line below is a class that I created to mimic the action of the 'blockquote' tag in HTML, which is now deprecated. -->
<div class="blockquote">

<?php

// FUNCTION CALLS

// -- CHECK EACH FIELD FOR MISSING DATA

check_submitted("name", "text", $missing_count);

check_submitted("email", "text", $missing_count);

check_submitted("comment", "textarea", $missing_count);

check_submitted("mail", "checkbox", $missing_count);

// 4a. Enter your function call for count_errors below this comment. There should be only one line of code.

count_errors($missing_count);

// Below this point is your our old code for checking for missing data.
// Notice that you had more code, and it did less -- it didn't track how many fields were missing.
// Once you create the functions and call them, please delete the $counter line and the 'if' blocks in this section.

// -- SANITIZE FIELDS (REMOVE DANGEROUS CHARACTERS) -- text boxes and textarea only

sanitize("name", "text", $_POST["name"]);

sanitize("email", "text", $_POST["email"]);

sanitize("comment", "textarea", $_POST["comment"]);

// Below this point is your our old code for checking for sanitizing the data.
// Notice that you had a lot more code, and it did less -- we didn't escape quote marks in the previous version.
// Once you create the functions and call them, please delete the old code in this section.

// -- DISPLAY OUTPUT

echo "<h3><i>You submitted the following information:</i></h3>";
echo "<div id='formData'>";

display_data("name", "text", $_POST["name"]);

display_data("email", "text", $_POST["email"]);

display_data("comment", "textarea", $_POST["comment"]);

display_data("mail", "checkbox", $_POST["mail"]);

echo "</div>"; // close #formData

?>

<br><br><a href="guestbook_add.php">Return to Form</a>

</div>

<hr />

<!-- ===================================================== -->
<!-- FOOTER -->

<?php include_once "includes/footer.php"; ?>
