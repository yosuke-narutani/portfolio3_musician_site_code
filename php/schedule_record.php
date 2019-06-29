<?php
// 登録用PHP    SQL INSERT文
try {
    //$db = new PDO('mysql:host=localhost;dbname=ryo01_ogiwara;charset=utf8', 'root', '');
    $db = new PDO('mysql:host=mysql1.php.xdomain.ne.jp;dbname=ryo01_ogiwara;charset=utf8', 'ryo01_ogiwara', 'ryoogiwara');
    $stt = $db->prepare('INSERT INTO schedule(live_date, live_house_name, live_house_tel1, live_house_tel2, live_house_tel3, open_time, start_time, live_member_name1, live_member_name2, live_member_name3, live_member_name4, live_member_name5, live_member_name6, live_member_name7, leader_live, remarks)VALUE(:live_date, :live_house_name, :live_house_tel1, :live_house_tel2, :live_house_tel3, :open_time, :start_time, :live_member_name1, :live_member_name2, :live_member_name3, :live_member_name4, :live_member_name5, :live_member_name6, :live_member_name7, :leader_live, :remarks)');
    $stt->bindValue(':live_date', $_POST['live_year'].'/'.$_POST['live_month'].'/'.$_POST['live_day']);
    $stt->bindValue(':live_house_name', $_POST['live_house_name']);
    $stt->bindValue(':live_house_tel1', $_POST['live_house_tel1']);
    $stt->bindValue(':live_house_tel2', $_POST['live_house_tel2']);
    $stt->bindValue(':live_house_tel3', $_POST['live_house_tel3']);
    //オープン時間データが空の時NULL入れる
    if(!empty($_POST['otime_hour'])){
        $stt->bindValue(':open_time', $_POST['otime_hour'].':'.$_POST['otime_minutes']);
    }else{
        $stt->bindValue(':open_time', null);
    }
    //スタート時間データが空の時NULL入れる
    if(!empty($_POST['otime_hour'])){
        $stt->bindValue(':start_time', $_POST['stime_hour'].':'.$_POST['stime_minutes']);
    }else{
        $stt->bindValue(':start_time', null);
    }
    $stt->bindValue(':live_member_name1', $_POST['live_member_name1']);
    $stt->bindValue(':live_member_name2', $_POST['live_member_name2']);
    $stt->bindValue(':live_member_name3', $_POST['live_member_name3']);
    $stt->bindValue(':live_member_name4', $_POST['live_member_name4']);
    $stt->bindValue(':live_member_name5', $_POST['live_member_name5']);
    $stt->bindValue(':live_member_name6', $_POST['live_member_name6']);
    $stt->bindValue(':live_member_name7', $_POST['live_member_name7']);
    $stt->bindValue(':leader_live', $_POST['leader_live']);
    $stt->bindValue(':remarks', $_POST['remarks']);
    // var_dump($stt);
    $stt->execute();
    $db = null;
} catch (PDOException $e) {
    die('エラーメッセージ:' . $e->getMessage());
}
header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'/schedule_registration.php');

?>