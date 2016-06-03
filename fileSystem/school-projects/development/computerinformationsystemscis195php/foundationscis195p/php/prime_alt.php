<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 10/22/2015
 * Time: 1:46 AM
 */

define('NUMBER', 'number');


if(!isset($_GET[NUMBER])) {
     echo '<p>You must supply number.</p>';
     exit;
}
$number = $_GET[NUMBER];
if(!is_numeric($number)) {
     echo '<p>Please Enter a Number.</p>';
     exit;
}

for($p = 2; $p <= $number; $p++) {
     for($candidate = 2; $candidate < $p; $candidate++) {
          if($p % $candidate == 0) {
               echo  "<p>Your number is not prime: $p";
               continue 2;
          }
     }
     echo "<p>Your number is prime: $p";
}
