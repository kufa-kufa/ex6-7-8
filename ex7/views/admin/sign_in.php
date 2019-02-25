<br/>

<div class="container">
    <div class="form-group row">
        <div class="col-sm-6">
            <h2 style="text-align: center; margin:10px;"><?= $messages['authorization'] ?></h2>
            <form action="index.php" method="post">
                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm"><?= $messages['user_name'] ?></label>
                    <div class="col-sm-8">
                        <input type="login" name="login" class="form-control form-control-sm" id="colFormLabelSm" placeholder="<?= $messages['user_name'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm"><?= $messages['password'] ?></label>
                    <div class="col-sm-8">
                        <input type="password" name="password" class="form-control form-control-sm" id="colFormLabelSm" placeholder="<?= $messages['password'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <div class="float-right">
                            <input type="submit" value="<?= $messages['sign_in'] ?>" name="sign_in" class="btn btn-primary">   
                        </div>  
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
</div>


