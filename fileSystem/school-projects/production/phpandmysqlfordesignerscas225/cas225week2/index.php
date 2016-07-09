<!-- Revision 2 10-1-12 9:45 am -->

<!-- Everything I ask for here is covered in Part 1 of the assignment. I expect you to have CREATED and TESTED all of the code in Part 1 before attempting this part. If you did not do that, please go back and do it now. -->

<!-- Requirements:
a) Put your code *after* the numbered step that describes that code. Be sure the code is 
entered OUTSIDE of comment tags. 
b) Put a blank line above and below your code so it is easy to read. 
c) Please do not remove any of my numbered comments, or any other comments in this code. 
I need them for grading. 
-->

<!-- 
Be sure this file is saved in your localhost folder, or a subfolder of localhost.

Type code for only one step at a time, then save the page and run it in your browser 
to test it before moving to the next step. Trouble-shooting is very difficult if many steps are entered at once.

To run the code, go to http://localhost or use the preview 
feature in your editor. Some of the code will not display any output, but you still need 
to test it to be sure there are no error messages. Some errors will result in a completely 
blank page.  
-->

<!-- ================================================================ -->

<?php

// HEADER

// 1. Update the Header information below (all 3 lines).

/*
File Name: home.php
Date: 10/02/2015
Programmer: Keith Murphy
*/

// ==========================================================
// VARIABLES

/* 2. Change the programmer_name and home_image_name below to match YOUR information. */

/* 3. Assign values to 6 more variables below the two that are shown below. Put each variable on a separate line.
It is important to learn programming terminology. 'Assign 6 to x' is written x = 6. 'Assign "PCC" to college_name' is written $college_name = "PCC";
Assign "images" to $image_path, "styles" to $styles_path, "home.css" to $styles_page, "home.php" to $link_1_page,
"Home" to $link_1_text, and "CAS 225: PHP and MySQL for Designers" to $heading .
*/
 
$programmer_name = "Keith Murphy";
$home_image_name = "homePageImage.jpg";
$college_name = "PCC";
$image_path = "images";
$styles_path = "styles";
$styles_page = "home.css";
$link_1_page = "home.php";
$link_1_text = "Home";
$heading = "CAS 225: PHP and MySQL for Designers";
$today = date("F j, Y, g:i a");
?>

<!DOCTYPE html>

<!-- ======================================= -->

<html>

<head>

<meta charset = "UTF-8">

<!-- 4. REPLACE the word HEADING below with PHP code that displays the $heading variable. Use the one-line PHP Block format. HINT: See how we replaced Oregon State University with a variable in Part 1, Step 7, #22 and #23. In this case, we are replacing HEADING with the variable that contains the heading. Look at the variables you defined in Step 3 above to see what $heading will display when the page is run. -->

<title><?php echo $heading; ?></title>

<!-- 5. REPLACE the hard-coded path and style name below with PHP code that uses the $styles_path and $styles_page variables. For full credit, you must use only one PHP Block (one-line format), and concatenate the 2 variables and the 3 parts together. HINT: You will find very similar code in Part 1 of the assignment, but the variable names are different. -->

<link rel = "stylesheet" href = "<?php echo $styles_path . '/' . $styles_page; ?>">

</head>

<body>

<div class = "shade">

<br />

<!-- We will code the line below later in the class, when we learn how to do logins. -->

Logged in as: <b>(no login code yet)</b>

<p>

<!-- ======================================
NAVIGATION BAR 
-->

<!-- 6. REPLACE the hard-coded link page and link text below with PHP code that uses the $link_1_page and $link_1_text variables. This time I would like you to use two one-line PHP Blocks, one inside the quote marks and the other between the <a...> and </a> tags. HINT: You will find very similar code in Part 1 of the assignment, but the variable names are different. -->

<a href="<?php echo $link_1_page; ?>"><?php echo $link_1_text; ?></a>

</p>

</div>

<!-- 7. Just as you did above, REPLACE the words between each of the 2 headings below with one-line PHP code that uses the correct variable for each ($heading, $programmer_name). -->
<h1><?php echo $heading; ?></h1>

<h2><?php echo $programmer_name; ?></h2>

<!-- 8. REPLACE the date shown below with PHP code that shows the current date in the format shown below. You will need to look for the correct letters to use in the date() function, using the reference page at php.net.
The month below is the full textual representation of the month. The day is the day of the month *without* a leading zero. The year is the full numeric representation of the year. The minutes are the 12-hour format *without*
a leading zero.  HINT: Refer to Part 1 for very similar code. You will need to change almost all of the letters, based on what you find on the date reference page at php.net . Part 1 will tell you how to find that reference
page. There won't be any slashes in the date; they will be replaced by spaces and a comma. The part inside the parentheses after date() will be in this format: "X x, X x:x x" -->

<!--October 1, 2012 10:10 am-->
<h3><?php echo $today; ?></h3>

<!-- 9. REPLACE the hard-coded image path and image name below with PHP code that uses the $home_image_name and $image_path variables. For full credit, there must be only one PHP Block for the src attribute, and one PHP Block for the alt attribute. Use the one-line format for each. You will need to use concatenation to connect the 3 parts together in the src attribute. HINT: You will find very similar code in Part 1 of the assignment, but the variable names are different. -->

<img id="homeImage" src="<?php echo $image_path . '/' . $home_image_name; ?>" alt="<?php echo $home_image_name; ?>">

<!-- =============================================== -->

Please make a choice from the menu above.

</body>

<!-- THIS COMPLETES THIS PAGE. GO BACK TO ASSIGNMENT 2 PART 2 FOR INSTRUCTIONS ON CHECKING YOUR CODE FOR CLASS CODING STANDARDS 
AND UPLOADING IT TO THE OAK SERVER. --> 

</html>


