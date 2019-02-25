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
    <a href="../admin/">Перейти админ панель</a>
    <br/>
        <?php
        require_once '../controllers/article_controller.php';
        $articles = articles_all();
        foreach($articles as $article) {
            echo $article["title"]."<br/>";
        }
        
       ?>
        
        
    </body>
</html>
