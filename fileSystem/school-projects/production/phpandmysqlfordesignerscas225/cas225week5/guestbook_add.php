<?php /* guestbook_add.php Revision 6 10-19-15 9:30pm

HINTS:

a) Everything I ask for here is covered in Part 1 of the assignment. I expect you to have STUDIED and TESTED all of the code 
examples in Part 1 before attempting this part. If you did not do that, please go back and do it now.

b) Type code for only one step at a time, then run it in your browser to test it before moving to the next step. 
Some of the code will not display any output, but you still need to test it to be sure there are no error messages. 
Trouble-shooting is very difficult if many steps are entered at once. 

c) DO NOT copy code from Part 1 of the assignment that is displayed in your browser. It contains "extended ASCII characters"
which are invisible, but stop the code from working. If you feel you absolutely need to copy that code, you can use a
"code stripper" program that I have written to remove the extended characters: http://oak.pcc.edu/cas225/week3/stripascii.php 

REQUIREMENTS:

a) Put your code *after* the numbered step that describes that code. Be sure the code is 
entered OUTSIDE of comment tags. 

b) Put a blank line above and below your code so it is easy to read. 

c) Please do not remove any of my numbered comments, or any other comments in this code. I need them for grading. 

==========================================================================================================
PLEASE DO NOT ATTEMPT TO WORK THROUGH THIS FILE WITHOUT FOLLOWING MY INSTRUCTIONS IN ASSIGNMENT 5, PART 2.
I HAVE A SPECIFIC SERIES OF STEPS I WOULD LIKE YOU TO FOLLOW.
==========================================================================================================

*/

// HEADER

// 1. Update the Header information below (all 3 lines).

/*
File Name: guestbook_add.php
Date: 10//2015
Programmer: Keith Murphy
*/

// ==========================================================

// VARIABLES

include_once "includes/php_header.php";

$styles_page = "contact.css";
$heading = "Add Entry to Guest Book";

/* ====================================== */

?>

<?php include_once "includes/html_header.php"; ?>

<!-- ====================================== -->
<!-- HEADING -->

<?php

echo "<h1>" . $heading . "</h1>";

?>

<!-- ====================================== -->
<!-- FORM TO ADD RECORD -->

<form id="form1" name="form1" method="post" action="guestbook_add_action.php">

<!-- LOOK CAREFULLY at the NAME attribute for each of the form fields below. Those are the *exact* names we 
will need to use on our "action" page. The names are case-sensitive. -->

<table class="viewTable shade">

  <tr class="addRecord">
    <td class="col1">Name: </td>
    <td class="col2">
      <input type="text" name="name">
    </td>
  </tr>

  <tr class="addRecord">
    <td class="col1">Email: </td>
    <td class="col2">
      <input type="text" name="email">
    </td>
  </tr>

  <tr class="addRecord">
    <td class="col1">Comment: </td>
    <td class="col2">
      <textarea name="comment" cols="50" rows="3" id="comment"></textarea>
    </td>
  </tr>

  <tr class="addRecord">
      <td class="col1">&nbsp;</td><td class="col2">
        <input type="checkbox" name="mail" value="Yes">&nbsp;Add me to your mailing list
      </td>
  </tr>

  <tr class="addRecord">
    <td class="col1">&nbsp;</td>
    <td class="col2">
      <input type="submit" value="Submit">
    </td>
  </tr>

</table>

</form>

<!-- This JavaScript puts the cursor in the first element on the form -->
<script>document.getElementById('form1').elements[0].focus();</script>

<?php include_once "includes/footer.php"; ?>