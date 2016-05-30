<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 11/3/2015
 * Time: 1:22 AM
 */


function average(...$args) {
     return array_sum($args) / count($args);
}

echo 'average of 3, 4, 5, 6, 10 is: ' . average(3, 4, 5, 6, 10) . '<br>';
echo 'average of 90, 3, 77, 6, 10 is: ' . average(90, 3, 77, 6, 10) . '<br>';


function ave2() {
     $args = func_get_args();
     return array_sum($args) / count($args);

}
echo 'average of 3, 4, 5, 6, 10 is: ' . ave2(3, 4, 5, 6, 10) . '<br>';
echo 'average of 90, 3, 77, 6, 10 is: ' . ave2(90, 3, 77, 6, 10) . '<br>';