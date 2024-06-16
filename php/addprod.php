<?php
  session_start();
  $name = $_SESSION['name'];
  $phone = $_SESSION['phone'];
  
  $pro_name = $_POST['pro_name'];
  $pro_priz = $_POST['pro_priz'];
  $pro_detail = $_POST['pro_detail'];
  $pro_icon = $_POST['pro_icon'];
  $user = $name . $phone;
  $data_pro =  'pro_name : ' . $pro_name . "\npro_priz : " . $pro_priz . "\npro_detail : " . $pro_detail;

  if (is_dir('../users/seller/' . $user . '/products')){
  	$pro_dir = '../users/seller/' . $user . '/products/';
  	$all = file_get_contents('../users/seller/1_allproducts.text');
    $all++;
    file_put_contents('../users/seller/1_allproducts.text' , $all);
  	file_put_contents($pro_dir . 'p' . $all . '.text', $data_pro);
  	upl_prod_ic();
  }
  else {
  	if(file_exists('../users/seller/1_allproducts.text')){
      $all = file_get_contents('../users/seller/1_allproducts.text');
      $all++;
      file_put_contents('../users/seller/1_allproducts.text' , $all);
  	}
  	else {
  	  $all = 1;
      file_put_contents('../users/seller/1_allproducts.text' , 1);
  	}
    mkdir('../users/seller/' . $user . '/products');
  	$pro_dir = '../users/seller/' . $user . '/products/';
  	$pn = 'p' . $all . '.text';
  	file_put_contents($pro_dir . $pn , $data_pro);
  	upl_prod_ic();
  }
  function upl_prod_ic(){
    $temp = explode(".", $_FILES["pro_icon"]["name"]);
    $newfilename = 'p' . $GLOBALS['all'] . '.' . $temp[1];
    $seller = $GLOBALS['name'] . $GLOBALS['phone'];
    $uploaddir = "../users/seller/{$seller}/products/";
    $uploadfile = $uploaddir . $newfilename;
    if (move_uploaded_file($_FILES['pro_icon']['tmp_name'], $uploadfile)) {
      echo "<script>alert('تم حفظ المعلومات');window.location.href = '../html/privite/mainpage_s.php';</script>";
    } else {
      echo "<script>alert('حدث خطأ أثناء تحميل الصورة، يرجى إعادة المحاولة');window.history.back();</script>";
    }
  }
?>