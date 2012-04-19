<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kilex
 * Date: 16.11.11
 * Time: 9:31
 * To change this template use File | Settings | File Templates.
 */

class class_mysql {
	public $link;
    public $linkrepl;
    var $servers=array("mysql.hostinger.ru");
    var $repl=array("mysql.hostinger.ru");
   	private $username='u763822110_user';
   	private $passwd='none47';
   	private $dbname='u763822110_td';
	function __construct($customserver='',$customdb='',$customlogin='',$custompass='') {
		if ($customserver AND $customlogin AND $custompass AND $customdb) {
            $this->servers=array("$customserver");
            $this->username=$customlogin;
            $this->passwd=$custompass;
            $this->dbname=$customdb;
            $resultserver=$customserver;
            $resultreplserver=$customserver;
        }
        else {
            $rserver=$this->servers;
            shuffle($rserver);
            $resultserver=$rserver[0];
//            print_r($rserver);
            $replserver=$this->repl;
            shuffle($replserver);
            $resultreplserver=$replserver[0];
        }
//        print "mysqlserver=($resultserver) ";
//        require_once('class_memd.php');
//        $this->memd= new class_memd();
		$this->link = mysql_connect($resultserver,$this->username,$this->passwd);
		$this->linkrepl = mysql_connect($resultreplserver,$this->username,$this->passwd);

		@mysql_select_db($this->dbname, $this->link);
		@mysql_select_db($this->dbname, $this->linkrepl);

		$this->set_encoding();
	}
	function set_encoding($encoding='utf8') {
        mysql_query ("set character_set_client='$encoding'",$this->link);
        mysql_query ("set character_set_results='$encoding'",$this->link);
        mysql_query ("set collation_connection='{$encoding}_general_ci'",$this->link);

        mysql_query ("set character_set_client='$encoding'",$this->linkrepl);
        mysql_query ("set character_set_results='$encoding'",$this->linkrepl);
        mysql_query ("set collation_connection='{$encoding}_general_ci'",$this->linkrepl);

	}
    function querySelect($query,$key='id') {
        $result=array();

                $sql=mysql_query($query,$this->linkrepl);
                if ($sql) {
                    while ($arr=mysql_fetch_array($sql)) {
                        $result[$arr[$key]]=$arr;
                    }
                }
        return $result;
    }
    function queryDo($query) {
        $sql=mysql_query($query,$this->link);
        return $sql;
    }
}



class singleton_example
{
    private static $instance;
    private $count = 0;

    private function __construct()
    {
    }

    public static function singleton()
    {
        if (!isset(self::$instance)) {
            echo 'Создание нового экземпляра.';
            $className = __CLASS__;
            self::$instance = new $className;
        }
        return self::$instance;
    }

    public function increment()
    {
        return $this->count++;
    }

    public function __clone()
    {
        trigger_error('Клонирование запрещено.', E_USER_ERROR);
    }

    public function __wakeup()
    {
        trigger_error('Десериализация запрещена.', E_USER_ERROR);
}
}




