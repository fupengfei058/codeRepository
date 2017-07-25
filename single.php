<?php
//单例模式
class DB{
    private static $db;
    private function __construct(){}
    private function __clone(){}
    public static function getInstance(){
        if(!self::$db instanceof self){
            self::$db = new DB();
        }
        return self::$db;
    }
}

DB::getInstance();
DB::getInstance();
DB::getInstance();