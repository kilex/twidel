<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kilexst
 * Date: 11.03.12
 * Time: 20:48
 */

session_start();
if (($_SESSION['status'] == 'verified') AND ($_POST['sendtweet'])) { // Если не авторизованы вельком то старт пейдж
    $tweet=$_POST['sendtweet'];
    $from=$_POST['account'];

    require_once('class_twitterdb.php');
    $user=new class_userinfo();
    $id=$user->getThisUserInfo();
    $handler=new class_twitAction ($from);

    $handler->tweet($tweet);

	header('Location: ./index.php?success=twit');

}
else {
	header('Location: ./index.php');
}
