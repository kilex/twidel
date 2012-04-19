<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kilexst
 * Date: 12.03.12
 * Time: 22:38
 */

session_start();
$name=$_GET['name'];
$revoke=$_GET['revoke'];
$content=unserialize($_SESSION['content']);
$id=$content->id;
if (!$name) $name='error_name';
if ($id) {
    require_once('class_access.php');
    $access=new class_access($id);
    if ($revoke) $access->revokeAccessTo($revoke);
    else $access->giveAccessToName($name);

}

