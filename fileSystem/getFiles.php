<?php
/**
 * Created by PhpStorm.
 * User: endof
 * Date: 4/29/2016
 * Time: 9:25 PM
 */

header('Access-Control-Allow-Origin: * ');
header('Content-Type: application/json');
// $filesArray
// fileArray[0] = type of folder/project
// filesArray[1] = individual project
// filesArray[2] = title_of_school_class_selected

function createFileSystem($filesArray)
{
//    var_dump($filesArray);
    // helper function
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

    // if school project
    if ($filesArray[0] === 'school-projects') {
//        $development_parent_folder_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]";
        $development_HTML_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]/$filesArray[2]/html";
        $development_PHP_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]/$filesArray[2]/php";
        $development_CSS_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]/$filesArray[2]/css";
        $development_images_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]/$filesArray[2]/images";
        $development_JS_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]/$filesArray[2]/js";
        $development_files_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]/$filesArray[2]/development";
        $data_files_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]/$filesArray[2]/data";
        $lib_files_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]/$filesArray[2]/libraries";
        $python_files_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]/$filesArray[2]/python";
        $java_files_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]/$filesArray[2]/java";
        $xml_files_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]/$filesArray[2]/xml";

    } else {
        // featured
//        $development_parent_folder_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[2]";
        $development_HTML_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]/html";
        $development_PHP_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]/php";
        $development_CSS_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]/css";
        $development_images_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]/images";
        $development_JS_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]/js";
        $development_files_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]/development";
        $data_files_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]/data";
        $lib_files_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]/libraries";
        $python_files_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]/python";
        $java_files_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]/java";
        $xml_files_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/development/$filesArray[1]/xml";

    }
    $production_folder_path = "/xampp/htdocs/nomadmystic/wordpress/wp-content/themes/nomadmystic/fileSystem/$filesArray[0]/production";

// Child
    // init JSON array
    $all_files_in_development = array();

    // taken from: http://stackoverflow.com/questions/7497733/how-can-use-php-to-check-if-a-directory-is-empty
    // checking to see if folders have files in them
    
    function buildFilesInFolder($path, $all_files_in_development)
    {
//        if (!is_dir_empty($path)) {
            $file = scandir($path);
            $all_files_in_development['HTML'] = $file;

//        }
    }
//    buildFilesInFolder($development_HTML_path, $all_files_in_development);
    
    // lib
    if (!is_dir_empty($lib_files_path) && file_exists($lib_files_path)) {
        $lib_files = scandir($lib_files_path);
        $all_files_in_development['Libraries'] = $lib_files;
    }

    // Data
    if (!is_dir_empty($data_files_path) && file_exists($data_files_path)) {
        $data_files = scandir($data_files_path);
        $all_files_in_development['Data'] = $data_files;
    }

    // Development
    if (!is_dir_empty($development_files_path) && file_exists($development_files_path)) {
        $development_files = scandir($development_files_path);
        $all_files_in_development['Development'] = $development_files;
    }

    // Images
    if (!is_dir_empty($development_images_path) && file_exists($development_images_path)) {
        $images_files = scandir($development_images_path);
        $all_files_in_development['Images'] = $images_files;
    }
    // Uncommon before images
    // xml
    if (!is_dir_empty($xml_files_path) && file_exists($xml_files_path)) {
        $xml_files = scandir($xml_files_path);
        $all_files_in_development['XML'] = $xml_files;
    }

    // java
    if (!is_dir_empty($java_files_path) && file_exists($java_files_path)) {
        $java_files = scandir($java_files_path);
        $all_files_in_development['Java'] = $java_files;
    }
    // Python
    if (!is_dir_empty($python_files_path) && file_exists($python_files_path)) {
        $python_files = scandir($python_files_path);
        $all_files_in_development['Python'] = $python_files;
    }
    /*---End Uncommon before images--*/

    // CSS
    if (!is_dir_empty($development_CSS_path) && file_exists($development_CSS_path)) {
        $CSS_files = scandir($development_CSS_path);
        $all_files_in_development['CSS'] = $CSS_files;
    }

    // JS
    if (!is_dir_empty($development_JS_path) && file_exists($development_JS_path)) {
        $JS_files = scandir($development_JS_path);
        $all_files_in_development['JS'] = $JS_files;
    }

    // PHP
    if (!is_dir_empty($development_PHP_path) && file_exists($development_PHP_path)) {
        $PHP_files = scandir($development_PHP_path);
        $all_files_in_development['PHP'] = $PHP_files;
    }
    // HTML
    if (!is_dir_empty($development_HTML_path) && file_exists($development_HTML_path)) {
        $HTML_files = scandir($development_HTML_path);
        $all_files_in_development['HTML'] = $HTML_files;
    }

    // send all files in array back to individual page 
    echo json_encode($all_files_in_development);

} // end createFileSystem

// $filesArray
// fileArray[0] = type of folder/project
// filesArray[1] = individual project
// filesArray[2] = title_of_school_class_selected

$filesArray = [];
// check to see if selected code section is school projects
if (!empty($_GET['title_of_school_class_selected'])) {
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

// old none DRY methods for experimentation
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
