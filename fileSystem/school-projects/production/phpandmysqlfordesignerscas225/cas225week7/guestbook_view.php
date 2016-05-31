<?php include_once "includes/html_top.php"; ?>

<!-- guestbook_view.php Revision 7 11-3-15 11:30 pm -->

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

<!-- ==========================================================================================================
YOU WILL SEE A "FATAL ERROR" MESSAGE WHEN YOU RUN THIS FILE UNTIL YOU FINISH STEP 5. IT DOES NOT MEAN THERE IS 
ANYTHING WRONG WITH YOUR CODE UNLESS YOU ALREADY COMPLETED STEP 5. This is the warning message:
Fatal error: Call to a member function fetch() on string in ... on line ... */
========================================================================================================== -->

<?php

// HEADER

// 1. Update the Header information below (all 3 lines).

/*
File Name: guestbook_view.php
Date: 11/09/2015
Programmer: Keith Murphy
*/

// ==========================================================
// VARIABLES
 
include_once "includes/php_header.php";

// 2. Change $programmer_name to your name.

$programmer_name = "Keith Murphy";
$heading = "View Guestbook";
$result = "";

// ==========================================================
// ARRAYS

// -- CREATE ARRAY OF FORM FIELD NAMES SO WE CAN LOOP THROUGH THEM
//    This is an associative array, meaning that each of the variables in the array is given a name.
//    This code has already been created for you.

$form_fields=array();

$form_fields["username"]="text";
$form_fields["comment"]="text";

// ==========================================================
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
// CODE FOR THIS PAGE

// CONNECT TO DATABASE (Step 1)

// 3. Insert an include for connection.php, using include_once.
//    Remember that it is in the "includes" subfolder.
//    See Assignment 5 or the other includes above if you need a reminder on how to do this.

include_once "includes/connection.php";


//    Run the file. If you did the code above correctly, you should see:
//    1. Database connection succeeded!
//    You can ignore the "Fatal error: Call to a member function fetch()" message. It will go away when you complete Step 5 below.

// SQL STATEMENT

/* 4. Create an SQL statement that selects all of the records from the
     guestbook table and orders the results
     by guestbook.id . Assign the results to $sql.
     HINTS: The code should be on 3 lines. See 'Step 2: Perform Database Query', c, i. SELECT EXAMPLES
     in Part 1 of this assignment for the required format. You will need to change
     the field names. */

$sql = "SELECT *"
     . " FROM guestbook;"
     . " ORDERBY guestbook.id;";


   
// Display SQL for learning and trouble-shooting
     
// 5. Remove the comment tags in front of the line below and run your page. If your code is correct, your 
//     SQL statement should be displayed. It should look like this:
//     2. SQL: SELECT * FROM guestbook ORDER BY guestbook.id;
//     Note: You will still see the "Fatal Error..." message until you complete Step 5.
     
 echo "<br>2. SQL: " . $sql . "<br>";
     
// RUN QUERY
     
// 6. Enter a statement here that runs the $sql query and assigns it to $result. 
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


// 7. RUN the page. You should see something
//    like this (the number of rows may be different):
//    3. Query succeeded! 4 rows returned.
//    The "Fatal error" message should no longer be displayed. You will see the headings of the table, and 4. Database connection closed!

// DISPLAY DATA IN TABLE

echo "\n" . "<table class='shade viewTable'>" . "\n";
echo "    <tr>" . "\n";
echo "        <th>ID</th>" . "\n" . "        <th>Username</th>" . "\n" . "        <th>Comment</th>" . "\n" . "        <th>Date/Time</th>" . "\n";
echo "    </tr>" . "\n";

// LOOP THROUGH DATA, CREATING ONE ROW FOR EACH RECORD

while($rows = $result->fetch(PDO::FETCH_ASSOC)) {
     // Note: The 2 lines below convert the datetime field in the database to
     // the format we used for displaying dates at the beginning of the class.
     
	 $mydate = $rows['datetime'];
	 $rows['datetime'] = date('m/d/y h:i a', strtotime($mydate));
	
   /* 8. BETWEEN the echo "<tr>"; and echo "</tr>"; lines below, INSERT 4
          rows of code* to display your data in
	 table cells. The first row will contain 'id',
     the second row will contain 'username', the third row
	 will contain 'comment', and the 4th row will contain
     'datetime'. In each case you
	 will be displaying an element of the the $rows[] array. On all 4 rows you 
	 will need to surround the data with <td> and </td> tags. 
	 HINT: See Step 3: Use Returned Data (if any), c in Part 1
     for the code I would like you to use. Be sure it is the longer version,
     which contains table tags. Use ONLY the code for the rows that appears between
      the echo "<tr>"; and echo "</tr>"; tags. You will need to change the field names
     from 'SongID', 'Song' and 'DiscID' to the correct field names for the guestbook table.
     There should be only 4 lines of code. */
	
     echo "    <tr>" . "\n";
     
          echo "        <td>" . $rows['id'] . "</td>" ."\n";  // *I did this one for you. You can pattern the next three after this one.

          echo "        <td>" . $rows['username'] . "</td>" . "\n";

          echo "        <td>" . $rows['comment'] . "</td>" . "\n";

          echo "        <td>" . $rows['datetime'] . "</td>" . "\n";

     echo "    </tr>" . "\n";
}

echo "</table>" . "\n";

// 9. After you create the code above and run your file, the table with your data should display.

// ===================================================== 
// FOOTER

include_once "includes/footer.php";

// The include above will produce this message on this page:
//     4. Database connection closed!

?>