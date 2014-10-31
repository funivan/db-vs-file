<?php

# truncate -s 0 list.txt && php file-write.php 1000
   
# 1000
//  0.018360137939453
//  0.019197940826416
//  0.018934965133667

# 10000
//  0.18361496925354   
//  0.18521094322205
//  0.18361496925354

# 100000
//  1.7169849872589   
//  1.7336130142212
//  1.8436130142212

  if (empty($argv[1])) {
    die("please provide items num. file-write.php 1000");
  }
  
  $itemsNum = $argv[1];
  
  $start_time = microtime(true);
  
  for ($i = 0; $i <= 1000; ++$i) {
    file_put_contents('list.txt', "Запис $i\n", FILE_APPEND);
  }
  
  $time = microtime(true) - $start_time;
  echo 'Час на операцію: ' . $time . ' сек<br>';
  