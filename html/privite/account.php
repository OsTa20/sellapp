<?php
  session_start();
  $name = $_SESSION['name'];
  $phone = $_SESSION['phone'];
  $user = $name . $phone;
  $acc = $_GET['acc'];
?>
<html>
  <head>     
    <meta charset="UTF-8">     
    <meta name="viewport" content="width=devic-width,initial-scale=1.0">
    <link rel="stylesheet" href="../../css/3_mainpage.css">
    <title>account</title>   
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
    .container, .nomoreg, #products {
      z-index: 2;
      direction: rtl;
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
    .container img {
      width: 180px;
      height: 180px;
      border-radius: 50%;
      margin: 10px;
    }
    .container button, #products button{
      display: block;
      padding: 5px 20px;
      font-size: 15px;
      background-color: blue;
      color: white;
    }
    #products {
      text-align: center;
      padding: 5px 10px;
      margin: 80px auto;
      width: 95%;
      background-color: #4dbfffad;
    }
    #products div {
      background-color: white;
      padding: 10px;
      margin: 10px;
    }
    #products div .buying {
      background-image: url('../../img/11_box.svg');
      background-position: 10% 50%;
      background-repeat: no-repeat;
      background-size: 50% 50%;
      padding-left: 40px;
      background-color: #7ee3fc;
      color: black;
    }
    #buyprdiv {
      position: fixed;
      top: 100px;
      left: 2%;
      width: 95%;
      padding: 20px 10px;
      text-align: center;
      background-color: white;
      font-size: 15px;
      direction: rtl;
      display: none;
      z-index: 4;
    }
    #buyprdiv p {
      margin: 10px;
    }
    #buyprdiv input {
      padding: 5px;
      width: 70px;
    }
    #buyprdiv #bu_l {
      width: 90%;
      margin: 10px;
      padding: 10px;
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
          $all = file_get_contents('../../users/seller/'.$user.'/notification.text');
          if($all > 0){
            echo "<span id='noti_s'>{$all}</span>";
          }
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
        $se_dir = '../../users/seller/'.$acc;
        $se = scandir($se_dir);
        //print_r($se);
        foreach ($se as $file){
          $f = explode('.',$file);
          if($f[0] == 'mar_icon'){
            $acc_icon = $f[0].'.'.$f[1];
          }
        }
        $acc_icon = '../../users/seller/'.$acc.'/'.$acc_icon;
        $data = file_get_contents('../../users/seller/'.$acc.'/singin.text');
        $se_da = explode(' : ',$data);
        $se_w = explode(",\n",$se_da[5]);
        $ma_n = explode("\n",$se_da[6]);
        $ma_l = end($se_da);
      ?>
      <img src=<?php echo $acc_icon;?>>
      <h3><?php echo $acc;?></h3>
      <p>مهتم ببيع : <?php echo $se_w[0];?></p>
      <p>اسم المتجر : <?php echo $ma_n[0]?></p>
      <p>موقع المتجر : <?php echo $ma_l?></p>
      <?php 
        if($user != $acc){
          echo "<button id=$acc>مراسلة</button>";
        }
      ?>
    </div>
    <div id="products">
      <h3 style="margin:20px">المنتجات</h3>
      <?php
        $acc_pro_d = '../../users/seller/'.$acc.'/products';
        if (is_dir($acc_pro_d)){
        	$pro_dir = '../../users/seller/' . $acc . '/products/';
        	$pdir = scandir("../../users/seller/{$acc}/products");
          $p_num = 0;
          $pro_arr = array();
          
          for ($i=0;$i<count($pdir);$i++){
            $pfi = explode('.',$pdir[$i]);
            if($pfi[1] == 'text'){
              $p_num ++;
              $pdd = $pdir[$i];
              $p_datadir = "../../users/seller/{$acc}/products/{$pdd}";
              $pid = $pdir[$i-1];
              $p_icondir = "../../users/seller/{$acc}/products/{$pid}";
              $pro_arr[$p_datadir] = $p_icondir;
            }
          }
          if($p_num != 0){
            foreach ($pro_arr as $dd => $id){
              $p_all = file_get_contents($dd);
              $p_all2 = explode(' : ',$p_all);
              $p_na = explode("\n",$p_all2[1]);
              $pname = $p_na[0];
              $p_pr = explode("\n",$p_all2[2]);
              $ppriz = $p_pr[0];
              $pdeta = end($p_all2);
              echo "<div><img class='glodimg' src=$id><h3 id=$pname style='margin-bottom:10px'>اسم المنتج :  $pname</h3><h5 id=$ppriz>السعر : $ppriz ل.س</h5><p class='details'>التفاصيل : $pdeta</p>";
              if($user != $acc){
                echo "<button class='buying' id=$id>شراء</button>";
              }
              echo "</div>";
            }
          }
        }
      ?>
    </div>
    <div id="buyprdiv">
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
      <br><br>
      <p>يرجى تأكيد عملية الشراء واختيار الكمية المطلوبة</p>
      <hr>
      <p id="pn">اسم المنتج : </p>
      <p id="pp">سعر المنتج : </p>
      <label>الكمية المطلوبة</label>
      <input id="nupr" type="number" min="1" value="1">
      <input id="bu_l" type="text" placeholder="العنوان">
      <p id="total" style="color:red"></p>
      <p class='surb' style="margin-top:20px;padding:10px;background-color:green;color:white">تأكيد</p>
      <p class='canbu' style="padding:10px;background-color:red;color:white">إلغاء</p>
    </div>
    <div class="nomoreg" style="display: none">
      <p>لا مزيد من الإشعارات</p>
      <p id="update">تحديث</p>
    </div>
  </body> 
  <script src="../../js/3_mainpage_s.js"></script>
  <script>
    let chatac = document.querySelectorAll('.container button');
    for(var i=0;i<chatac.length;i++){
      chatac[i].onclick = function(){
        window.location.href = 'chats.php?to='+this.id;
      }
    }
    let buypr = document.querySelectorAll('#products button');
    let nupr = document.querySelector('#buyprdiv #nupr');
    let pn = document.querySelector('#buyprdiv #pn');
    let pp = document.querySelector('#buyprdiv #pp');
    let total = document.querySelector('#buyprdiv #total');
    let bu_l = document.querySelector('#buyprdiv #bu_l');
    let surb = document.querySelectorAll('#buyprdiv .surb');
    let canbu = document.querySelectorAll('#buyprdiv .canbu');
    for(var i=0;i<buypr.length;i++){
      buypr[i].onclick = function(){
        surb[0].id = this.id;
        pn.textContent ='اسم المنتج : '+ this.previousSibling.previousSibling.previousSibling.id;
        pp.textContent ='سعر المنتج : '+ this.previousSibling.previousSibling.id;
        pp.id = this.previousSibling.previousSibling.id;
        total.textContent = '';
        nupr.value=1;
        bu_l.value = '';
        blackdiv.style.display = 'block';
        buyprdiv.style.display = 'block';
      }
    }
    var surbvar = 0;
    surb[0].onclick = function(){
      if((nupr.value == 0)||(bu_l.value == '')){
        alert('يرجى تحديد العنوان وتحديد الكمية المطلوبة');
      }
      else {
        surbvar++;
      }
      if(surbvar==2){
        surbvar =0;
        window.location.href = '../../php/buying.php?pro='+this.id+'&qu=' +nupr.value +'&bu_l=' + bu_l.value;
      }
    }
    canbu[0].onclick = function(){
      surbvar=0;
      blackdiv.style.display = 'none';
      buyprdiv.style.display = 'none';
    }
    nupr.onchange = function(){
      total.textContent = 'إجمالي المبلغ : ' + nupr.value * pp.id;
    }
  </script>
</html>