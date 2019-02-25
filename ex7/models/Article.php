<?php

/**
 * Description of Article
 *
 * @author Kufa
 */
class Article {

    public function __construct() {
        
    }

    public static function getall() {
        $result = self::db()->prepare("SELECT id, title, content, created FROM article");
        $result->execute();
        return $result->fetchAll();
    }

    public static function getone($id) {
        $result = self::db()->prepare("SELECT id, title, content, created FROM article WHERE id = :id LIMIT 1");
        $result->bindParam("id", $id);
        $result->execute();
        return $result->fetch();
    }

    public static function save($title, $content) {
       
        try {
            $result = self::db()->prepare("INSERT INTO article (title, content, created) VALUES (:title, :content, now())");
            $result->bindParam("title", $title);
            $result->bindParam("content", $content);            
              
            if (!$result->execute()) {
                $error = $result->errorInfo();
                $status = array("status" => "error", "message" => $error[2]);
            }  
            else {
                $status = array("status" => "success", "message"=>"successful_saved");                
            }
        } catch (Exception $ex) {
             $status = array("status" => "error", "message" => $ex);
        }
        return $status;
    }

    public static function db() {
        $conn = new PDO("mysql:host=127.0.0.1;dbname=php_course", 'root', '', array(PDO::ATTR_PERSISTENT => true));
        $conn->exec("set names utf8");
        return $conn;
    }

}
