<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 12/3/2015
 * Time: 5:42 PM
 */


class AnimalSet extends EndangeredSpeciesSet
{
     function __construct($type, $records)
     {
         $this->mRecords = [];

         foreach ($records->animals as $animal) {
             if ($type === $animal->type) {
                 $type_records = new EndangeredSpeciesRecord(
                     $animal->type,
                     $animal->common,
                     $animal->scientific,
                     $animal->description,
                     $animal->image,
                     $animal->thumb,
                     $animal->id,
                     $animal->url
                 );
                 $this->mRecords[] = $type_records;
             }
         }
     }
} // End animalSet