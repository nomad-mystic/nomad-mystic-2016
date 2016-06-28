<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 10/5/2015
 * Time: 10:58 PM
 */
?>

<!doctype html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Testing Web Form | CIS195P Week Two</title>
     <link rel="stylesheet" href="styles.css">
</head>
<body>
     <div id="wrapper">
          <h2>Welcome to Nomad Mystic's Sign-up Page</h2>
          <p>Please fill out this form to join the Nomad's members section of the website.</p>
          <div id="formWrapper">
               <form action="calculator.php" method="get">
                    <table>
                         <tr>
                              <td>First Name:</td>
                              <td><input  name="first" type="text" placeholder="Please enter yout first name..."></td>
                         </tr>
                         <tr>
                              <td>Last Name:</td>
                              <td><input name="last" type="text" placeholder="Please enter your last name..."></td>
                         </tr>
                         <tr>
                              <td>Email:</td>
                              <td><input name="email" type="email" placeholder="Please enter your email..."></td>
                         </tr>
                         <tr>
                              <td>Choose Username at Nomad Mystic's</td>
                              <td><input name="username" type="text" placeholder="please enter your new username..."></td>
                         </tr>
                         <tr>
                              <td>Choose a Password:</td>
                              <td><input name="password" type="password" placeholder="Please enter your password..."></td>
                         </tr>
                         <tr>
                              <td>Message:</td>
                              <td><textarea name="message" cols="30" rows="10" placeholder="Please give us an idea of why you want to sign up with us..."></textarea></td>
                         </tr>
                         <tr>
                              <td colspan="2"><input type="submit" value="Submit"></td>
                         </tr>
                    </table>
               </form>
          </div>
     </div>
</body>
</html>
