<!-- 登録したスケジュールを編集するために、一覧表示したページ -->

<?php
require_once 'encode.php';

try {
    //$db = new PDO('mysql:host=localhost;dbname=ryo01_ogiwara;charset=utf8', 'root', '');
    $db = new PDO('mysql:host=mysql1.php.xdomain.ne.jp;dbname=ryo01_ogiwara;charset=utf8', 'ryo01_ogiwara', 'ryoogiwara');
    $stt = $db->prepare('SELECT * FROM new_information ORDER BY new_information_title');
    $stt->execute();
} catch (PDOException $e) {
  die('エラーメッセージ:' . $e->getMessage());
}

try {
    //$db = new PDO('mysql:host=localhost;dbname=ryo01_ogiwara;charset=utf8', 'root', '');
    $db = new PDO('mysql:host=mysql1.php.xdomain.ne.jp;dbname=ryo01_ogiwara;charset=utf8', 'ryo01_ogiwara', 'ryoogiwara');
    $stt2 = $db->prepare('SELECT * FROM schedule ORDER BY live_date, start_time ASC');
    $stt2->execute();
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
  <link
    href="https://fonts.googleapis.com/css?family=Montaga|Playfair+Display:400,700|Raleway:400,400i,700|Shadows+Into+Light+Two|Special+Elite&display=swap"
    rel="stylesheet">
  <meta name="description" content="ギタリスト荻原亮オフィシャルサイト">
  <title>ギタリスト荻原亮スケジュール一覧</title>
</head>

<body id="pageTop">
  <div id="wrapper">


    <!-- コンテナ内右側、WHAT'S New -->
    <h1 id="side-table">新情報（WHAT'S New）</h1>


    <!-- 内容 -->
    <table id="new_information">
      <thead>
        <tr id="new_information_header">
          <th>タイトル</th>
          <th>内容</th>
          <th>編集</th>
        </tr>
      </thead>


      <tbody>
        <?php while ($row = $stt->fetch()) {?>
        <tr id="information_table">
          <td>
            <?php print(e($row['new_information_title']))?>
          </td>
          <td>
            <?php print(e($row['new_information_contents'])) ?>
          </td>
          <td>
            <a href="schedule_edit.php?info_id=<?php print(e($row['info_id']))?>">編集</a>
          </td>
        </tr>
        <?php }?>
      </tbody>

    </table>
    <!-- 内容、終り -->




    <!-- 画像、WAHT'S NEW、始まり -->
    <div id="fv-continer-schedule">
      <h1 id="side-table">スケジュール一覧</h1>

      <table class="schedule">
        <thead>
          <tr id="schedule_header">
            <th id="leader">リーダーライブ</th>
            <th id="date">日付</th>
            <th id="place">場所</th>
            <th id="member">メンバー名</th>
            <th id="remarks">備考</th>
            <th id="edit">編集</th>
          </tr>
        </thead>

        <tbody>
          <?php while ($row = $stt2->fetch()) {
            if (!empty($row['live_house_tel1'])) {
              $b = '&nbsp;問合せ&nbsp;';
              $c = '-';
              $d = '-';
          } else {
              $b = '';
              $c = '';
              $d = '';
          }
        ?>

        <?php 
          if (!empty($row['open_time'])) {
              $e = '&nbsp;Open&nbsp;';
              $f = '<br>';
          } else {
              $e = '';
              $f = '';
          }
        ?>

        <?php 
          if (!empty($row['start_time'])) {
              $g = '&nbsp;Start&nbsp;';
              $h = '<br>';
          } else {
              $g = '';
              $h = '';
          }
        ?>

            <tr>
              <td id="leader"><?php print(e($row['leader_live']))?></td>
              <td><?php format($row['live_date'], 'Y/n/j')?></td>
              <td>
              <!-- ライブハウス名 -->
              <div id="livehouse"><?php print(e($row['live_house_name']))?><br></div>
              <!-- 電話番号 -->
              <div id="tel"><?php print($b)?><?php print(e($row['live_house_tel1']))?><?php print($c)?><?php print(e($row['live_house_tel2']))?><?php print($d)?><?php print(e($row['live_house_tel3']))?></div>
              <!-- オープン時間 -->
              <div id="open"><?php print($e)?><?php format($row['open_time'], 'G:i')?><?php print($f)?></div>
              <!-- 閉店時間 -->
              <div id="start"><?php print($g)?><?php format($row['start_time'], 'G:i')?><?php print($h)?></div>
              </td>
              <td id="member_name">
                <?php
                  if (!empty($row['live_member_name1'])) {
                    print(e($row['live_member_name1']));
                    echo "&nbsp;&nbsp;";
                  } else {
                    // echo "<p>データがない</p>";
                  }
                ?>
                <?php
                  if (!empty($row['live_member_name2'])) {
                    print(e($row['live_member_name2']));
                    echo "<br>";
                  } else {
                    // echo "<p>データがない</p>";
                  }
                ?>
                <?php
                  if (!empty($row['live_member_name3'])) {
                    print(e($row['live_member_name3']));
                    echo "&nbsp;&nbsp;";
                  } else {
                    // echo "<p>データがない</p>";
                  }
                ?>
                <?php
                  if (!empty($row['live_member_name4'])) {
                    print(e($row['live_member_name4']));
                    echo "<br>";
                  } else {
                    // echo "<p>データがない</p>";
                  }
                ?>
                <?php
                  if (!empty($row['live_member_name5'])) {
                    print(e($row['live_member_name5']));
                    echo "&nbsp;&nbsp;";
                  } else {
                    // echo "<p>データがない</p>";
                  }
                ?>
                <?php
                  if (!empty($row['live_member_name6'])) {
                    print(e($row['live_member_name6']));
                    echo "<br>";
                  } else {
                    // echo "<p>データがない</p>";
                  }
                ?>
                <?php
                  if (!empty($row['live_member_name7'])) {
                    print(e($row['live_member_name7']));
                  } else {
                    // echo "<p>データがない</p>";
                  }
                ?>
              </td>
              <td id="remarks">
                <?php print(e($row['remarks']))?>
              </td>
              <td>
                <a href="schedule_edit.php?schedule_id=<?php print(e($row['schedule_id']))?>">編集</a>
              </td>
            </tr>
          <?php }?>
        </tbody>
      </table>


    </div>
    <!-- 画像、WAHT'S NEW、終り -->


  </div>
  <!-- wrapper終り -->
</body>

</html>
