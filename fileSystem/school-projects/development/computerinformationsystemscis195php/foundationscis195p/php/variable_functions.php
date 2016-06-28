<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 11/3/2015
 * Time: 1:30 AM
 */

$arr = [1, 3, 6, 10, 11, 15, 20, 25];
unset($arr[4]);
function is_odd($value) {
     return $value % 2 == 1;
}

function is_even($value) {
     return $value % 2 == 0;

}

function multiply_by_2($value) {
     return $value * 2;

}
function sum_item($carry, $item) {
     return $carry + $item;
}
$odd = array_filter($arr, 'is_odd');
$even = array_filter($arr, 'is_even');
$times_2 = array_map( 'multiply_by_2', $arr);

print_r($odd);
print_r($even);
print_r($arr);

$sum = array_reduce($arr, 'sum_item');
echo 'Sum: ' . $sum . '<br>';
$sum = array_reduce($times_2, 'sum_item');
echo 'Sum: ' . $sum . '<br>';

function  my_array_filter($array, $callback)
{
     $result = [];
     foreach($array as $key => $value) {
          if($callback($value)) {
               $result[$key] = $value;
          }
     }
     return $result;
}

$odd = my_array_filter($arr, 'is_odd');
$even = my_array_filter($arr, 'is_even');

print_r($odd);
print_r($even);

function my_array_map($callback, $array)
{
     $result = [];
     foreach($array as $key => $value) {
          $result[$key] = $callback($value);
     }
     return $result;
}

$odd = my_array_filter($arr, function($value)
{
     return $value % 2 == 1;
});
$even = my_array_filter($arr, function($value)
{
     return $value % 2 == 0;
});

print_r($odd);
print_r($even);

$times_2 = array_map(function($value)
{
     return $value * 2;
}, $arr);


print_r($times_2);
print_r($arr);

$sum = array_reduce($arr, function($carry, $item)
{
     return $carry + $item;
});
echo 'Sum: ' . $sum . '<br>';
$sum = array_reduce($times_2, 'sum_item');
echo 'Sum: ' . $sum . '<br>';





