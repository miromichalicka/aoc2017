<?php

$string = file_get_contents('input');
$length = strlen($string);
$step = 1; // 1.part
//$step = $length / 2; //2.part
$string_array = str_split($string); // Convert to array
$sum = 0;
foreach ($string_array as $key => $item) {
  $key_to_compare = 0;
  if ($key + $step < $length) { // If new index will be in existing array
    $key_to_compare = $key + $step; // then just compare it
  } else { // else calculate remaining part of array and index from beginning of array
    $rest = $length - $key - 1;
    $key_to_compare = $step - $rest -1;
  }
  if ($item === $string_array[$key_to_compare]) {
    $sum += $item;
  }
}

echo "Sum: $sum";