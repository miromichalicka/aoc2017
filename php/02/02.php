<?php

$sum = 0;
$sum_2 = 0;
if (($handle = fopen("input", "r")) !== FALSE) {
  while (($data = fgetcsv($handle, 100000, "\t")) !== FALSE) {
    sort($data);
    $diff = $data[sizeof($data) - 1] - $data[0];
    $sum += $diff;
    $found = FALSE;
    $i = 0;
    while (!$found){
      $divider = $data[$i];
      foreach ($data as $dividee) {
        if ($divider == $dividee) {
          continue;
        }
        if ($divider % $dividee === 0) {
          $sum_2 += ($divider/$dividee);
          echo $divider . " " . $dividee . "\n";
          $found = TRUE;
          break;
        }
      }
      $i++;
    }
  }
  fclose($handle);
}

echo "Part 1:$sum\n";
echo "Part 2:$sum_2";