<?php

/* guestbook_add_action-starter.php Revision 3 10-5-15 7:00pm

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

c) Please do not remove any of my numbered comments, or any other comments in this code. 
I need them for grading. 

==========================================================================================================
PLEASE DO NOT ATTEMPT TO WORK THROUGH THIS FILE WITHOUT FOLLOWING MY INSTRUCTIONS IN ASSIGNMENT 3, PART 2.
I HAVE A SPECIFIC SERIES OF STEPS I WOULD LIKE YOU TO FOLLOW.
========================================================================================================== */

// TEST CODE -- comment out next 2 lines when code for the first page submits correctly.
// See Assignment 3 Part 2 for an explanation.

//print_r($_POST);
//exit;

// 1. Update the Header information below (all 3 lines).

/*
File Name: guestbook_add_action.php
Date: 10/10/2015
Programmer: Keith Murphy
*/

// ==========================================================
// VARIABLES
 
// 2. COPY the variables from guestbook_add.php file (steps 3 and 4) into the space below.

$styles_path = "styles";
$styles_page = "contact.css";

$link_1_page = "home.php";
$link_1_text = "Home";

$link_2_page = "guestbook_add.php";
$link_2_text = "Guestbook: Add";

// 3. CHANGE the value of $heading below to "Guestbook Add Action Page".

$heading = "Guestbook Add Action Page";

/* ======================================= */


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

<br>

<!-- We will code the line below later in the class, when we learn how to do logins. -->

Logged in as: <strong>(no login code yet)</strong>

<p>

<!-- ======================================
NAVIGATION BAR 
-->

<!-- 4. COPY the line for the second link from your guestbook_add.php page.
This line must use PHP for credit. -->

      <a href="<?php echo $link_1_page; ?>"><?php echo $link_1_text; ?></a> |
      <a href="<?php echo $link_2_page; ?>"><?php echo $link_2_text; ?></a>

</p>

</div>

<br>
     
<?php


// Check for missing data

// Text fields and textarea
/* 5. You will need 3 "if" blocks here, for name, email and comment. Model them after the code in Step 1, 3f in Part 1. DO NOT
      enter the PHP tags - they have already been entered for you. In each case, change the field name, and change the message 
      to refer to the field that is missing (name is missing, email is missing, etc.) You will also need to change the name of 
      the form in the links to the name of the form we created, that submits to this page. */
     $name = trim($_POST["name"]);
     $email =  trim($_POST["email"]);
     $comment =  trim($_POST["comment"]);

     if($name == "") {
          echo "Name is missing. Please <a href='guestbook_add.php'>Go Back</a> to the form and fill out missing data.";
          exit;
     }

     if($email == "") {
          echo "Email is missing. Please <a href='guestbook_add.php'>Go Back</a> to the form and fill out missing data.";
          exit;
     }

     if($comment == "") {
          echo "Comment is missing. Please <a href='guestbook_add.php'>Go Back</a> to the form and fill out the missing data.";
          exit;
     }

// Strip potentially dangerous characters from text fields and textarea fields
/* 6. Enter code here to remove dangerous characters. Model it after the code in step 1, 4c in Part 1. DO NOT enter the PHP 
      tags - they have already been entered for you. You will have 4 lines for each of the 3 text and textarea fields 
      (name, email and comment) -- 12 lines of code total. Change the names on the left side of the expression so they make 
      sense for the names of the fields in this project ($name, $email, $comment. Change the names in the first lines to match 
      the names in $_POST[...] above. You will also need to put the new names wherever the variable appears on the right side 
      in the second, third and fourth lines. Put a blank line between each of the groups of 4 lines so the code is easier to read. 
      NOTE: This code will not produce any output, but you need to run the page after creating each set of 4 lines to be sure there
      are no errors. */

     $name = stripslashes(strip_tags($name));
     $name = str_replace("/", "", $name);
     $name = addslashes($name);

     $email = stripslashes(strip_tags($email));
     $email = str_replace("/", "", $email);
     $email = addslashes($email);

     $comment = stripslashes(strip_tags($comment));
     $comment = str_replace("/", "", $comment);
     $comment = addslashes($comment);


?>

<!-- Display Data -->

<h3><i>You submitted the following information:</i></h3>

<div id="formData">

<?php

/* 7. Enter code to display the data that was filled out in the name, email and comment fields. Model your code after that in 
      Step 5a in Part 1, but note that we have only 3 fields here instead of 6. Also, note that all 3 of our fields are text
      fields, so they will use the format shown for First Name and Last Name in the example. DO NOT enter the PHP tags - they 
      have already been entered for you. Use the variables that you created in Step 6 above (left side of the statements in 
      Step 6). Be careful with the comment variable name -- it does *not* have an 's' at the end in this project. */

     echo "Name: <b>" . $name . "</b>";
     echo "<br><br>";
     echo "Email: <b>" . $email . "</b>";
     echo "<br><br>";
     echo "Comment: <b>" . $comment . "</b>";


/* 8. Enter code to display whether the mailing list checkbox was checked or not. Be careful to put your code *before* the closing
      php tag. Model your code after the that in Step 1, 8 in Part 1. Include the echo statement, the "if" block, and the "else" block. 
      You will need to change the message after the word echo so it makes sense for this field, and you will need to change the name 
      of the variable in 2 places. Be sure to get the correct name for the checkbox - see the form in your guestbook_add.php 
      page to be sure. */



     if(isset($_POST["mail"])) {
          echo "<br><br>" . "Maillist: <b>" . $_POST["mail"] . "</b> Thank you for signing up for our mail list";
     } else {
          echo "<br><br>" . "Maillist: <b>No</b>";
     }

?>
	
<br><br>
	
<!-- 9. INSERT the file name of your form page (the page that submits to this page) between the quote marks below. The file name
        will end in .php . Note that the code below is HTML, not PHP. -->
	
<a href="guestbook_add.php">Return to Form</a>

</div>

<hr>

</body>

</html>
