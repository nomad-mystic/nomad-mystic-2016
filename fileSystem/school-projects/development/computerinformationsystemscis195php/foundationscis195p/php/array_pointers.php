<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 10/22/2015
 * Time: 1:24 AM
 */


$fruits = ['Apple', 'Banana', 'Strawberries', 'Kiwi'];


echo "<ul>\n";
while($fruit = current($fruits)) {
     echo '         <li>' . $fruit . "</li>\n";
     next($fruits);
}
echo '</ul>';
//end($fruits);

echo "<ul>\n";
while($fruit = current($fruits)) {
     echo '         <li>' . $fruit . "</li>\n";
     prev($fruits);
}
echo '</ul>';


$student = ["First_Name" => "Keith", "Last_Name" => "Murphy", "GPA" => "3.5" ];

while($property = current($student)) {
     echo '<p>' . 'Key: ' . key($student) . '   && Property: ' . $property . '</p>';

     next($student);

}
//end($student);

while($property = current($student)) {
     echo '<p>' . 'Key: ' . key($student) . '   && Property: ' . $property . '</p>';

     prev($student);

}
