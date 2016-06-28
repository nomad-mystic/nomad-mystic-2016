<?php

include_once "includes/html_top.php";

// guestbook_view.php Revision 8 11-16-15 6:30 pm

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

// 1. Enter the code to start a session below. This should be one line of code.

session_start();

// 2. Enter the code to insert the login_check.php file here. Use include_once and DO NOT put a folder name in front.

include_once "login_check.php";

// HEADER

// 3. Update the Header information below (all 3 lines).

/*
File Name: guestbook_view.php
Date: 11/27/2015
Programmer: Keith Murphy
*/

// ==========================================================
// VARIABLES
 
include_once "includes/php_header.php";

// 4. Change $programmer_name to your name.

$programmer_name = "Keith Murphy";
$heading = "View Guestbook";

// ==========================================================
// ARRAYS

// -- CREATE ARRAY OF FORM FIELD NAMES SO WE CAN LOOP THROUGH THEM
//    This is an associative array, meaning that each of the variables in the array is given a name.

$form_fields=array();

$form_fields["username"]="text";
$form_fields["comment"]="text";

// ==========================================================
// FUNCTIONS

include_once "includes/cas225_functions.php";

// =======================================
// HTML HEADER 

include_once "includes/html_header.php";

// ======================================
// HEADING

echo "<h1>" . $heading . "</h1>";

// ====================================== 
// CODE FOR THIS PAGE

// CONNECT TO DATABASE (Steps 1 and 2)

include_once "includes/connection.php";

//    After you enter the code above and run the file, you should see:
//    1. Database connection succeeded! 2. Database selection succeeded!

// SQL STATEMENT

$sql="SELECT *"
. " FROM guestbook"
. " ORDER BY guestbook.id;";

// After you enter the code above and run the file, you should see your SQL statement displayed. It
// should look like this: 
//         3. SQL: SELECT * FROM guestbook ORDER BY guestbook.id;
// Notes: The line above is NOT the code you should have entered. It is the *output* when that code runs.
//        You may see errors lower on the page, because that part has not been coded yet.
     
// Display SQL for learning and trouble-shooting
     
echo "<br>2. SQL: " . $sql . "<br>";

// RUN QUERY
try {
     $result = $connection->query($sql);
     echo "3. Query succeeded! " . $result->rowCount() . " rows returned.<br>";
} 
catch (PDOException $e) {
     die("3. Query failed! " . $e->getMessage());
}

// After you enter the code above, when you run the page, you should see something
// like this (the number of rows may be different):
// 4. Query succeeded! 4 rows returned.

// DISPLAY DATA IN TABLE

echo "<table class='shade viewTable'>";
echo "<tr>";
echo "<th>ID</th><th>Username</th><th>Comment</th><th>Date/Time</th>";
echo "</tr>";

// LOOP THROUGH DATA, CREATING ONE ROW FOR EACH RECORD

while($rows = $result->fetch(PDO::FETCH_ASSOC)) {
     // Note: The 2 lines below convert the datetime field in the database to
     // the format we used for displaying dates at the beginning of the class.
     
	 $mydate = $rows['datetime'];
	 $rows['datetime'] = date('m/d/y h:i a', strtotime($mydate));
	
     echo "<tr>";
     
     echo "<td>" . $rows['id'] . "</td>";
     echo "<td>" . $rows['username'] . "</td>";
     echo "<td>" . $rows['comment'] . "</td>";
     echo "<td>" . $rows['datetime'] . "</td>";
     
     echo "</tr>";
}

echo "</table>";

// After you create the code above and run your file, the table with your data should display.

// ===================================================== 
// FOOTER

include_once "includes/footer.php";

// The include will produce this message on this page:
//     5. Database connection closed!

?>