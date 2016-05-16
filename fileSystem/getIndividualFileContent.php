<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 5/15/2016
 * Time: 8:19 PM
 */

header('Access-Control-Allow-Origin: * ');
header("Content-Type: text/plain");

// Post type featured, websites, school
$target_post_folder = $_GET['targetPostFolderType'];

// target project
$target_folder = $_GET['getIndividualProjectValue'];

// get the current tab selected
$target_tab_selected = $_GET['tabSelected'];

// target file
$individual_target_file = $_GET['individualTargetFile'];


// individual file
//echo $individual_target_file;

// target folder
//echo $target_post_folder;

$file_query = "$target_post_folder/development/$target_folder/$target_tab_selected/$individual_target_file";

if (!empty($individual_target_file)) {
    $file_content = file_get_contents($file_query);
    echo htmlspecialchars($file_content);
}
