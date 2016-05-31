<!-- html_header.php Revision 2 5-1-13 5:30 pm -->

<!--
File Name: html_header.php
Date: 10/09/2015
Programmer: Keith Murphy
-->
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



