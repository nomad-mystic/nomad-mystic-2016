<?php include_once "includes/html_top.php"; ?>

<!-- guestbook_add_action.php Revision 7 11-3-15 11:30 pm -->

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
File Name: guestbook_add_action.php
Date: 11/09/2015
Programmer: Keith Murphy
*/

// ==========================================================
// VARIABLES
 
include_once "includes/php_header.php";

// 2. Change $programmer_name to your name.

$programmer_name = "Keith Murphy";
$heading = "Guest Book Add Action Page";

// ==========================================================
// ARRAYS

// -- CREATE ARRAY OF FORM FIELD NAMES SO WE CAN LOOP THROUGH THEM
//    This is an associative array, meaning that each of the variables in the array is given a name.
//    This array is used in the loop in Step 4 below.

$form_fields=array();

$form_fields["username"]="select";
$form_fields["comment"]="textarea";

// ==========================================================
// FUNCTIONS

include_once "includes/cas225_functions.php";

// ======================================= <!-- ======================================= -->
// HTML HEADER 


include_once "includes/html_header.php";

// ======================================

echo "<h1>" . $heading . "</h1>";

// ====================================== 
// CODE FOR THIS PAGE

// -- CHECK EACH FIELD FOR MISSING DATA AND SANITIZE

// Check if data submitted

// 3. When you run this page, you should see the username you selected and the text you entered in
//    the box in this format:
//    Array ( [username] => ______ [comment] => ___________ [Submit] => Submit ) 
//    Put comment tags // in front of the 2 lines below when you have the rest of the page working.

//print_r($_POST);
//echo "<br><br>";

// 4. LOOK CAREFULLY at the code below. It is the same code we used in Assignment 4, but I put it in a loop so it would be shorter.
// The statement $form_fields as $key => value loops through the list
// of form fields in the $form_fields array, and pulls out the key
// (name of field) and field type from each of them.
// This way we only have to call each of our functions once!

foreach ($form_fields as $key => $value) { // Loop through form fields. Key is the name of the field, value is type of field

     check_submitted($key, $value, $missing_count);

     sanitize($key, $value, $_POST[$key]); // ESPECIALLY IMPORTANT NOW THAT WE ARE INSERTING INTO A DATABASE
     
}

// exit if missing data in any but checkboxes

if($missing_count > 0) {

     echo "<br />Please <a href='guestbook_add.php'>Go Back</a> and fill in the missing data.<br /><br /></div></body></html>";
     exit;

}

// ASSIGN DATA TO VARIABLES FOR EASIER HANDLING
$username = $_POST["username"];
$comment = $_POST["comment"];

// CONNECT TO DATABASE (Step 1)

// 5. Insert an include for connection.php, using include_once.

include_once "includes/connection.php";

// SQL STATEMENT

/* 6. Create an SQL INSERT statement that inserts *username* and *comment*
     into the *guestbook* table. Assign the
     results to $sql. Note: The stars above are just for
     emphasis. Do not type them.
     HINT: This is an INSERT query, NOT a SELECT query.
     The code should be on 2 lines. See 'Step 2:
     Perform Database Query', c, ii in Part 1 of this
     assignment for the required format of an INSERT query
     with 2 fields to be inserted.
     BE CAREFUL with quote marks -- any quotes inside an SQL
     statement must be single quotes, and quote marks
     are used only in the VALUES section of the query. */

$sql = "INSERT INTO guestbook(username, comment)"
     . " VALUES('$username', '$comment');";

     
// Display SQL for learning and trouble-shooting
     
echo "<br>2. SQL: " . $sql . "<br>";

// RUN QUERY
   
// 7. Enter a statement here that runs the $sql query and assigns it to $result. 
//    Use a try...catch block to catch any errors and report how many rows are returned
//    if the query is successful, or the generated error message if it is not.
//    HINT: See 'Step 2, d. Running the Query' in Part 1 for the code I would like you to use.
//    There should be 8 lines of code, including the comment at the top and the curly braces.

try {
     $result = $connection->query($sql);
     echo "Query succeeded! The new record was added.<br>" . $result->rowCount() . " row";

} catch (PDOException $e) {
     die("3. Query failed! " . $e->getMessage());

}

// 8. CHANGE The message in the 'try' block above
// from 3. Query succeeded! ... rows returned.<br> to 3. Query succeeded! The new record was added.<br>

// link to view guestbook page
echo "<p><a href='guestbook_view.php'>View guestbook</a></p>";

// 9. RUN your page BUT...you need to start with the guestbook_add.php page. Fill out that page and submit it. If all goes
// well, you will see a message that a record was added, and a link to view the guestbook.

// =====================================================
// FOOTER 

include_once "includes/footer.php";

?>