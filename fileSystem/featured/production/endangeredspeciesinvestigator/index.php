<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 12/3/2015
 * Time: 5:36 PM
 */
require_once('includes/constants.php');

?>

<!doctype html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Endangered Species Investigator</title>
     <meta name="viewport"
           content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

     <link href='https://fonts.googleapis.com/css?family=Crimson+Text' rel='stylesheet' type='text/css'>
     <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap-theme.css">
     <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="includes/species.css.php" type="text/css">
</head>
<body>
<img src="images/headers/jumbotron_for_landing.jpg" class="img-responsive" alt="Image">
<div class="container-fluid landing_page">
     <div class="row center-block">
          <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-lg-offset-2 col-md-offset-2">
               <div class="page-header text-center">
                 <h1>Endangered Species Investigator</h1>
               </div>
          </div>
     </div>
	<div class="row formContainer center-block">
<!--          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 center-block"></div>-->
          <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 center-block">
               <div class="panel panel-default">
                    <div class="panel-body">
                         <form action="showing_page.php" method="post" role="form" class="text-center">
                              <legend>Select Animal Type</legend>

                              <div class="form-group">
                                   <div class="radio">
                                        <label>
                                             <input type="radio" name="animal_type" id="1" value="mammal">
                                             Mammal
                                        </label>
                                        <label>
                                             <input type="radio" name="animal_type" id="2" value="birds">
                                             Birds
                                        </label>
                                        <label>
                                             <input type="radio" name="animal_type" id="3" value="reptiles">
                                             Reptiles
                                        </label>
                                        <label>
                                             <input type="radio" name="animal_type" id="4" value="amphibians">
                                             Amphibians
                                        </label>
                                        <label>
                                             <input type="radio" name="animal_type" id="5" value="fish">
                                             Fish
                                        </label>
                                   </div>
                              </div>
                              <button type="submit" class="btn btn-primary">Submit</button>
                         </form>
                    </div>
               </div>
          </div><!--end col-->
          <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
               <div class="panel panel-default">
                    <div class="panel-heading">
                         <h2 class="panel-title">Threats to Biodiversity</h2>
                    </div>
                    <div class="panel-body">
                         <h4>Biodiversity and Ecological Services</h4>
                         <p>Biodiversity supports many ecosystem services:</p>
                         <blockquote>
                              <p>"There is now unequivocal evidence that biodiversity loss reduces the efficiency by which
                                   ecological communities capture biologically essential resources, produce biomass, decompose
                                   and recycle biologically essential nutrients... There is mounting evidence that biodiversity
                                   increases the stability of ecosystem functions through time... Diverse communities are more
                                   productive because they contain key species that have a large influence on productivity, and
                                   differences in functional traits among organisms increase total resource capture...
                                   The impacts of diversity loss on ecological processes might be sufficiently large to rival
                                   the impacts of many other global drivers of environmental change... Maintaining multiple
                                   ecosystem processes at multiple places and times requires higher levels of biodiversity
                                   than does a single process at a single place and time."</p>
                         </blockquote>
                         <p>&nbsp;</p>
                         <h4>Biodiversity and Human Health</h4>
                         <p>Biodiversity's relevance to human health is becoming an international political issue, as scientific
                              evidence builds on the global health implications of biodiversity loss. This issue is
                              closely linked with the issue of climate change, as many of the anticipated health risks of
                              climate change are associated with changes in biodiversity (e.g. changes in populations and distribution
                              of disease vectors, scarcity of fresh water, impacts on agricultural biodiversity and food resources etc.)
                              This is because the species most likely to disappear are those that buffer against infectious disease
                              transmission, while surviving species tend to be the ones that increase disease transmission, such as
                              that of West Nile Virus, Lyme disease and Hantavirus, according to a study done co-authored by Felicia
                              Keesing, an ecologist at Bard College, and Drew Harvell, associate director for Environment of the
                              Atkinson Center for a Sustainable Future (ACSF) at Cornell University.</p>
                    </div>
               </div>
          </div><!--end col-->
	</div><!--end row-->
</div><!--end container-fluid-->
<img src="images/headers/jumbotron_footer.jpg" class="img-responsive" alt="Image">
</body>
</html>
