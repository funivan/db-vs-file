<?php

# 1000
//  0.53653788566589 
//  0.51318192481995
//  0.52189803123474

# 10000
//  5.2288730144501 
//  5.4184968471527
//  5.5489799976349
  
# 100000  
//  50.459193944931
//  50.920388936996
//  50.833083152771

  $start_time = microtime(true);
  
  $pdo = new PDO('mysql:dbname=test;host=127.0.0.1', 'root', '1111');
  $pdo->query('SET names utf8');
  
  for ($i = 0; $i <= 1000; ++$i) {
    $pdo->prepare('INSERT INTO email SET VALUE = ? ')->execute(["Запис $i"]);
  }
  
  $time = microtime(true) - $start_time;
  echo 'Час на операцію: ' . $time . ' сек<br>';
  
