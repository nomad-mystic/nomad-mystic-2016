<?php
/**
 * Created by PhpStorm.
 * User: endof
 * Date: 4/8/2016
 * Time: 3:46 PM
 */

require_once('../includes/constants.php');
header('Content-Type: application/json');


function processPOST()
{
    // POST values
    $number_of_slices = $_POST[NUMBER_OF_SLICES];
    $slice_val        = $_POST[SLICE_NUMBER_VAL];
    $slice_color      = $_POST[SLICE_COLOR];
    $slice_highlight  = $slice_color;
    $slice_label      = $_POST[SLICE_LABEL];
    $chart_title      = $_POST[CHART_TITLE];

    // Create generic object
    $slice_object = new stdClass();

    // function adapted from http://stackoverflow.com/questions/3512311/how-to-generate-lighter-darker-color-with-php
    function adjustBrightness($hex, $steps)
    {
        // Steps should be between -255 and 255. Negative = darker, positive = lighter
        $steps = max(-255, min(255, $steps));

        // Normalize into a six character long hex string
        $hex = str_replace('#', '', $hex);
        if (strlen($hex) == 3) {
            $hex = str_repeat(substr($hex, 0, 1), 2).str_repeat(substr($hex, 1, 1), 2).str_repeat(substr($hex, 2, 1), 2);
        }

        // Split into three parts: R, G and B
        $color_parts = str_split($hex, 2);
        $tint        = '#';

        foreach ($color_parts as $color) {
            $color = hexdec($color); // Convert to decimal
            $color = max(0, min(255, $color + $steps)); // Adjust color
            $tint .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT); // Make two char hex code
        }

        return $tint;
    } // End adjustBrightness()


    for ($i = 0; $i < $number_of_slices; $i++) {
        $computed_highlight = adjustBrightness($slice_highlight[$i], 50);
        $slice_object->slice_highlight[$i] = $computed_highlight;
    }

    // Build Object
    $slice_object->slice_val = $slice_val;
    $slice_object->slice_color = $slice_color;
    $slice_object->slice_label = $slice_label;
    $slice_object->number_of_slices = $number_of_slices;
    $slice_object->chart_title = $chart_title;

    return $slice_object;
}

// Calling processing function and returning object with user inputs
$slice_object = processPOST();

// Echoing for AJAX retrieval
echo json_encode($slice_object);
