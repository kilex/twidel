<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kilexst
 * Date: 12.03.12
 * Time: 21:40
 */

class class_access
{
    private $db;
    public $userid;
    public $user_tokens;
    public $access_to;
    public $access_from;
    private $twitter;

    function __construct($userid) {
        require_once('class_mysql.php');
        require_once('class_twitterdb.php');
        $this->db=new class_mysql();
        $this->userid=$userid;
        $this->twitter=new class_userinfo();

    }

    function printAllAccess() {
        print_r($this->access_to);
        print_r($this->access_from);
    }
    function getAccesTo() {
        $query="SELECT `td_access`.`id`,`accessto` ,`username`,`avatar`
                FROM `td_access`
                INNER JOIN `td_usernames`
                ON `td_usernames`.`id_user`=`td_access`.`accessto`
                WHERE `userid`={$this->userid};";
         $sql=$this->db->querySelect($query);
         $this->access_to=$sql;
         return $sql;
    }
    function getAccessFrom(){
        $query="SELECT `td_access`.`id`,`userid` ,`username`,`avatar`, `accessto`
                FROM `td_access`
                INNER JOIN `td_usernames`
                ON `td_usernames`.`id_user`=`td_access`.`userid`
                WHERE `accessto`={$this->userid};";
         $sql=$this->db->querySelect($query);
         $this->access_from=$sql;
         return $sql;
    }
    function giveAccessToName($name){
        $newid=$this->twitter->getUserInfo($name);
        $this->twitter->saveUserInfo();
        $this->giveAccessTo($newid);
    }
    function giveAccessTo($id,$from) {
		if (!$from) $from=$this->userid;
        $query="INSERT INTO `td_access` SET `userid`=$from , `accessto`=$id, `dt`=NOW();";
        $this->db->queryDo($query);
    }
    function revokeAccessTo($id) {
        $query="DELETE FROM `td_access` WHERE `userid`={$this->userid} AND `accessto`=$id;";
                $this->db->queryDo($query);
//        $this->db->delValue($this->username,$name);
    }
}
