<?php
  session_start();
  $laname = $_POST['laname'];
  $laphone = $_POST['laphone'];
  $user_id = $_POST['user_id'];
  $name = $_POST['name'];
  $password = $_POST['password'];
  $phone = $_POST['phone'];
  $which_sell = $_POST['which_sell'];
  $profil_icon = $_POST['profil_icon'];
  $ws = '';
  foreach ($which_sell as $e){
    $ws .= $e . ',';
  }
	$data_singin =  'name : ' . $name . "\nphone : " . $phone . "\npassword : " . $password . "\nid : " . $user_id . "\nwhich_sell : " . $ws;
  if (is_dir('../users/buyer/' . $name . $phone)){
    if($_FILES['profil_icon']['name'] != ''){
      upl_pr_ic();
    }
    if(($name == $laname)&&($phone == $laphone)){
      goto ed_d;
    }
    else {
      echo "<script>alert('your account is already exists !!! change your name');window.history.back();</script>";
    }
  }
  else {
    rename('../users/buyer/' . $laname . $laphone , '../users/buyer/' . $name . $phone);
    ed_d :
    $file = "../users/buyer/" . $name . $phone . "/singin.text";
    file_put_contents($file , $data_singin);
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['phone'] = $_POST['phone'];
    if($_FILES['profil_icon']['name'] != ''){
      upl_pr_ic();
    }
    else {
      echo "<script>alert('تم تعديل المعلومات');window.location.href = '../html/privite/mainpage_b.php'</script>";
    }
  }
  
  function upl_pr_ic(){
    $temp = explode(".", $_FILES["profil_icon"]["name"]);
    $newfilename = 'profil_icon' . '.' . $temp[1];
    $buyer = $GLOBALS['name'] . $GLOBALS['phone'];
    $uploaddir = "../users/buyer/{$buyer}/";
    $uploadfile = $uploaddir . $newfilename;
    if (move_uploaded_file($_FILES['profil_icon']['tmp_name'], $uploadfile)) {
      echo "<script>alert('تم تعديل المعلومات سيتم التحديث عن تحديث الصفحة');window.location.href = '../html/privite/mainpage_b.php';</script>";
    } else {
      echo "<script>alert('حدث خطأ أثناء تحميل الصورة، يرجى إعادة المحاولة');window.history.back();</script>";
    }
  }

?>