<?php
/*
File Name: guestbook_add.php
Date: 10/10/2015
Programmer: Keith Murphy
*/

// VARIABLES

$styles_path = "styles";
$styles_page = "contact.css";
$link_1_page = "home.php";
$link_1_text = "Home";
$link_2_page = "guestbook_add.php";
$link_2_text = "Guestbook: Add";
$heading = "Add Entry to Guest Book";

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
Logged in as: <strong>(no login code yet)</strong>
     <!--
NAVIGATION BAR
-->
     <a href="<?php echo $link_1_page; ?>"><?php echo $link_1_text; ?></a> |
     <a href="<?php echo $link_2_page; ?>"><?php echo $link_2_text; ?></a>


</div>
<!-- HEADING -->
<?php

echo "<h1>" . $heading . "</h1>";

?>

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
               <td  class="col1">Comment:</td>
               <td  class="col2">
                    <textarea name="comment" cols="50" rows="3" id="comment"></textarea>
               </td>
          </tr>
          <tr class="addRecord">
              <td class="col1">&nbsp;</td>
               <td class="col2">
                    <input type="checkbox" name="mail" value="yes">&nbsp;Add me to your mailing list
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

<script>document.getElementById('form1').elements[0].focus();</script>
</body>
</html>