<!-- 登録一覧ページから、編集ボタンを押して遷移する画面 -->

<?php
require_once '../php/encode.php';

function showoption($start, $end, $default, $step = 1)
{
    for ($i = $start; $i <= $end; $i += $step) {
        print('<option value="'.$i.'"');
        if ($i === (int) $default) {print('selected'); }
        print('>'.$i.'</option>');
    }
}

try {
    //$db = new PDO('mysql:host=localhost;dbname=ryo01_ogiwara;charset=utf8', 'root', '');
    $db = new PDO('mysql:host=mysql1.php.xdomain.ne.jp;dbname=ryo01_ogiwara;charset=utf8', 'ryo01_ogiwara', 'ryoogiwara');
    $stt = $db->prepare('SELECT * FROM new_information WHERE info_id = :info_id');
    if(isset($_GET['info_id'])){
      $stt->bindValue(':info_id', $_GET['info_id']);
      $stt->execute();
    }
} catch (PDOException $e) {
    die('エラーメッセージ:' . $e->getMessage());
}

try {
    //$db = new PDO('mysql:host=localhost;dbname=ryo01_ogiwara;charset=utf8', 'root', '');
    $db = new PDO('mysql:host=mysql1.php.xdomain.ne.jp;dbname=ryo01_ogiwara;charset=utf8', 'ryo01_ogiwara', 'ryoogiwara');
    $stt2 = $db->prepare('SELECT * FROM schedule WHERE schedule_id = :schedule_id');
    if(isset($_GET['schedule_id'])){
      $stt2->bindValue(':schedule_id', $_GET['schedule_id']);
      $stt2->execute();
    }
} catch (PDOException $e) {
    die('エラーメッセージ:' . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/css2.css">
  <title>新情報、スケジュール編集削除</title>
</head>
<body>



<!-- 以下新情報登録編集 -->

<h1>新情報登録</h1>

<?php
if ($row = $stt->fetch()) {
?>

  <form method="post" action="schedule_update1.php">
    <input type="hidden" name="info_id" value="<?php print(e($row['info_id']))?>">
    <div class="container">
      <label for="new_information_title">新情報タイトル</label><br>
      <input type="text" id="new_information_title" name="new_information_title" size="50" maxlength="40" value="<?php print(e($row['new_information_title']))?>">
    </div><br>

    <div class="container">
      <label for="new_information_contents">新情報内容</label><br>
      <!-- <input type="text" id="new_information_contents" name="new_information_contents" size="200" maxlength="200" value="<?php print(e($row['new_information_contents']))?>"> -->
      <textarea name="new_information_contents" id="new_information_contents" cols="50" rows="5" maxlength="200"><?php print(e($row['new_information_contents']))?></textarea>
    </div>

    <input type="submit" name="update" value="更新" />
    <input type="submit" name="delete" value="削除"  onclick="return confirm('本当に削除してよろしいですか')"/>

  </form>

<?php
} else {
    print('該当するデータがありません');
}
?>




<!-- 以下スケジュール情報編集 -->

<h1>スケジュール登録</h1>

<?php
if ($row = $stt2->fetch()) {
  // var_dump($row);
    $sdate = strtotime($row['live_date']);
    // オープン時間
    if(!empty($row['open_time'])){
      $otime = strtotime($row['open_time']);
    }else{
      $otime ='';
    }
    // スタート時間
    if(!empty($row['start_time'])){
      $stime = strtotime($row['start_time']);
    }else{
      $stime ='';
    }
    if(!empty($row['leader_live'])){
      $row['leader_live'] = 'checked';
      print($row['leader_live']);
    }else{
      $row['leader_live'] = '';
      print($row['leader_live']);
    }
?>


  <!-- 年月日付登録 -->
  <form method="post" action="schedule_update2.php">
    <input type="hidden" name="schedule_id" value="<?php print(e($row['schedule_id']))?>">

    <div class="container">

    <label for="live_ymd">ライブ年月日</label><br>
      <select name="live_year" id="live_year">
        <?php showoption(2019, 2030, date('Y', $sdate));?>
      </select>
      <label for="live_year">年</label>

      <select name="live_month" id="live_month">
        <?php showoption(1, 12, date('n', $sdate))?>
      </select>
      <label for="live_month">月</label>

      <select name="live_day" id="live_day">
        <?php showoption(1, 31, date('j', $sdate))?>
      </select>
      <label for="live_day">日</label>
    </div><br>

    <!-- ライブハウス名登録 -->
    <div class="container">
      <label for="live_house_name">ライブハウス名</label><br>
      <input type="text" id="live_house_name" name="live_house_name" size="50" maxlength="40" value="<?php print(e($row['live_house_name']))?>">
    </div><br>

    <!-- ライブハウス電話番号 -->
      <div class="container_tel">
        <label for="live_house_te1">電話番号</label><br>
        <input type="text" id="live_house_tel1" name="live_house_tel1" size="3" maxlength="3" value="<?php print(e($row['live_house_tel1']))?>">
      </div>
      <div class="container_tel">
        <label for="live_house_tel2">-</label>
        <input type="text" id="live_house_tel2" name="live_house_tel2" size="4" maxlength="4" value="<?php print(e($row['live_house_tel2']))?>">
      </div>
      <div class="container_tel">
        <label for="live_house_tel3">-</label>
        <input type="text" id="live_house_tel3" name="live_house_tel3" size="4" maxlength="4" value="<?php print(e($row['live_house_tel3']))?>">
      </div><br><br>



    <!-- Open時間 -->
    <div class="container">
    <label for="open_time">オープン時間</label><br>
      <select name="otime_hour" id="otime_hour">
        <option value="">無し</option>
        <?php showoption(0, 23, date('G', $otime));?>
      </select>
      <label for="otime_hour">時</label>
      <select name="otime_minutes" id="otime_minutes">
        <option value="">無し</option>
        <?php showoption(0, 59, date('i', $otime), 5);?>
      </select>
    <label for="otime_minutes">分</label>
    </div><br>


    <!-- Start時間 -->
    <div class="container">
    <label for="start_time">スタート時間</label><br>
      <select name="stime_hour" id="stime_hour">
        <option value="">無し</option>
        <?php showoption(0, 23, date('G', $stime));?>
      </select>
      <label for="stime_hour">時</label>
      <select name="stime_minutes" id="stime_minutes">
        <option value="">無し</option>
        <?php showoption(0, 59, date('i', $stime), 5);?>
      </select>
      <label for="stime_minutes">分</label>
    </div><br>


    <!-- メンバー名 -->
    <!-- <div class="container">
      <label for="live_member_name1">メンバー名1</label><br>
      <input type="text" id="live_member_name1" name="live_member_name1" size="20" maxlength="20" value="<?php print(e($row['live_member_name1']))?>">
    </div> -->

    <div class="container">
      <label for="live_member_name2">メンバー名1</label><br>
      <input type="text" id="live_member_name2" name="live_member_name2" size="40" maxlength="40" value="<?php print(e($row['live_member_name2']))?>">
    </div>

    <!-- <div class="container">
      <label for="live_member_name3">メンバー名3</label><br>
      <input type="text" id="live_member_name3" name="live_member_name3" size="20" maxlength="20" value="<?php print(e($row['live_member_name3']))?>">
    </div>-->

    <div class="container">
      <label for="live_member_name4">メンバー名2</label><br>
      <input type="text" id="live_member_name4" name="live_member_name4" size="40" maxlength="40" value="<?php print(e($row['live_member_name4']))?>">
    </div>

    <!-- <div class="container">
      <label for="live_member_name5">メンバー名5</label><br>
      <input type="text" id="live_member_name5" name="live_member_name5" size="20" maxlength="20" value="<?php print(e($row['live_member_name5']))?>">
    </div>

    <div class="container">
      <label for="live_member_name6">メンバー名6</label><br>
      <input type="text" id="live_member_name6" name="live_member_name6" size="20" maxlength="20" value="<?php print(e($row['live_member_name6']))?>">
    </div> -->

    <div class="container">
      <label for="live_member_name7">メンバー名3</label><br>
      <!-- <input type="text" id="live_member_name7" name="live_member_name7" size="100" maxlength="100" value="<?php print(e($row['live_member_name7']))?>"> -->
      <textarea name="live_member_name7" id="live_member_name7" cols="50" rows="5" maxlength="200" value=""><?php print(e($row['live_member_name7']))?></textarea>
    </div>
    <br>

    <div class="container">
      <label for="remarks">備考</label><br>
      <!-- <input type="text" id="remarks" name="remarks" size="100" maxlength="100" value="<?php print(e($row['remarks']))?>"> -->
      <textarea name="remarks" id="remarks" cols="50" rows="5" maxlength="200" value=""><?php print(e($row['remarks']))?></textarea>
    </div><br>

    <div class="container">
      <input type="checkbox" name="leader_live" id="leader_live" value="Leader Live!!" <?php print(e($row['leader_live']))?>>
      <label for="leader_live">リーダーライブ</label>
    </div>
    <br>

    <input type="submit" name="update" value="更新" />
    <input type="submit" name="delete" value="削除"  onclick="return confirm('本当に削除してよろしいですか')"/>

  </form>
<?php
} else {
    print('該当するデータがありません');
}
?>

</body>
</html>