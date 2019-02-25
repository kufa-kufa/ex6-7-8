<?php
require_once 'db.php';


?>
<!DOCTYPE html>
<html>
<head>
<title>Lesson 6</title>

<meta charset="utf8">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
</head>
<body>
    <div class="container">
    <div class="form-group row">
        <div class="col-sm-6">
            <h2 style="text-align: center; margin:10px;">Зарегистрируйтесь</h2>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Логин</label>
                    <div class="col-sm-8">
                        <input type="text" name="username" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Логин">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Полное имя</label>
                    <div class="col-sm-8">
                        <input type="login" name="full_name" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Полное имя">
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Email </label>
                    <div class="col-sm-8">
                        <input type="email" name="useremail" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Email ">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Пароль</label>
                    <div class="col-sm-8">
                        <input type="password" name="password_1" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Пароль">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Повторите пароль</label>
                    <div class="col-sm-8">
                        <input type="password" name="password_2" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Пароль">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Аватар</label>
                    <div class="col-sm-8">
                        <input type="file" name="avatar" class="form-control form-control-sm" id="colFormLabelSm" >
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <div class="float-right">
                            <input type="submit" value="Зарегистрироваться" name="sign_up" class="btn btn-primary">   
                        </div>  
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
</div>
<?php
$data = $_POST;
if(isset($data['sign_up'])) {
	$errors = array();
	if(trim($data['username']) == '') {
		$errors[] = 'Enter user name';
	}
	if(trim($data['useremail']) == '') {
		$errors[] = 'Enter user useremail';
	}

	if(trim($data['password_1']) == '' || trim($data['password_2']) == '') {
		$errors[] = 'Enter user password';
	}

	if($data['password_1'] != $data['password_2']) {
		$errors[] = 'Password is not match';
	}
	if(R::count('users', "login = ?", array($data['username'])) > 0) {
		$errors[] = 'username is already exist';
	}
	if(R::count('users', "email = ?", array($data['useremail'])) > 0) {
		$errors[] = 'useremail is already exist';
	}
      
	if(empty($errors)) {
                         
		$user = R::dispense('users');
		$user->login = $data['username'];
		$user->email = $data['useremail'];
                $user->full_name = $data['full_name'];
                $user->avatar = uploadAvatarToServer(); ;
		$user->password = password_hash($data['password_1'], PASSWORD_DEFAULT);
		R::store($user);
                
	}
	else {
		echo '<div style="color:red;">'.array_shift($errors).'</div>';
	}
}
function uploadAvatarToServer()
{
    $currentDir = getcwd();
    $uploadDirectory = "/uploads/";

    $errors = []; // Store all foreseen and unforseen errors here

    $fileExtensions = ['jpeg','jpg','png']; // Get all the file extensions
    $temp = explode(".", $_FILES["avatar"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    $fileName = $newfilename;
    $fileSize = $_FILES['avatar']['size'];
    $fileTmpName  = $_FILES['avatar']['tmp_name'];
    $fileType = $_FILES['avatar']['type'];
   
    $uploadPath = $currentDir . $uploadDirectory . basename($fileName); 
     

        if ($fileSize > 2000000) {
            $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
        }

        if (empty($errors)) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

            if ($didUpload) {
                echo "The file " . basename($fileName) . " has been uploaded";
            } else {
                echo "An error occurred somewhere. Try again or contact the admin";
            }
        } else {
            foreach ($errors as $error) {
                echo $error . "These are the errors" . "\n";
            }
        }
    return $fileName;
}




?>