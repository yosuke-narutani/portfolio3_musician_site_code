<!-- スケジュール一覧表示画面に使っている -->

<?php
  function e($str, $charset = 'UTF-8'){
    return htmlspecialchars($str, ENT_QUOTES, $charset);
  }

  function format($datetime, $format = 'yyyy/MM/dd'){
    if(!empty($datetime)){
      $ts = strtotime($datetime);
      print(date($format, $ts));
    }else{
      print('');
    }
  }

?>