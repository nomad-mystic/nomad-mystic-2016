<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 11/10/2015
 * Time: 4:34 PM
 */

header('Content-Type: text/css');
require_once('constants.php');

 ?>




/* http://meyerweb.com/eric/tools/css/reset/
   v2.0 | 20110126
   License: none (public domain)
*/

html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed,
figure, figcaption, footer, header, hgroup,
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
     margin: 0;
     padding: 0;
     border: 0;
     font-size: 100%;
     font: inherit;
     vertical-align: baseline;
}
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure,
footer, header, hgroup, menu, nav, section {
     display: block;
}
body {
     line-height: 1;
}
ol, ul {
     list-style: none;
}
blockquote, q {
     quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
     content: '';
     content: none;
}
table {
     border-collapse: collapse;
     border-spacing: 0;
}
/*---------------------------------END RESET----*/

/*-------MY STYLES-----*/
body {
     max-width: 100%;
     padding: 0;
     background: <?php echo BLUE_BACKGROUND; ?>;
}
/* main.php----*/
.float {
     float: <?php echo FLOAT_DIRECTION; ?>;
     width: <?php echo FLOAT_WIDTH;?>%;
     padding: 0;
     margin: 2% 2%;
}
body > section > div:nth-child(2) {
     background: #fff;
     border: <?php echo BORDER; ?>;
     border-radius: <?php echo BORDER_RADIUS; ?>;

}
.float h1 {
     font-size: 3em;
     padding: <?php echo TEXT_PADDING; ?>%;
}
.float h3 {
     padding: <?php echo TEXT_PADDING; ?>%;
     font-size: <?php echo BASE_FONT_SIZE; ?>;
     line-height: 1.25em;
}
.float h4 {
     padding: <?php echo TEXT_PADDING; ?>%;
     font-size: <?php echo BASE_FONT_SIZE; ?>;
}
body > section > div:nth-child(3) img {
     width: 100%;
     background: <?php echo WHITE_BACKGROUND; ?>;
     padding: 2%;
     border-radius: <?php echo BORDER_RADIUS; ?>;
}
form {
     margin: 2%;
     display: block;
}
input[type="text"] {
     font-size: 1em;
     border-radius: 4px;
     border: <?php echo BORDER; ?>;
}
.wrapper input[type="submit"]  {
     border: <?php echo BORDER_RADIUS; ?>;
     -webkit-border-radius: <?php echo BORDER_RADIUS; ?>;
     -moz-border-radius: <?php echo BORDER_RADIUS; ?>;
     border-radius: <?php echo BORDER_RADIUS; ?>;
     font-size: <?php echo BASE_FONT_SIZE; ?>;
     padding: .5em;
     cursor: pointer;
     -webkit-transition: <?php echo BUTTON_HOVER_TRANISTION; ?>;
     -moz-transition: <?php echo BUTTON_HOVER_TRANISTION; ?>;
     -ms-transition: <?php echo BUTTON_HOVER_TRANISTION; ?>;
     -o-transition: <?php echo BUTTON_HOVER_TRANISTION; ?>;
     transition: <?php echo BUTTON_HOVER_TRANISTION; ?>;
     margin: 2% auto;
     display: block;
}
.wrapper input[type="submit"]:hover {
     -webkit-box-shadow: 0 2px  1px rgba(0,0,0,.10);
     -moz-box-shadow: 0 2px  1px rgba(0,0,0,.10);
     box-shadow: 0 2px  1px rgba(0,0,0,.10);
}
.user_information_area {
     height: 60px;
     background: #222;
     box-shadow: 0 1px 0 0 rgba(0,0,0,.25);
}
.user_info_inner {
     float: right;
     width: 30%;
}
.user_info_inner span {
     float: left;
     margin: 4% auto;
}
.user_information_area span:before {
     color: #fff;
     padding: 0 2% 0 0;
     font-size: 1em;
}
.user_info_inner h2 {
     font-size: 1em;
     margin: 4% 5% 2% 2%;
     color: #fff;
     float: left;
}
.logout_link {
     display: inline-block;
     float: left;
     margin: 2% auto;
}
.logout_link a {
     background: <?php echo WHITE_BACKGROUND; ?>;
     display: block;
     padding: .5em;
     text-decoration: none;
     color: #fff;
     border: <?php echo BORDER_RADIUS; ?>;
     -webkit-border-radius: <?php echo BORDER_RADIUS; ?>;
     -moz-border-radius: <?php echo BORDER_RADIUS; ?>;
     border-radius: <?php echo BORDER_RADIUS; ?>;
     padding: .5em;
     cursor: pointer;
     -webkit-transition: all 1s;
     -moz-transition: all 1s;
     -ms-transition: all 1s;
     -o-transition: all 1s;
     transition: all 1s;
}

/*country_consumption.php----*/
.chosen_country {
     font-size: 3em;
     text-align: center;
     margin: 2% auto;
     line-height: 1.25em;
     width: 50%;
     background: #fff;
     border-radius: <?php echo BORDER_RADIUS; ?>;
     border: <?php echo BORDER; ?>;
     padding: <?php echo TEXT_PADDING; ?>%;

}
#canvas {
     background: <?php echo WHITE_BACKGROUND; ?>;
     margin: 2% auto;
     display: block;
     padding: 1%;
     border-radius: <?php echo BORDER_RADIUS; ?>;
     border: <?php echo BORDER; ?>;
}




























