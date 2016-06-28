<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 11/16/2015
 * Time: 10:19 PM
 */

const FILE_KEY_FILED = 0;
const ACCOUNT_DATA_FILE = 'data/account_data.csv';
const SESSION_DATA_ACCOUNT_USERNAME_FIELD = 0;
const SESSION_DATA_ACCOUNT_SESSION_FIELD = 1;

function save_session()
{
     $username = get_session_value(SESSION_USER_KEY);
     add_session($username, serialize($_SESSION));
}

function restore_session()
{
     $username = get_session_value(SESSION_USER_KEY);
     $session_data = lookup_session($username);
     if (!empty($session_data)) {
          $_SESSION = unserialize($session_data[SESSION_DATA_ACCOUNT_SESSION_FIELD]);
     }
}

function require_secure()
{
     if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'on') {
          header('Location: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
          exit();
     }
}

function require_login()
{
     if (!isset($_SESSION[SESSION_USER_KEY]) || empty($_SESSION[SESSION_USER_KEY])) {
          header('Location: ' . LOGIN_PAGE);
          exit();
     }
     restore_session();
}
function get_post_value($key)
{
     if (isset($_POST[$key])) {
          return htmlentities($_POST[$key]);
     }
     return '';
}

function get_session_value($key)
{
     if (isset($_SESSION[$key])) {
          return ($_SESSION[$key]);
     }
     return '';
}

function set_session_value($key, $value)
{
     $_SESSION[$key] = $value;


}
function look_up_key_value($key, $filename)
{
     $file = fopen($filename, 'r');
     flock($file, LOCK_SH);
     do {
          $line = fgetcsv($file);
          if ($line[FILE_KEY_FILED] === $key) {
               break;
          }
     } while($line);
     flock($file, LOCK_UN);
     fclose($file);
     return $line;
}

function add_key_value($key, $record, $filename)
{
     $file = fopen($filename, 'r+');
     flock($file, LOCK_EX);
     $contents = [];
     do {
          $line = fgetcsv($file);
          if (!$line) {
               break;
          }
          $contents[$line[FILE_KEY_FILED]] = $line;
     } while($line);
     $contents[$key] = $record;
     ftruncate($file, 0);
     rewind($file);
     foreach ($contents as $line) {
          fputcsv($file, $line);
     }
     flock($file, LOCK_UN);
     fclose($file);
}

function destroy_session()
{
     $session_info = session_get_cookie_params();
     $_SESSION = [];
     setcookie(session_name(), '', 0, $session_info['path'], $session_info['domain'],
          $session_info['sesure'], $session_info['httponly']);
     session_destroy();
}
