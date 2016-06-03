<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 10/22/2015
 * Time: 12:07 AM
 */




$fruits = ['Apple', 'Banana', 'Strawberries', 'Kiwi'];

$i = 0;
echo "<ul>\n";
while($i < count($fruits)) {
     echo '         <li>' . $fruits[$i] . "</li>\n";
     $i++;
}
echo '</ul>';



echo "<ul>\n";
do {
     $i--;
     echo '         <li>' . $fruits[$i] . "</li>\n";

} while($i > 0);

echo '</ul>';

//////////////////////////////////////
echo "<ul>\n";
for($i=0; $i < count($fruits); $i++) {

     echo '         <li>' . $fruits[$i] . "</li>\n";
}
echo '</ul>';

/////////////////////////////////
echo "<ul>\n";
for($i = count($fruits) -1; $i >= 0; --$i) {

     echo '         <li>' . $fruits[$i] . "</li>\n";
}
echo '</ul>';

//////////////////////////
echo "<ul>\n";
foreach($fruits as $value) {
     echo '         <li>' . $value . "</li>\n";
}
echo '</ul>';

$student = ["First_Name" => "Keith", "Last_Name" => "Murphy", "GPA" => "3.5" ];

foreach($student as $property_name => $property) {
     echo '<p>' . $property_name . '</p>';
     echo '<p>' . $property . '</p>';

}














