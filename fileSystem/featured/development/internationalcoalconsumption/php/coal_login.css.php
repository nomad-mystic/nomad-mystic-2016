<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 11/22/2015
 * Time: 10:01 PM
 */

header('Content-Type: text/css');
require_once('constants.php');

?>

#login_content {
     background: blue;
     width: 75%;
     margin: 5% auto;
     border: <?php echo BORDER; ?>;
     -webkit-border-radius: <?php echo BORDER_RADIUS; ?>;
     -moz-border-radius: <?php echo BORDER_RADIUS; ?>;
     border-radius: <?php echo BORDER_RADIUS; ?>;
}
#error_header,
#error_detail {
     text-align: center;
     background: #000;
     color: red;
     font-size: 3em;
     padding: .25em;
}
.login_header {
     font-size: 2em;
     margin: 5% auto;
     background: rgba(0,0,0,.10);
     padding: .25em;
     border: <?php echo BORDER; ?>;
     -webkit-border-radius: <?php echo BORDER_RADIUS; ?>;
     -moz-border-radius: <?php echo BORDER_RADIUS; ?>;
     border-radius: <?php echo BORDER_RADIUS; ?>;
}
.login_table {
     margin: 0 auto;
}
.login_or {
     text-align: center;
     font-size: <?php echo BASE_FONT_SIZE; ?>;
     margin: 1% auto;
     background: rgba(0,0,0,.10);
     padding: .25em;
     border: <?php echo BORDER; ?>;
     border-width: 2px 0 2px 0;
     -webkit-border-radius: <?php echo BORDER_RADIUS; ?>;
     -moz-border-radius: <?php echo BORDER_RADIUS; ?>;
     border-radius: <?php echo BORDER_RADIUS; ?>;
}
#login_content input[type="text"] {
     font-size: 1.5em;
}
#login_content input[type="password"] {
     font-size: 1.5em;
}
.login_submit {
     text-align: center;
     margin: 5% auto 2%;
}
#login_content input[type="submit"]  {
     border: <?php echo BORDER_RADIUS; ?>;
     -webkit-border-radius: <?php echo BORDER_RADIUS; ?>;
     -moz-border-radius: <?php echo BORDER_RADIUS; ?>;
     border-radius: <?php echo BORDER_RADIUS; ?>;
     font-size: <?php echo BASE_FONT_SIZE; ?>;
     padding: .5em;
     cursor: pointer;
     -webkit-transition: box-shadow .5s;
     -moz-transition: box-shadow .5s;
     -ms-transition: box-shadow .5s;
     -o-transition: box-shadow .5s;
     transition: box-shadow .5s;
}
#login_content input[type="submit"]:hover {
     -webkit-box-shadow: 0 2px  1px rgba(0,0,0,.10);
     -moz-box-shadow: 0 2px  1px rgba(0,0,0,.10);
     box-shadow: 0 2px  1px rgba(0,0,0,.10);
}