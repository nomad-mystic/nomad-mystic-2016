<?php
/*
File Name: guestbook_add_action.php
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
$heading = "Guestbook Add Action Page";

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title><?php echo $heading; ?></title>

<link rel="stylesheet" href="<?php echo $styles_path . '/' . $styles_page; ?>" />

</head>

<body>

<div class="shade">

<br>

     Logged in as: <strong>(no login code yet)</strong>

<p>
      <a href="<?php echo $link_1_page; ?>"><?php echo $link_1_text; ?></a> |
      <a href="<?php echo $link_2_page; ?>"><?php echo $link_2_text; ?></a>
</p>

</div>

<br>
     
<?php
// Check for missing data
// Text fields and textarea
     $name = trim($_POST["name"]);
     $email = trim($_POST["email"]);
     $comment = trim($_POST["comment"]);

     if ($name == "") {
          echo "Name is missing. Please <a href='guestbook_add.php'>Go Back</a> to the form and fill out missing data.";
          exit;
     }

     if ($email == "") {
          echo "Email is missing. Please <a href='guestbook_add.php'>Go Back</a> to the form and fill out missing data.";
          exit;
     }

     if ($comment == "") {
          echo "Comment is missing. Please <a href='guestbook_add.php'>Go Back</a> to the form and fill out the missing data.";
          exit;
     }

// Strip potentially dangerous characters from text fields and textarea fields
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
     echo "Name: <b>" . $name . "</b>";
     echo "<br><br>";
     echo "Email: <b>" . $email . "</b>";
     echo "<br><br>";
     echo "Comment: <b>" . $comment . "</b>";

     if (isset($_POST["mail"])) {
          echo "<br><br>" . "Maillist: <b>" . $_POST["mail"] . "</b> Thank you for signing up for our mail list";
     } else {
          echo "<br><br>" . "Maillist: <b>No</b>";
     }

?>
	
<br><br>
	
<a href="guestbook_add.php">Return to Form</a>

</div>

<hr>

</body>

</html>
