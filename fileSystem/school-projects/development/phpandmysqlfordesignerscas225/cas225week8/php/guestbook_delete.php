<?php

include_once "includes/html_top.php";

// guestbook_delete.php Revision 8 11-16-15 6:30 pm

/* Requirements:
a) Please do not remove any of my comments in this code. I need them for grading.
b) Type code for only one step at a time, then run it in your browser to test it before moving to the next step. 
Some of the code will not display any output, but you still need to test it to be sure there are no error messages. 
Trouble-shooting is very difficult if many steps are entered at once.
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
File Name: guestbook_delete.php
Date: 11/27/2015
Programmer: Keith Murphy
*/

// ==========================================================
// VARIABLES
 
include_once "includes/php_header.php";

// 4. Change $programmer_name to your name.

$programmer_name = "Keith Murphy";
$heading = "Guestbook Delete Page";

// ======================================= 
// FUNCTIONS

include_once "includes/cas225_functions.php";

// ======================================= 
// HTML HEADER 

include_once "includes/html_header.php";

// ====================================== 
// HEADING 

echo "<h1>" . $heading . "</h1>"; 

// ====================================== 
// GET DATA FOR SELECT BOX

// CONNECT TO DATABASE (Steps 1 and 2)

include_once "includes/connection.php";

// SQL STATEMENT

$sql="SELECT *"
. " FROM guestbook"
. " ORDER BY guestbook.id;";

     
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

// ====================================== 
// FORM TO SELECT A RECORD TO DELETE

// Notice that we are using PHP to create the form this time. This is an alternative to using HTML.

echo "<form id='form1' name='form1' method='post' action='guestbook_delete_action.php'>";

echo "<table class='viewTable shade'>";
echo "<tr class='addRecord'>";
echo "<td class='col1'>Choose a record to delete:</td>";
echo "</tr>";

echo "<tr class='addRecord'>";
echo "<td class='col1'>";

// CALL FUNCTION TO CREATE DYNAMIC MULTI-SELECT BOX

$field_name1 = "id";

$field_name2 = "username";

$field_name3 = "comment";

$list = multi_select_box($field_name1, $field_name2, $field_name3, $result);

echo "$list";

echo "</td>";
echo "</tr>";

echo "<tr class='addRecord'>";

echo "<td class='col1'><input type='submit' name='Submit' value='Submit' /></td>";

echo "</tr>";

echo "</table>";

echo "</form>";

// The JavaScript code below will highlight the first element in the form.
echo "<script>document.getElementById('form1').elements[0].focus();</script>"; 

// ===================================================== 
// FOOTER 

include_once "includes/footer.php";

?>