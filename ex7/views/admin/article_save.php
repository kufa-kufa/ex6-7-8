
<!-- link for downloading
    https://ckeditor.com/ckeditor-4/download/ 
-->
<div class="container">
    <a class="btn right" href="index.php?logout=true"><?= $messages['logout'] ?></a>
    <script src="../ckeditor/ckeditor.js"></script>
    
    <form method="post" action="article_save.php">
        
        <div class="form-group">
            <label for="title"><?= $messages['title'] ?></label>
            <input type="text" name="title" id="title" required="required" class="form-control">
        </div>
        <div class="form-group">
            <label for="content"><?= $messages['content'] ?></label>
            <textarea cols="50" rows="10" name="content" id="content" required="required"></textarea>
        </div>
        <input type="submit" value="<?= $messages['save'] ?>" name="save" class="btn btn-primary">
       
    </form>
     <?php if(isset($_SESSION["message_success"]) && (strlen($_SESSION["message_success"]) >0) ) echo '<div class="alert alert-success" role="alert"> '.$_SESSION["message_success"].'</div>' ; ?>
     <?php if(isset($_SESSION["message_error"]) && (strlen($_SESSION["message_error"]) >0) ) echo '<div class="alert alert-danger" role="alert"> '.$_SESSION["message_error"].'</div>' ; ?>   
    <script>
        CKEDITOR.replace('content');
    </script>
</div>