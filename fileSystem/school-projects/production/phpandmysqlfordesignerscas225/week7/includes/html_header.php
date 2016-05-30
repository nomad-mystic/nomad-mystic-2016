<!-- html_header.php Revision 6 11-6-13 5:30 pm -->

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
File Name: html_header.php
Date: 11/07/2015
Programmer: Keith Murphy
*/

?>

<!-- Note: Top 4 HTML tags were moved to html_top.php -->

<title><?php echo $heading; ?></title>

<link rel = "stylesheet" href = "<?php echo $styles_path . '/' . $styles_page; ?>" /> 
<link rel = "stylesheet" href = "<?php echo $styles_path . '/' . $styles_2_page; ?>" /> 

</head>

<body>

<div class = "shade">

<br />

<!-- We will code the line below later in the class, when we learn how to do logins. -->

     Logged in as: <b>(no login code yet)</b>

     <p>

     <!-- ====================================== -->
     <!-- NAVIGATION BAR -->

     <!-- 2. COPY the line below this comment to make 3 more links, then EDIT the new lines to use link_2, link_3 and
          link_4. BE CAREFUL! The code needs to be updated in 2 places in each line. -->

          <a href="<?php echo $link_1_page; ?>"><?php echo $link_1_text; ?></a> |
          <a href="<?php echo $link_2_page; ?>"><?php echo $link_2_text; ?></a> |
          <a href="<?php echo $link_3_page; ?>"><?php echo $link_3_text; ?></a> |
          <a href="<?php echo $link_4_page; ?>"><?php echo $link_4_text; ?></a> |

     </p>

</div>