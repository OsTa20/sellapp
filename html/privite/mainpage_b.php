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
    <title>mainpage_b</title>   
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
      <button id="search"></button>
      <button id="menu">|||</button>
    </header>
    <div id="menudiv">
      <div id="myaccount" style="border-color:#4dbfff">
        <?php
          $sdir = scandir("../../users/buyer/{$user}");
          foreach ($sdir as $fi){
            $fn = explode('.',$fi);
            if($fn[0] == 'profil_icon'){
              $fty = $fn[1];
            }
          }
          if(file_exists("../../users/buyer/{$user}/profil_icon.{$fty}")){
            $imsr = "../../users/buyer/{$user}/profil_icon.{$fty}";
            echo "<a class='pr' href={$imsr}><img src= {$imsr}></a>";
          }
          else {
            echo "<img src='../../img/2_person.png'>";
          }
        ?>
        <h3><?php echo $name ?></h3>
        <a href="setting_b.php"></a>
      </div>
      <a href="mainpage_b.php" class="active">الصفحة الرئيسية</a>
      <a href="">الإشعارات</a>
      <a href="markets.php">المصانع\المحلات</a>
      <a href="">طلباتي</a>
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
      <a href="mainpage_s.html" class=" home active"></a>
      <a href="" class="notif"></a>
      <a href="markets.php" class="mark"></a>
      <a href="" class="myrepo"></a>
    </nav>
    <div class="container">
      <?php 
        $sel_dir = "../../users/seller";
        if(is_dir($sel_dir)){
          $all_seller = scandir($sel_dir);
          if(count($all_seller) > 1){
            array_shift($all_seller);
            foreach ($all_seller as $se){
              //echo $se .'<br>';
              $s_d = $sel_dir . "/$se/products";
              if(is_dir($s_d)){
                $prs = scandir($s_d);
                
                if(count($prs) > 0){
                  foreach ($prs as $p){
                    $prod =  explode('.', $p);
                    if($prod[1] == 'text'){
                      $p_id = $prod[0];
                      $p_detail = explode(' : ', file_get_contents($s_d . "/$p_id.text"));
                      
                      $pr_na = explode("\n", $p_detail[1]);
                      $pr_name = $pr_na[0];
                      $pr_pr = explode("\n", $p_detail[2]);
                      $pr_prize = $pr_pr[0];
                      $pr_detail = end($p_detail);
                      
                      // product icon
                      if(is_file($s_d . "/$p_id.jpg")){
                        $p_i = $s_d . "/$p_id.jpg";
                      }
                      else if(is_file($s_d . "/$p_id.jpeg")){
                        $p_i = $s_d . "/$p_id.jpeg";
                      }
                      else {
                        $p_i = $s_d . "/$p_id.png";
                      }
                      //echo $p_i;
                      
                      // seller name and icon
                      $m_i_d = $sel_dir . "/$se";
                      $ma_name = file_get_contents($m_i_d . "/singin.text");
                      $ma_name2 = explode("\n", $ma_name);
                      $ma_name3 = explode(' : ', $ma_name2[0]);
                      // market name = $ma_name3[1];
                      if(is_file($m_i_d . "/mar_icon.jpg")){
                        $m_i = $m_i_d . "/mar_icon.jpg";
                      }
                      else if(is_file($m_i_d . "/mar_icon.jpeg")){
                        $m_i = $m_i_d . "/mar_icon.jpeg";
                      }
                      else {
                        $m_i = $m_i_d . "/mar_icon.png";
                      }
                      $mar_locat = explode(' : ', end($ma_name2));
                      $mar_location = $mar_locat[1];
                      //echo $mar_location;
                      
                      $pn_tem = str_replace(' ','_',$pr_name);
                      
                      echo '<div>';
                        echo '<div>';
                          echo "<img class='buylog' src=$m_i>";
                          echo "<p class='buyname'>$ma_name3[1]</p>";
                        echo '</div>';
                        echo "<img class='glodimg' src=$p_i alt='glodimg'>";
                        echo "<h4>$pr_name</h4>";
                        echo "<div class='pr_an_sh'>";
                          echo "<h5>$pr_prize ل.س</h5>";
                          echo "<button id=$m_i_d+$mar_location name=$pn_tem+$p_i value=$pr_prize class='buying'></button>";
                        echo '</div>';
                        echo "<p class='details'>$pr_detail</p>";
                      echo '</div>';
                    }
                  }
                }
              }
            }
          }
        }
      ?>
    </div>
    
    <div id="kmya_div" style="display:none">
      <label>اسم المتجر : </label>
      <p id="kmya_mn"></p>
      <br>
      <label>عنوان المتجر : </label>
      <p id="kmya_ml"></p>
      <br><hr>
      <label>اسم المنتج  : </label>
      <p id="kmya_pn"></p>
      <br>
      <label>سعر المنتج  : </label>
      <p id="kmya_pp"></p>
      <br><br>
      <label>الكمية : </label>
      <div>
        <button id="kmya_up"><</button>
        <p id="kmya_in">1</p>
        <button id="kmya_down">></button>
      </div>
      <br>
      <label>المبلغ الإجمالي : </label>
      <p id="kmya_total"></p>
      <br>
      <hr>
      <button id="kmya_cancel" style="background:red">إلغاء</button>
      <button data-user=<?php echo $user; ?> id="kmya_buying" style="background:green">تأكيد الشراء</button>
    </div>
    
    <div class="nomoreg">
      <p>لا مزيد من المنتجات</p>
      <p id="update">تحديث</p>
    </div>
    <!--
    <footer>
      <p id="al_sla">السلة</p>
    </footer>
    <div id="al_sla_div">
      <div>
        <p>اسم المنتج : </p>
        <p>jkjjk</p>
        <p>الكمية : </p> 
        <p>5</p>
        <p>سعر القطعة : </p>
        <p>5 ل.س</p>
        <p>السعر الإجمالي : </p>
        <p>344 ل.س</p>
        <button>حذف ×</button>
      </div>
    </div>
    -->
    <form style="display:none" action="../../php/buying.php" method="post">
      <input id="bu_se" name="seller" type="text">
      <input id="bu_pl" name="prod_loc" type="text">
      <input id="bu_pp" name="prod_pri" type="text">
      <input id="bu_pt" name="prod_tot" type="text">
      <input id="bu_send" type="submit">
    </form>
  </body> 
  <script src="../../js/3_mainpage_b.js"></script> 
  <script>
    let glodimg = document.querySelectorAll('.container div .glodimg');
    let buying = document.querySelectorAll('.container div .buying');
    let kmya_mn = document.getElementById('kmya_mn');
    let kmya_ml = document.getElementById('kmya_ml');
    let kmya_pn = document.getElementById('kmya_pn');
    let kmya_pp = document.getElementById('kmya_pp');
    let kmya_total = document.getElementById('kmya_total');
    let kmya_cancel = document.getElementById('kmya_cancel');
    let kmya_buying = document.getElementById('kmya_buying');
    
    let kmya_up = document.getElementById('kmya_up');
    let kmya_down = document.getElementById('kmya_down');
    
    let bu_se = document.getElementById('bu_se');
    let bu_pl = document.getElementById('bu_pl');
    let bu_pp = document.getElementById('bu_pp');
    let bu_pt = document.getElementById('bu_pt');
    let bu_send = document.getElementById('bu_send');
   
    for(let i=0;i<glodimg.length; i++){
      glodimg[i].onclick = function(){
        window.location.href = this.src;
      }
    }
    
    for(let j=0; j<buying.length; j++){
      buying[j].onclick = function(){
        let mnameall = this.id.split('+');
        // 0 اسم المحل
        // 1 عنوان المحل
        let mname = mnameall[0].split('seller/');
        mname = mname[1];
        let mloc = mnameall[1];
        let pnameall = this.name.split('+');
        // 0 اسم المنتج
        // 1 عنوان المنتج
        //alert(pnameall[1]); عنوان المنتج
        let pname = pnameall[0];
        // mname اسم المحل
        // mloc عنوان المحل
        // pname اسم المنتج 
        let pri = this.value;  // سعر المنتج
        kmya_mn.innerHTML = mname;
        kmya_ml.innerHTML = mloc;
        kmya_pn.innerHTML = pname;
        kmya_pp.innerHTML = pri + ' ل.س';
        kmya_total.innerHTML = pri + ' ل.س';
        kmya_up.class = pri;
        kmya_down.class = pri;
        
        kmya_buying.id = mnameall[0];
        kmya_buying.name = pnameall[1];
        kmya_buying.class = pri;
        
        kmya_div.style.display = 'block';
        blackdiv.style.display = 'block';
      }
    }
    
    kmya_up.onclick = function(){
      let kin = kmya_in.textContent;
      kmya_in.textContent = ++kin;
      ftotal(this.class);
    }
    kmya_down.onclick = function(){
      let kin = kmya_in.textContent;
      if(kin != '1'){
        kmya_in.textContent = --kin;
        ftotal(this.class);
      }
    }
    
    kmya_cancel.onclick = function(){
      kmya_div.style.display = 'none';
      blackdiv.style.display = 'none';
      kmya_in.innerHTML = 1;
    }
    
    kmya_buying.onclick = function(){
      //alert(this.id);   // عنوان البائع
      //alert(this.name);   // اسم المنتج
      //alert(this.class);   // سعر القطعة
      let totm = kmya_total.innerHTML.split(' ');
      // alert(totm[0]); // المبلغ الإجمالي
      
      let bu = this.dataset.user;
      // alert(bu); // المشتري
      
      bu_se.value = this.id;
      bu_pl.value = this.name;
      bu_pp.value = this.class;
      bu_pt.value = totm[0];
      bu_send.click();
      
    }
    
    function ftotal(p){
      var tot = kmya_in.innerHTML * p;
      kmya_total.innerHTML = tot + ' ل.س';
    }
  </script>
</html>