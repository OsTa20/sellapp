<?php
  session_start();
  $_SESSION['name'] = $_POST['name'];
  $_SESSION['phone'] = $_POST['phone'];
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  $file =  $name . $phone;

  if($name == 'admin'){
    $ad_data_all = file_get_contents('../users/admin/singin.text');
    $ad_data_pass = explode(' : ' , $ad_data_all);
    $admin_password = $ad_data_pass[1];
    if($password == $admin_password){
      echo "<script>window.location.href = '../users/admin/admin.php';</script>";
    }
    else {
      echo "<script>alert('password not correct');window.history.back();</script>";
    }
  }
  
  if (is_dir('../users')){
    if (is_dir('../users/seller/' . $file)){
      $data = file_get_contents('../users/seller/' . $file . '/singin.text');
      $data_usre = explode(' : ',$data);
      $uspas = explode("\n",$data_usre[3]);
      if ($password == $uspas[0]){
        echo "<script>window.location.href = '../html/privite/mainpage_s.php';</script>";
      }
      else{
        echo "<script>alert('password not correct');window.history.back();</script>";
  		}
    }
    elseif (is_dir('../users/buyer/' . $file)){
      $data = file_get_contents('../users/buyer/' . $file . '/singin.text');
      $data_us_re = explode(' : ',$data);
      $uspas = explode("\n",$data_us_re[3]);
      if ($password == $uspas[0]){
        echo "<script>window.location.href = '../html/privite/mainpage_b.php';</script>";
      }
      else{
        echo "<script>alert('password not correct');window.history.back();</script>";
		  }
    }
    else {
      echo "<script>alert('your inputs are not correct !!!');window.history.back();</script>";
    }
  }
  else {
    echo "<script>alert('your inputs are not correct !!!');window.history.back();</script>";
  }
?>