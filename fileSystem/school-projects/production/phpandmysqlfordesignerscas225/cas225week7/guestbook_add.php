<?php include_once "includes/html_top.php"; ?>

<!-- guestbook-add.php Revision 7 11-3-15 11:30 pm -->

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
File Name: guestbook_add.php
Date: 11/09/2015
Programmer: Keith Murphy
*/

// ==========================================================
// VARIABLES

include_once "includes/php_header.php";

// 2. Change $programmer_name to your name.

$programmer_name = "Keith Murphy";
$heading = "Add Entry to Guest Book";

// ====================================== 
// FUNCTIONS

include_once "includes/cas225_functions.php";

// ======================================= 
// HTML HEADER

include_once "includes/html_top.php";
include_once "includes/html_header.php";

// ====================================== 
// HEADING

echo "<h1>" . $heading . "</h1>";

?>

<!-- ====================================== -->
<!-- CODE FOR THIS PAGE -->

<?php

// CONNECT TO DATABASE (STEP 1)

// 3. Insert an include for connection.php, using include_once.

include_once "includes/connection.php";

// SQL STATEMENT

/* 4. Create an SQL statement that selects username from the
     users table and orders the results by users.username. Assign the
     results to $sql. HINTS: The code should be on 3 lines.
     See 'Step 2: Perform Database Query',
     c, i. SELECT EXAMPLES  in Part 1 of this assignment for the
     format I would like you to use. */

$sql = "SELECT username"
     . " FROM users;"
     . " ORDERBY users.username;";



// After you enter the code above and run the file,
// you should see your SQL statement displayed.
// Be sure it looks correct before you continue.
// Note: You will see errors lower on the page
// until you complete Step 5 below.
     
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

// 6. RUN your file and make sure that '4. Query succeeded! __ rows returned' appears on your screen before you continue.

?>
<!-- =========================================================================================== -->
<!-- FORM TO ADD RECORD -->

<form id="form1" name="form1" method="post" action="guestbook_add_action.php">

     <table class="viewTable shade">

          <tr class="addRecord">
               <td class="col1">Username: </td>
<?php

// CALL FUNCTION TO CREATE DYNAMIC SELECT BOX

// 7. Assign "username" to $field_name .
//   HINT: This is an "assignment statement". These are written in the format x=3,
// which we would read as "assign 3 to x".
//         You can see examples of these statements in Part 1,
// Step 2: Dynamic Select Boxes, 6, g.

$field_name = "username";

// 8. Assign "users" to $table_name .

$table_name = "users";

// 9. Call the select_box function. Pass the following 3 variables: $field_name,
//   $table_name and $result. Assign the
//    returned value of the function to $list. 
//   HINT: See Part 1, Step 2: Dynamic Select Boxes, 6, g.
//   This should be only one line of code, starting with $list.

$list = select_box($field_name, $table_name, $result);

// 10. RUN your page. It should now run with no errors, and you should be able to select a name in the list box.

// 11. SELECT a name in the list box, TYPE in a comment, and click Submit. Your page should submit to guestbook_add_action.php,
//  and you should see a message similar to this:
//  Array ( [username] => ______ [comment] => ___________ [Submit] => Submit ) 
//  You can ignore any error messages lower on the page. We will code that page next (guestbook_add_action.php) .
echo "             <td class='col2'>" . $list . "              </td>" . "\n";

?>

          </tr>
          <tr class="addRecord">
               <td class="col1">
                    Comment:
               </td>
               <td class="col2"><textarea name="comment" cols="50" rows="3" id="comment"></textarea></td>
          </tr>
          <tr class="addRecord">
               <td class="col1">&nbsp;</td>
               <td class="col2">
                    <input type="submit" name="Submit" value="Submit" />
               </td>
          </tr>

     </table>

</form>

<!-- This JavaScript puts the cursor in the first element on the form -->
<script>document.getElementById('form1').elements[0].focus();</script>

<!-- ===================================================== -->
<!-- FOOTER -->

<?php

include_once "includes/footer.php";

?>