<?php

require '../includes/config.inc.php';
spl_autoload_register(function ($class) {
    require '../lib/'.$class.'.php';
});

$dbh = DB::getInstance();

$jeuxId = $_POST['jeuxId'];
$userId = $_POST['userId'];
$text = $_POST['edit'];
$eval = $_POST['eval'];
$statement = $_POST['avis_exist'];

var_dump($statement);
die;
if(isset($statement)){
    $sql = "UPDATE "
}
else{
    $sql = "INSERT INTO avis_jeux (avis_jeux_id, avis_user_id, text) VALUES ('$jeuxId', '$userId', '$text')";
    $result = $dbh->prepare($sql);
    $result->execute();
    $avis_jeuxId = $dbh->lastInsertId();
    $sql = "INSERT INTO avis_join (jeux_id, user_id, avis_id, avis_eval) VALUES ('$jeuxId', '$userId', '$avis_jeuxId', '$eval')";
    $result = $dbh->prepare($sql);
    $result->execute();
}


//header ('location:' .$_SERVER['HTTP_REFERER']);


