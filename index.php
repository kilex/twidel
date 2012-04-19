<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kilexst
 * Date: 11.03.12
 * Time: 20:48
 */

session_start();

require_once('twitteroauth/twitteroauth.php');
require_once('config.php');
require_once('class_access.php');

///* Get user access tokens out of the session. */
//$access_token = $_SESSION['access_token'];
//
///* Create a TwitterOauth object with consumer/user tokens. */
//$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
//
///* If method is set change API call made. Test is called by default. */
if($_GET['success']){
	if ($_GET['success']=='twit') $message="<div class='alert alert-success container'>Твит отправлен!</div>";
	if ($_GET['success']=='login') $message="<div class='alert alert-success container'>Вы успешно вошли!</div>";
}
$content = unserialize($_SESSION['content']);
$username=$content->screen_name;
$avatar=$content->profile_image_url;
$id=$content->id;
////$userurl=$content->

$status='test';
if ($_SESSION['status'] == 'verified') { // Если не авторизованы вельком то старт пейдж
    $menulinks='
    <li class="active">
        <a href="?tweet=1">Написать твит</a>
    </li>
    <li class="active">
        <a href="?sharing=1">Доступ</a>
    </li>
    ';
    include('navbar.inc');

    if ($_REQUEST['tweet']) {
        $access=new class_access($id);
        $access->getAccessFrom();
        $list=$access->access_from;
        $listtext="<option value='$id'>@$username</option>";
        foreach ($list as $link) {
            $linkid=$link['userid'];
            $linkname=$link['username'];
            $listtext.="<option value='$linkid'>@$linkname</option> ";
        }
        include ('tweet.inc');
    }
    elseif ($_REQUEST['sharing']){
        include('sharing.inc');
    }
    else include('main.inc');
//    include('debug.inc');
}
else {
    include('navbar.inc');
    include ('index.inc');
}

