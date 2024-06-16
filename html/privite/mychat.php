<?php
  session_start();
  $name = $_SESSION['name'];
  $phone = $_SESSION['phone'];
  $user = $name . $phone;
?>
<html>
  <head>     
    <meta charset="UTF-8">     
    <meta name="viewport" content="width=devic-width,initial-scale=1.0">
    <link rel="stylesheet" href="../../css/3_mainpage.css">
    <title>mychat</title>   
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
    nav #noti_s {
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
      position: absolute;
      top: 30px;
      right: 70px;
    }
    .container div span {
      position: absolute;
      left: 10px;
      top: 10px;
      width: 30px;
      height: 30px;
      border-radius: 50%;
      background-color: red;
      color: white;
      text-align: center;
      line-height: 30px;
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
          $sdir = scandir("../../users/seller/{$user}");
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
      <a href="markets.php">المتاجر</a>
      <a href="mychat.php" class="active">طلباتي</a>
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
      <a href="markets.php" class="mark"></a>
      <a href="mychat.php" class="myrepo active">
        <?php
          if(file_exists("../../users/seller/".$user."/allchat.text")){
            file_put_contents('../../users/seller/'.$user.'/allchat.text',0);
          }
        ?>
      </a>
    </nav>
    <div class="container">
      <?php
        $chdir =  '../../users/seller/'.$user.'/chats';
        if(is_dir($chdir)){
          $usex_i = false;
          $fi = scandir($chdir);
          foreach ($fi as $us){
            $usn = explode('.',$us);
            $ufn = $usn[0];
            //$usn = preg_replace('/[^a-z]/', '', $usn[0]);
            $usn = $usn[0];
            $usd = '../../users/buyer/'.$ufn;
            if(is_dir($usd)){
              $udf = scandir($usd);
              foreach ($udf as $f){
                $fn = explode('.',$f);
                if($fn[0] == 'profil_icon'){
                  $usex_i = true;
                  $usic = $usd . '/'. $f;
                }
              }
              if($usex_i == false){
                $usic = '../../img/2_person.png';
              }
            }
            else {
              $usd = '../../users/seller/'.$ufn;
              $udf = scandir($usd);
              foreach ($udf as $f){
                $fn = explode('.',$f);
                if($fn[0] == 'mar_icon'){
                  $usic = $usd . '/'. $f;
                }
              }
            }
            $chnum =  file_get_contents('../../users/seller/'.$user.'/chatsnum/'.$usn.'.text');
            echo '<div>';
            echo "<img src=$usic><p>$usn</p><p style='display:none'>$ufn</p>";
            if($chnum >0){
              echo "<span>$chnum</span>";
            }
            echo "</div>";
          }
        }
      ?>
    </div>
    <div class="nomoreg" style="display: none">
      <p>لا مزيد من الإشعارات</p>
      <p id="update">تحديث</p>
    </div>
    <form style='display:none' method="post" action="chats.php">
      <input id="to" type="text" name="to" required>
      <input id="sta_in" type="submit">
    </form>
  </body> 
  <script src="../../js/3_mainpage_s.js"></script>
  <script>
  let mychat = document.querySelectorAll('.container div');
  let to = document.getElementById('to');
  for(var i=0;i<mychat.length;i++){
    mychat[i].id = i;
    mychat[i].onclick = function(){
      window.location.href = 'chats.php?to='+this.children[2].textContent;
      //to.value = this.children[2].textContent;
      //sta_in.click();
    }
  }
  </script>
</html>