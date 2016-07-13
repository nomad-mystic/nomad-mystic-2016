<?php
/**chosen*/

require_once('includes/constants.php');
require_once('includes/coal_login_constants.php');
require_once('includes/coal_page_constants.php');
require_once('includes/utilities.php');
require_once('includes/functions.php');
require_once('includes/functions_stack.php');

?>

<!doctype html>
<html lang="en">
<?php require_once('includes/main_head.php'); ?>
<body onload="init(<?php echo $json_country_data_1; ?>,
    <?php echo $json_country_data_2; ?>,
    <?php echo "'" . $validated_country_1 . "'";  ?>,
    <?php echo "'" . $validated_country_2 . "'"; ?>);
 ">

<section>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
                <?php echo '<h1 class="chosen_country">The Coal Consumption of ' . $validated_country_1 . ' and ' . $validated_country_2 . '</h1>' . "\n"; ?>

                <canvas id="canvas" width="1000" height="600"></canvas>
            </div>
        </div><!--end row-->
    </div><!--end container-->
</section>
</body>
</html>