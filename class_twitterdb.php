<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kilexst
 * Date: 13.03.12
 * Time: 22:35
 */

class class_tokens
{
    private $mysql;

    function __construct() {
        require_once('class_mysql.php');
        $this->mysql=new class_mysql();

    }
    function saveTokens($id,$token,$token_secret) {
        $query="INSERT INTO `td_tokens` SET `userid`=$id, `token`='$token', `token_secret`='$token_secret', `dt`=NOW();";
        $this->mysql->queryDo($query);
    }
    function getTokens($id) {
        $query="SELECT `userid`,`token`,`token_secret` FROM `td_tokens` WHERE `userid`=$id;";
        $sql=$this->mysql->querySelect($query,'userid');
        $result=array('token'=>$sql[$id]['token'],'token_secret'=>$sql[$id]['token_secret']);
        return $result;
    }
}

class class_userinfo
{
    public $usernames=array();
    private $mysql;
    public $information;
    public $id;

    function __construct() {
        require_once('class_mysql.php');
        $this->mysql=new class_mysql();
        require_once('twitteroauth/twitteroauth.php');
        require_once('config.php');


    }

    function getThisUserInfo(){
        $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
        $this->information = $connection->get('account/verify_credentials');
        $this->id=$this->information->id;
        return $this->id;
    }

    function getUserInfo($name){
        $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
        $this->information = $connection->get('users/show/'.$name);
        $this->id=$this->information->id;
        return $this->id;
    }

    function saveUserInfo(){
        $id=$this->information->id;
        $name=$this->information->screen_name;
        $avatar=$this->information->profile_image_url;
        $query="INSERT INTO `td_usernames` SET `id_user`='$id',
                                `username`='$name',
                                `avatar`='$avatar',
                                `dt`=NOW()
                        ON DUPLICATE KEY UPDATE
                                `username`='$name',
                                `avatar`='$avatar',
                                `dt`=NOW()
                                ;";
        $this->mysql->queryDo($query);
    }

}

class class_twitAction {
    private $handler;
    private $tokens;
    function __construct($id){
        require_once('twitteroauth/twitteroauth.php');
        require_once('config.php');
        $token=new class_tokens();
        $this->tokens=$token->getTokens($id);
        $this->handler = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $this->tokens['token'], $this->tokens['token_secret']);
    }
    function showTokens() {
        $result=$this->tokens['token'];
        return $result;
    }
    function tweet($text){
        $result=$this->handler->post('statuses/update', array('status' => $text));
        return $result;
    }
}
