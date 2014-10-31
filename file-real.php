<?php
  
# 100
//  0.0020699501037598 
//  0.0021300315856934 
//  0.0020477771759033

# 1000  
//  0.036401987075806
//  0.039133071899414
//  0.039121866226196

# 10000
//  3.1609218120575
//  3.2339289188385
//  3.2405519485474

# 20000
//  14.805907964706
//  14.660756111145
//  15.050574064255
  
  $itemsLeftForCheck = 1000;
  $max = $itemsLeftForCheck;

  $items = [];
  while ($itemsLeftForCheck > 0) {
    $item = rand(0, $max);
    $items[$item] = $item;
    $itemsLeftForCheck--;
  }
  
  echo "start";
  $start_time = microtime(true);

  foreach ($items as $index) {
    
    $value = "Запис $index\n";
    
    in_array($value, file('list.txt'));
    file_put_contents('list.txt', $value, FILE_APPEND);
  }

  $time = microtime(true) - $start_time;
  echo 'Час на операцію: ' . $time . ' сек<br>';

