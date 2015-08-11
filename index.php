<?php require "rb.php";
 R::setup('mysql:host=localhost;dbname=buqui','root','12345'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Buqui - System Login</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.css">
    <link rel="stylesheet" href="media.css">
</head>
<body>
    <div class="container">
        <div class="card card-container">
       <h1 class="text-center">Login System</h1>
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" method="POST">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" name="user" id="userName" class="form-control" placeholder="Usuario" required autofocus>
                <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name='login'>Login</button>
            </form><!-- /form -->
        </div><!-- /card-container -->
    </div><!-- /container -->    
</body>
</html>
<?php

R::debug(true);

$user = R::findOne("user",'login=? and ativo=1',array($_POST['user']));
    //$user = R::findOne('user','login=? and senha=? and ativo=1',array($_POST['login'],md5($_POST['senha'])));
    if ($user!==NULL) {
        //if ( $user->senha == md5($user->salt.$_POST['senha']) ) {         
        if ( $user->senha == hasher($_POST['pass'],$user->senha) ) {           
            $_SESSION['user'] = (object)$user->export();
            $response->success = true;
            $response->ssid = session_id();
        }
    }

?>
