<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 11/21/2015
 * Time: 8:46 PM
 */

//For field names

const LOGIN_USERNAME_KEY = 'login_username';
const LOGIN_PASSWORD_KEY = 'login_password';
const LOGIN_BUTTON_VALUE = 'login';

const REGISTER_USERNAME_KEY = 'register_username';
const REGISTER_PASSWORD_KEY = 'register_password';
const CONFIRM_PASSWORD_KEY = 'register_confirm_password';
const REGISTER_BUTTON_VALUE = 'register';


const SESSION_USER_KEY = 'username';

// Fields
const ACCOUNT_USERNAME_FIELD = 0;
const ACCOUNT_PASSWORD_HASH_FIELD = 1;


//Files
const USER_ACCOUNT_FILE = 'data/users.csv';

const E_LOGIN = 'Error Logging In';
const E_REGISTER = 'Error REGISTERING';


//Errors
const E_NO_USERNAME = 'Username must be supplied';
const E_NO_PASSWORD = 'Password must be supplied';
const E_NO_CONFIRM = 'You must confirm password';
const E_CONFIRM_MISMATCH = 'Password must match';
const E_ACCOUNT_EXISTS = 'Username already exists. Please try a different one';
const E_USERNAME_NOT_FOUND = 'Username not found';
const E_PASSWORD_INCORRECT = 'Incorrect Password';
?>