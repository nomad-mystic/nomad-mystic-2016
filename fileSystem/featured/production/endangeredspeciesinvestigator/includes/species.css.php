<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 12/3/2015
 * Time: 5:25 PM
 */

header('Content-Type: text/css');

?>
/*----helper functions---*/
.displayNone {
     display: none;
}
/*----General Styles---*/
body {
     background: #0178A8;
}

h1 {
     font-family: 'Crimson Text', Arial, Helvitica, serif;
     margin: 1% auto;
}
h2 {
     text-align: center;
     font-family: 'Crimson Text', Arial, Helvitica, serif;
}
h3 {
     text-align: center;
     font-family: 'Crimson Text', Arial, Helvitica, serif;
     font-size: 2em;
}
h4 {
     text-align: center;
     font-family: 'Crimson Text', Arial, Helvitica, serif;
     font-size: 1.5em;
}
h6 {
     text-align: center;
}
p {
     text-align: center;
}
legend {
     font-family: 'Crimson Text', Arial, Helvitica, serif;
     padding: 0 0 2%;
}
blockquote {
     font-size: 14px;
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
     background: transparent;
}
#selectableArea .ui-selected {
     background: transparent;
     color: white;
}
#selectableArea {
     list-style-type: none;
}
#js_select_area {
     margin: 0 auto;
     padding-right: 0;
     padding-left: 0;
}
#selectableArea .individualThumbItem {
     font-size: 4em;
     text-align: center;
     cursor: pointer;
     display: block;
/*     text-indent: -1000px; hide link text */
     overflow: hidden;
}
.individualThumbnail {
     width: 300px;
     height: 300px;
     margin: 2% auto;
     border-radius: 4px;
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
     width: 100%;
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
.panel-primary img {
     border-radius: 4px;
}
.animalThumbnail > a {
     display: block;
     height: 200px;
     /* for center alignment */
     position: relative;
}
.animalThumbnail > a > img {
     max-width: 100%;
     max-height: 100%;
     /* for center alignment */
     position: absolute;
     left: 0;
     right: 0;
     top: 0;
     bottom: 0;
     margin-top: auto;
     margin-bottom: auto;
     border-radius: 4px;
     border: 1px solid #aaa;
     padding: 1px;
}
/* Media Queries */
/* Small devices (tablets, 768px and up) */
@media screen and (min-width: 768px) {
     #js_select_area {
          padding-right: 15px;
     }
     #selectableArea .individualThumbnail  {

     }
}

/* Medium devices (desktops, 992px and up) */
@media screen and (min-width: 992px) {

}

@media screen and (min-width: 1280px) {
     #selectableArea div {
/*          width: 150px;*/
/*          height: 150px;*/
     }
}