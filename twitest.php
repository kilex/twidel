<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kilexst
 * Date: 13.03.12
 * Time: 23:45
 */
 
require_once('class_twitterdb.php');
require_once('class_access.php');
//$user=new class_userinfo();
//$user->getUserInfo('mark_internet');
//$info=$user->information;

//$work=new class_twitAction(86927288);
$access=new class_access(86927288);
//$result=$work->showTokens();
//$result=$work->tweet('Пинг!');
print "<pre>";
//print_r($info);
print $result;
print "</pre>";