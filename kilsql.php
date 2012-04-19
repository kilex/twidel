<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kilexst
 * Date: 12.03.12
 * Time: 19:39
 */
 
require_once('class_kilsql.php');
$kilsql=new class_kilsql();

//$kilsql->addValue('test','test3');
$kilsql->addValue('markruofficial','KiLEXst');
//$kilsql->delValue('test','test2');
//print_r($kilsql->getValues('test'));
//print_r($kilsql->getArr('test'));

$max=$kilsql->getFullTable();

print_r($max);

print '<br>';

print '<br>';
print '<br>';
$search=$kilsql->searchKeys("chupokabra");
print_r($search);
print '<br>';
//$kilsql->rebuildIndexes();

echo 'OK';