<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 12/3/2015
 * Time: 5:25 PM
 */

header('Content-Type: text/css');

 ?>

/*----General Styles---*/
body {
     background: #0178A8;
}

/*----for the landing page----*/
.landing_page .page-header {
     background: #fff;
     padding: 1em;
     border-radius: 2px;
     box-shadow: 0 2px 2px 0 rgba(0,0,0,.2);
}
.formContainer {
     margin: 1% auto 5%;
}

/*----------for jquery----*/
#feedback {
     font-size: 1.4em;
}
#selectableArea .ui-selecting {
     background: #FECA40;
}
#selectableArea .ui-selected {
     background: #F39814;
     color: white;
}
#selectableArea {
     list-style-type: none;
}
#js-selectArea {
     border: solid 2px rgba(0,0,0,.5);
     margin: 0 auto;
}
#selectableArea div {
     margin: 3px;
     padding: 1px;
     float: left;
     font-size: 4em;
     text-align: center;
     cursor: pointer;
}

/* for the showing page */
.container-fluid {
     margin: 1% auto;
}
.showing_header {
     text-align: center;
     color: #333;
     background: #fff;
     padding: 1em;
     border-radius: 3px;
     width: 90%;
}
.showing_header_img {
     box-shadow: 0 2px 2px 2px rgba(0,0,0,.05);
}
#js_info_area {
     position: relative;
}
#js_info_area .panel {
     opacity: 0;
     position: absolute;
     top: 0;
     left: 0;
}

/* Media Queries */
@media screen and (max-width: 767px) {
     #selectableArea div {
          width: 130px;
          height: 130px;
     }
}
@media screen and (min-width: 768px) {
     #selectableArea div {
          width: 100px;
          height: 100px;
     }
}
@media screen and (min-width: 1280px) {
     #selectableArea div {
          width: 150px;
          height: 150px;
     }
}