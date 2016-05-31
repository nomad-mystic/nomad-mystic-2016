<!-- cas225_functions.php Revision 7 11-3-15 11:30 pm -->

<!-- Requirements:
a) Please do not remove any of my comments in this code. I need them for grading.
b) Type code for only one step at a time, then run it in your browser to test it before moving to the next step. 
Some of the code will not display any output, but you still need to test it to be sure there are no error messages. 
Trouble-shooting is very difficult if many steps are entered at once. Do not ask me for help with your code if you are 
not testing one step at a time!
-->

<!-- ==========================================================================================================
PLEASE DO NOT ATTEMPT TO WORK THROUGH THIS FILE WITHOUT FOLLOWING MY INSTRUCTIONS IN ASSIGNMENT 7, PART 2.
I HAVE A SPECIFIC SERIES OF STEPS I WOULD LIKE YOU TO FOLLOW.
========================================================================================================== -->

<?php

// HEADER

// 1. Update the Header information below (all 3 lines).

/*
File Name: cas225_functions.php
Date: 11/07/2015
Programmer: Keith Murphy
*/

// 2. Copy the select_box() function below this comment.
// You can find this function at: http://oak.pcc.edu/cas225/week7/selectbox.txt

// See Part 1, Step 2: Dynamic Select Boxes, #5 for an explanation.

function select_box($field_name, $table_name, $result){

     // Note: \n is a newline character, added so you can see line breaks when you do View, Source.

     $options = "        \n<select name='$field_name'>\n<option value=''>Select username</option>" . "\n";

     while($rows = $result->fetch(PDO::FETCH_ASSOC)) {

          $name = $rows["username"];

          $options .= "        \n<option value='$name'>" . $name . "</option>" . "\n";
     }

     $options .= "     \n</select>\n";
     return "$options";

}

// 3. Copy the multi_select_box function below this comment. 
// You can find this function at: http://oak.pcc.edu/cas225/week7/multiselectbox.txt

// See Part 1, Step 2: Dynamic Select Boxes, #5 for an explanation.

function multi_select_box($field_name1, $field_name2, $field_name3, $result){

     // Note: \n is a newline character, added so you can see line breaks when you do View, Source.

     $options = "        \n<select name='$field_name1'>\n<option value=''>Select a record</option>";

     while($rows = $result->fetch(PDO::FETCH_ASSOC)) {

          $id = $rows["id"];
          $name = $rows["username"];
          $comment = $rows["comment"];

          $options .= "        \n<option value=" . $id . ">" . $id . " | " . $name . " | " . $comment . "</option>";

     }

     $options .= "    \n</select>\n";
     return "$options";

}

function check_submitted($field_name, $field_type, &$missing_count) {

    // Check for undefined variable (not submitted) on all but checkbox
    if(!isset($_POST[$field_name])) { 
    
          $_POST[$field_name]=""; // set a default value if no value was submitted, to prevent errors
          
          if($field_type <> "checkbox") { // checkboxes usually don't have to be checked

          
               echo "Missing data for <strong>" . $field_name . "</strong>.<br />";
               $missing_count++;
          }
          
    }
    
    // For text, textarea, and select check for present but empty
    // Note use of elseif instead of if, which means only one of the 'if' blocks will run, not both.
    elseif($field_type == "text" || $field_type == "textarea" || $field_type == "select") { 
    
         if(trim($_POST[$field_name]) == "") {

              echo "Missing data for <strong>" . $field_name . "</strong>.<br />";
              $missing_count++;
    
         } // end if($_POST...)
         
    } // end if($field_type...)

} // end function 

function sanitize($field_name, $field_type, &$field_value) {

    if($field_type == "text" || $field_type == "textarea") {
     
         $field_value = trim($field_value);
         $field_value = stripslashes(strip_tags($field_value)); // strip html tags and back slashes
         $field_value = addslashes($field_value); // escapes quote marks so they will work in SQL statements
         $_POST[$field_name] = str_replace("/","",$field_value); // removes forward slashes
         
    }
     
}

function display_data() {

     echo "<h3><em>Thank you for filling out the form!<br />You submitted the following information:</em></h3><br />";

     foreach ($_POST as $key => $value) {
     
          echo $key . ": <strong>" . $value . "</strong><br /><br />";
          
     }

}

?>