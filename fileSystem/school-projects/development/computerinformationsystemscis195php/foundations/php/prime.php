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

for($candidate = 2; $candidate < $number; $candidate++) {
     if($number % $candidate == 0) {
          break;
     }
}

if ($number == $candidate) {
     echo "<p>Your number is prime: $number";
} else {
     echo  "<p>Your number is not prime: $number";
}