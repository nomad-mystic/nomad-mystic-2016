<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 12/3/2015
 * Time: 5:42 PM
 */


class AnimalSet extends EndangeredSpeciesSet
{
     const TYPE = 0;
     const COMMON_NAME = 1;
     const SCIENCE_NAME = 2;
     const DESCRIPTION = 3;
     const IMAGE_FIELD = 4;
     const THUMB = 5;
     const ID = 6;
     const URL = 7;

     function __construct($type)
     {
          $this->mRecords = [];
          $db = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
          $safe_type = $db->real_escape_string($type);

          $query = <<<QUERY
SELECT *
FROM animals
WHERE type = '$safe_type';
QUERY;
          $results = $db->query($query);
          $records = $results->fetch_all(MYSQLI_NUM);

          foreach ($records as $recs) {
               $type_records = new EndangeredSpeciesRecord(
                    $recs[AnimalSet::TYPE],
                    $recs[AnimalSet::COMMON_NAME],
                    $recs[AnimalSet::SCIENCE_NAME],
                    $recs[AnimalSet::DESCRIPTION],
                    $recs[AnimalSet::IMAGE_FIELD],
                    $recs[AnimalSet::THUMB],
                    $recs[AnimalSet::ID],
                    $recs[AnimalSet::URL]
               );
               $this->mRecords[] = $type_records;
          }
     } // End __construct
} // End animalSet