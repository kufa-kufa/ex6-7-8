<?php

require_once '../models/Article.php';

function articles_all() {
    $articles = Article::getall();
    return $articles;
}

function articles_single($id) {
    $article = Article::getone($id);
    /*
    if ($article['title'] =="") {
        header("Location: /ex3/");
        die();
    }
     
     */
    return $article;
}

function article_save($title, $content) {
    $article = Article::save($title, $content);
    return $article;

}

?>