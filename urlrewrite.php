<?php
$arUrlRewrite=array (
  7 => 
  array (
    'CONDITION' => '#^/raspisanie/filter/(.+?)/apply/\\??(.*)#',
    'RULE' => 'SMART_FILTER_PATH=$1&$2',
    'ID' => 'bitrix:catalog.smart.filter',
    'PATH' => '/raspisanie/index.php',
    'SORT' => 100,
  ),
  5 => 
  array (
    'CONDITION' => '#^/teachers/filter/(.+?)/apply/\\??(.*)#',
    'RULE' => 'SMART_FILTER_PATH=$1&$2',
    'ID' => 'bitrix:catalog.smart.filter',
    'PATH' => '/teachers/index.php',
    'SORT' => 100,
  ),
  10 => 
  array (
    'CONDITION' => '#^/uslugi/filter/(.+?)/apply/\\??(.*)#',
    'RULE' => 'SMART_FILTER_PATH=$1&$2',
    'ID' => 'bitrix:catalog.smart.filter',
    'PATH' => '/uslugi/index.php',
    'SORT' => 100,
  ),
  0 => 
  array (
    'CONDITION' => '#^\\/?\\/mobileapp/jn\\/(.*)\\/.*#',
    'RULE' => 'componentName=$1',
    'ID' => NULL,
    'PATH' => '/bitrix/services/mobileapp/jn.php',
    'SORT' => 100,
  ),
  2 => 
  array (
    'CONDITION' => '#^/bitrix/services/ymarket/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/bitrix/services/ymarket/index.php',
    'SORT' => 100,
  ),
  8 => 
  array (
    'CONDITION' => '#^/uslugi/theme/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/uslugi/theme/index.php',
    'SORT' => 100,
  ),
  6 => 
  array (
    'CONDITION' => '#^/teachers/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/teachers/index.php',
    'SORT' => 100,
  ),
  4 => 
  array (
    'CONDITION' => '#^/gallery/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/gallery/index.php',
    'SORT' => 100,
  ),
  9 => 
  array (
    'CONDITION' => '#^/uslugi/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/uslugi/index.php',
    'SORT' => 100,
  ),
  1 => 
  array (
    'CONDITION' => '#^/rest/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/bitrix/services/rest/index.php',
    'SORT' => 100,
  ),
  3 => 
  array (
    'CONDITION' => '#^/news/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/news/index.php',
    'SORT' => 100,
  ),
);
