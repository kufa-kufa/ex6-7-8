
<?php
session_start();
if(empty($_SESSION['password'])) {
    header('Location: index.php');
    
}
require_once '../controllers/article_controller.php';
include '../translation/ru.php';
include '../views/admin/header.php';

if (isset($_POST["save"])) {
    $_SESSION["message_success"] = '';
    $_SESSION["message_error"] = '';
    $title = $_POST["title"];
    $content = $_POST["content"];
    if (trim($title) != "" && trim($content)!="") {
        $article = article_save($title, $content);
        if ($article["status"] == "success") {
            $index = $article["message"];
            $_SESSION["message_success"] = $messages[$index];
            
        } else {
            
            $_SESSION["message_error"] = $article["message"];
        }

        header("Location:index.php");
    } else {
        $_SESSION["message_error"] = $messages['Fields_empty'];
    }
}

include '../views/admin/article_save.php';
?>
   