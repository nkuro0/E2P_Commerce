<?php
$page = $_POST['page'];
if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){
    require '../includes/config.inc.php';
    require '../lib/DB.php';
    require '../lib/functions.php';
    $dbh = DB::getInstance();
    $req = $dbh->prepare('SELECT * FROM users WHERE username = :username');
    $req->execute(['username' => $_POST['username']]);
    $user = $req->fetch(PDO::FETCH_OBJ);
    if(password_verify($_POST['password'], $user->password)){
        session_start();
        $_SESSION['auth'] = $user;
        $_SESSION['lvluser'] =
        $_SESSION['flash']['success'] = 'Vous êtes maintenant connecté';

        header ('location:' .$_SERVER['HTTP_REFERER']);
    }
}
if($_GET['page']=='catalogue'){
}

if (empty($_SESSION['auth'])) {
    header ('location:' .$_SERVER['HTTP_REFERER']);
}


?>