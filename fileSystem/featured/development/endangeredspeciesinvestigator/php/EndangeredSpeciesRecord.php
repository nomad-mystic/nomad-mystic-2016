<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 12/3/2015
 * Time: 5:33 PM
 */

class EndangeredSpeciesRecord
{
    private $mType;
    private $mCommon;
    private $mScience;
    private $mDescription;
    private $mImage;
    private $mThumb;
    private $mId;
    private $mUrl;

    function __construct($type, $common_name, $science_name, $description, $image, $thumb, $id, $url)
    {
        $this->mType = $type;
        $this->mCommon = $common_name;
        $this->mScience = $science_name;
        $this->mDescription = $description;
        $this->mImage = $image;
        $this->mThumb = $thumb;
        $this->mId = $id;
        $this->mUrl = $url;
    }

    /// SETTERS
    function setType($value)
    {
        $this->mType = $value;
    }

    function setCommon($value)
    {
        $this->mCommon = $value;
    }

    function setScience($value)
    {
        $this->mScience = $value;
    }

    function setDescription($value)
    {
        $this->mDescription = $value;
    }

    function setImage($value)
    {
        $this->mId= $value;
    }

    function setThumb($value)
    {
        $this->mThumb= $value;
    }

    function setId($value)
    {
        $this->mId= $value;
    }

    function setUrl($value)
    {
        $this->mUrl= $value;
    }

    ///GETTERS
    function getType()
    {
        return $this->mType;
    }

    function getCommon()
    {
        return $this->mCommon;
    }

    function getScience()
    {
        return $this->mScience;
    }

    function getDescription()
    {
        return $this->mDescription;
    }

    function getImage()
    {
        return $this->mImage;
    }

    function getThumb()
    {
        return $this->mThumb;
    }

    function getId()
    {
        return $this->mId;
    }

    function getUrl()
    {
        return $this->mUrl;
    }
} // End class