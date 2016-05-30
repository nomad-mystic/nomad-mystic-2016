<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 11/17/2015
 * Time: 8:56 PM
 */


require_once('constants.php');

function require_secure()
{
     if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'on') {
          header('Location: https://localhost/cis195p/week7/login.php' );
          exit();
//          . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']
     }
}

function login($username, $password)
{
     $file = fopen('data/users.csv', 'r');
     flock($file, LOCK_SH);
     do {
          $line = fgetcsv($file);
          if($line[KEY_FIELD] === $username) {
               $user = $line;
               break;
          }
     } while($line);
     flock($file, LOCK_UN);
     fclose($file);
     if (!isset($user)) {
          echo 'Error unknown user!!!';
          return;
     }
     if (!password_verify($password, $user[VALUE_FILED])) {
          echo 'Error incorrect password';
          return;
     }
     echo 'Password Found!!!';
}
function update_file($key, $value)
{
     $file = fopen('data/users.csv', 'r+');
     flock($file, LOCK_EX);
     $contents =[];
     do {
          $line = fgetcsv($file);
          if(!$line) {
               break;
          }
          $contents[$line[KEY_FIELD]] = $line;
     } while($line);
     $contents[$key] = [$key, $value];
     ftruncate($file, 0);
     rewind($file);
     foreach ($contents as $line) {
          fputcsv($file, $line);
     }
     flock($file, LOCK_UN);
     fclose($file);
}