<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 12/3/2015
 * Time: 5:37 PM
 */

require_once('includes/constants.php');
require_once('includes/db_constants.php');
require_once('includes/records.php');
require_once('includes/EndangeredSpeciesRecord.php');
require_once('includes/EndangeredSpeciesSet.php');
require_once('includes/BuildShowingPage.php');
require_once('includes/AnimalSet.php');

$type = $_POST[ANIMAL_TYPE_KEY];

$records = new AnimalSet($type, $animalData);
$showing_page = new BuildingShowingPage($records->getRecords(), $type);

?>

<!doctype html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Showing Page</title>
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
     <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="includes/species.css.php" type="text/css">
</head>
<body>

     <?php $showing_page->buildPage(); ?>

     <script src="bower_components/jquery/dist/jquery.min.js"></script>
     <script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
     <script src="bower_components/velocity/velocity.min.js"></script>
     <script src="includes/species.js.php"></script>
</body>
</html>
