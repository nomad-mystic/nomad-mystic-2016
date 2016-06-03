<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 11/5/2015
 * Time: 12:48 AM
 */


header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Pragma: no-cache");

require_once('includes/constants.php');
require_once('includes/functions.php');
require_once('includes/coal_page_constants.php');
require_once('includes/utilities.php');
require_once('includes/coal_login_constants.php');



//require_secure();
//session_start();
//require_login();

?>

<!doctype html>
<html lang="en">
     <?php require_once('includes/main_head.php'); ?>
     <body>
     <section class="wrapper">
          <div class="user_information_area"><?php show_user_info(); ?></div>
          <div class="float">
               <h1>Annual Coal Consumption by Country</h1>

               <h3>Total annual coal consumption by country from 1980 to 2008 (available as Quadrillion Btu). Downloaded from
                    the Energy Information Administration (EIA)'s International Energy Statistics portal</h3>

               <h4>Please enter two countries to see the coal consumption of those countries over the course of 29 years!!</h4>

               <?php display_form('POST', TARGET_PAGE); ?>
          </div>
          <div class="float">
               <img src="images/world_map.jpg" alt="SOURCE=http://www.psdgraphics.com/file/world-map-background.jpg">
          </div>
     </section>
     </body>
</html>