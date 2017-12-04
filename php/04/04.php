<?php

$sum = 0;
$sum_anagram = 0;
if (($handle = fopen("input", "r")) !== FALSE) {
  while (($data = fgetcsv($handle, 100000, " ")) !== FALSE) {
    sort($data);
    $found = FALSE;
    $anagram = FALSE;
    $cmp_array = [];
    foreach ($data as $a) {
      foreach ($cmp_array as $b) {
        if (strcmp($a, $b) === 0) {
          $found = TRUE;
        }
        if (count_chars($a, 1) == count_chars($b, 1)) {
          $anagram = TRUE;
        }
      }
      $cmp_array[] = $a;
    }
    if (!$found) {
      $sum++;
    }
    if (!$anagram) {
      $sum_anagram++;
    }
  }
  fclose($handle);
}

echo "Part 1: $sum\n";
echo "Part 2: $sum_anagram\n";