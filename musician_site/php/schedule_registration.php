<!-- スケジュールのHTML -->

<?php
function showoption($start, $end, $step = 1)
{
    for ($i = $start; $i <= $end; $i += $step) {
        print('<option value ="'.$i.'">'.$i.'</option>');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/css2.css">
  <script src="../js/js2.js"></script>
  <!-- Bootstrap CSS -->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
  <title>新情報、スケジュール登録</title>
</head>
<body>

<!-- 新情報登録 -->
  <h1>新情報登録</h1>
  <form method="post" action="new_information_record.php">
    <div class="container">
      
      <label for="new_information_title">新情報タイトル</label><br>
      <input type="text" id="new_information_title" name="new_information_title" size="50" maxlength="40">
    </div><br>

    <div class="container">
      <label for="new_information_contents">新情報内容</label><br>
      <!-- <input type="text" id="new_information_contents" name="new_information_contents" size="200" maxlength="200"> -->
      <textarea name="new_information_contents" id="new_information_contents" cols="50" rows="5" maxlength="200"></textarea>
    </div>

    <input type="submit" value="登録" />
  </form>


<!-- スケジュール登録 -->
  <h1>スケジュール登録</h1>

  <!-- 年月日付登録 -->
  <form method="post" action="schedule_record.php">
    <div class="container">

    <label for="live_ymd">ライブ年月日</label><br>
      <select name="live_year" id="live_year">
        <?php showoption(2019, 2030);?>
      </select>
      <label for="live_year">年</label>

      <select name="live_month" id="live_month">
        <?php showoption(1, 12)?>
      </select>
      <label for="live_month">月</label>

      <select name="live_day" id="live_day">
        <?php showoption(1, 31)?>
      </select>
      <label for="live_day">日</label>
    </div><br>

    <!-- ライブハウス名登録 -->
    <div class="container">
      <label for="live_house_name">ライブハウス名</label><br>
      <input type="text" id="live_house_name" name="live_house_name" size="50" maxlength="40">
    </div><br>

    <!-- ライブハウス電話番号 -->
      <div class="container_tel">
        <label for="live_house_tel1">電話番号</label><br>
        <input type="text" id="live_house_tel1" name="live_house_tel1" size="4" maxlength="4">
      </div>
      <div class="container_tel">
        <label for="live_house_tel2">-</label>
        <input type="text" id="live_house_tel2" name="live_house_tel2" size="4" maxlength="4">
      </div>
      <div class="container_tel">
        <label for="live_house_tel3">-</label>
        <input type="text" id="live_house_tel3" name="live_house_tel3" size="4" maxlength="4">
      </div><br><br>



    <!-- Open時間 -->
    <div class="container">
    <label for="open_time">オープン時間</label><br>
      <select name="otime_hour" id="otime_hour">
        <option value="" name="otime_hour" id="otime_hour">無し</option>
        <?php showoption(0, 23);?>
      </select>
      <label for="otime_hour">時</label>
      <select name="otime_minutes" id="otime_minutes">
        <option value="" name="otime_minutes" id="otime_minutes">無し</option>
        <?php showoption(0, 59, 15);?>
      </select>
      <label for="otime_minutes">分</label>
    </div><br>


    <!-- Start時間 -->
    <div class="container">
    <label for="start_time">スタート時間</label><br>
      <select name="stime_hour" id="stime_hour">
        <option value="null">無し</option>
        <?php showoption(0, 23);?>
      </select>
      <label for="stime_hour">時</label>
      <select name="stime_minutes" id="stime_minutes">
        <option value="null">無し</option>
        <?php showoption(0, 59, 15);?>
      </select>
      <label for="stime_minutes">分</label>
    </div><br>


    <!-- メンバー名 -->
    <!-- <div class="container">
      <label for="live_member_name1">メンバー名1</label><br>
      <input type="text" id="live_member_name1" name="live_member_name1" size="20" maxlength="20">
    </div> -->

    <div class="container">
      <label for="live_member_name2">メンバー名1</label><br>
      <input type="text" id="live_member_name2" name="live_member_name2" size="40" maxlength="40">
    </div>

    <!-- <div class="container">
      <label for="live_member_name3">メンバー名3</label><br>
      <input type="text" id="live_member_name3" name="live_member_name3" size="20" maxlength="20">
    </div> -->

    <div class="container">
      <label for="live_member_name4">メンバー名2</label><br>
      <input type="text" id="live_member_name4" name="live_member_name4" size="40" maxlength="40">
    </div>

    <!-- <div class="container">
      <label for="live_member_name5">メンバー名5</label><br>
      <input type="text" id="live_member_name5" name="live_member_name5" size="20" maxlength="20">
    </div>

    <div class="container">
      <label for="live_member_name6">メンバー名6</label><br>
      <input type="text" id="live_member_name6" name="live_member_name6" size="20" maxlength="20">
    </div> -->

    <div class="container">
      <label for="live_member_name7">メンバー名3</label><br>
      <!-- <input type="text" id="live_member_name7" name="live_member_name7" size="100" maxlength="100"> -->
      <textarea name="live_member_name7" id="live_member_name7" cols="50" rows="5" maxlength="200"></textarea>
    </div>
    <br>

    <div class="container">
      <input type="checkbox" name="leader_live" id="leader_live" value="Leader Live!!">
      <label for="leader_live">リーダーライブ</label>
    </div>
    <br>

    <div class="container">
      <label for="remarks">備考</label><br>
      <!-- <input type="text" id="remarks" name="remarks" size="100" maxlength="100"> -->
      <textarea name="remarks" id="remarks" cols="50" rows="5" maxlength="200"></textarea>
    </div><br>

    <input type="submit" value="登録" />

  </form>
</body>
</html>