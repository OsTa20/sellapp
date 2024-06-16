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
    <title>notification</title>   
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
    nav #chat_s {
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
      border: none;
    }
    .container div {
      width: 100%;
    }
    .container p {
      border: 1px solid brown;
      display: inline-block;
      margin: 5px;
      padding: 5px;
    }
    .container div {
      height: 110px;
      overflow: hidden;
    }
    .container div:hover {
      height: auto;
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
      <a href="notification.php" class="active">الإشعارات</a>
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
      <a href="notification.php" class="notif active">
      <?php 
        if(file_exists("../../users/seller/".$user."/notification.text")){
          $nnu = file_get_contents('../../users/seller/'.$user.'/notification.text');
          file_put_contents('../../users/seller/'.$user.'/notification.text',0);
        }
      ?>
      </a>
      <a href="markets.php" class="mark"></a>
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
        if (file_exists('../../users/seller/' . $user . '/push_noti.text')){
          $n_dir = '../../users/seller/' . $user . '/push_noti.text';
          $allno = explode('***',file_get_contents($n_dir));
          array_pop($allno);
          $allno = array_reverse($allno);
          if($nnu > 0){
            echo "<h3 style='margin:10px'>الإشعارات الجديدة : $nnu</h3>";
          }
          for($i=0;$i<count($allno);$i++){
            $all = explode(' : ',$allno[$i]);
            if(($all[0] == "\nbuyer")||($all[0] == "buyer")){
              $by = explode("\n",$all[1]);
              $by = $by[0];
              $pr_name = explode("\n",$all[2]);
              $pr_name = $pr_name[0];
              $pr_priz = explode("\n",$all[3]);
              $pr_priz = $pr_priz[0];
              $pr_coun = explode("\n",$all[4]);
              $pr_coun = $pr_coun[0];
              $bu_l = explode("\n",$all[5]);
              $bu_l = $bu_l[0];
              $pr_dir = explode("\n",$all[6]);
              $pr_dir = $pr_dir[0];
              $pna = explode('.',basename($pr_dir));
              $pna = $pna[0].'.text';
              $pr_date = end($all);
              echo "<div>";
              echo "<p class='by'>قام <a href='account.php?acc=$by'>$by</a> بإرسال طلب شراء</p><hr>";
              echo "<p id=$by>»</p>";
              echo "<p class='p_n'>اسم المنتج : $pr_name</p>";
              echo "<p class='p_p'>سعر المنتج : $pr_priz</p>";
              echo "<p class='p_cou'>الكمية : $pr_coun</p>";
              $tot = $pr_priz * $pr_coun;
              echo "<p style='color:red'>إجمالي المبلغ : $tot</p>";
              echo "<p class='p_d'>عنوان المشتري : $bu_l</p>";
              if(!file_exists('../../users/seller/'.$user.'/mysels/'.$pna)){
                echo "<p id=$pr_dir class='must_bu' style='background-color:green;color:white;padding:5px 10px'>تأكيد البيع</p>";
              }
              else {
                echo "<p style='border:1px solid green;color:green;padding:5px 10px'>تم تأكيد البيع</p>";
              }
              echo "<p class='date'>$pr_date</p>";
              echo "</div>";
              if($i == $nnu - 1){
                echo "<hr><br><hr><h3>الإشعارات القديمة</h3><hr><br><hr>";
              }
            }
            else {
              $se = explode("\n",$all[1]);
              $se = $se[0];
              $pr_name = explode("\n",$all[2]);
              $pr_name = $pr_name[0];
              $pr_priz = explode("\n",$all[3]);
              $pr_priz = $pr_priz[0];
              $pr_coun = explode("\n",$all[4]);
              $pr_coun = $pr_coun[0];
              $pr_date = end($all);
              echo "<div>";
              echo "<p style='background-color:green;color:white'>تم تأكيد البيع من قبل <a href='account.php?acc=$se'>$se</a></p><hr>";
              echo "<p>»</p>";
              echo "<p class='p_n'>اسم المنتج : $pr_name</p>";
              echo "<p class='p_p'>سعر المنتج : $pr_priz</p>";
              echo "<p class='p_cou'>الكمية : $pr_coun</p>";
              $tot = $pr_priz * $pr_coun;
              echo "<p style='color:red'>إجمالي المبلغ : $tot</p>";
              echo "<p class='date'>$pr_date</p>";
              echo "</div>";
              if($i == $nnu - 1){
                echo "<hr><br><hr><h3>الإشعارات القديمة</h3><hr><br><hr>";
              }
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
    let must_bu = document.getElementsByClassName('must_bu');
    for(var i=0;i<must_bu.length;i++){
      must_bu[i].onclick = function(){
        var by = this.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.id;
        window.location.href = '../../php/surbuying.php?pro='+this.id+'&by='+by;
      }
    }
  </script>
</html>