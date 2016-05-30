<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 11/7/2015
 * Time: 12:35 AM
 */

//include 'includes/constants.php';
require_once 'includes/constants.php';
require_once('includes/form.php');

?>

<!doctype html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>A test Form</title>
</head>
<body>

<?php output_form(METHOD, TARGET_PAGE); ?>

<br>
<pre>
     <?php print_r(MY_FRUITS);
          echo urlencode(json_encode(MY_FRUITS));
     ?>
</pre>
<a href="<?php echo TARGET_PAGE . '?' . USER_INPUT_KEY . '=' . urlencode(json_encode(MY_FRUITS)); ?> ">Click Here</a>
</body>
</html>
