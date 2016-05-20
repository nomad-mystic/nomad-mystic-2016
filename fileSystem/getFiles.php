<?php
/**
 * Created by PhpStorm.
 * User: endof
 * Date: 4/29/2016
 * Time: 9:25 PM
 */

header('Access-Control-Allow-Origin: * ');

// $filesArray
// fileArray[0] = type of folder/project
// filesArray[1] = individual project
// filesArray[2] = title_of_school_class_selected

function createFileSystem($filesArray)
{
//    var_dump($filesArray);
    // help function
    function is_dir_empty($dir)
    {
        if (!is_readable($dir)) {
            return null;
        }
        $handle = opendir($dir);
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                return false;
            }
        }
        return true;
    }
// parent folder class
//    $parent_folder_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/";


    if (!empty($filesArray[2])) {
//        $development_parent_folder_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]";
        $development_HTML_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]/$filesArray[2]/html";
        $development_PHP_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]/$filesArray[2]/php";
        $development_CSS_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]/$filesArray[2]/css";
        $development_images_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]/$filesArray[2]/images";
        $development_JS_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]/$filesArray[2]/js";
        $development_files_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]/$filesArray[2]/development";

    } else {
//        $development_parent_folder_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[2]";
        $development_HTML_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]/html";
        $development_PHP_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]/php";
        $development_CSS_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]/css";
        $development_images_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]/images";
        $development_JS_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]/js";
        $development_files_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]/development";
    }
    $production_folder_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/production";

// Child
    // init JSON array
    $all_files_in_development = array();

    // taken from: http://stackoverflow.com/questions/7497733/how-can-use-php-to-check-if-a-directory-is-empty
    // checking to see if folders have files in them
    // HTML
//    for ($files = 0; $files < count($development_folder_path); $files++) {
////        if (!is_dir_empty("/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]")) {
//            $file = scandir("/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]");
//            $file_name = (string) "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]/$files";
//
//            $all_files_in_development[] = $file;
////        }
////        $development_HTML_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]/html";
//    }

    function buildFilesInFolder($path, $all_files_in_development)
    {
//        if (!is_dir_empty($path)) {
            $file = scandir($path);
            $all_files_in_development['HTML'] = $file;

//        }
    }
//    buildFilesInFolder($development_HTML_path, $all_files_in_development);

    // HTML
    if (!is_dir_empty($development_HTML_path) && file_exists($development_HTML_path)) {
        $HTML_files = scandir($development_HTML_path);
        $all_files_in_development['HTML'] = $HTML_files;
    }

    // PHP
    if (!is_dir_empty($development_PHP_path) && file_exists($development_PHP_path)) {
        $PHP_files = scandir($development_PHP_path);
        $all_files_in_development['PHP'] = $PHP_files;
    }

    // CSS
    if (!is_dir_empty($development_CSS_path) && file_exists($development_CSS_path)) {
        $CSS_files = scandir($development_CSS_path);
        $all_files_in_development['CSS'] = $CSS_files;
    }

    // Images
    if (!is_dir_empty($development_images_path) && file_exists($development_images_path)) {
        $images_files = scandir($development_images_path);
        $all_files_in_development['Images'] = $images_files;
    }
    // JS
    if (!is_dir_empty($development_JS_path) && file_exists($development_JS_path)) {
        $JS_files = scandir($development_JS_path);
        $all_files_in_development['JS'] = $JS_files;
    }

    // Development
    if (!is_dir_empty($development_files_path) && file_exists($development_files_path)) {
        $development_files = scandir($development_files_path);
        $all_files_in_development['Development'] = $development_files;
    }
    
    // send all files in array back to individual page 
    echo json_encode($all_files_in_development);

    // parent
//    $parent_folder_contents = scandir($parent_folder_path);
//    echo json_encode($parent_folder_contents);

    // development folder contents
//    $development_folder_contents = scandir($development_folder_path);
//    echo json_encode($development_folder_contents);

    // production folder contents
//    $production_folder_contents = scandir($production_folder_path);
//    echo json_encode($production_folder_contents);

//    $css_files = scandir($css_files);
//    $development_files = scandir($development_files);


// Create array of files in folder chosen by user click
// Child
//    $folder_in_files = [];
//    $folder_in_files[] = $html_files;
//    $folder_in_files[] = $css_files;
//    $folder_in_files[] = $development_files;


//parent
//    $parent_folder = [];
//    $parent_folder[] = $parent_contents;

//    echo json_encode($folder_in_files);
//
//    echo json_encode($parent_folder);
} // end createFileSystem 

// $filesArray
// fileArray[0] = type of folder/project
// filesArray[1] = individual project
// filesArray[2] = title_of_school_class_selected

$filesArray = [];
// check to see if selected code section is school projects
if (isset($_GET['title_of_school_class_selected'])) {
    $title_of_individual = $_GET['title_of_individual'];
    $title_of_folder = $_GET['title_of_folder'];
    $title_of_school_class_selected = $_GET['title_of_school_class_selected'];

    $filesArray[] = $title_of_folder;
    $filesArray[] = $title_of_school_class_selected;
    $filesArray[] = $title_of_individual;
} else {

    $title_of_folder = $_GET['title_of_folder'];
    $title_of_individual = $_GET['title_of_individual'];
//    $title_of_school_class_selected = $_GET['title_of_school_class_selected'];

    $filesArray[] = $title_of_folder;
    $filesArray[] = $title_of_individual;
}

createFileSystem($filesArray);

