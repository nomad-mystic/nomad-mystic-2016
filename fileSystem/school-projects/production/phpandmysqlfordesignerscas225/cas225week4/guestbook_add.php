<?php 

/* guestbook_add.php Revision 4 10-12-15 7:15pm

HINTS:

a) Everything I ask for here is covered in Part 1 of Assignment 3. I expect you to have STUDIED and TESTED all of the code 
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
PLEASE DO NOT ATTEMPT TO WORK THROUGH THIS FILE WITHOUT FOLLOWING MY INSTRUCTIONS IN ASSIGNMENT 4, PART 2.
I HAVE A SPECIFIC SERIES OF STEPS I WOULD LIKE YOU TO FOLLOW.
==========================================================================================================

*/

// HEADER

// 1. Update the Header information below (all 3 lines).

/*
File Name: guestbook.add.php
Date: 10/17/2015
Programmer: Keith Murphy
*/

// ==========================================================

// VARIABLES

$styles_path = "styles";
$styles_page = "contact.css";

$link_1_page = "home.php";
$link_1_text = "Home";

$link_2_page = "guestbook_add.php";
$link_2_text = "Guestbook: Add";

$heading = "Add Entry to Guest Book";

/* ====================================== */

?>

<!DOCTYPE html>

<html>

<head>

<meta charset = "UTF-8">

<title><?php echo $heading; ?></title>

<link rel = "stylesheet" href = "<?php echo $styles_path . '/' . $styles_page; ?>" /> 

</head>

<body>

<div class = "shade">

<br />

<!-- We will code the line below later in the class, when we learn how to do logins. -->

Logged in as: <strong>(no login code yet)</strong>

<p>

<!-- ======================================
NAVIGATION BAR 
-->

<a href="<?php echo $link_1_page; ?>"><?php echo $link_1_text; ?></a> | 
<a href="<?php echo $link_2_page; ?>"><?php echo $link_2_text; ?></a>

</p>

</div>

<!-- ====================================== -->
<!-- HEADING -->

<?php

echo "<h1>" . $heading . "</h1>";

?>

<!-- ====================================== -->
<!-- FORM TO ADD RECORD -->

<form id="form1" name="form1" method="post" action="guestbook_add_action.php">

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
<td  class="col1">Comment: </td><td  class="col2"><textarea name="comment" cols="50" rows="3" id="comment"></textarea></td>
</tr>

<tr class="addRecord">
    <td class="col1">&nbsp;</td><td class="col2"><input type="checkbox" name="mail" value="yes">&nbsp;Add me to your mailing list</td>
</tr>

<tr class="addRecord">
<td class="col1">&nbsp;</td><td class="col2"><input type="submit" value="Submit"></td>
</tr>

</table>

</form>

<!-- This JavaScript puts the cursor in the first element on the form -->
<script>document.getElementById('form1').elements[0].focus();</script>

</body>