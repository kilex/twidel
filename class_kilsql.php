<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kilexst
 * Date: 12.03.12
 * Time: 19:03
 */

class class_kilsql
{
    public $dir='/home/u559301096/kilsql/';
    public $indexdir='/home/u559301096/kilsql/index/';
    public $prefix='_';
    public $index=1;
    private $keytable='keys';
    private $keys=array();

    function __construct($prefix='',$index='index'){
        if ($prefix) $this->prefix=$prefix.'_';
        if ($index=='noindex') $this->index=0;
    }

    function getKeyTable(){
        $keys=$this->getArr($this->keytable);
        $this->keys=$keys;
        return $keys;
    }

    function getFullTable(){
        $resultarr=array();
        if (!$this->keys) $this->getKeyTable();
        foreach($this->keys as $key) {
            $resultarr[$key]=$this->getArr($key);
        }
        return $resultarr;
    }

    function addKey($key) {
        $this->addValue($this->keytable,$key);
    }

    function delKey($key) {
        $this->delValue($this->keytable,$key);
    }

    function getValues($key,$dir=''){
        if (!$dir) $dir=$this->dir;

        $arr=file($dir.$this->prefix.$key);
        $line=$arr[0]; // Берем первую строку
        $result=unserialize($line);
        return $result;
    }

    function setValue($key,$value,$set,$dir='') {
        if (!$dir) $dir=$this->dir;
        $arr=array();
        $arr=$this->getValues($key,$dir);
        $fhander=fopen($dir.$this->prefix.$key,'w');
        flock($fhander, LOCK_EX);
        if ($set==0) unset($arr[$value]);
            else $arr[$value]=$set;
        $str=serialize($arr);
        fwrite($fhander,$str);
        flock($fhander, LOCK_UN);
        fclose($fhander);
    }

    function delValue($key,$value) {
        $this->setValue($key,$value,0);
        if ($this->index) $this->setValue($value,$key,0,$this->indexdir);
    }
    function addValue($key,$value,$val='1') {
        $this->setValue($key,$value,$val);
        if ($key!=$this->keytable) {
            $this->addKey($key);
            if ($this->index) $this->setValue($value,$key,1,$this->indexdir);
        }
    }

    function getArr($key) {
        $basearr=$this->getValues($key);
        $resultarr=array();
        foreach ($basearr as $key=>$value) {
            $resultarr[]=$key;
        }
        return $resultarr;
    }

    function searchKeys($value) {
        $index=$this->getValues($value,$this->indexdir);
        $result=array();
        foreach ($index as $key=>$value) {
            $result[]=$key;
        }
        return $result;
    }

    function rebuildIndexes() {
        $big=$this->getFullTable();
//        print 'test';
        foreach ($big as $key=>$name) {
//            print $key;
            foreach ($big[$key] as $value) {
                print $key.'/'.$value.'<br>';
                $this->setValue($value,$key,1,$this->indexdir);
            }
        }
    }


}
