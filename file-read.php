<?php

# 100
//  0.0016670227050781                                                                                                                                                                                             
//  0.0019400119781494                                                                                                                                                                                              
//  0.0016720294952393

# 1000
//  0.088902950286865 
//  0.088340997695923 
//  0.087815999984741
  
# 10000
//  17.036352872849 
//  16.652883052826
//  17.153074026108 

# 20000
//  77.307877063751   
//  77.628461122513  
//  77.458545224578
  
#  truncate -s 0 list.txt && php file-write.php 100 && php file-read.php 100  
#  truncate -s 0 list.txt && php file-write.php 1000 && php file-read.php 1000  
#  truncate -s 0 list.txt && php file-write.php 10000 && php file-read.php 10000
#  truncate -s 0 list.txt && php file-write.php 20000 && php file-read.php 20000

  $items = require_once 'items.php';
  echo "start " . count($items) . "\n";
  
  
  $start_time = microtime(true);

  foreach ($items as $item) {
    in_array("$item\n", file('list.txt'));
  }

  $time = microtime(true) - $start_time;
  echo "Час на операцію: " . $time . " сек\n";


