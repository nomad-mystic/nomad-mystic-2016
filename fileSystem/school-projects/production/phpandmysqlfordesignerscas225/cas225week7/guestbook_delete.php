<?php include_once "includes/html_top.php"; ?>

<!-- guestbook_delete.php Revision 7 11-3-15 11:30 pm -->

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
File Name: guestbook_delete.php
Date: 11/09/2015
Programmer: Keith Murphy
*/

// ==========================================================
// VARIABLES
 
include_once "includes/php_header.php";

// 2. Change $programmer_name to your name.

$programmer_name = "Keith Murphy";
$heading = "Guestbook Delete Page";

// ======================================= 
// FUNCTIONS

include_once "includes/cas225_functions.php";

// ======================================= 
// HTML HEADER 

include_once "includes/html_top.php";
include_once "includes/html_header.php";

// ====================================== 
// HEADING 

echo "<h1>" . $heading . "</h1>"; 

// ====================================== 
// GET DATA FOR SELECT BOX

// CONNECT TO DATABASE (Steps 1 and 2)

// 3. Insert an include for connection.php, using include_once.

include_once "includes/connection.php";

// SQL STATEMENT

/* 4. Create an SQL statement that selects all of the records
     from the guestbook table and orders the results by id.
     Assign the results to $sql. HINT: This is the same SELECT
     query you used in the guestbook_view.php file. */
$sql = "SELECT *"
     . " FROM guestbook;"
     . " OREDERBY guestbook.id;";


// Display SQL for learning and trouble-shooting
     
echo "<br>2. SQL: " . $sql . "<br>";

// RUN QUERY

// 5. Enter a statement here that runs the $sql query and assigns it to $result. 
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


// ====================================== 
// FORM TO SELECT A RECORD TO DELETE

// 6. Notice that we are using PHP to create the form this time. This is an alternative to using HTML.

// 7. Add 'method' and 'action' attributes to the form tag below so that the form will submit to
//    guestbook_delete_action.php . If you need a reminder on how to do this, see how we did it in the
//    guestbook_add.php page.
//    BE CAREFUL! The code below is inside of double quotes, so the code you add inside it must use single quotes.

echo "\n" . "<form id='form1' name='form1' method='POST' action='guestbook_delete_action.php'>" . "\n";

echo "\n" . "<table class='viewTable shade'>" . "\n";
echo "    <tr class='addRecord'>" . "\n";
echo "        <td class='col1'>Choose a record to delete:</td>" . "\n";
echo "    </tr>" . "\n";

echo "    <tr class='addRecord'>" . "\n";
echo "        <td class='col1'>" . "\n";

// CALL FUNCTION TO CREATE DYNAMIC MULTI-SELECT BOX

// 8. Assign "id" to $field_name1 .
// HINT: For a reminder on how assignment statements work, see my hint in the guestbook_add.php file (Step 7)
// and the examples in Part 1, Step 2: Dynamic Select Boxes, 9.

$field_name1 = "id";

// 9. Assign "username" to $field_name2 .

$field_name2 = "username";

// 10. Assign "comment" to $field_name3 .

$field_name3 = "comment";

/* 11. Call the multi_select_box function. Pass the following 4 variables: $field_name1, $field_name2, $field_name3, 
and $result. Assign the returned value of the function to $list. 
HINT: See Part 1, Step 2: Dynamic Select Boxes, 9. This should be only one line of code, starting with $list. */

$list = multi_select_box($field_name1, $field_name2, $field_name3, $result);

// 12. RUN the page. You should see your three statements saying that the connection succeeded, the SQL statement, and that the Query succeeded.
// Below that you should see the multi-select box. SELECT a record, then click Submit. The page should submit to guestbook_delete_action.php .
// You should then see a message similar to this: Array ( [id] => __ [Submit] => Submit ) 
// Note: There will be a series of error messages below that, because you have not coded the page yet. We will do that next.

echo "$list";

echo "        </td>" . "\n";
echo "    </tr>" . "\n";

echo "    <tr class='addRecord'>" . "\n";

echo "        <td class='col1'><input type='submit' name='Submit' value='Submit' />" . "\n" . "        </td>" . "\n";

echo "    </tr>" . "\n";

echo "</table>" . "\n";

echo "\n" . "</form>" . "\n";

// The JavaScript code below will highlight the first element in the form.
echo "<script>document.getElementById('form1').elements[0].focus();</script>"; 

// ===================================================== 
// FOOTER 

include_once "includes/footer.php";

?>