<!-- connection.php Revision 7 11-3-15 11:30 pm -->

<!-- Requirements:
a) Please do not remove any of my comments in this code. I need them for grading.
b) Type code for only one step at a time, then run it in your browser to test it before moving to the next step. 
Some of the code will not display any output, but you still need to test it to be sure there are no error messages. 
Trouble-shooting is very difficult if many steps are entered at once. Do not ask me for help with your code if you are 
not testing one step at a time!
-->

<!-- ==========================================================================================================
PLEASE DO NOT ATTEMPT TO WORK THROUGH THIS FILE WITHOUT FOLLOWING MY INSTRUCTIONS IN ASSIGNMENT 7, PART 2.
I HAVE A SPECIFIC SERIES OF STEPS I WOULD LIKE YOU TO FOLLOW.
========================================================================================================== -->

<?php

// HEADER

// 1. Update the Header information below (all 3 lines).

/*
File Name: connection.php
Date: 11/07/2015
Programmer: Keith Murphy
*/

// Define constants for database connections

/* 2. Define the constants DB_DSN, DB_USER and DB_PASS, and assign them the values for this class. 
HINT: See Part 1, Step 1: Create a Database connection. There will be 4 lines of code, including the comment at the top. */

define("DB_DSN", "mysql:host=localhost;dbname=cas225;charset=utf8");
define("DB_USER", "root");
define("DB_PASS", "");

// Create a database connection

/* 3. Create the connection using a try...catch block, and assign the connection to $connection. Display messages if the connection succeeded or failed.
HINT: See Part 1, Step 1: Create a Database connection for the code I want you to use. There will be 12 lines of code, including 4 comment lines and the 
curly braces. */

try {
     $connection = new PDO(DB_DSN, DB_USER, DB_PASS);
     $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     echo "1. Database connection succeeded!";

} catch (PDOException $e){
     die("1. Database connection failed: " . $e->getMessage());

}

?>