<?php

include_once "includes/html_top.php";

// guestbook_add.php Revision 8 11-16-15 6:30 pm

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
File Name: guestbook_add.php
Date: 11/27/2015
Programmer: Keith Murphy
*/

// ==========================================================
// VARIABLES

include_once "includes/php_header.php";

// 4. Change $programmer_name to your name.

$programmer_name = "Keith Murphy";
$heading = "Add Entry to Guest Book";

// ====================================== 
// FUNCTIONS

include_once "includes/cas225_functions.php";

// ======================================= 
// HTML HEADER

include_once "includes/html_header.php";

// ====================================== 
// HEADING

echo "<h1>" . $heading . "</h1>";

?>

<!-- ====================================== -->
<!-- CODE FOR THIS PAGE -->

<?php

// CONNECT TO DATABASE (STEP 1)

include_once "includes/connection.php";

// SQL STATEMENT

$sql="SELECT username"
. " FROM users"
. " ORDER BY users.username;";
     
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

?>
<!-- =========================================================================================== -->
<!-- FORM TO ADD RECORD -->

<form id="form1" name="form1" method="post" action="guestbook_add_action.php">

<table class="viewTable shade">

<tr class="addRecord">
<td class="col1">Username: </td>

<?php

// CALL FUNCTION TO CREATE DYNAMIC SELECT BOX

$field_name = "username";

$table_name = "users";

$list = select_box($field_name, $table_name, $result);

// Once you complete Step 10, your page should run with no errors, and you should be able to select a name in the list box.

echo "<td class='col2'>" . $list . "</td>";

?>

</tr>

<tr class="addRecord">
<td class="col1">Comment: </td><td class="col2"><textarea name="comment" cols="50" rows="3" id="comment"></textarea></td>
</tr>

<tr class="addRecord">
<td class="col1">&nbsp;</td><td class="col2"><input type="submit" name="Submit" value="Submit" /></td>
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