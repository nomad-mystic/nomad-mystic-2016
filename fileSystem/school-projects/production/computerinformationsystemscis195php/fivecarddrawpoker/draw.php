<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 11/4/2015
 * Time: 1:40 AM
 */

require_once('includes/poker_constants.php');
require_once('includes/poker_code.php');
require_once('includes/page_constants.php');
require_once('includes/utilities.php');
require_once('includes/login_constants.php');
require_once('includes/hand_type.php');
require_once('includes/poker_db_constants.php');
require_once('includes/poker_db_code.php');

//require_secure();
session_start();
//require_login();

//$deck = json_decode(urldecode($_POST[DECK_KEY]));
//$hand = json_decode(urldecode($_POST[HAND_KEY]));

$deck = get_session_value(DECK_KEY);
$hand = get_session_value(HAND_KEY);

draw_cards($hand, $deck);

?>

<!doctype html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Video Poker</title>
     <link rel="stylesheet" type="text/css" href="includes/poker.css.php">
     <script src="includes/poker.js.php"></script>
</head>
<body onload="javascript:init(true);">
     <?php show_user(); ?>

     <div id="spacer"></div>

     <?php show_content($hand, TRUE); ?>
     
     
</body>
</html>
