<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php
        require_once '../controllers/article_controller.php';
        
        session_start();       
        if (isset($_POST["save"])) {
            $title = $_POST["title"];
            $content = $_POST["content"];
            if (trim($title) != "" && trim($content)) {
                $article = article_save($title, $content); 
                if($article["status"]=="success")
                {
                    $index = $article["message"];
                    $_SESSION["message"] = $messages[$index];
                }
                else {
                    $_SESSION["message"] = $article["message"];
                }
                
                header("Location:index.php");
            }
            else {
                $_SESSION["message"] = $messages['Fields_empty'];
            }
        }
       
        $message = $_SESSION["message"];
        $_SESSION["message"] = "";
        include 'article_save.php';
        // print_r($articles);
        ?>
    </body>
</html>
