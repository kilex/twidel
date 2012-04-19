<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kilexst
 * Date: 12.03.12
 * Time: 21:53
 */
session_start();
$from=$_GET['from'];
$content=unserialize($_SESSION['content']);
$id=$content->id;
if ($id) {
    require_once('class_access.php');
    $access=new class_access($id);
    $access->getAccesTo();
    $access->getAccessFrom();
    if ($from) $accessto=$access->access_from;
    else $accessto  =$access->access_to;
    print "<table class='table'>";
    if ($accessto)foreach ($accessto as $link) {
        $idlink=$link['accessto'];
        $name=$link['username'];
        $avatarlink=$link['avatar'];
        $avatar="<img src='$avatarlink' alt='ava'> ";

        if ($from) $buttondelete='';
            else $buttondelete="<a class='label label-important' onclick='revokeaccess(\"$idlink\"); return false;' href='$idlink'>Удалить</a>";
        print "<tr><td>$avatar</td><td><a href='https://twitter.com/#/$name' target='_blank'><span class='label label-info'>@
        $name
        </span></td><td></a> $buttondelete</td></tr>";
//        print_r($accessto);
    }
    print '</table>';

}
