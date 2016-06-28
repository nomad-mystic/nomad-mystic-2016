<?php /* guestbook_add.php Revision 5 10-28-13 10:00pm

Requirements:
a) Please do not remove any of my comments in this code. I need them for grading.
b) Type code for only one step at a time, then run it in your browser to test it before moving to the next step. 
Some of the code will not display any output, but you still need to test it to be sure there are no error messages. 
Trouble-shooting is very difficult if many steps are entered at once. Do not ask me for help with your code if you are 
not testing one step at a time!

==========================================================================================================
PLEASE DO NOT ATTEMPT TO WORK THROUGH THIS FILE WITHOUT FOLLOWING MY INSTRUCTIONS IN ASSIGNMENT 5, PART 2.
I HAVE A SPECIFIC SERIES OF STEPS I WOULD LIKE YOU TO FOLLOW.
==========================================================================================================
*/

// HEADER

// 1. Update the Header information below (all 3 lines).

/*
File Name: home.php
Date: 10/9/2015
Programmer: Keith Murphy
*/

// ==========================================================
// VARIABLES

include_once "includes/php_header.php";

$styles_page = "home.css";
$heading = "CAS 225: PHP and MySQL for Designers";

?>

<!-- HTML HEADER -->

<?php include_once "includes/html_header.php"; ?>

<!-- =============================================================================== -->

<h1><?php echo $heading; ?></h1>

<h2><?php echo $programmer_name; ?></h2>

<h3><?php echo date("F j, Y g:d a") ?></h3>

<img id="homeImage" src="<?php echo $image_path . '/' . $home_image_name; ?>" alt="<?php echo $home_image_name; ?>">

Please make a choice from the menu above.

<!-- =============================================================================== -->
<!-- FOOTER -->

<?php include_once "includes/footer.php"; ?>

