<?php
/**chosen*/

require_once('includes/constants.php');
require_once('includes/coal_login_constants.php');
require_once('includes/coal_page_constants.php');
require_once('includes/utilities.php');
require_once('includes/functions.php');
require_once('includes/functions_stack.php');

//require_secure();
//session_start();
//require_login();

?>

<!doctype html>
<html lang="en">
     <?php require_once('includes/main_head.php'); ?>

     <div class="user_information_area"><?php show_user_info(); ?></div>

     <body onload="init(<?php echo $json_country_data_1; ?>, <?php echo $json_country_data_2; ?>);">
          <?php echo '<h1 class="chosen_country">The Coal Consumption of ' . $validated_country_1 . ' and ' . $validated_country_2 . '</h1>' . "\n"; ?>
          <canvas id="canvas" width="1000" height="600"></canvas>
     </body>
</html>