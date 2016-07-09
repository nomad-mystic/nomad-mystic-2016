<?php
// HEADER

/*
File Name: home.php
Date: 10/17/2015
Programmer: Keith Murphy
*/

// VARIABLES
$programmer_name = "Keith Murphy";
$home_image_name = "home_page_image.jpg";
$image_path = "images";
$styles_path = "styles";
$styles_page = "home.css";

$link_1_page = "home.php";
$link_1_text = "Home";

$link_2_page = "guestbook_add.php";
$link_2_text = "Guestbook: Add";

$heading = "CAS 225: PHP and MySQL for Designers";

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

<br />

<!-- We will code the line below later in the class, when we learn how to do logins. -->

Logged in as: <strong>(no login code yet)</strong>

<p>

<!--
NAVIGATION BAR
-->
     <a href="<?php echo $link_1_page; ?>"><?php echo $link_1_text; ?></a> |
     <a href="<?php echo $link_2_page; ?>"><?php echo $link_2_text; ?></a>
</p>

</div>

<h1><?php echo $heading; ?></h1>

<h2><?php echo $programmer_name; ?></h2>

<h3><?php echo date("F j, Y g:d a") ?></h3>

<img id="homeImage" src="<?php echo $image_path . '/' . $home_image_name; ?>" alt="<?php echo $home_image_name; ?>">

<p>Please make a choice from the menu above.</p>

</body>

</html>


