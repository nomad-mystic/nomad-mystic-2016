<?php
/**
 * Created by PhpStorm.
 * User: endof
 * Date: 4/29/2016
 * Time: 9:25 PM
 */



class FileSystem 
{
	private $mSelectedDirectory;
	
	function __construct() 
	{
		
	}


}
//$dir = $_GET['folder'];
// into individual folders inside parent
$html_files = '/xampp/htdocs/CAS265/testingFileSystem/testingFolder/includes/html';
$css_files = '/xampp/htdocs/CAS265/testingFileSystem/testingFolder/includes/css';
$development_files = '/xampp/htdocs/CAS265/testingFileSystem/testingFolder/includes/development';


// parent folder class
$parent_folder_path = '/xampp/htdocs/CAS265/testingFileSystem';

// parent
$parent_contents = scandir($parent_folder_path);


// Child
$html_files = scandir($html_files);
$css_files = scandir($css_files);
$development_files = scandir($development_files);


// Create array of files in folder chosen by user click
// Child
$folder_in_files = [];
$folder_in_files[] = $html_files;
$folder_in_files[] = $css_files;
$folder_in_files[] = $development_files;


//parent
$parent_folder = [];
$parent_folder[] = $parent_contents;

//echo json_encode($folder_in_files);

echo json_encode($parent_folder);

