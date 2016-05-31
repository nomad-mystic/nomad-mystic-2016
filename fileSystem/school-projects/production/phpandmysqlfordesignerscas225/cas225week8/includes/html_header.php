<?php

// html_header.php Revision 7 11-20-13 11:45am

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

// HEADER

// 1. Update the Header information below (all 3 lines).
// NOTE: There are 2 more steps below this one. They are indented a bit from the left side of the page. 

/*
File Name: html_header.php
Date: 11/27/2015
Programmer: Keith Murphy
*/

?>

<!-- Note: Top 4 HTML tags were moved to html_top.php -->

<title><?php echo $heading; ?></title>

<link rel = "stylesheet" href = "<?php echo $styles_path . '/' . $styles_page; ?>"> 
<link rel = "stylesheet" href = "<?php echo $styles_path . '/' . $styles_2_page; ?>"> 

</head>

<body>

<?php

// Display header information if the file name does not contain the word 'login'.
// $_SERVER["SCRIPT_NAME"] is complete path. basename() pulls out file name from the path.
$file_name = basename($_SERVER["SCRIPT_NAME"]); 

// strpos() returns the location where the word is found. A value of false means that the word was not found. Note that false
// is a Boolean variable, which can have a value of only true or false. It is not a string, so it is not enclosed in quote marks.
// This if statement runs the code only if the word "login" is not in the file name and the "loggedin" variable is set.

if ((strpos($file_name, "login") == false) && isset($_SESSION["loggedin"])){

	echo "<div class = 'shade'>";
	
	echo "<br />";
	
     /* 2. REPLACE the first line of code below with the code that shows the actual username and permissions, using
     variable substitution. Use the code shown in Part 1 of the assignment (Step 4 #3). */
	
    echo "Logged in as: <strong>{$_SESSION["username"]} ({$_SESSION["permissions"]})</strong>";
	
	echo "<p>";
	
	// ====================================== 
	// NAVIGATION BAR
	
	echo "<a href= '{$link_1_page}'> {$link_1_text} </a> | "; 
	echo "<a href= '{$link_2_page}'> {$link_2_text} </a> | "; 
	echo "<a href= '{$link_3_page}'> {$link_3_text} </a> | "; 
	
	/* 3. REPLACE the first line of code below with an 'if' block below that displays the link to the 4th page *only* if the user 
	      has "admin" permissions. Use the code shown in Part 1 of the assignment (Step 4 #6). */

	if ($_SESSION["permissions"] == "admin") {

	     echo "<a href= '{$link_4_page}'> {$link_4_text} </a> | ";

	}

	echo "<a href= '{$link_5_page}'> {$link_5_text} </a>"; 
	
	echo "</p>";
	
	echo "</div>";
	
}

?>