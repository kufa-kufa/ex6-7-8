
<?php

require_once '../controllers/user_controller.php';
include '../translation/ru.php';
include '../views/admin/header.php';
session_start();
if (isset($_GET["logout"])) {
    unset($_SESSION['password']);
    unset($_SESSION["message_success"]);
    unset($_SESSION["message_error"]);
    header('Location: index.php');
}
if (isset($_SESSION['password'])) {
    header('Location: article_save.php');
} else {
    include '../views/admin/sign_in.php';
}


if (isset($_POST["sign_in"])) {
    $login = $_POST["login"];
    $password = $_POST["password"];
    $user = user_single($login, $password);

    if (count($user) > 0 && $user["role"] == 1) {

        $user["role"] == 1;
        $_SESSION['password'] = $user["password"];
        header('Location: article_save.php');
    } else {
        echo '<div class="alert alert-danger" role="alert">' . $messages['username or password is incorrect'] . '</div>';
    }
}

include '../views/admin/footer.php';
?>
           



