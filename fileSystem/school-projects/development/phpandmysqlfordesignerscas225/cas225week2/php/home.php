
<?php

// HEADER

/*
File Name: home.php
Date: 10/02/2015
Programmer: Keith Murphy
*/

// ==========================================================
// VARIABLES

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
    
<title><?php echo $heading; ?></title>
    
<link rel = "stylesheet" href = "<?php echo $styles_path . '/' . $styles_page; ?>">

</head>

<body>

<div class = "shade">

<br />
    
Logged in as: <b>(no login code yet)</b>

<p>

<!-- ======================================
NAVIGATION BAR 
-->
    
<a href="<?php echo $link_1_page; ?>"><?php echo $link_1_text; ?></a>

</p>

</div>

<h1><?php echo $heading; ?></h1>

<h2><?php echo $programmer_name; ?></h2>

<!--October 1, 2012 10:10 am-->
<h3><?php echo $today; ?></h3>

<img id="homeImage" src="<?php echo $image_path . '/' . $home_image_name; ?>" alt="<?php echo $home_image_name; ?>">

<!-- =============================================== -->

Please make a choice from the menu above.

</body>
</html>


