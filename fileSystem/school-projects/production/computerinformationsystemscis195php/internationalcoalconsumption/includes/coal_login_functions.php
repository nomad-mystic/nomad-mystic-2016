<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 11/21/2015
 * Time: 8:48 PM
 */

require_once('coal_login_constants.php');


function error_message($type, $detail)
{
     return '<div id="error_header">' . $type . '</div><div id="error_detail">' . $detail . '</div>';
}

function set_user($username)
{
     $_SESSION[SESSION_USER_KEY] = $username;
     header('Location: ' . HOME_PAGE);
}

function login($username, $password)
{
     if (empty($username)) {
          return error_message(E_LOGIN, E_NO_USERNAME);
     }
     if (empty($password)) {
          return error_message(E_LOGIN, E_NO_PASSWORD);
     }
     $user = look_up_key_value($username, USER_ACCOUNT_FILE);

     if (!$user) {
          return error_message(E_LOGIN, E_USERNAME_NOT_FOUND);
     }
     if (!password_verify($password, $user[ACCOUNT_PASSWORD_HASH_FIELD])) {
          return error_message(E_LOGIN, E_PASSWORD_INCORRECT);
     }
     set_user($username);

     return '';
}

function register($username, $password, $confirm)
{
     if (empty($username)) {
          return error_message(E_REGISTER, E_NO_USERNAME);
     }
     if (empty($password)) {
          return error_message(E_REGISTER, E_NO_PASSWORD);
     }
     if (empty($confirm)) {
          return error_message(E_REGISTER, E_NO_CONFIRM);
     }
     if ($password !== $confirm) {
          return error_message(E_REGISTER, 'Mismatch');
     }

     $user = look_up_key_value($username, USER_ACCOUNT_FILE);

     if (!empty($user)) {
          return error_message(E_REGISTER, E_ACCOUNT_EXISTS);
     }
     add_key_value($username, [$username, password_hash($password, PASSWORD_DEFAULT)], USER_ACCOUNT_FILE);

     set_user($username);

     return '';
}


function login_or_register(
     $login_pressed,
     $register_pressed,
     $login_username,
     $login_password,
     $register_username,
     $register_password,
     $register_confirm_password
)
{
     if (!empty($login_pressed)) {
          return login($login_username, $login_password);
     } elseif (!empty($register_pressed)) {
          return register($register_username, $register_password, $register_confirm_password);
     }
     return "";
}