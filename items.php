<?php

  if (empty($argv[1])) {
    die("please provide items num. file-write.php 1000");
  }

  $itemsNum = $argv[1];

  $max = $itemsNum;

  $items = [];
  while ($itemsNum > 0) {
    $items[] = "Запис ".$itemsNum;
    $itemsNum--;
  }

  shuffle($items);

  return $items;
  
