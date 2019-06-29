<!-- スケジュールページのHTML、PHP -->

<?php
require_once 'encode.php';
try {
    //$db = new PDO('mysql:host=localhost;dbname=ryo01_ogiwara;charset=utf8', 'root', '');
    $db = new PDO('mysql:host=mysql1.php.xdomain.ne.jp;dbname=ryo01_ogiwara;charset=utf8', 'ryo01_ogiwara', 'ryoogiwara');
    $stt = $db->prepare('SELECT * FROM schedule ORDER BY live_date');
    $stt->execute();
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
  <link rel="stylesheet" href="../css/css1.css">
  <link rel="stylesheet" href="../css/css3.css">
  <link
    href="https://fonts.googleapis.com/css?family=Montaga|Playfair+Display:400,700|Raleway:400,400i,700|Shadows+Into+Light+Two|Special+Elite&display=swap"
    rel="stylesheet">
  <meta name="description" content="ギタリスト荻原亮オフィシャルサイト">
  <title>ギタリスト荻原亮スケジュール</title>
</head>

<body id="pageTop">
  <div id="wrapper">
    <header class="drawer-navbar">
      <div class="drawer-container">
        <div class="drawer-navbar-header">
          <h1>Guitarlist &nbsp; RYO OGIHARA&nbsp;&nbsp;&nbsp;&nbsp;</h1>
          <small>OFFICIAL SITE</small>

          <nav id=nav-ber>
            <ul>
              <li><a href="../php/top.php">HOME</a></li>
              <li><a href="../php/schedule.php">SCHEDULE</a></li>
              <li><a href="../html/PROFILE.html">PROFILE</a></li>
              <li><a href="../html/DISCOGRAPHY.html">DISCOGRAPHY</a></li>
              <!-- <li><a href="../html/LESSON.html">LESSON</a></li> -->
            </ul>
          </nav>

          <div id="nav-drawer">
            <input id="nav-input" type="checkbox" class="nav-unshown">
            <label id="nav-open" for="nav-input"><span></span></label>
            <label class="nav-unshown" id="nav-close" for="nav-input"></label>
            <div id="nav-content">
              <h2><a href="../php/top.php">HOME</a></h2><br>
              <h2><a href="../php/schedule.php">SCHEDULE</a></h2><br>
              <h2><a href="../html/PROFILE.html">PROFILE</a></h2><br>
              <h2><a href="../html/DISCOGRAPHY.html">DISCOGRAPHY</a></h2><br>
              <!-- <h2><a href="../html/
              .html">LESSON</a></h2><br> -->
            </div>
          </div>

        </div>
        <!-- drawer-navbar-header -->
      </div>
      <!-- drawer-container -->
    </header>
    <!-- drawer-navbar -->

    <!-- ナビゲーションバーの下地 -->
    <div id="header_sub"></div>

    <!-- 画像、WAHT'S NEW、始まり -->
    <div id="fv-continer-schedule">
      <h1 id="side-table">SCHEDULE</h1>
      <!-- <a href="" id="pankuzu2">TOP></a>
      <a href="" id="pankuzu3">SCHEDULE></a> -->

      <img id="schedule" src="../img/guitar1.jpg" alt="">

      <table class="schedule">
        <thead>
          <tr>
            <th id="leader"></th>
            <th id="date">Date</th>
            <th id="place">Place</th>
            <th id="member">Member</th>
            <th id="remarks">Remarks</th>
          </tr>
        </thead>
        <tbody>

        <!-- 問い合わせ番号が空じゃないときときにハイフン等文字を入れる -->
        <?php while ($row = $stt->fetch()) {
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
            <!-- リーダーライブ -->
            <td id="leader"><?php print(e($row['leader_live']))?></td>
            <!-- ライブ日時 -->
            <td><?php format($row['live_date'], 'n/j')?></td>
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

            <!-- メンバー名 -->
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
              <!-- 備考 -->
              <td id="remarks">
                <?php print(e($row['remarks']))?>
              </td>
            </tr>
          <?php }?>
        </tbody>
      </table>


<!-- ◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆ -->
        <!-- 以下スマホ用 -->

        <?php
          require_once 'encode.php';
          try {
              //$db = new PDO('mysql:host=localhost;dbname=ryo01_ogiwara;charset=utf8', 'root', '');
              $db = new PDO('mysql:host=mysql1.php.xdomain.ne.jp;dbname=ryo01_ogiwara;charset=utf8', 'ryo01_ogiwara', 'ryoogiwara');
              $stt = $db->prepare('SELECT * FROM schedule ORDER BY live_date');
              $stt->execute();
          } catch (PDOException $e) {
              die('エラーメッセージ:' . $e->getMessage());
          }
        ?>

        <div class="schedule2">

          <ul class="schedule2">
            <?php 
                while ($row = $stt->fetch()) {
                  if (!empty($row['live_house_tel1'])) {
                    $b = '&nbsp;問合せ&nbsp;';
                    $c = '-';
                    $d = '-';
                    $e = '<br>';
                } else {
                    $b = '';
                    $c = '';
                    $d = '';
                    $e = '';
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

            <li>
              <!-- ライブ日付、リーダーライブ -->
              <h3 id='leader_sp'><?php format($row['live_date'], 'n/j')?>&nbsp;&nbsp;&nbsp;<?php print(e($row['leader_live']))?></h3>
              <!-- ライブハウス名 -->
              <?php print(e($row['live_house_name']))?><br>
              <!-- 電話番号 -->
              <?php print($b)?><?php print(e($row['live_house_tel1']))?><?php print($c)?><?php print(e($row['live_house_tel2']))?><?php print($d)?><?php print(e($row['live_house_tel3']))?><?php print($e)?>
              <!-- オープン時間 -->
              <?php print($e)?><?php format($row['open_time'], 'G:i')?><?php print($f)?>
              <!-- 閉店時間 -->
              <?php print($g)?><?php format($row['start_time'], 'G:i')?><?php print($h)?>
                          <!-- メンバー名 -->
            <td id="member_name">

            <!-- <?php
              if (!empty($row['live_member_name1'])) {
                      print(e($row['live_member_name1']));
                      echo "&nbsp;&nbsp;";
                  } else {
                      // echo "<p>データがない</p>";
                  }
            ?> -->

            <?php
              if (!empty($row['live_member_name2'])) {
                      print(e($row['live_member_name2']));
                      echo "<br>";
                  } else {
                      // echo "<p>データがない</p>";
                  }
            ?>

            <!-- <?php
              if (!empty($row['live_member_name3'])) {
                      print(e($row['live_member_name3']));
                      echo "&nbsp;&nbsp;";
                  } else {
                      // echo "<p>データがない</p>";
                  }
            ?> -->
            
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
                      echo "<br>";
                  } else {
                      // echo "<p>データがない</p>";
                  }
            ?><br>
            <?php
              if (!empty($row['remarks'])) {
                      print(e($row['remarks']));
                  } else {
                      // echo "<p>データがない</p>";
                  }
            ?>
            </li>
            <?php 
              }
            ?>
          </ul>

        </div>

    </div>
    <!-- 画像、WAHT'S NEW、終り -->


    <!-- フッター -->
    <footer>
      <div class="footerArea">
        <p class="copy">
          <small>
            Copyright©ryo ogihara. All Rights Reserved.
            <span>
              created by YoNa
            </span>
          </small>
        </p>
      </div>
    </footer>
    <!-- フッター終り -->

  </div>
  <!-- wrapper終り -->
</body>

</html>
