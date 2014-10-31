<?php

# 100 штук
//  0.026661157608032
//  0.021665096282959
//  0.022915840148926

# 1000 штук
//  0.12124109268188
//  0.14622402191162
//  0.1536238193512

# 10000
//  1.2797501087189
//  1.2138180732727
//  1.2842011451721

  
  $itemsLeftForCheck = 10000;

  $items = [];
  while ($itemsLeftForCheck > 0) {
    $items[] = rand(0, 100000);
    $itemsLeftForCheck--;
  }

  $start_time = microtime(true);

  $pdo = new PDO('mysql:dbname=test;host=127.0.0.1', 'root', '1111');
  $pdo->query('SET names utf8');

  foreach ($items as $index) {

    $stm = $pdo->prepare('SELECT * FROM `email` WHERE `value` = ? LIMIT 1');
    $stm->execute(["Запис $index"]);
    $stm->fetch(PDO::FETCH_NUM);
  }

  $time = microtime(true) - $start_time;
  echo 'Час на операцію: ' . $time . ' сек<br>';
