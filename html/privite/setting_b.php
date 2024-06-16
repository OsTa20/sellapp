<?php 
  session_start();
  $name = $_SESSION['name'];
  $phone = $_SESSION['phone'];
  $user = $name . $phone;
  $userdir = '../../users/buyer/' . $user . '/';
  $all = file_get_contents($userdir . 'singin.text');
  $all_arr = explode(' : ',$all);
  $uspas2 = explode("\n" , $all_arr[3]);
  $password = $uspas2[0];
  $usid = explode("\n" , $all_arr[4]);
  $user_id = $usid[0];
  $which_sell = end($all_arr);
?>
<html>
  <head>     
    <meta charset="UTF-8">     
    <meta name="viewport" content="width=devic-width,initial-scale=1.0">
    <link rel="stylesheet" href="../../css/1_style.css">
    <title>setting_b</title>   
  </head>
  <style>
    #singindiv div input {
      padding: 10px;
      margin: 10px 0;
      font-size: 15px;
    }
    #singindiv form p {
      padding: 10px;
      margin: 5px;
      font-size: 20px;
      color: white;
      width: 90px;
      display: inline-block;
    }
    #singindiv #profildiv {
      border: 4px solid green;
      position: relative;
      width: 200px;
      height: 200px;
      border-radius: 50%;
      margin: 10px auto;
    }
    #singindiv #profildiv p {
      background-color: green;
      padding: 5px;
    }
    #singindiv #profildiv button {
      position: absolute;
      bottom: 0;
      right: -10px;
      color: green;
      border-radius: 50%;
      width:60px;
      height:60px;
      font-size:20px;
    }
    #singindiv img {
      width: 150px;
      height: 150px;
      border-radius: 50%;
    }
  </style>
  <body>        
    <div id="singindiv" style="display:block">
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
      <div id="profildiv">
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
            echo "<img src= {$imsr}>";
          }
          else {
            echo "<img src='../../img/2_person.png'>";
          }
        ?>
        <p><?php echo $name; ?></p>
        <button>+</button>
      </div>
      <form enctype="multipart/form-data" method="post" action="../../php/editdata_b.php">
        <label>الاسم</label>
        <input id="username" name="name" type="text" placeholder="اسم المستخدم" value="<?php echo $name ?>" required>
        <br>
        <label>كلمة المرور</label>
        <input id="userpass" name="password" type="text" placeholder="كلمة المرور" value="<?php echo $password ?>" required>
        <br>
        <label>الهاتف</label>
        <input id="userphon" name="phone" type="tel" minlength="1" maxlength="1" placeholder="الهاتف" value="<?php echo $phone ?>" required>
        <br>
        <input class="nodis" id="imageFile" name="profil_icon" type="file" accept="image/*">
        <label id="ws_la">مهتم بشراء</label>
        <input style="display:none" name="laname" type="text" value="<?php echo $name ?>">
        <input style="display:none" name="laphone" type="tel" value="<?php echo $phone ?>">
        <input style="display:none" name="user_id" type="text" value="<?php echo $user_id ?>">
        <select id="usersel" class="select" name="which_sell" required>
        <?php 
          $opt = array (
              'cloth' => 'ملابس',
              'electre' => 'أدوات كهربائية',
              'electro' => 'أدوات الكترونية',
              'resturant' => 'مطاعم',
              'others' => 'غير ذلك'
            );
          foreach ($opt as $k => $v){
            if(array_search($k , $which_sell) > -1){
              echo "<option value=$k selected>$v</option>";
            }
            else {
              echo "<option value=$k>$v</option>";
            }
          }
          echo '</select>';
        ?>
        <br><hr><br>
        <p id="save" style="background-color:green">حفظ</button>
        <p id="cancel" style="background-color:red">إلغاء</button>
        <p id="delacc"style="background-color:red;font-size:13px;padding:15px 7px">حذف الحساب؟</p>
        <input style="display:none" id="subm" type="submit">
      </form>
    </div>  
    <form style="display:none" method="post" action="../../php/delacc_b.php">
      <input id="userdir" type="text" name="userdir">
      <input id="delaccin" type="submit">
    </form>
  </body> 
  <script>
    let usn = document.getElementById('username');
    let usph = document.getElementById('userphon');
    let uspa = document.getElementById('userpass');
    let subm = document.getElementById('subm');
    
    let save = document.getElementById('save');
    let cancel = document.getElementById('cancel');
    let profildiv = document.getElementById('profildiv');
    let imageFile = document.getElementById('imageFile');
    let delacc = document.getElementById('delacc');
    let userdir = document.getElementById('userdir');
    let delaccin = document.getElementById('delaccin');
    
    save.onclick = function(){
      usn.value = usn.value.replaceAll(' ','_');
      subm.click();
    }
    cancel.onclick = function(){
      window.history.back();
    }
    profildiv.onclick = function(){
      imageFile.click();
    }
    document.querySelector('input[type="file"]').addEventListener('change', function() {
      if (this.files && this.files[0]) {
        var img = document.querySelector('#singindiv #profildiv img');
        img.onload = () => {
          URL.revokeObjectURL(img.src); 
        }
        img.src = URL.createObjectURL(this.files[0]); 
      }
    });
    
    delacc.onclick = function(){
      var usre = confirm('سيتم حذف الحساب نهائيا !!');
      if(usre == true){
        delaccin.click();
      }
    }
  </script>
</html> 