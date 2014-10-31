<?php

# 100 
//  0.0098931789398193
//  0.017664909362793
//  0.017143964767456

# 1000 
//  0.12712502479553
//  0.13081097602844
//  0.13721799850464

# 10000
//  1.3502678871155
//  1.1555650234222
//  1.2192490100861
  
# 20000
//  2.5724170207977 
//  2.108197927475 
//  2.490170955658   

# mysql -u root -p1111 -D test -e 'truncate table email' && php db-write.php 100 && php db-read.php 100;  
# mysql -u root -p1111 -D test -e 'truncate table email' && php db-write.php 1000 && php db-read.php 1000;  
# mysql -u root -p1111 -D test -e 'truncate table email' && php db-write.php 10000 && php db-read.php 10000;  
# mysql -u root -p1111 -D test -e 'truncate table email' && php db-write.php 20000 && php db-read.php 20000;  
  
  $items = require_once 'items.php';
  echo "start " . count($items) . "\n";
  
  $start_time = microtime(true);

  $pdo = new PDO('mysql:dbname=test;host=127.0.0.1', 'root', '1111');
  $pdo->query('SET names utf8');

  foreach ($items as $index) {

    $stm = $pdo->prepare('SELECT * FROM `email` WHERE `value` = ? LIMIT 1');
    $stm->execute(["Запис $index"]);
    $stm->fetch(PDO::FETCH_NUM);
  }

  $time = microtime(true) - $start_time;
  echo "Час на операцію: " . $time . " сек\n";
