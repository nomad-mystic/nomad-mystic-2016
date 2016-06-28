<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 11/7/2015
 * Time: 12:47 AM
 */

require_once('includes/constants.php');

echo htmlentities($GLOBALS['_' . METHOD][USER_INPUT_KEY]);

$my_array = json_decode($GLOBALS['_' . METHOD][USER_INPUT_KEY], true);

echo '<pre>';
print_r($my_array);
echo '</pre>';