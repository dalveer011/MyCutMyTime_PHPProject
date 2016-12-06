<?php

class Database
{
    private static $dsn = "mysql:host=localhost;dbname=mycutmytime";
    private static $user = "root";
    private static $password = "";//for macusers, we need to put password as mysql

    private static $myPDOObject;

    private function __construct() {

    }
    public static  function getConnection(){
        if(self::$myPDOObject == null) {
            try {
                self::$myPDOObject = new PDO(self::$dsn, self::$user, self::$password);
            }catch(PDOException $e){
                $error =  $e->getMessage();
                include 'error.php';
            }
        }
        return self::$myPDOObject;
    }
}