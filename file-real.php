<?php

# 100
//  0.0032310485839844
//  0.0034151077270508
//  0.0032670497894287

# 1000  
//  0.076802015304565
//  0.076843976974487
//  0.078307151794434

# 10000
//  8.7395050525665
//  8.8262348175049
//  8.7284970283508

# 20000
//  39.980057954788
//  39.548989057541
//  39.913308143616

# truncate -s 0 list.txt && php file-real.php 100
# truncate -s 0 list.txt && php file-real.php 1000
# truncate -s 0 list.txt && php file-real.php 10000
# truncate -s 0 list.txt && php file-real.php 20000

  $items = require_once 'items.php';

  echo "start " . count($items) . "\n";
  $start_time = microtime(true);

  foreach ($items as $index) {

    $value = "Запис $index\n";

    in_array($value, file('list.txt'));
    file_put_contents('list.txt', $value, FILE_APPEND);
  }

  $time = microtime(true) - $start_time;
  echo "Час на операцію: " . $time . " сек\n";

