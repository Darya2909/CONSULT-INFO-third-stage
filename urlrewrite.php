<?php
$arUrlRewrite=array (
  0 => 
  array (
    'CONDITION' => '#^/services/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog',
    'PATH' => '/services/index.php',
    'SORT' => 100,
  ),
  1 => 
  array (
    'CONDITION' => '#^/products/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog',
    'PATH' => '/products/index.php',
    'SORT' => 100,
  ),
  2 => 
  array (
    'CONDITION' => '#^/news/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/news/index.php',
    'SORT' => 100,
  ),
  100001 =>  array (
        'CONDITION' => '#^/test#',
        'RULE' => '',
        'ID' => '',
        'PATH' => '/test.php',
        'SORT' => 100,
    ),
   100002 => array (
        'CONDITION' => '#^/groups/([0-9]+)#',
        'RULE' => '',
        'ID' => '',
        'PATH' => '/groups/index.php',
        'SORT' => 100,
    ),
);
