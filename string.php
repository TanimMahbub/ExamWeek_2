<?php
$strings = ["Hello", "World", "PHP", "Programming"];
$vowels  = ['a', 'e', 'i', 'o', 'u'];

foreach ($strings as $string) {
    $vowelCount = count(array_intersect(str_split($string), $vowels));
    $strRev     = strrev($string);
    $result     = nl2br("Original String: $string, Vowel Count: $vowelCount, Reversed String: $strRev");
    echo $result . (php_sapi_name() == "cli" ? "\n" : "<br>");
}