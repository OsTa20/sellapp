<?php
  session_start();
  $_SESSION['name'] = $_POST['mar_name'];
  $_SESSION['phone'] = $_POST['phone'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  $se_or_by = $_POST['se_or_by'];
  $which_sell = $_POST['which_sell'];
  $ws = '';
  foreach ($which_sell as $e){
    $ws .= $e;
  }
  $mar_name = $_POST['mar_name'];
  $mar_icon = $_POST['mar_icon'];
  $mar_locat = $_POST['mar_locat'];

  //$data_singin =  'name : ' . $name . "\nphone : " . $phone . "\npassword : " . $password . "\nse_or_by : " . $se_or_by . "\nwhich_sell : " . $ws . "\nmar_name : " . $mar_name . "\nmar_locat : " . $mar_locat;

	if (is_dir('../users')){
	  if (is_dir('../users/seller')){
  	  if (is_dir('../users/seller/' . $mar_name . $phone)){
        echo "<script>alert('your account is already exists !!! change your name');window.history.back();</script>";
      }
  	  else if (is_dir('../users/buyer/' . $mar_name . $phone)){
        echo "<script>alert('your account is already exists !!! change your name');window.history.back();</script>";
      }
      else {
        mkdir('../users/seller/' . $mar_name . $phone);
        $all = file_get_contents('../users/1_allseller.text');
        $all++;
        file_put_contents('../users/1_allseller.text',$all);
        $file = "../users/seller/" . $mar_name . $phone . "/singin.text";
        $data_singin =  'mar_name : ' . $mar_name . "\nphone : " . $phone . "\npassword : " . $password . "\nid : " . 's' . $all . "\nwhich_sell : " . $ws . "\nmar_locat : " . $mar_locat;
        file_put_contents($file , $data_singin);
        upl_ma_ic();
      }
	  }
	  else {
	    if (is_dir('../users/buyer/' . $mar_name . $phone)){
        echo "<script>alert('your account is already exists !!! change your name');window.history.back();</script>";
      }
      else {
  	    mkdir('../users/seller');
        mkdir('../users/seller/' . $mar_name . $phone);
        file_put_contents('../users/1_allseller.text',1);
        $file = "../users/seller/" . $mar_name . $phone . "/singin.text";
        $data_singin =  'mar_name : ' . $mar_name . "\nphone : " . $phone . "\npassword : " . $password . "\nid : " . 's1' . "\nwhich_sell : " . $ws . "\nmar_locat : " . $mar_locat;
        file_put_contents($file,$data_singin);
        upl_ma_ic();
      }
	  }
  }
  else{
    mkdir("../users");
    mkdir('../users/seller');
    mkdir('../users/seller/' . $mar_name . $phone);
    file_put_contents('../users/1_allseller.text',1);
    $file = "../users/seller/" . $mar_name . $phone . "/singin.text";
    $data_singin =  'mar_name : ' . $mar_name . "\nphone : " . $phone . "\npassword : " . $password . "\nid : " . 's1' . "\nwhich_sell : " . $ws . "\nmar_locat : " . $mar_locat;
    file_put_contents($file,$data_singin);
    upl_ma_ic();
  }
  function upl_ma_ic(){
    $temp = explode(".", $_FILES["mar_icon"]["name"]);
    $newfilename = 'mar_icon' . '.' . $temp[1];
    $seller = $GLOBALS['mar_name'] . $GLOBALS['phone'];
    $uploaddir = "../users/seller/{$seller}/";
    $uploadfile = $uploaddir . $newfilename;
    if (move_uploaded_file($_FILES['mar_icon']['tmp_name'], $uploadfile)) {
      echo "<script>window.location.href = '../html/privite/mainpage_s.php';</script>";
    } else {
      echo "<script>alert('حدث خطأ أثناء تحميل الصورة، يرجى إعادة المحاولة');window.history.back();</script>";
    }
  }
?>