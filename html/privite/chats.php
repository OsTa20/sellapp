<?php
  session_start();
  $name = $_SESSION['name'];
  $phone = $_SESSION['phone'];
  $user = $name . $phone;
  $to = $_GET['to'];
?>
<html>
  <head>     
    <meta charset="UTF-8">     
    <meta name="viewport" content="width=devic-width,initial-scale=1.0">
    <link rel="stylesheet" href="../../css/3_mainpage.css">
    <title>chats</title>   
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
    .container, .nomoreg {
      z-index: 2;
    }
    nav #noti_s, nav #chat_s {
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
    #starchdiv {
      z-index: 3;
      width: 100%;
      height: 600px;
      overflow: auto;
      position: fixed;
      top: 50px;
      background-color: white;
      padding: 50px 10px 250px;
      position: fixed;
      direction: rtl;
    }
    #starchdiv #use_ch {
      position: fixed;
      top: 70px;
      padding: 5px;
      height: 60px;
      width: 95%;
    }
    #starchdiv #use_ch img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      position: absolute;
      right: 50px;
      top: 5px;
    }
    #starchdiv #use_ch p {
      position: absolute;
      right: 110px;
      top: 20px;
    }
    #starchdiv #use_ch button {
      width: 40px;
      height: 40px;
      position: absolute;
      right: 10px;
      top: 5px;
      font-size: 30px;
      border: none;
      background: none;
    }
    #starchdiv #chat_co{
      border: 1px solid black;
      padding: 10px;
      padding-bottom: 20px;
      height: calc(100% - 210px);
      position: fixed;
      top: 130px;
      width: 95%;
      overflow: auto;
    }
    #starchdiv #send_ch {
      position: fixed;
      bottom: 15px;
      left: 10px;
      padding: 10px;
    }
    #starchdiv #send_ch input {
      padding: 10px;
      font-size: 15px;
    }
    .mych, .youch {
      float: left;
      width: 200px;
      background-color: #fcffaf;
      padding: 10px;
      overflow: hidden;
      margin-bottom: 10px;
    }
    .mych p, .youch p{
      color: gray;
      margin-top: 5px;
    }
    .youch {
      float: right;
      background-color: #b4f0ff;
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
          $allnot = file_get_contents('../../users/seller/'.$user.'/notification.text');
          if($allnot > 0){
            echo "<span id='noti_s'>$allnot</span>";
          }
        }
      ?>
      </a>
      <a href="markets.php" class="mark"></a>
      <a href="mychat.php" class="myrepo">
        <?php
          if(file_exists("../../users/seller/".$user."/allchat.text")){
            file_put_contents('../../users/seller/'.$user.'/allchat.text',0);
          }
        ?>
      </a>
    </nav>
    <div class="container">
      <?php
        re :
        $chdir =  '../../users/seller/'.$user.'/chats';
        //$yoch =  '../../users/seller/'.$to .'/chats';
        if(is_dir($chdir)){
          $usex_i = false;
          $fi = scandir($chdir);
          $ty_ch = 'b';
          foreach ($fi as $us){
            $usn = explode('.',$us);
            $ufn = $usn[0];
            //$usn = preg_replace('/[^a-z]/', '', $usn[0]);
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
              $ty_ch = 's';
              $usd = '../../users/seller/'.$ufn;
              $udf = scandir($usd);
              foreach ($udf as $f){
                $fn = explode('.',$f);
                if($fn[0] == 'mar_icon'){
                  $usic = $usd . '/'. $f;
                }
              }
            }
          }
        }
        else {
          file_put_contents('../../users/seller/'.$user.'/allchat.text',0);
          mkdir($chdir);
          //
          file_put_contents($chdir.'/'.$to.'.text','');
          //fopen($chdir.'/'.$to.'.text', 'a+');
          //
          $chn =  '../../users/seller/'.$user.'/chatsnum';
          mkdir($chn);
          file_put_contents($chn.'/'.$to.'.text',0);
          goto re;
        }
      ?>
    </div>
    <div id="starchdiv">
      <div id="use_ch">
        <img src=<?php echo $usic;?>>
        <p>
          <?php 
            //echo preg_replace('/[^a-z]/', '', $to);
            echo $to;
          ?>
        </p>
        <button id="back">«</button>
      </div>
      <div id="chat_co">
        <?php
          $fi =  '../../users/seller/'.$user.'/chats/'.$to.'.text';
          if(file_exists($fi)){
            $data = explode("\n", file_get_contents($fi));
          
            file_put_contents('../../users/seller/'.$user.'/chatsnum/'.$to.'.text',0);

            for ($i=0;$i<count($data); $i++){
              $dataarr = explode(' : ',$data[$i]);
              $d = explode('*',$dataarr[1]);
              $dat = $d[1];
              if($dataarr[0] == $user){
                echo "<div class='mych'>$d[0]<p>$dat</p></div>";
              }
              if($dataarr[0] == $to){
                echo "<div class='youch'>$d[0]<p>$dat</p></div>";
              }
            }
          }
        ?>
      </div>
      <div id="send_ch">
        <form method="post" action="../../php/sendch.php">
          <input style="display:none" type="text" name="to" value=<?php echo $to; ?> required>
          <input type="text" name="chat" placeholder="أرسل الرسالة" required>
          <input type="submit" value="send">
        </form>
      </div>
    </div>
    <div class="nomoreg" style="display: none">
      <p>لا مزيد من الإشعارات</p>
      <p id="update">تحديث</p>
    </div>
  </body> 
  <script src="../../js/3_mainpage_s.js"></script>
  <script>
    let back = document.querySelector('#back');
    let chat_co = document.querySelector('#chat_co');
    back.onclick = function(){
      window.history.back();
    }
    chat_co.scrollTo(0,9999999999999999999999999);
    //alert(chat_co.offsetHeight);
  </script>
</html>