<?php
  
# 100
//  0.058931112289429
//  0.056786060333252
//  0.057237863540649

# 1000
//  0.52469992637634
//  0.51486086845398
//  0.50889110565186

# 10000
//  5.5805020332336
//  5.4011950492859
//  5.2509880065918

# 20000
//  10.439918994904
//  10.296199798584
//  10.305744886398

# mysql -u root -p1111 -D test -e 'truncate table email' && php db-real.php 100;
# mysql -u root -p1111 -D test -e 'truncate table email' && php db-real.php 1000;
# mysql -u root -p1111 -D test -e 'truncate table email' && php db-real.php 10000;
# mysql -u root -p1111 -D test -e 'truncate table email' && php db-real.php 20000;
  
  $items = require_once 'items.php';
  echo "start ".count($items)."\n";
  
  $start_time = microtime(true);

  $pdo = new PDO('mysql:dbname=test;host=127.0.0.1', 'root', '1111');
  $pdo->query('SET names utf8');

  foreach ($items as $index) {

    $value = "Запис $index";
    
    # fetch
    $stm = $pdo->prepare('SELECT * FROM `email` WHERE `value` = ? LIMIT 1');
    $stm->execute([$value]);
    $stm->fetch(PDO::FETCH_NUM);
    
    # write
    $pdo->prepare('INSERT INTO email SET VALUE = ? ')->execute([$value]);

  }

  $time = microtime(true) - $start_time;
  echo 'Час на операцію: ' . $time . ' сек\n';

