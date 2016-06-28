<?php

include_once "includes/html_top.php";

// logout.php Revision 1 11-26-12 11:45am

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

/* DO NOT enter code to insert the login_check file. We don't care if a person is logged in or not when they request
   to log out. */

// 1. Enter the code to start a session below. This should be one line of code.

session_start();

// 2. Update the Header information below (all 3 lines).

// HEADER

/*
File Name: logout.php
Date: 11/27/2015
Programmer: Keith Murphy
*/

// 3. Enter one line of code below to unset all the session variables. Please use the code shown in Part 1 (Step 3 #4).

$_SESSION = array();

/* 4. Enter the code to destroy the session cookie. There should be 3 lines of code, including the closing
      curly brace (one line of code inside the 'if' block). Please use the code shown in Part 1. */
	        
if (isset($_COOKIE[session_name()])) {

     setcookie(session_name(), "", time() - 4200, "/");

}

// 5. Enter one line of code to destroy the session. Please use the code shown in Part 1.

session_destroy();
      
// Temporary line of code for testing. Comment out this line with // after everything else on this page is working.

//echo "Ready to forward back to login page...";

/* 6. Please DO NOT enter code in this step until the instructions tell you to. Enter one line of code that returns to the login.php page and sends a URL variable 
      named 'logout' with a value of 1 (one). Please use the code shown in Part 1 (Step 3 #4b). */ 

header("Location: login.php?logout=1");
	
/* 7. OPEN your login.php page, and FIND the section labeled '8. The "Successfully logged out" message will go between the php tags below...'. 
   Inside that section, insert an 'if' block that checks to see if the "logout" session variable is set *and* that its value is 1 (one). Please use the
   code shown in Part 1 (Step 3 #4f).
*/



// NOTE: No include files are needed by this page.

?>