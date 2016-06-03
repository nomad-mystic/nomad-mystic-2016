<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 10/13/2015
 * Time: 1:02 AM
 */

define('FIRST', 'First Name');
define('LAST', 'Last Name');
define('POINTS', 'Points');

/*
$names = array(
     'Keith',
     'Olivia',
     'Isabella',
     'Noah',
     'William',
     'Madison',
     'Jacob'
);

echo 'First Name: ' . $names[0] . '<br>';
echo 'First Name: ' . $names[1] . '<br>';
echo 'First Name: ' . $names[2] . '<br>';
echo 'First Name: ' . $names[3] . '<br>';
echo 'First Name: ' . $names[4] . '<br>';
echo 'First Name: ' . $names[5] . '<br>';
echo 'First Name: ' . $names[6] . '<br>';

$names[] = 'Mark';
$names[] = 'Alice';

echo 'First Name: ' . $names[7] . '<br>';
echo 'First Name: ' . $names[8] . '<br>';

$account_info = array(
     FIRST => 'Keith',
     LAST => 'Murphy',
     POINTS => '100'
);

echo 'First Name: ' . $account_info[FIRST] . ' Last Name ' . $account_info[LAST] . ' with ' . $account_info[POINTS];
*/

/* $class_roster = array(
     array(
          FIRST => 'Keith',
          LAST => 'Murphy',
          POINTS => '100'
     ),
     array(
          FIRST => 'Phillip',
          LAST => 'Scott',
          POINTS => '10'
     ),
     array(
          FIRST => 'Mary',
          LAST => 'Smith',
          POINTS => '101'
     ),
     array(
          FIRST => 'Nick',
          LAST => 'Smith',
          POINTS => '90'
     ),
     array(
          FIRST => 'Macy',
          LAST => 'Lancasted',
          POINTS => '101'
     )
);*/
$class_roster = [
     [
          FIRST => 'Keith',
          LAST => 'Murphy',
          POINTS => '100'
     ],
     [
          FIRST => 'Phillip',
          LAST => 'Scott',
          POINTS => '10'
     ],
     [
          FIRST => 'Mary',
          LAST => 'Smith',
          POINTS => '101'
     ],
     [
          FIRST => 'Nick',
          LAST => 'Smith',
          POINTS => '90'
     ],
     [
          FIRST => 'Macy',
          LAST => 'Lancasted',
          POINTS => '101'
     ]
];
//echo var_dump($class_roster);
?>
<!doctype html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Class Arrays</title>
     <style>
          td {
               border: 1px solid black;
               text-align: center;
          }
     </style>
</head>
<body>
<table>
     <tr>
          <th><?php echo FIRST; ?></th>
          <th><?php echo LAST; ?></th>
          <th><?php echo POINTS; ?></th>
     </tr>
     <tr>
          <td><?php echo $class_roster[0][FIRST] ?></td>
          <td><?php echo $class_roster[0][LAST] ?></td>
          <td><?php echo $class_roster[0][POINTS] ?></td>
     </tr>
     <tr>
          <td><?php echo $class_roster[1][FIRST] ?></td>
          <td><?php echo $class_roster[1][LAST] ?></td>
          <td><?php echo $class_roster[1][POINTS] ?></td>
     </tr>
     <tr>
          <td><?php echo $class_roster[2][FIRST] ?></td>
          <td><?php echo $class_roster[2][LAST] ?></td>
          <td><?php echo $class_roster[2][POINTS] ?></td>
     </tr>
     <tr>
          <td><?php echo $class_roster[3][FIRST] ?></td>
          <td><?php echo $class_roster[3][LAST] ?></td>
          <td><?php echo $class_roster[3][POINTS] ?></td>
     </tr>
     <tr>
          <td><?php echo $class_roster[4][FIRST] ?></td>
          <td><?php echo $class_roster[4][LAST] ?></td>
          <td><?php echo $class_roster[4][POINTS] ?></td>
     </tr>

</table>
<?php //print_r(array_column($class_roster, POINTS)); ?>
</body>
</html>