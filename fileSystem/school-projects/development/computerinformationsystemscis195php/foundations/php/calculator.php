<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 10/5/2015
 * Time: 11:14 PM
 */
     $first_name = $_GET['first'];
     $last_name = $_GET['last'];
     $email = $_GET['email'];
     $username = $_GET['username'];
     $input_password = $_GET['password'];
     $output_password = str_repeat('*', strlen($input_password));
     $message = $_GET['message'];

?>
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
     <meta charset="UTF-8">
     <title>Confirmation Page to main.php</title>
     <link rel="stylesheet" href="styles.css">
</head>
<body>
     <div id="wrapper">
          <h2>Confirmation Page for Nomad Mystic's Sign-Up Form</h2>
          <p>Thank you for signing up to Nomad Mystic's Site.</p>
          <div class="formOutput">
               <p>This is the name you entered: <strong></strong><?php echo ucfirst($first_name) . ' ' . ucfirst($last_name); ?></strong></p>
               <p>This is the email you entered: <strong><?php echo ucfirst($email); ?></strong></p>
               <p>This is the username you entered: <strong><?php echo $username; ?></strong></p>
               <p>This is the password you entered: <strong><?php echo $output_password; ?></strong></p>
               <p>This is the message you entered: <strong><?php echo $message; ?></strong></p>
          </div>
     </div>
</body>
</html>
