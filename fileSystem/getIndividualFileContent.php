<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 5/15/2016
 * Time: 8:19 PM
 */

header('Access-Control-Allow-Origin: * ');
header("Content-Type: text/plain");

// Post type featured, websites, school-projects
$target_post_folder = $_GET['target_post_folder_type'];

// target project
$target_folder = $_GET['get_individual_project_folder'];

// get the current tab selected
$target_tab_selected = $_GET['tab_selected'];

// gets the folder for the individual class selected
//$title_of_school_class_selected = $_GET['title_of_school_class_selected'];

// target file
$individual_target_file = $_GET['individual_target_file'];


// individual file
//echo $individual_target_file;

// target folder
//echo $target_post_folder;

$file_query = "$target_post_folder/development/$target_folder/$target_tab_selected/$individual_target_file";
if (!empty($individual_target_file)) {
    $file_content = file_get_contents($file_query);
    echo htmlspecialchars($file_content);
}

