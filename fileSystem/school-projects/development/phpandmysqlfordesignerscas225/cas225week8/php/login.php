<?php

include_once "includes/html_top.php";

// login.php Revision 1 11-26-12 11:45am

/* Requirements:
a) Please do not remove any of my comments in this code. I need them for grading.
b) Type code for only one step at a time, then run it in your browser to test it before moving to the next step. 
Some of the code will not display any output, but you still need to test it to be sure there are no error messages. 
Trouble-shooting is very difficult if many steps are entered at once. Do not ask me for help with your code if you are 
not testing one step at a time!
*/

/* ==========================================================================================================
PLEASE DO NOT ATTEMPT TO WORK THROUGH THIS FILE WITHOUT FOLLOWING MY INSTRUCTIONS IN ASSIGNMENT 8, PART 2.
I HAVE A SPECIFIC SERIES OF STEPS I WOULD LIKE YOU TO FOLLOW.
========================================================================================================== */

/* 1. Enter the code to start a session below. This should be one line of code (see Part 1, Step 2).
      Note: This line is used for testing. It will need to be commented out // after you create the logout.php page or the logout will not work. */

session_start();

// WARNING: DO NOT use login_check on this page. This page needs to run *before* a person is logged in.

// HEADER

// 2. Update the Header information below (all 3 lines).

/*
File Name: login.php
Date: 11/27/2015
Programmer: Keith Murphy
*/

// VARIABLES

// 3. Insert your php_header.php include file here. Use include_once, and remember the file is in the 'includes' subfolder.

include_once "includes/php_header.php";

// 4. Change the programmer_name to your name.

$programmer_name = "Keith Murphy";

// 5. Assign "Login Form" to $heading.

$heading = "login Form";

?>

<!-- ======================================= -->
<!-- HTML HEADER -->

<?php

// 6. Insert your html_header.php include file here. Use include_once, and remember the file is in the 'includes' subfolder.

include_once "includes/html_header.php";

?>

<!-- ====================================== -->

<!-- CONTENT -->

<h1><?php echo $heading; ?></h1>
<h2><?php echo $programmer_name; ?></h2>

<?php  // Opening PHP tag - do not delete or comment out

/* 7. The 5 lines below are used for testing your page without the form. When you get to the step where you are 
      testing the form, put comment tags // in front of these 5 lines so they will not run. */

//$_SESSION["loggedin"] = true;
//$_SESSION["username"] = "student";
//$_SESSION["permissions"] = "admin";
//echo "Session variables set!";
//exit;

/* 8. The "Successfully logged out" message will go before the ending PHP tag below. It will be 3 lines of code. 
      Please DO NOT ENTER CODE HERE until you reach the place in Assignment 8 Part 2 where I ask you to 
      create it. */


if (isset($_GET["logout"]) && $_GET["logout"] == 1) {

     echo "<em>Successfully logged out.</em>";

}

?>

<!-- 9. Add 'method' and 'action' attributes to the form tag below. This page submits to "login2.php". -->

<form style="text-align:center;" id="form1" method="POST" action="login2.php">

<p>Username: <input type="text" name="username"></p>

<!-- 10. Add a 'type' attribute to the input tag below and set it to "password". -->

<p>Password: <input name="password" type="password"></p>

<input type="submit" value="Log in"><br />

</form>

<!-- This JavaScript puts the cursor in the first element on the form -->
<script>document.getElementById('form1').elements[0].focus();</script>

</body>

</html>

<?php

// 11. Insert your footer.php include file here. Use include_once, and remember the file is in the 'includes' subfolder.



?>