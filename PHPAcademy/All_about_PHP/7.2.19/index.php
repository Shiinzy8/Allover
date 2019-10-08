<?php
/**
 * From this article 
 * https://dev.to/aleksikauppila/using-isset-and-empty-hurts-your-code-aaa
 */

/**
 * Using of isset()
 * As we can see function does two things:
 * 1. Determine if variable is declared
 * 2. Determine if variable is different from null
 */

var_dump(isset($foo));
//bool(false)

$foo = 'bar';
var_dump(isset($foo));
//bool(true)

$foo = null;
var_dump(isset($foo));
//bool(false)

$list = ['foo' => 'bar'];
var_dump(isset($list['baz']));
//bool(false)

var_dump(isset($list['foo']));
//bool(true)


/**
 * Using of empty()
 * Returns FALSE if var exists and has a non-empty, non-zero value. 
 * Otherwise returns TRUE.
 * The following values are considered to be empty.
 * "" (an empty string)
 * 0 (0 as an integer)
 * 0.0 (0 as a float)
 * "0" (0 as a string)
 * NULL
 * FALSE
 * array() (an empty array)
 */

// Clearly a string
if (strlen($foo) === 0) {

}
// Clearly a number
if ($foo === 0) {

}
// Clearly expected to be treated as a number
if ((int) $foo === 0) {

}
// Clearly a boolean
if ($foo === false) {

}
// Clearly an array
// if (count($foo) === 0) {

// }
// Clearly null or something useful
if ($foo === null) {

}

//using concatenation
$a = 1;
$b = 2;
echo "sum: " . 7 . "\n";
echo "sum: " . $a + $b . "\n";
// in php 7
echo ("sum: " . $a) + $b . "\n";
// in php 8 will be
echo "sum: " . ($a + $b) . "\n";