<?php

# 100
//  1.9937710762024                                                                                                                                                                                                      
//  2.0122010707855                                                                                                                                                                                                      
//  2.0422849655151

# 1000
//  20.888175010681
//  21.301599025726
//  21.210193872452


  
  $itemsLeftForCheck = 10000;

  $items = [];
  while ($itemsLeftForCheck > 0) {
    $items[] = rand(0, 100000);
    $itemsLeftForCheck--;
  }

  $start_time = microtime(true);

  foreach ($items as $index) {
    in_array("Запис $index\n", file('list.txt'));
  }

  $time = microtime(true) - $start_time;
  echo 'Час на операцію: ' . $time . ' сек<br>';


