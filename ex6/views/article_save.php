
<!-- link for downloading
    https://ckeditor.com/ckeditor-4/download/ 
-->
<script src="../ckeditor/ckeditor.js"></script>
<form method="post" action="index.php">
    <label for="title"><?= $messages['title'] ?></label>
    <input type="text" name="title" id="title" required="required">
    <br/>
    <label for="content"><?= $messages['content'] ?></label>
    <textarea cols="50" rows="10" name="content" id="content" required="required"></textarea>
    <input type="submit" value="<?= $messages['save'] ?>" name="save">
    <span><?= $message; ?></span>
</form>
<script>
    CKEDITOR.replace( 'content' );
</script>