<?php
$a;

try {
    //$db = new PDO('mysql:host=localhost;dbname=ryo01_ogiwara;charset=utf8', 'root', '');
    $db = new PDO('mysql:host=mysql1.php.xdomain.ne.jp;dbname=ryo01_ogiwara;charset=utf8', 'ryo01_ogiwara', 'ryoogiwara');
    $stt = $db->prepare('INSERT INTO new_information(new_information_title, new_information_contents)VALUE(:new_information_title, :new_information_contents)');
    $stt->bindValue(':new_information_title', $_POST['new_information_title']);
    $stt->bindValue(':new_information_contents', $_POST['new_information_contents']);
    $stt->execute();
    $db = null;
    // $stt->debugDumpParams();
} catch (PDOException $e) {
    die('エラーメッセージ:' . $e->getMessage());
}
header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'/schedule_registration.php');
