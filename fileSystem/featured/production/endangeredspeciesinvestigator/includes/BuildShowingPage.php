<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 12/4/2015
 * Time: 1:10 AM
 */

class BuildingShowingPage
{
     private $mAnimals;
     private $mType;

     function __construct($records, $type)
     {
          $this->mAnimals = $records;
          $this->mType = $type;
     }

     function buildPage()
     {
          echo '<img src="images/headers/' . $this->mType . '.jpg" class="img-responsive showing_header_img" alt="Image">';
          echo '<div class="container-fluid">' . "\n";
          echo '<h1 class="showing_header center-block">' . ucfirst($this->mType) . '</h1>';
          echo '  <div class="row center-block">' . "\n";
          echo '    <div class="col-xs-12 col-sm-5 col-md-6 col-lg-5" id="js_select_area">' . "\n";
          echo '      <div class="panel panel-default">';
          echo '        <div class="panel-heading text-center"><h1>Click Thumb to Investigate</h1></div>' . "\n";
          echo '         <div class="panel-body">' . "\n";
          echo '           <div id="selectableArea"  class="center-block">' . "\n";
          foreach ($this->mAnimals as $animal) {
               $thumb = $animal->getThumb();
               $id = $animal->getId();
               echo '          <div class="ui-state-default img-thumbnail center-block img-responsive" id="' . $id . '"';
               echo ' style="background: url('. $thumb . ') no-repeat; background-size: 100% auto;"';
               echo '></div>' . "\n";
          }
          echo '           </div>' . "\n";
          echo '         </div>' . "\n";
          echo '       </div>' . "\n";
          echo '     </div>' . "\n";
          echo '  <div class="col-xs-12 col-sm-7 col-md-6 col-lg-7" id="js_info_area">' . "\n";
          foreach ($this->mAnimals as $animal) {
               $common = $animal->getCommon();
               $description = $animal->getDescription();
               $image = $animal->getImage();
               $science = $animal->getScience();
               $id = $animal->getId();
               $url = $animal->getUrl();
               echo '    <div class="panel panel-primary" id="panel' . $id . '">' . "\n";
               echo '      <div class="panel-heading"><h1>' . $common . '</h1></div>' . "\n";
               echo '        <div class="panel-body">' . "\n";
               echo '          <div class="row">' . "\n";
               echo '            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">' . "\n";
               echo '              <h3>' . $science . '</h3>' . "\n";
               echo '              <h4><a href="' . $url . '" target="_blank">Wiki Article on ' . $common .'</a></h4>' . "\n";
               echo '              ' . $description  . "\n";
               echo '              <h6>' . $url . '</h6>' . "\n";
               echo '            </div>' . "\n";
               echo '            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">' . "\n";
               echo '              <img src="' . $image . '" class="img-responsive center-block" alt="Image">' . "\n";
               echo '            </div>' . "\n";
               echo '         </div>' . "\n";
               echo '       </div>' . "\n";
               echo '     </div>' . "\n";
          }
          echo '    </div>' . "\n";
          echo '  </div>' . "\n";
          echo '</div>' . "\n";
     } // End buildPage
} // End BuildingShowingPage