<!-- footer.php Revision 3 11-16-15 6:30 pm -->

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
// This is the only thing you need to do in this file this week.

/*
File Name: footer.php
Date: 11/25/2015
Programmer: Keith Murphy
*/

if(isset($connection)) {
     $connection = null;
     echo "<p>4. Database connection closed!</p>";
}
else{
     echo "<br>4. No database connection to close.";
}

?>

</body>

</html>

