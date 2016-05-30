<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 11/2/2015
 * Time: 9:19 PM
 */


$batman = 'The Dark knight';
$bruce_wayne = &$batman;
$bruce_wayne = 'A billionaire socialite';

echo 'Batman ' . $batman . ', Bruce Wayne ' . $bruce_wayne .'<br>';


$my_fav = &$batman;

echo 'My fav is ' . $my_fav .'<br>';

$my_fav = 'Magneto';

$villains = ['Joker', 'professor x', 'catwomen'];
$villain = &$villains[0];

echo 'A villain is ' . $villains[0] .'<br>';
echo 'A villain is ' . $villain .'<br>';

$villain = 'Two-Face';

echo 'A villain is ' . $villain .'<br>';
echo 'A villain is ' . $villains[0] .'<br>';

