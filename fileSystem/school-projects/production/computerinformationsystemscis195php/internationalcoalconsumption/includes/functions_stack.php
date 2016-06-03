<?php
/**
 * Created by PhpStorm.
 * User: Keith Murphy
 * Date: 11/10/2015
 * Time: 10:54 PM
 */

$user_input_1 = $_POST[CHOSEN_COUNTRY_KEY_1];
$user_input_2 = $_POST[CHOSEN_COUNTRY_KEY_2];

$array_data = create_country_array();
$country_names_array = country_names($array_data);

$validated_country_1 = validation($user_input_1, $country_names_array);
$validated_country_2 = validation($user_input_2, $country_names_array);

$json_country_data_1 = find_country($validated_country_1, $array_data);
$json_country_data_2 = find_country($validated_country_2, $array_data);