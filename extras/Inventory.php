<?php
/**
 * Created by PhpStorm.
 * User: endof
 * Date: 3/18/2016
 * Time: 2:07 AM
 */

class WorkInventory
{
    private $mProjectName;
    private $mFiles;
    private $mCurrentWork;
    private $mDirectory;

    function __construct()
    {
//        $this->mProjectName = $project_name;
//        $this->mFiles = $files;
        if (isset($_GET)) {
            $work = $_GET['currentWork'];
            $this->mCurrentWork = $work;

//            $stripQuotes = str_replace('"', "", $work);
            $dir = "./wordpress/wp-content/themes/nomadmystic/works/work1/";
            print_r($dir);
//            $directory = scandir($dir);
//            print_r($directory);
//            if (is_dir($dir)) {
//                $filenames = scandir($dir, 0);
//                print_r($filenames);
//                // do something
//            } else {
//                echo "No such directory";
//            }

        }

    }

    // Setters
    function setProjectName($value)
    {
        $this->mProjectName = $value;
    }

    // Getters
    function getProjectName()
    {
        return $this->mProjectName;
    }
    function getWork()
    {
        return $this->mCurrentWork;
    }
    function getDirectory()
    {
        return $this->mDirectory;
    }
}



$current_work =  new WorkInventory();
echo json_encode($current_work->getDirectory());


