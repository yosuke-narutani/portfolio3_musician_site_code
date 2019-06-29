<!-- トップページ -->

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
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <!-- <script src="../js/js1.js"></script> -->
  <meta name="description" content="ギタリスト荻原亮オフィシャルサイト">
  <title>ギタリスト荻原亮オフィシャルサイト</title>
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
              <!-- <h2><a href="../html/LESSON.html">LESSON</a></h2><br> -->
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
    <div id="fv-continer">
      <!-- コンテナ内左側のメイン画像 -->
      <div id="fv-inner-continer">
        <img id="img1" src="../img/img1.jpg" alt="メイン写真">
        <!-- <img id="img1" src="../img/img2.jpg" alt="メイン写真"> -->
      </div>


      <!-- コンテナ内右側、WHAT'S New -->
      <h1 id="side-table1">WHAT'S New</h1>
      <!-- <a href="" id="pankuzu1">TOP></a> -->


      <!-- 内容 -->
      <table id="side-table">
        <?php while ($row = $stt->fetch()) {?>
          <tr id="table-title">
            <th id='n_info_title'><?php print(e($row['new_information_title']))?></th>
          </tr>
          <tr id="table">
            <th id='n_info_contents'><?php print(e($row['new_information_contents']))?></th>
          </tr>
        <?php }?>
      </table>
      <!-- 内容、終り -->


    </div>
    <!-- 画像、WAHT'S NEW、終り -->


    <!-- ギター画像 -->
    <div id="main_sub_img">
      <figure id="youtube">
        <div id="youtube"></div>
      </figure>
    </div>


    <!-- メインコンテナ -->
    <div id="main-continer">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/vcYH0cF3E4U" frameborder="0"
        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

      <iframe width="560" height="315" src="https://www.youtube.com/embed/CBD1azeUfvA" frameborder="0"
        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <!-- メインコンテナ終り -->


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