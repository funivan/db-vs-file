<?php

# 100
//  0.052210092544556
//  0.051961898803711
//  0.053776979446411

# 1000
//  0.50049781799316
//  0.5041618347168
//  0.50291299819946

# 10000
//  5.4206600189209
//  5.0195369720459
//  5.0550410747528
  
# 20000
//  10.068706035614
//  10.424525022507
//  10.165198087692

#  mysql -u root -p1111 -D test -e 'truncate table email' && php db-write.php 100 
#  mysql -u root -p1111 -D test -e 'truncate table email' && php db-write.php 1000 
#  mysql -u root -p1111 -D test -e 'truncate table email' && php db-write.php 10000 
#  mysql -u root -p1111 -D test -e 'truncate table email' && php db-write.php 20000 

  $items = require_once 'items.php';
  echo "start " . count($items) . "\n";

  $start_time = microtime(true);
  
  $pdo = new PDO('mysql:dbname=test;host=127.0.0.1', 'root', '1111');
  $pdo->query('SET names utf8');
  
  foreach($items as $item) {
    $pdo->prepare('INSERT INTO email SET VALUE = ? ')->execute([$item]);
  }
  
  $time = microtime(true) - $start_time;
  echo "Час на операцію: " . $time . " сек\n";
  
