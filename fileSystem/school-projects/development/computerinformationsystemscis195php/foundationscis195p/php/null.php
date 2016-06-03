<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 10/12/2015
 * Time: 7:47 PM
 */


$value1 = NULL;
$value2 = is_null($value1);
$value3 = is_null("");

//echo 'Value1  ' . gettype($value1) . ', value: "' . $value1 . '"<br>';
//echo 'Value2  ' . gettype($value2) . ', value: "' . $value2 . '"<br>';
//echo 'Value3  ' . gettype($value3) . ', value: "' . $value3 . '"<br>';


$value4 = isset($value1);
$value5 = isset($value6);

//echo 'Value4  ' . gettype($value4) . ', value: "' . $value3 . '"<br>';
//echo 'Value5  ' . gettype($value5) . ', value: "' . $value5 . '"<br>';


$a1 = NULL;
$a2 = '';
$a3 = 0;
$a4 = true;
$a5 = false;
$a6 = 'Fred';
$a7 = 1;


?>

<!doctype html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Empty</title>
     <style>
          td {
               border: 2px solid #000;
          }
     </style>
</head>
<body>
<!--is_null, isset, and empty-->
<table>
     <tr>
          <th>Variable</th>
          <th>Type</th>
          <th>Value</th>
          <th>is_null</th>
          <th>isset</th>
          <th>empty</th>
     </tr>
     <tr>
          <td>$a1</td>
          <td><?php echo gettype($a1); ?></td>
          <td><?php echo $a1; ?></td>
          <td><?php echo is_null($a1); ?></td>
          <td><?php echo isset($a1); ?></td>
          <td><?php echo empty($a1); ?></td>
     </tr>
     <tr>
          <td>$a2</td>
          <td><?php echo gettype($a2); ?></td>
          <td><?php echo $a2; ?></td>
          <td><?php echo is_null($a2); ?></td>
          <td><?php echo isset($a2); ?></td>
          <td><?php echo empty($a2); ?></td>
     </tr>
     <tr>
          <td>$a3</td>
          <td><?php echo gettype($a3); ?></td>
          <td><?php echo $a3; ?></td>
          <td><?php echo is_null($a3); ?></td>
          <td><?php echo isset($a3); ?></td>
          <td><?php echo empty($a3); ?></td>
     </tr>
     <tr>
          <td>$a4</td>
          <td><?php echo gettype($a4); ?></td>
          <td><?php echo $a4; ?></td>
          <td><?php echo is_null($a4); ?></td>
          <td><?php echo isset($a4); ?></td>
          <td><?php echo empty($a4); ?></td>
     </tr>
     <tr>
          <td>$a5</td>
          <td><?php echo gettype($a5); ?></td>
          <td><?php echo $a5; ?></td>
          <td><?php echo is_null($a5); ?></td>
          <td><?php echo isset($a5); ?></td>
          <td><?php echo empty($a5); ?></td>
     </tr>
     <tr>
          <td>$a6</td>
          <td><?php echo gettype($a6); ?></td>
          <td><?php echo $a6; ?></td>
          <td><?php echo is_null($a6); ?></td>
          <td><?php echo isset($a6); ?></td>
          <td><?php echo empty($a6); ?></td>
     </tr>
     <tr>
          <td>$a7</td>
          <td><?php echo gettype($a7); ?></td>
          <td><?php echo $a7; ?></td>
          <td><?php echo is_null($a7); ?></td>
          <td><?php echo isset($a7); ?></td>
          <td><?php echo empty($a7); ?></td>
     </tr>
     <tr>
          <td>$a8</td>
          <td><?php echo @gettype($a8); ?></td>
          <td><?php echo @$a8; ?></td>
          <td><?php echo @is_null($a8); ?></td>
          <td><?php echo @isset($a8); ?></td>
          <td><?php echo @empty($a8); ?></td>
     </tr>

</table>
<?php
// Boolean Comparison Operators
echo '1 === true: ' . (1 === true) . '<br>';
echo '1 == true ' . (1 == true) . '<br>';

echo '0 == false ' . (0 == false) . '<br>';
echo '0 === false: ' . (0 === false) . '<br>';

echo '1 != true: ' . (1 != true) . '<br>';
echo '1 !== true ' . (1 !== true) . '<br>';

echo '0 != false ' . (0 != false) . '<br>';
echo '0 !== false: ' . (0 !== false) . '<br>';

// Logical Operators
$a_bool = true;
$b_bool = false;

echo '$a_bool: ' . $a_bool . '<br>';
echo '$b_bool: ' . $b_bool . '<br>';

echo '$a_bool && $b_bool: ' . ($a_bool && $b_bool) . '<br>';
echo '$a_bool || $b_bool: ' . ($a_bool || $b_bool) . '<br>';
echo '$a_bool and $b_bool: ' . ($a_bool and $b_bool) . '<br>';
echo '$a_bool or $b_bool: ' . ($a_bool or $b_bool) . '<br>';


echo '!$a_bool && !$b_bool: ' . (!$a_bool && !$b_bool) . '<br>';
echo '!$a_bool || !$b_bool: ' . (!$a_bool || !$b_bool) . '<br>';
echo '!$a_bool and !$b_bool: ' . (!$a_bool and !$b_bool) . '<br>';
echo '!$a_bool or !$b_bool: ' . (!$a_bool or !$b_bool) . '<br>';


$answer = 'Y';
echo '$answer == "Y" || $answer == "y": ' . (($answer == "Y") || ($answer == "y")) . '<br>';

$answer = 'N';
echo '$answer == "Y" || $answer == "y": ' . ($answer == "Y" || $answer == "y") . '<br>';


$answer = 'Y';
echo 'Ternary: ' . ($answer == "Y" || $answer == "y" ? 'Yes' : 'No') . '<br>';
echo 'Ternary: ' . ($answer == "Y" or $answer == "y" ? 'Yes' : 'No') . '<br>';


// Type Juggling
$a_string = '3.12345';

$a_number = (int) $a_string;
echo 'A of type: ' . gettype($a_number) . ' with value of ' . $a_number . '</br>';

$a_float = (float) $a_string;
echo 'A of type: ' . gettype($a_float) . ' with value of ' . $a_float . '</br>';

$a_new_string = (string) $a_float;
echo 'A of type: ' . gettype($a_new_string) . ' with value of ' . $a_new_string . '</br>';

settype($a_number, 'string');
echo 'A of type: ' . gettype($a_number) . ' with value of ' . $a_number . '</br>';

settype($a_number , 'float');
echo 'A of type: ' . gettype($a_number) . ' with value of ' . $a_number . '</br>';

// Type Comparison

echo '0 == null' . (0 == null ? ' True' : ' false') . '<br>' ;
echo '"0" == null' . ("0" == null ? ' True' : ' false') . '<br>' ;
echo '0 == "0"' . (0 == "0" ? ' True' : ' false') . '<br>' ;
echo '"3x" == "3.0x"' . ("3x" == "3.0x" ? ' True' : ' false') . '<br>' ;


?>




</body>
</html>























