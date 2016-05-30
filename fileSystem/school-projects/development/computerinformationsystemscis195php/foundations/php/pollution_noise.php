<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 10/22/2015
 * Time: 2:25 AM
 */

$pollution = [];

$file = fopen('data/pollution_noise.csv', 'r');
if(!$file) {
     echo '<h1>Error, File wasn\'t Found...</h1>';
     exit;
}

do {
     $line = fgetcsv($file);
     if(!$line) {
          break;
     }
     $pollution = $line;

} while($line);

var_dump($pollution);
$total = [$pollution];
$total
?>

<!doctype html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Pollution Noise Levels</title>
</head>
<body>
<h1></h1>
<p>The data are from a statement by Texaco, Inc. to the Air and Water Pollution
     Subcommittee of the Senate Public Works Committee on June 26, 1973.
     Mr. John McKinley, President of Texaco, cited an automobile filter developed
     by Associated Octel Company as effective in reducing pollution. However,
     questions had been raised about the effects of filters on vehicle performance,
     fuel consumption, exhaust gas back pressure, and silencing. On the last
     question, he referred to the data included here as evidence that the silencing
     properties of the Octel filter were at least equal to those of standard silencers.</p>
<table>
     <tr>
          <th>http://lib.stat.cmu.edu/DASL/Datafiles/airpullutionfiltersdat.html</th>
          <th>NOISE</th>
          <th>SIZE</th>
          <th>TYPE</th>
          <th>SIDE</th>
     </tr>
     <tr>
          <?php echo "<td>$total</td>"; ?>
     </tr>
</table>
</body>
</html>
