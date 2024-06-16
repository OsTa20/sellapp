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
    <title>mainpage_s</title>   
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
    .container div {
      height: 400px;
    }
    #addprodect {
      position: fixed;
      top: 130px;
      left: 0;
      background-color: green;
      z-index: 3;
      padding: 10px;
      color: white;
      font-size: 15px;
      direction: rtl;
      border-radius: 0 20px 20px 0;
    }
    #addprodectdiv, #editprodectdiv {
      z-index: 4;
      width: 100%;
      height: 600px;
      overflow: auto;
      position: fixed;
      top: 50px;
      display: none;
      background-color: white;
      padding: 50px 10px 300px;
      text-align: center;
      direction: rtl;
    }
    #addprodectdiv input, #editprodectdiv input {
      font-size: 15px;
      padding: 10px;
      display: block;
      margin: 10px auto;
    }
    #addprodectdiv textarea, #editprodectdiv textarea {
      width: 80%;
      height: 80px;
      padding: 5px;
      margin: 5px;
    }
    #addprodectdiv p, #editprodectdiv p {
      display: inline-block;
      padding: 10px 20px;
      margin: 5px 10px;
      color: white;
    }
    #addprodectdiv div , #editprodectdiv div {
      border: 4px solid green;
      position: relative;
      width: 200px;
      height: 200px;
      border-radius: 50%;
      margin: 10px auto;
    }
    #addprodectdiv div img, #editprodectdiv div img {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      margin: 10px;
    }
    #addprodectdiv div p ,#editprodectdiv div p{
      background-color: green;
      padding: 0 20px;
      margin: 5px;
    }
    #addprodectdiv div button, #editprodectdiv div button {
      position: absolute;
      bottom: 0;
      right: 0;
      color: green;
      border-radius: 50%;
      width:60px;
      height:60px;
      font-size:20px;
    }
    .container div div .pr {
      width: 40px;
      height: 40px;
      background: none;
      display: inline-block;
      position: absolute;
      margin: 0;
      right: 10px;
      top: 4px;
    }
    .container div div img {
      margin: -5px -5px 0 0;
    }
    .container > div .details {
      border: 1px solid black;
      margin: 5px auto;
      padding: 10px 10px 30px;
    }
    .container div .edit_pro {
      padding: 10px;
      background-color: green;
      color: white;
      font-size: 15px;
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
    <nav>
      <a href="mainpage_s.php" class=" home active"></a>
      <a href="notification.php" class="notif">
      <?php 
        if(file_exists("../../users/seller/".$user."/notification.text")){
          $allnot = file_get_contents('../../users/seller/'.$user.'/notification.text');
          if($allnot > 0){
            echo "<span id='noti_s'>{$allnot}</span>";
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
    
    <div id="addprodect">
      <p>إضافة منتج +</p>
    </div>
    <div id="addprodectdiv">
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
      <br>
      <p style="color:white;background-color:brown;font-size:15px">إضافة منتج</p>
      <br>
      <div id="pro_icondiv">
        <img src="../../img/13_prod.jpeg">
        <p>صورة المنتج</p>
        <button>+</button>
      </div>
      <form action="../../php/addprod.php" enctype="multipart/form-data" method="post">
        <input name="pro_name" type="text" placeholder="اسم المنتج" required>
        <input name="pro_priz" type="number" placeholder="سعر المنتج" required>
        <input style="display:none" id="imageFile" name="pro_icon" type="file" accept="image/*" required>
        <textarea name="pro_detail" placeholder="معلومات عن المنتج" required></textarea>
        <br><hr>
        <input id="savein" style="display:none" type="submit" value="إنشاء حساب">
      </form>
      <p id="save" style="background-color:green">حفظ</p>
      <p id="cancel" style="background-color:red">إلغاء</p>
    </div>
    <div class="container">
      <?php
        if (is_dir('../../users/seller/' . $user . '/products')){
        	$pro_dir = '../../users/seller/' . $user . '/products/';
        	$pdir = scandir("../../users/seller/{$user}/products");
          $p_num = 0;
          $pro_arr = array();
          
          for ($i=0;$i<count($pdir);$i++){
            $pfi = explode('.',$pdir[$i]);
            if($pfi[1] == 'text'){
              $p_num ++;
              $pdd = $pdir[$i];
              $p_datadir = "../../users/seller/{$user}/products/{$pdd}";
              $pid = $pdir[$i-1];
              $p_icondir = "../../users/seller/{$user}/products/{$pid}";
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
              echo "<div><img class='glodimg' src=$id><h3 style='margin-bottom:10px'>اسم المنتج :  $pname</h3><h5>السعر : $ppriz ل.س</h5><p class='details'>التفاصيل : $pdeta</p><button class='edit_pro'>تعديل</button></div>";
            }
          }
        }
      ?>
    </div>
    <div id="editprodectdiv">
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
      <br>
      <p style="color:white;background-color:brown;font-size:15px">تعديل منتج</p>
      <br>
      <div id="pro_icondiv2">
        <img src="../../img/13_prod.jpeg">
        <p>صورة المنتج</p>
        <button>+</button>
      </div>
      <form action="../../php/editprod.php" enctype="multipart/form-data" method="post">
        <input id="predna" name="pro_name" type="text" placeholder="اسم المنتج" required>
        <input id="predpr" name="pro_priz" type="number" placeholder="سعر المنتج" required>
        <input style="display:none" id="imageFile_ep" name="pro_icon" type="file" accept="image/*">
        <input style="display:none" id="p_dir" name="p_dir" type="text" required>
        <textarea id="predde" name="pro_detail" placeholder="معلومات عن المنتج" required></textarea>
        <br><hr>
        <input id="savein_ep" style="display:none" type="submit" value="إنشاء حساب">
      </form>
      <p id="save_ep" style="background-color:green">حفظ</p>
      <p id="cancel_ep" style="background-color:red">إلغاء</p>
      <p id="del_ep" style="background-color:red">حذف المنتج</p>
    </div>
    <form style="display:none" method="post" action="../../php/del_pr.php">
      <input type="text" name="p_dir" id="d_pd">
      <input type="submit" id="d_pd_in">
    </form>
    <div class="nomoreg">
      <p>لا مزيد من المنتجات</p>
      <p id="update">تحديث</p>
    </div>
    <!--
    <footer>
      <p id="myprodpa" class="active">منتجاتي</p>
      <p id="prodpa">منتجات</p>
      <p id="al_sla">السلة</p>
    </footer>
    -->
  </body> 
  <script src="../../js/3_mainpage_s.js"></script>
  <script>
    let edit_pro = document.getElementsByClassName('edit_pro');
    let editprodectdiv = document.getElementById('editprodectdiv');
    let predna = document.getElementById('predna');
    let predpr = document.getElementById('predpr');
    let predde = document.getElementById('predde');
    let p_dir = document.getElementById('p_dir');
    let predic = document.querySelector('#editprodectdiv #pro_icondiv2 img');
    let imageFile_ep = document.querySelector('#imageFile_ep');
    
    for(var i=0;i<edit_pro.length;i++){
      edit_pro[i].id = i;
      edit_pro[i].onclick = function(){
        var pln = this.previousSibling.previousSibling.previousSibling.textContent.split('اسم المنتج :  ');
        predna.value = pln[1];
        var plp = this.previousSibling.previousSibling.textContent.match(/\d+/g);
        predpr.value = plp[0];
        var pld = this.previousSibling.textContent.split('التفاصيل : ');
        predde.value = pld[1];
        predic.src = this.previousSibling.previousSibling.previousSibling.previousSibling.src;
        <?php $iar = json_encode($pro_arr); ?>
        <?php echo "var par = $iar;";?>
        var par2 = Object.keys(par);
        var par3 = par[par2[this.id]];
        p_dir.value = par2[this.id];
        //imageFile_ep.value = 'j.jpg';
        //alert(imageFile_ep.value);
        blackdiv.style.display = 'block';
        editprodectdiv.style.display = 'block';
      }
    }
    
    let cancel_ep = document.querySelector('#editprodectdiv #cancel_ep');
    cancel_ep.onclick = function(){
      editprodectdiv.style.display = 'none';
      blackdiv.style.display = 'none';
    }
    let save_ep = document.querySelector('#editprodectdiv #save_ep');
    let savein_ep = document.querySelector('#editprodectdiv #savein_ep');
    save_ep.onclick = function(){
      savein_ep.click();
    }
    let pro_icondiv2 = document.querySelector('#pro_icondiv2');
    pro_icondiv2.onclick = function(){
      imageFile_ep.click();
    }
    //document.querySelector('#editprodectdiv form input[type="file"')
    imageFile_ep.addEventListener('change', function() {
      if (this.files && this.files[0]) {
        var img = document.querySelector('#editprodectdiv #pro_icondiv2 img');
        img.onload = () => {
          URL.revokeObjectURL(img.src); 
        }
        img.src = URL.createObjectURL(this.files[0]); 
      }
    });
    let del_ep = document.getElementById('del_ep');
    let d_pd = document.getElementById('d_pd');
    let d_pd_in = document.getElementById('d_pd_in');
    del_ep.onclick = function(){
      var con_d = confirm('هل تريد حقا مسح المنتج!!');
      if(con_d){
        d_pd.value = p_dir.value;
        d_pd_in.click();
      }
    }
  </script>
</html>