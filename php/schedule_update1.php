<?php
try{
    //$db = new PDO('mysql:host=localhost;dbname=ryo01_ogiwara;charset=utf8', 'root', '');
    $db = new PDO('mysql:host=mysql1.php.xdomain.ne.jp;dbname=ryo01_ogiwara;charset=utf8', 'ryo01_ogiwara', 'ryoogiwara');  
  if(isset($_POST['update'])){
    $stt = $db->prepare('UPDATE new_information SET new_information_title=:new_information_title, new_information_contents=:new_information_contents WHERE info_id=:info_id');
    $stt->bindValue(':new_information_title', $_POST['new_information_title']);
    $stt->bindValue(':new_information_contents', $_POST['new_information_contents']);
  } elseif (isset($_POST['delete'])){
    $stt = $db->prepare('DELETE FROM new_information WHERE info_id=:info_id');
  }
  $stt->bindValue(':info_id', $_POST['info_id']);
  $stt->execute();
} catch (PDOException $e) {
  die('エラーメッセージ:'.$e->getMessage());
}
header('Location: http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/schedule_list.php');
