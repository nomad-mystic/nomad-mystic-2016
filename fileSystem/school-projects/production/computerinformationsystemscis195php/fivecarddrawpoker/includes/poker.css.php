<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 11/4/2015
 * Time: 1:32 AM
 */

 header('Content-Type: text/css');
 require_once('poker_constants.php');

 ?>

body {
     background: url('../images/background.jpg') no-repeat 0 0;
     margin: 0;
}
.card_image {
     max-width: <?php echo CARD_IMAGE_PERCENT?>;
     max-height: <?php echo CARD_IMAGE_PERCENT?>;
     cursor: pointer;
}
.hold_image {
     visibility: hidden;
     position: absolute;
     max-width: 100%;
     min-height: 100%;
     cursor: pointer;
     top: 0;
     left: <?php echo (100 - CARD_IMAGE_PERCENT) / 2; ?>%;
}
.card {
     position: relative;
     text-align: center;
     display: inline-block;
     max-width: <?php echo 100 / HAND_CARDS; ?>%;
     max-height: 100%;
}

#hand {
     font-size: 0;
     padding: <?php echo HAND_PADDING; ?>
}

#info {
     text-align: center;
     padding: <?php echo HAND_PADDING; ?>;
     margin: 5% auto 0;
     color: white;
}

#draw_button {
     background: red;
     color: white;
     <?php echo POKER_FONT; ?>
     border-radius: 1em;
     cursor: pointer;
}

#redraw_button {
     text-align: center;
     background: red;
     color: white;
     <?php echo POKER_FONT; ?>
     border-radius: 1em;
     cursor: pointer;
     width: 10%;
     margin: 5% auto 0;
}

#hand_type {
     <?php echo POKER_FONT; ?>
}

#payoff {
     <?php echo POKER_FONT; ?>
}

#user_pane {
     text-align: right;
     font-family: sans-serif;
     font-weight: bold;
     color: #fff;
     background: rgba(17, 17, 17, 0.47);
     padding: 1%;
}
#content {
     visibility: hidden;
}
#logout {
     font-size: .75em;
     color: green;
     text-decoration: none;
}
#choices {
     display: inline-block;;
     position: absolute;
     font-family:  sans-serif;
     font-weight: bold;
     font-size: .75em;

}

