<?php
  session_start();
  
  $laname = $_POST['laname'];
  $laphone = $_POST['laphone'];
  $name = $_POST['mar_name'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  $user_id = $_POST['user_id'];
  $which_sell = $_POST['which_sell'];
  $mar_icon = $_POST['mar_icon'];
  $mar_locat = $_POST['mar_locat'];
  
	$data_singin =  'mar_name : ' . $name . "\nphone : " . $phone . "\npassword : " . $password . "\nid : " . $user_id . "\nwhich_sell : " . $which_sell . "\nmar_locat : " . $mar_locat;
  if (is_dir('../users/seller/' . $name . $phone)){
    if($_FILES['mar_icon']['name'] != ''){
      upl_ma_ic();
    }
    if(($name == $laname)&&($phone == $laphone)){
      goto ed_f;
    }    
    else {
      echo "<script>alert('your account is already exists !!! change your name');window.history.back();</script>";
    }
  }
  else {
    rename('../users/seller/' . $laname . $laphone , '../users/seller/' . $name . $phone);
    ed_f :
    $file = "../users/seller/" . $name . $phone . "/singin.text";
    file_put_contents($file , $data_singin);
    $_SESSION['name'] = $_POST['mar_name'];
    $_SESSION['phone'] = $_POST['phone'];
    if($_FILES['profil_icon']['name'] != ''){
      upl_ma_ic();
    }
    else {
      echo "<script>alert('تم تعديل المعلومات');window.location.href = '../html/privite/mainpage_s.php'</script>";
    }
  }
  
  function upl_ma_ic(){
    $temp = explode(".", $_FILES["mar_icon"]["name"]);
    $newfilename = 'mar_icon' . '.' . $temp[1];
    $seller = $GLOBALS['name'] . $GLOBALS['phone'];
    $uploaddir = "../users/seller/{$seller}/";
    $uploadfile = $uploaddir . $newfilename;
    if (move_uploaded_file($_FILES['mar_icon']['tmp_name'], $uploadfile)) {
      echo "<script>alert('تم تعديل المعلومات سيتم التحديث عن تحديث الصفحة');window.location.href = '../html/privite/mainpage_s.php';</script>";
    } else {
      echo "<script>alert('حدث خطأ أثناء تحميل الصورة، يرجى إعادة المحاولة');window.history.back();</script>";
    }
  }

?>