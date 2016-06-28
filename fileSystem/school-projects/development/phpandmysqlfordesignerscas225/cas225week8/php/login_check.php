<?php

include_once "includes/html_top.php";

// login_check.php Revision 8 12-2-13 10:30am

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

// 1. Update the Header information below (all 3 lines).

// HEADER

/*
File Name: login_check.php
Date: 11/27/2015
Programmer: Keith Murphy
*/

// ==========================================================
// VARIABLES

$heading = ""; // no heading on this page, but we need to set a default value so there won't be an error when running php_header.php

// 2. Insert your php_header.php include file here. Use include_once, and remember that this file is in the 'includes' subfolder.

include_once "includes/php_header.php";

// =======================================
// -- HTML HEADER -->

// 3. Insert your html_header.php include file here. Use include_once, and remember that this file is in the 'includes' subfolder.

include_once "includes/html_header.php";

// ======================================

/* Check if a person is not logged in, or if the "loggedin" variable is set, but not set to true (can happen if a person
   logs out and then someone logs in again from the same computer). */
   
/* 4. Insert a line of code that checks if a person is not logged in (the "loggedin" session variable does not exist) or the "loggedin" session variable 
exists, but is not equal to true. End this line with an opening curly brace. Use the code shown in Part 1 of the assignment (Step 3 #3), and remember there are no 
quote marks around the word *true* (it is a Boolean value). */

if (!isset($_SESSION['loggedin']) || $_SESSION["loggedin"] != true) {

     /* 5. Display a message that a person needs to log in before they can access the content, and a link to the login page.
     This is only one line of code. Use the format shown in Part 1 (Step 3 #3) of the assignment. */

     echo "<p id='login'>You Need to <a href='login.php'>log in</a> before you can access this content.</p>";

     // 6. Insert a line of code that exits the page (only one word is required).

     exit;

// 7. Enter a closing curly brace below, to close the 'if' block that you started in Step 4 above.

}


/* 8. After you complete this page, you will need to be sure this file is included in every one of the pages in the 'week8' 
      folder EXCEPT login.php and login2.php (those pages won't work if people have to be logged in first). 
      You will see a numbered item in each of those files for this step. Note that he include for this is placed at the
      top of each file, *after* the code that starts the session. The reason for this placement is that we don't 
      want to run any other code if the user is not logged in. */

?>