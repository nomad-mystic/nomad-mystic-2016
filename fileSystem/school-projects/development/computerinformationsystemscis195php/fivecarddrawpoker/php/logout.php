<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 11/17/2015
 * Time: 8:09 PM
 */

require_once('includes/utilities.php');
require_once('includes/page_constants.php');

session_start();
destroy_session();
header('Location: ' . LOGIN_PAGE);