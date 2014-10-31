<?php

# 100
//  0.0017390251159668
//  0.0017650127410889
//  0.0017549991607666

# 1000
//  0.016831874847412
//  0.017418146133423
//  0.017122983932495

# 10000
//  0.16916394233704
//  0.1727409362793
//  0.16871404647827

# 20000
//  0.3355278968811
//  0.34059190750122
//  0.33256697654724

#  truncate -s 0 list.txt && php file-write.php 100
#  truncate -s 0 list.txt && php file-write.php 1000
#  truncate -s 0 list.txt && php file-write.php 10000
#  truncate -s 0 list.txt && php file-write.php 20000

  $items = require_once 'items.php';
  echo "start " . count($items) . "\n";

  $start_time = microtime(true);

  foreach ($items as $item) {
    file_put_contents('list.txt', $item . "\n", FILE_APPEND);
  }

  $time = microtime(true) - $start_time;
  echo "Час на операцію: " . $time . " сек\n";
  