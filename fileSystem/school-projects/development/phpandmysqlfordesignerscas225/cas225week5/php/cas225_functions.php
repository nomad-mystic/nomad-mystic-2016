<?php

// cas225_functions.php - week 4 - Revision 1 10-17-12 5:30 pm

/*
File Name: cas225_functions.php
Date: 10/09/2015
Programmer: Keith Murphy
*/

function check_submitted($field_name, $field_type, &$missing_count) {

     // Check for undefined variable (not submitted) on all but checkbox
     if(!isset($_POST[$field_name])) {

          $_POST[$field_name]=""; // set a default value if no value was submitted, to prevent errors in later code

          if($field_type <> "checkbox") { // checkboxes usually don't have to be checked -- they are usually optional
               echo "Missing data for <strong>" . $field_name . "</strong>.<br />";
               $missing_count++;
          }

     }

     // For text, textarea, and select check for present but empty
     // Note use of elseif instead of if, which means only one of the if blocks will run but not both
     elseif($field_type == "text" || $field_type == "textarea" || $field_type == "select") {

          if(trim($_POST[$field_name]) == "") {

               echo "Missing data for <strong>" . $field_name . "</strong>.<br />";
               $missing_count++;

          } // end if($_POST...)

     } // end if($field_type...)

} // end function

function count_errors($missing_count) {

     if($missing_count > 0) {
          echo "<br />Please <a href='guestbook_add.php'>Go Back</a> and fill in the missing data.<br /><br /></div></body></html>";
          exit;

     }

}

function sanitize($field_name, $field_type, &$field_value) {

     if($field_type == "text" || $field_type == "textarea") {

          $_POST[$field_name] = trim($field_value);
          $_POST[$field_name] = stripslashes(strip_tags($field_value)); // strip html tags and back slashes
          $_POST[$field_name] = str_replace("/","",$field_value); // removes forward slashes
          $_POST[$field_name] = addslashes($field_value); // escapes quote marks so they will work in SQL statements
          echo "The field <b>" . $field_name . "</b> has been sanitized.<br>";

     }

}

function display_data($field_name, $field_type, $field_value) {

     if($field_type == "checkbox") {

          if($field_value != "") {

               echo $field_name . ": <strong>" . $field_value . "</strong>";
          }

          else {
               echo $field_name . ": <strong>no</strong>";
          }

     } // end field type checkbox

     else {
          echo $field_name . ": <strong>" . $field_value . "</strong><br /><br />";
     } // end else for field type checkbox

} // end function

?>