<!doctype html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Testing Numbers</title>
</head>
<body>
     <?php
          /**
           * Created by PhpStorm.
           * User: Nomad_Mystic
           * Date: 10/5/2015
           * Time: 10:27 PM
           */

          $a = 1.2e3; //1200
          $b = 2.34e-2; // .0234

          echo '<p>' . $a . ' ' . $b . '</p>';

          $a = 0.1;
          $b = 0.7;
          $c = ($a + $b) * 10;

          echo '<p>' . (int)($c + 0.000000001) . '</p>';

          $a_int_value_1 = 5;
          $a_int_value_2 = 7;
          $a_float_value_1 = 23.4;
          $a_float_value_2 = 6.2;

          echo '<p>a / b (int) ' . ($a_int_value_1 /  $a_int_value_2) . '</p>';
          echo '<p>a / b (float) ' . ($a_float_value_1 /  $a_float_value_2) . '</p>';
          echo '<p>a + b (int) ' . ($a_int_value_1 +  $a_int_value_2) . '</p>';
          echo '<p>a + b (float) ' . ($a_float_value_1 +  $a_float_value_2) . '</p>';
          echo '<p>a + b (float + int) ' . ($a_float_value_1 +  $a_int_value_2) . '</p>';
          echo '<p>a * b (int) ' . ($a_int_value_1 *  $a_int_value_2) . '</p>';
          echo '<p>a * b (float) ' . ($a_float_value_1 *  $a_float_value_2) . '</p>';
          echo '<p>a - b (int) ' . ($a_int_value_1 -  $a_int_value_2) . '</p>';
          echo '<p>a - b (float) ' . ($a_float_value_1 -  $a_float_value_2) . '</p>';
          echo '<p>a % b (int) ' . ($a_int_value_1 %  $a_int_value_2) . '</p>';
          echo '<p>a % b (float) ' . ($a_float_value_1 %  $a_float_value_2) . '</p>';


          echo '<p>' . 2 ** 3 . '</p>';
          echo pow(2,3);

          echo '<p>' . (16 ** 0.5) . '</p>';
          echo '<p>a is ' . $a . '</p>';
          $a = $a + 2;
          $a += 2;
          $a *= 2;
          $a /= 2;
          $a %= 5;
          echo '<p>a is ' . $a . '</p>';


          $a++;
          $a += 1; // same as ^^^
          $a = $a + 1; // Same as ^^^

          $a--;
          $a -= 1;
          $a = $a -1;
          echo '<p> a is: ' . $a . '</p>';

          ++$a;
          echo '<p> a++ = ' . $a++ . '</p>' . '<p>Now a = ' . $a . '</p>';
          echo '<p> a-- = ' . $a-- . '</p>' . '<p>Now a = ' . $a . '</p>';
          echo '<p> ++a = ' . ++$a . '</p>' . '<p>Now a = ' . $a . '</p>';
          echo '<p> a = ' . --$a . '</p>' . '<p>Now a = ' . $a . '</p>';
     ?>
</body>
</html>



