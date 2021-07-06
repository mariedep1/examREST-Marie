<?php 

class Database {

    /**
     * 
     * trouve PDO
     *
     */
    public static function getPdo() {

        $pdo = new PDO('mysql:host=localhost;dbname=testy', 'testy', 'testy', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ]);
        
        return $pdo;

    }








}












