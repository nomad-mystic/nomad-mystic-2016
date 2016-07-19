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
          echo '    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="js_select_area">' . "\n";
          echo '      <div class="panel panel-default">';
          echo '        <div class="panel-heading text-center"><h2>Click Thumbnail to Investigate</h2></div>' . "\n";
          echo '         <div class="panel-body">' . "\n";
          echo '            <div class="row">' . "\n";
          echo '           <div id="selectableArea" class="">' . "\n";
          echo '           </div><!--selectableArea-->'  . "\n";
          echo '           </div><!--row-->' . "\n";
          echo '         </div>' . "\n";
          echo '       </div>' . "\n";
          echo '     </div>' . "\n";
          echo '  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="js_info_area">' . "\n";
          foreach ($this->mAnimals as $animal) {
               $common = $animal->getCommon();
               $description = $animal->getDescription();
               $image = $animal->getImage();
               $science = $animal->getScience();
               $id = $animal->getId();
               $url = $animal->getUrl();
               echo '    <div class="panel panel-primary displayNone" id="panel-' . $id . '">' . "\n";
               echo '      <div class="panel-heading"><h2>' . $common . '</h2></div>' . "\n";
               echo '        <div class="panel-body">' . "\n";
               echo '          <div class="row">' . "\n";
               echo '            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">' . "\n";
               echo '              <h3>' . $science . '</h3>' . "\n";
               echo '              <h4><a href="' . $url . '" target="_blank">Wiki Article on ' . $common .'</a></h4>' . "\n";
               echo '              ' . $description  . "\n";
               echo '              <h6>Source: ' . $url . '</h6>' . "\n";
               echo '            </div>' . "\n";
               echo '            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">' . "\n";
               echo '              <img src="' . $image . '" class="img-responsive center-block" alt="' . $science . '">' . "\n";
               echo '            </div><!--end col-->' . "\n";
               echo '         </div>' . "\n";
               echo '       </div>' . "\n";
               echo '     </div>' . "\n";
          }
          echo '    </div>' . "\n";
          echo '  </div>' . "\n";
          echo '</div>' . "\n";
     } // End buildPage
} // End BuildingShowingPage

//foreach ($this->mAnimals as $animal) {
//    $thumb = $animal->getThumb();
//    $id = $animal->getId();
//    echo '       <div class="xs-col-12 sm-col-12 md-col-4 lg-col-4">'  . "\n";
//    echo '          <div class="ui-state-default img-thumbnail center-block img-responsive" id="' . $id . '"';
//    echo ' style="background: url('. $thumb . ') no-repeat; background-size: 100% auto;"';
//    echo '></div>' . "\n";
//    echo '       </div>'  . "\n";
//}

//          foreach ($this->mAnimals as $animal) {
//               $thumb = $animal->getThumb();
//               $id = $animal->getId();
//               $science = $animal->getScience();
//               echo '       <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 individualThumbItem ui-state-default">'  . "\n";
//               echo '       <img src="' . $thumb . '"
//                                 class="img-thumbnail img-responsive"
//                                 id="' . $id . '"
//                                 alt="' . $science . '">';
//               echo '          <div class="thumbnail">
//                                    <a href="#"><img class="img-responsive" src="' . $thumb . '" alt=""></a>
//                               </div>';

//               echo '  <div style="background: url('. $thumb . ') no-repeat; background-size: 100% auto;"
//                            id="' . $id . '"
//                            class="individualThumbnail"
//                            ></div>';
//               echo '       </div><!--end col-->'  . "\n";
//          }
