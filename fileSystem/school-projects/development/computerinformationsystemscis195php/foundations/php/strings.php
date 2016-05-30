<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 10/1/2015
 * Time: 8:04 PM
 */

$first_way = 'This is some first \'String\'...';
echo $first_way;

echo '<pre>';
$second_way = "This is some seconded string that includes == $first_way.<br>\n This is a second line";

echo $second_way;

echo '</pre>';


$blob_of_text = <<<'MY_TEXT_BLOB'
\n	linefeed (LF or 0x0A (10) in ASCII)
\r	carriage return (CR or 0x0D (13) in ASCII)
\t	horizontal tab (HT or 0x09 (9) in ASCII)
\v	vertical tab (VT or 0x0B (11) in ASCII) (since PHP 5.2.5)
\e	escape (ESC or 0x1B (27) in ASCII) (since PHP 5.4.4)
\f	form feed (FF or 0x0C (12) in ASCII) (since PHP 5.2.5)
\\	backslash
\$	dollar sign
\"	double-quote
\[0-7]{1,3}	the sequence of characters matching the regular expression is a character in octal notation
\x[0-9A-Fa-f]{1,2}	the sequence of characters matching the regular expression is a character in hexadecimal notation
\u{[0-9a-f]{1,6}}	the sequence of characters matching the regular expression is a Unicode codepoint, which will be output to the string as that codepoint's UTF-8 representation (added in PHP 7.0.0)
MY_TEXT_BLOB;


echo "<pre>$blob_of_text</pre>";

$first_name = 'Keith';
$full_name = $first_name;
$last_name = 'Murphy';
$full_name .= ' ' . $last_name;
echo "<p>Your name is $full_name.</p>";

$text = 'Here is a piece of text.';
echo 'ucfirst: ' . ucfirst($text) . '<br>';
echo 'lcfirst: ' . lcfirst($text) . '<br>';
echo 'ucwords: ' . ucwords($text) . '<br>';
echo 'ucwords(strtolower(text)) ' . ucwords(strtolower($text)) . '<br>';
echo 'strtoupper(text)) ' . strtoupper($text) . '<br>';


echo "ASCII value oh 'H' is " . ord($text[0]) .'<br>';
echo 'The character with ASCII value 65 is: ' . chr(65) . '<br>';
echo "The length of $full_name is " . strlen($full_name) . '.';
echo "$full_name backwards is "  . ucwords(strtolower(strrev($full_name))) . '.';




























