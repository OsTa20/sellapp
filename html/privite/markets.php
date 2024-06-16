<?php
  session_start();
  $name = $_SESSION['name'];
  $phone = $_SESSION['phone'];
  $user = $name . $phone;
  $user_dir =  '../../users/seller/' . $user;
  if(! is_dir($user_dir)){
    $user_dir = '../../users/buyer/' . $user;
  }
?>
<html>
  <head>     
    <meta charset="UTF-8">     
    <meta name="viewport" content="width=devic-width,initial-scale=1.0">
    <link rel="stylesheet" href="../../css/3_mainpage.css">
    <title>markets</title>   
  </head>    
  <style>
    #myaccount .pr {
      position: relative;
      background: none;
      width: 150px;
      height: 150px;
      margin: 0 auto 20px;
      border: none;
      padding: 0;
    }
    #myaccount img {
      border-radius: 50%;
      width: 150px;
      height: 150px;
      margin: 0 auto 20px;
    }
    .container div {
      width: 100%;
      height: 80px;
    }
    .container, .nomoreg {
      z-index: 2;
    }
    nav #chat_s,nav #noti_s {
      position: absolute;
      top: 0;
      right: 10px;
      background-color: red;
      color: white;
      border-radius: 50%;
      width: 20px;
      height: 20px;
    }
    .date {
      color: black;
      margin: 10px;
      text-align: right;
    }
    .container div {
      text-align: right;
      position: relative;
      min-height: 70px;
    }
    .container div img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      position: absolute;
      right: 10px;
      top: 10px;
    }
    .container div p {
      margin: 5px 80px;
    }
    .container div .wh {
      color: black;
    }
  </style>
  <body>        
    <header>
      <span class="span" style="color:blue">T</span>
      <span class="span" style="color:red">a</span>
      <span class="span" style="color:green">k</span>
      <span class="span" style="color:#1387d4">w</span>
      <span class="span" style="color:red">a</span>
      <span>-</span>
      <span>S</span>
      <span>e</span>
      <span>l</span>
      <span>l</span>
      <button id='search'></button>
      <button id="menu">|||</button>
    </header>
    <div id='menudiv'>
      <div id="myaccount" style="border-color:#4dbfff">
        <?php
          $sdir = scandir($user_dir);
          foreach ($sdir as $fi){
            $fn = explode('.',$fi);
            if($fn[0] == 'mar_icon'){
              $fty = $fn[1];
            }
          }
          if(file_exists("../../users/seller/{$user}/mar_icon.{$fty}")){
            $imsr = "../../users/seller/{$user}/mar_icon.{$fty}";
            echo "<a class='pr' href={$imsr}><img src= {$imsr}></a>";
          }
          else {
            echo "<img src='../../img/2_person.png'>";
          }
        ?>
        <h3><?php echo $name ?></h3>
        <a href="setting_s.php"></a>
      </div>
      <a href="mainpage_s.php">الصفحة الرئيسية</a>
      <a href="notification.php">الإشعارات</a>
      <a href="markets.php" class="active">المتاجر</a>
      <a href="mychat.php">طلباتي</a>
      <a href="">بحث عن منتج</a>
      <a href="">تواصل معنا</a>
      <a href="">من نحن</a>
      <a href="../../index.html">تسجيل الخروج</a>
      <hr>
      <a href="" class="social">wat</a>
      <a href="" class="social">tel</a>
      <a href="" class="social">fac</a>
      <br>
      <p>جميع الحقوق محفوظة</p>
    </div>
    <div id="blackdiv"></div>
    <nav>
      <a href="mainpage_s.php" class=" home"></a>
      <a href="notification.php" class="notif">
      <?php 
        if(file_exists("../../users/seller/".$user."/notification.text")){
          $all = file_get_contents('../../users/seller/'.$user.'/notification.text');
          if($all > 0){
            echo "<span id='noti_s'>{$all}</span>";
          }
        }
      ?>
      </a>
      <a href="markets.php" class="mark active"></a>
      <a href="mychat.php" class="myrepo">
        <?php
          if(is_dir("../../users/seller/".$user."/chats")){
            $allchat = file_get_contents("../../users/seller/".$user."/allchat.text");
            if($allchat > 0){
              echo "<span id='chat_s'>{$allchat}</span>";
            }
          }
        ?>
      </a>
    </nav>
    <div class="container">
      <?php
        $as =  '../../users/seller';
        if(is_dir($as)){
          $allse = scandir($as);
          //array_shift($allse);
          foreach($allse as $se){
            //$senam = preg_replace('/[^a-z]/', '', $se); //edit
            $senam = $se;
            $mar_icondir = '../../users/seller/'.$se;
            if(is_dir($mar_icondir)){
              $sefo = scandir($mar_icondir);
              foreach ($sefo as $fi){
                $fin = explode('.',$fi);
                if($fin[0] == 'mar_icon'){
                  $fi_end = $fin[1];
                }
              }
              $seda = explode(' : ', file_get_contents($mar_icondir .'/singin.text'));
              $mar_icondir = $mar_icondir .'/' . 'mar_icon' . '.'. $fi_end;
              $swh = explode("\n",$seda[5]);
              $swh = $swh[0];
              echo "<div><img src=$mar_icondir><p>$senam</p><p class='wh'>مهتم ببيع : $swh</p></div>";
            }
          }
        }
      ?>
    </div>
    <div class="nomoreg" style="display: none">
      <p>لا مزيد من الإشعارات</p>
      <p id="update">تحديث</p>
    </div>
  </body> 
  <script src="../../js/3_mainpage_s.js"></script>
  <script>
    let selldiv = document.querySelectorAll('.container div');
    for(var i=0;i<selldiv.length;i++){
      selldiv[i].onclick = function(){
        window.location.href = 'account.php?acc=' + this.lastChild.previousSibling.textContent;
      }
    }
  </script>
</html>