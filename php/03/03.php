<?php
// Define direction constants.
const UP = 0;
const DOWN = 1;
const LEFT = 2;
const RIGHT = 3;
// Get input from CLI.
$input = (int) $argv[1];
// Define variables.
$x = $maxx = $minx = 0;
$y = $maxy = $miny = 0;
$array[0][0] = 1;
$direction = RIGHT;
$distance = 0;
$value_output = FALSE;
// Build helix.
for ($i = 2; $i <= $input; $i++) {
  switch ($direction) {
    case UP:
      $y--;
      if ($y < $miny) {
        $direction = LEFT;
        $miny = $y;
      }
      break;
    case DOWN:
      $y++;
      if ($y > $maxy) {
        $direction = RIGHT;
        $maxy = $y;
      }
      break;
    case LEFT:
      $x--;
      if ($x < $minx) {
        $direction = DOWN;
        $minx = $x;
      }
      break;
    case RIGHT:
      $x++;
      if ($x > $maxx) {
        $direction = UP;
        $maxx = $x;
      }
  }
  // Calculate distance from [0,0].
  $distance = abs($x) + abs($y);
  // Calculate value as sum of neighbours.
  $value = sum($x, $y - 1)
    + sum($x, $y + 1)
    + sum($x + 1, $y)
    + sum($x - 1, $y)
    + sum($x + 1, $y + 1)
    + sum($x - 1, $y + 1)
    + sum($x + 1, $y - 1)
    + sum($x - 1, $y - 1);
  // Output result for part2.
  if ($value>$input && !$value_output) {
    echo "Part2: $value\n";
    $value_output = TRUE;
  }
  $array[$x][$y] = $value;
}

// Helper function to fetch sum of neighbour.
function sum($x, $y) {
  global $array;
  if (isset($array[$x][$y])) {
    return $array[$x][$y];
  }
  return 0;
}

// Return result for part1.
echo "Part1: $distance";