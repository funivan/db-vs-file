<?php
  
# 100
//  0.036423921585083
//  0.037634134292603
//  0.03878116607666

# 1000
//  0.32934999465942
//  0.33230996131897
//  0.33423399925232

# 10000
//  3.2608320713043
//  3.2445659637451
//  3.2450032234192

# 20000
//  6.8281588554382
//  6.5311489105225
//  6.6026020050049
  
  $itemsLeftForCheck = 20000;
  $max = $itemsLeftForCheck;

  $items = [];
  while ($itemsLeftForCheck > 0) {
    $item = rand(0, $max);
    $items[$item] = $item;
    $itemsLeftForCheck--;
  }

  echo "start";
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
  echo 'Час на операцію: ' . $time . ' сек<br>';

