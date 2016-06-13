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

function write_output($text, $start = '<p>', $end = '</p>')
{
     echo $start . $text . $end;
}

function validate_score()
{

     $score = $_GET[SCORE];

     if (!isset($_GET[SCORE])) {
          echo '<h1>' . ' WE NEED A SCORE ' . '</h1>';
          exit;
     }
     if (!is_numeric($score)) {
          write_output('' . 'THIS IS NOT A NUMBER' . '');
          exit;
     }

     return $score;
}
function validate_type()
{
     if (!isset($_GET[TYPE])) {
          write_output('WE NEED A GRADE TYPE');
          exit;
     }

     $type = $_GET[TYPE];
     switch ($type) {
          case LETTER_GRADE:
          case PASS_FAIL:
          case AUDIT:
               break;
          default:
               write_output('' . 'THE GRADE MUST BE "letter" OT "pf"' . '');
               exit;
     }

     return $type;
}

function grading($type, $score)
{
     switch ($type) {
          case LETTER_GRADE:
               output_letter_grade($score);
               break;

          case PASS_FAIL:
               output_pass_fail($score);
               break;

          case AUDIT:
               output_audit();
               break;

          default:
               output_unknown_type($type);
               break;
     }
}

function output_pass_fail($score) {
     if ($score >= 75) {
          write_output('' . 'YOU PASSED THE CLASS' . '');
     } else  {
          write_output('' . "YOU DON'T PASS THE CLASS" . '');
     }
}

function output_audit()
{
     write_output('' . "YOU ARE AUDITING THIS CLASS" . '');
}

function output_unknown_type($type)
{
     write_output('' . "DEFAULT" . $type . '');
}


function output_letter_grade($score)
{
     if($score >= 90) {
          $grade = 'A';

     } else if($score >= 80){
          $grade = 'B';

     } else if($score >= 70) {
          $grade = 'C';

     } else if($score >= 60) {
          $grade = 'D';

     } else {
          $grade = 'F';
     }
          write_output('' . "Students grade is $grade" . '');
}


function main()
{
     $type = validate_type();
     validate_type($type);
     validate_score();
     $score = validate_score();
     grading($type, $score);
}
main();