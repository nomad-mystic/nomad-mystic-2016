<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 11/26/2015
 * Time: 12:17 AM
 */


/// looking up user
function lookup_user($username)
{
     $db = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
     $safe_username = $db->real_escape_string($username);
     $query = "SELECT * FROM " . USER_TABLE . " WHERE " . USERS_USERNAME_FIELD . "= '$safe_username';";

     $result = $db->query($query);
     return $result->fetch_array(MYSQLI_NUM);
}

function add_user($username, $hash)
{
     $db = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
     $safe_username = $db->real_escape_string($username);
     $query = "INSERT INTO";
     $query .= " " . USER_TABLE . " (" . USERS_USERNAME_FIELD . ", " . USERS_HASH_FIELD . ")";
     $query .= " VALUES ('$safe_username', '$hash')";
     $db->query($query);

}

function lookup_session($username)
{
     $db = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
     $safe_username = $db->real_escape_string($username);
     $query = "SELECT *";
     $query .= " FROM " . ACCOUNT_DATA_TABLE;
     $query .= " WHERE " . ACCOUNT_DATA_USERNAME_FIELD . "= '$safe_username';";

     $result = $db->query($query);
     return $result->fetch_array(MYSQLI_NUM);
}

function add_session($username, $session)
{
     $db = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
     $safe_username = $db->real_escape_string($username);
     $query = "INSERT INTO";
     $query .= " " . ACCOUNT_DATA_TABLE;
     $query .= " (" . ACCOUNT_DATA_USERNAME_FIELD . ", " . ACCOUNT_DATA_SESSION_FILED . ")";
     $query .= " VALUES ('$safe_username', '$session')";
     $query .= " ON DUPLICATE KEY UPDATE " . ACCOUNT_DATA_SESSION_FILED . " = '$session';";
     $db->query($query);
}