<?php
  $allbu = file_get_contents('../1_allbuyer.text');
  $allse = file_get_contents('../1_allseller.text');
?>
<html>
  <head>     
    <meta charset="UTF-8">     
    <meta name="viewport" content="width=devic-width,initial-scale=1.0">
    <link rel="stylesheet" href="../../css/3_mainpage.css">
    <link rel="stylesheet" href="../../css/4_admin.css">
    <title>admin</title>   
  </head>   
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
        <img src='../../img/14_admin.png'>
        <a id="changepass"></a>
        <form style="display:none" action="./changepass.php" method="post">
          <input id="chpa_in" type="text" name="newpass" required>
          <input id="chpa_su" type="submit" value="submit">
        </form>
      </div>
      <a href="mainpage_s.php" class="active">الصفحة الرئيسية</a>
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
    
    <div class="container clos_web">
      <div>إيقاف الموقع</div>
      <div>
        <div id="on_off_web">on</div>
      </div>
    </div>
    <div class="container">
      <div>
        <p>عدد الحسابات النشطة الكلي : </p>
        <p>
          <?php echo $allbu + $allse; ?>
        </p>
      </div>
      <div>
        <p>عدد البائعين  : </p>
        <p>
          <?php echo $allse; ?>
        </p>
      </div>
      <div>
        <p>عدد المشترين  : </p>
        <p>
          <?php echo $allbu; ?>
        </p>
      </div>
    </div>
    <script src="../../js/4_admin.js"></script>
  </body>
</html>