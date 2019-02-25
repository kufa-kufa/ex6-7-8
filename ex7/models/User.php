<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Kufa
 */
class User {
    
      public function __construct() {
        
    }

    public static function getall() {
        $result = self::db()->prepare("SELECT id, login, password, full_name, role, created, avatar FROM users");
        $result->execute();
        return $result->fetchAll();
    }

    public static function getone($login, $password) {
        $result = self::db()->prepare("SELECT id, login, password, full_name, role, created, avatar FROM users WHERE login = :login AND password = sha1(:password) LIMIT 1");
        $result->bindParam("login", $login);
         $result->bindParam("password", $password);
        $result->execute();
        return $result->fetch();
    }

    public static function db() {
        $conn = new PDO("mysql:host=127.0.0.1;dbname=php_course", 'root', '', array(PDO::ATTR_PERSISTENT => true));
        $conn->exec("set names utf8");
        return $conn;
    }
}
