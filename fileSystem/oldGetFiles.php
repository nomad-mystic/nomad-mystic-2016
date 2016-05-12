<?php
/**
 * Created by PhpStorm.
 * User: endof
 * Date: 4/29/2016
 * Time: 9:25 PM
 */

header('Access-Control-Allow-Origin: * ');
header('Content-Type: application/json');



//$post_title_of_individual = $_POST['title_of_individual'];
//$post_title_of_folder = $_POST['title_of_folder'];

session_start();

$filesArray = [];

//$title_of_folder = $_SESSION[$_POST['title_of_folder']];
//$title_of_individual = $_SESSION[$_POST['title_of_individual']];

$filesArray[] = $_SESSION[$_GET['title_of_folder']];
$filesArray[] = $_SESSION[$_GET['title_of_individual']];

echo json_encode($filesArray);


//if (isset($_SESSION['title_of_individual'])) {
//
//
//    $filesArray[] = $title_of_individual;
//    $filesArray[] = $title_of_folder;
//
//}
//createFileSystem($filesArray);

