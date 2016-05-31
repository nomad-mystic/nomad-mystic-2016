<?php include_once "includes/html_top.php"; ?>

<!-- guestbook_delete_action.php Revision 7 11-3-15 11:30 pm -->

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
File Name: guestbook_delete.action.php
Date: 11/09/2015
Programmer: Keith Murphy
*/

// ==========================================================
// VARIABLES
 
include_once "includes/php_header.php";

// 2. Change $programmer_name to your name.

$programmer_name = "Keith Murphy";
$heading = "Guest Book Delete Action Page";

// ==========================================================
// ARRAYS

// -- CREATE ARRAY OF FORM FIELD NAMES SO WE CAN LOOP THROUGH THEM
//    This is an associative array, meaning that each of the variables in the array is given a name.
//    This array is used in Step 5 below.

$form_fields=array();

$form_fields["id"]="select";

// ==========================================================
// FUNCTIONS

include_once "includes/cas225_functions.php";

// ======================================= <!-- ======================================= -->
// HTML HEADER 

include_once "includes/html_top.php";
include_once "includes/html_header.php";

// ======================================
// HEADING

echo "<h1>" . $heading . "</h1>";

// ====================================== 
// CODE FOR THIS PAGE

// -- CHECK EACH FIELD FOR MISSING DATA AND SANITIZE

// Check if data submitted
// 3. When you run this page, you should see the record you selected
//    and the text you entered in
//    the box in this format:
//    Array ( [id] => __ [Submit] => Submit ) 
//    Put comment tags // in front of the 2 lines below
//   when you have the rest of the page working.

print_r($_POST);
echo "<br><br>";

// 4. NOTICE the new line below. This is checking to see
// if this page was submitted to itself, or if we
//    came from the guestbook_delete form.
// If the page was submitted to itself, the
// checkbox named confirm_delete
//    will have a value. We only want to run
// the code below if it does *not* have a value.

if(!isset($_POST["confirm_delete"])) {  // Run only if coming from the current page

// 5. Enter a foreach loop here to run the check_submitted() and sanitize() functions on every field that was submitted.
//    HINT: This is 4 lines of code (including the ending curly brace). 
//          It is the same as in the guestbook_add_action file, Step 4.

     foreach ($form_fields as $key => $value) {

          check_submitted($key, $value, $missing_count);

          sanitize($key, $value, $_POST[$key]);

     }

    // exit if missing data in any but checkboxes
	
    if($missing_count > 0) {
         echo "<br />Please <a href='guestbook_delete.php'>Go Back</a> and fill in the missing data.<br /><br /></div></body></html>";
         exit;
    }
	
    // ASSIGN DATA TO VARIABLES FOR EASIER HANDLING
    $id = $_POST['id'];
	
    // CONNECT TO DATABASE (Step 1)
	
    // 6. Insert an include for connection.php, using include_once.

     include_once "includes/connection.php";

    // SQL STATEMENT: Find record that is about to be deleted
	
    // 7. Create an SQL statement that selects all of the records from the guestbook table
    //    where guestbook.id=$id .
    //    HINT: See Part 1, Step 3, c, i. for how to create an SQL statement like this.
    //    BE CAREFUL! If $id is a string, it will have single quotes around it. If it is a number, it will *not* have quotes.
    //    You will need to look at your data and determine if the ID is a string or a number.
	
     $sql = "SELECT *"
          . " FROM guestbook;"
          . " WHERE guestbook.id = $id;";



		
    // Display SQL for learning and trouble-shooting
		
    echo "<br>2. SQL: " . $sql . "<br>";
	
    // RUN QUERY

    // 8. Enter a statement here that runs the $sql query and assigns it to $result. 
    //    Use a try...catch block to catch any errors and report how many rows are returned
    //    if the query is successful, or the generated error message if it is not.
    //    HINT: See 'Step 2, d. Running the Query' in Part 1 for the code I would like you to use.
    //    There should be 8 lines of code, including the comment at the top and the curly braces.

     try {
          $result = $connection->query($sql);
          echo "3. Query succeeded! " . $result->rowCount() . " row";

     } catch (PDOException $e) {
          die("3. Query failed! " . $e->getMessage());

     }


// 8a. RUN your page, and be sure that you see the message 3. Query succeeded! 1 rows returned.
	
// GET DATA FOR RECORD THEY SELECTED
// Assign array elements to variables for easier handling

while($rows = $result->fetch(PDO::FETCH_ASSOC)) {
	
         // 9. Assign the "id" element of the $rows array to $id.
	
	     $id = $rows["id"]; // I did this one for you. You can pattern the next two after this one.
	
         // 10. Assign the "username" element of the $rows array to $username.
	
          $username = $rows["username"];
	
	     // 11. Assign the "comment" element of the $rows array to $comment.
	
          $comment = $rows["comment"];

          } 
	
     // WARN THE USER 
     
     // Temporary code to prevent errors while coding this page (comment this out // when your page works):
     $x = "---";

     echo "<p style='color:red;'>You are about to delete the following data:</p>";
     
     // 12. Put the appropriate variables from steps 9-11 above into the statements below (replace $x with the appropriate variable).

     echo "ID: " .  $id  . "<br />";
     echo "Username: " .  $username  . "<br />";
     echo "Comment: " .  $comment  . "<br />";
   

    
    // 13. At this point, run your page and be sure that the ID, Username and Comment for the field you are about to delete is displayed. If
    //     the page doesn't run, start with the guestbook_delete.php page again, choose a record, and submit it.

     // Ask the user to confirm that they want to delete this record
     // Notice that all of the code for this form is in PHP.
     echo "<form method='post' action='guestbook_delete_action.php'>"; // Submitting to this same page again
     echo "<br />Are you SURE you want to delete this record (Y/N)? ";
     
     // Display select box with 2 options
     echo "<select name='confirm_delete'>";
     echo "<option value='N'>N</option>";
     echo "<option value='Y'>Y</option>";
     echo "</select>";
     
     echo "<input type='hidden' name='id' value='$id'>"; // Send id back to the page when we submit it

     echo "<input type='submit' value='Submit'>";

     echo "</form>";
     echo "<br />";

     echo "<a href='guestbook_delete.php'>Return to Delete Form</a>";

     exit;

} // END IF BLOCK $_POST["id"] (started in step 4)

// 14. AT THIS POINT, YOUR CODE SHOULD RUN UP TO THE POINT OF ANSWERING "Y" OR "N". Answer that question with "Y" and submit the page. It should
// submit back to the same page, and you should see this displayed:
//     Array ( [confirm_delete] => Y [id] => __)
// If you don't see that information, go back and fix the code above before you continue.

// PROCESS DELETE IF "Y" CHOSEN (only runs after this page has been submitted back to itself)

if ($_POST["confirm_delete"] == "Y") {
	
	// CONNECT TO DATABASE (Steps 1 and 2)
	
	// 15. Insert an include for connection.php, using include_once.
	
     include_once "includes/connection.php";
	
	// ASSIGN SUBMITTED ID TO A VARIABLE FOR EASIER HANDLING
	
	$id = $_POST["id"];
	
	// SQL STATEMENT
	
	/* 16. Create an SQL statement that deletes all of the records
          from the guestbook table where id=$id and a limit of 1 record .
          HINT: This will be 4 lines of code. See the second DELETE example
          in Part 1 of this assignment, Step 2. Perform Database Query,
          c, iii which uses LIMIT ONE.
          Even though our query only deletes one record, putting a limit
          of 1 record here protects us from accidentally deleting all
          of our records if we make a mistake in the SQL. */
	
          $sql = "DELETE"
               . " FROM guestbook;"
               . " WHERE guestbook.id = $id;"
               . " LIMIT 1;";


     // Display SQL for learning and trouble-shooting
		
	echo "<br>3. SQL: " . $sql . "<br>";
	
		// RUN QUERY

    // 17. Enter a statement here that runs the $sql query and assigns it to $result. 
    //    Use a try...catch block to catch any errors and report how many rows are returned
    //    if the query is successful, or the generated error message if it is not.
    //    HINT: See 'Step 2, d. Running the Query' in Part 1 for the code I would like you to use.
    //    There should be 8 lines of code, including the comment at the top and the curly braces.

     try {
          $result = $connection->query($sql);
          echo "3. Query succeeded! The record was deleted.<br>";

     } catch (PDOException $e) {
          die("3. Query failed! " . $e->getMessage());

     }


    // 18. CHANGE The message in the 'try' block above 
    // from 3. Query succeeded! ... rows returned.<br> to 3. Query succeeded! The record was deleted.<br>
		 
    // link to view guestbook page
    echo "<p><a href='guestbook_view.php'>View guestbook</a></p>";
	
} // END IF BLOCK $_POST["confirm_delete"]...
	
     
else { // If they got this far, they submitted this page and chose "N" -- they do *not* want to delete.

	echo "<p style='color:red;'>Action canceled.</p>";
	
	echo "<p><a href='guestbook_delete.php'>Return to Delete Form</a></p>";

}

    // 19. RUN the page again, and this time choose "N" when you are asked if you want to delete the record. Confirm
    // that you get the "Action canceled" message and a link to return to the Delete Form. Note: You may need to start
    // with the guestbook_delete.php page, choose a record, and submit it first.

// ===================================================== 
// FOOTER -->

include_once "includes/footer.php";

?>