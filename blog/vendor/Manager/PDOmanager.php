<?php

//vendor/Manager/PDOManager.php

namespace Manager;
use PDO;
use Config;

class PDOManager
{
    private static $instance = NULL;
    
    private function __construct(){}
    private function __clone(){}
    
    
    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new self;
        }
        return self::$instance;
    }
    
    public function getPdo(){
        
        require_once __DIR__ . '/../../app/Config.php';
        $config = new Config;     
        $connect = $config -> getParametersConnect();
        
        return new PDO('mysql:host=' . $connect['host'] . ';dbname=' . $connect['dbname'], $connect['login'], $connect['password'] , array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ));
    }
}