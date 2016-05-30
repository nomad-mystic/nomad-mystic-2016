<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 10/21/2015
 * Time: 11:22 PM
 */


define('SCORE', 'score');
define('TYPE', 'type');
define('LETTER_GRADE', 'letter');
define('PASS_FAIL', 'pf');
define('AUDIT', 'audit');





if(!isset($_GET[SCORE])):
     echo '<h1>' . ' WE NEED A SCORE ' . '</h1>';
     exit;
endif;

if(!isset($_GET[TYPE])):
     echo '<h1>' . ' WE NEED A GRADE TYPE ' . '</h1>';
     exit;
endif;

$type = $_GET[TYPE];
$score = $_GET[SCORE];


switch ($type):
     case LETTER_GRADE:
     case PASS_FAIL:
     case AUDIT:
          break;
     default:
          echo '<h1>' . 'THE GRADE MUST BE "letter" OT "pf"' . '</h1>';
          exit;
endswitch;

if(!is_numeric($score)):
     echo '<h1>' . 'THIS IS NOT A NUMBER' . '</h1>';
     exit;
endif;

switch ($type):
     case LETTER_GRADE:
          if($score >= 90):
               $grade = 'A';

           elseif($score >= 80):
               $grade = 'B';

           elseif($score >= 70):
               $grade = 'C';

           elseif($score >= 60):
               $grade = 'D';

           else:
               $grade = 'F';
          endif;
          echo '<h1>' . "Students grade is $grade" . '</h1>';
          break;

     case PASS_FAIL:
          if($score >= 75) {
               echo '<h1>' . 'YOU PASSED THE CLASS' . '</h1>';
          } else  {
               echo '<h1>' . "YOU DON'T PASS THE CLASS" . '</h1>';
          }
          break;

     case AUDIT:
          echo '<h1>' . "YOU ARE AUDITING THIS CLASS" . '</h1>';
          break;

     default:
          echo '<h1>' . "DEFAULT" . '</h1>';
          break;
endswitch;








