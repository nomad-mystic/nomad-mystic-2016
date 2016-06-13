<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 11/4/2015
 * Time: 1:36 AM
 */
header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Pragma: no-cache");

require_once('includes/poker_constants.php');
require_once('includes/poker_code.php');
require_once('includes/page_constants.php');
require_once('includes/utilities.php');
require_once('includes/login_constants.php');
require_once('includes/poker_db_constants.php');
require_once('includes/poker_db_code.php');

//require_secure();
session_start();
require_login();

$deck = make_deck();
$hand = deal($deck);

?>

<!doctype html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Video Poker</title>
     <link rel="stylesheet" type="text/css" href="includes/poker.css.php">
     <script src="includes/poker.js.php"></script>
</head>
<body onload="javascript:init();">

     <?php show_user(); ?>

     <div id="spacer"></div>

     <?php show_content($hand); ?>
     <?php output_form($hand, $deck); ?>
<!--     --><?php //output_choices($hand); ?>
</body>
</html>
