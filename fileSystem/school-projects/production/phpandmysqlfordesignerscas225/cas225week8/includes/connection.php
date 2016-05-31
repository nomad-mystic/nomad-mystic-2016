<!-- connection.php Revision 4 11-16-15 6:30 pm -->

<!-- Requirements:
a) Please do not remove any of my comments in this code. I need them for grading.
b) Type code for only one step at a time, then run it in your browser to test it before moving to the next step. 
Some of the code will not display any output, but you still need to test it to be sure there are no error messages. 
Trouble-shooting is very difficult if many steps are entered at once. Do not ask me for help with your code if you are 
not testing one step at a time!
-->

<!-- ==========================================================================================================
PLEASE DO NOT ATTEMPT TO WORK THROUGH THIS FILE WITHOUT FOLLOWING MY INSTRUCTIONS IN ASSIGNMENT 8, PART 3.
I HAVE A SPECIFIC SERIES OF STEPS I WOULD LIKE YOU TO FOLLOW.
========================================================================================================== -->

<?php

// HEADER

/* 1. Update the Header information below (all 3 lines). This is the only thing you need to do in this
file for Part 2. */

/*
File Name: connection.php
Date: 11/27/2015
Programmer: Keith Murphy
/* 

/* 2. Do not change anything in this section for Part 2. In Part 3 of the assignment, you will need to 
change the values assigned to DB_USER, DB_PASS and DB_NAME. Please wait until you get to that step
(Steps 15 and 16 in Part 3) before you change these values. */

// Define constants for database connections

define("DB_DSN", "mysql:host=localhost;dbname=company10;charset=utf8");
define("DB_USER", "keith.murphy1");
define("DB_PASS", "1387");

// Create a database connection

try {
     // 1. Create a database connection
     $connection = new PDO(DB_DSN,DB_USER,DB_PASS);
     // Turn on display of errors (exceptions) so we can see problems if they occur
     $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     // Display message on successful connection
     echo "1. Database connection succeeded!";
} 
catch (PDOException $e) {
     die("1. Database connection failed: " . $e->getMessage());
}

?>