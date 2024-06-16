<?php
  session_start();
  $name = $_SESSION['name'];
  $phone = $_SESSION['phone'];
  $pro_name = $_POST['pro_name'];
  $pro_priz = $_POST['pro_priz'];
  $p_dir = $_POST['p_dir'];
  $pro_detail = $_POST['pro_detail'];
  $pro_icon = $_POST['pro_icon'];
  $user = $name . $phone;
  $data_pro =  'pro_name : ' . $pro_name . "\npro_priz : " . $pro_priz . "\npro_detail : " . $pro_detail;
  $pro_dir = substr($p_dir,3);
  file_put_contents($pro_dir , $data_pro);
  $filnam = explode('.',basename($pro_dir));
  $filnam2 = $filnam[0];
  if($_FILES['pro_icon']['name'] != ''){
    upl_prod_ic();
  }
  else {
    echo "<script>alert('تم حفظ المعلومات');window.location.href = '../html/privite/mainpage_s.php';</script>";
  }
  function upl_prod_ic(){
    $temp = explode(".", $_FILES["pro_icon"]["name"]);
    $newfilename = $GLOBALS['filnam2'] . '.' . $temp[1];
    $seller = $GLOBALS['name'] . $GLOBALS['phone'];
    $uploaddir = "../users/seller/{$seller}/products/";
    $uploadfile = $uploaddir . $newfilename;
    unlink($uploadfile);
    if (move_uploaded_file($_FILES['pro_icon']['tmp_name'], $uploadfile)) {
      echo "<script>alert('تم حفظ المعلومات');window.location.href ='../html/privite/mainpage_s.php';</script>";
    } else {
      echo "<script>alert('حدث خطأ أثناء تحميل الصورة، يرجى إعادة المحاولة');window.history.back();</script>";
    }
  }
?>