<!-- footer.php Revision 7 11-3-15 11:30 pm -->

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
File Name: footer.php
Date: 11/09/2015
Programmer: Keith Murphy
*/

// 2. Enter code to close the connection, inside of an if/else statement that checks if the connection is
//    open first. If the connection is not open, display a message that there is no connection to close. 
//    HINT: See Part 1 of the assignment, Step 5: Close connection for the code I want you to use. There should
//    be 7 lines of code (including the curly braces).

if (isset($connection)) {
     $connection = NULL;
     echo "    <p>4. Database connection closed!</p>";

}  else {
     echo "    <br>4. No database connection to close." . "\n";

}

?>

</body>

</html>

