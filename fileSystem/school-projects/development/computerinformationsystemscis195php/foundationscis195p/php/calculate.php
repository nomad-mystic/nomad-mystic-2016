<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 10/12/2015
 * Time: 8:55 PM
 */

$ohms = isset($_GET['ohms']) ? (float) $_GET['ohms'] : 0.0;

echo '$ohms is type ' . gettype($ohms) . ' with value ' . $ohms . '<br>';