<?php
  session_start();
  $name = $_SESSION['name'];
  $phone = $_SESSION['phone'];
  $p_dir = $_POST['p_dir'];
  $user = $name . $phone;
  $pro_dir = substr($p_dir,3);
  $filnam = explode('.',basename($pro_dir));
  $filnam2 = $filnam[0];
  unlink($pro_dir);
  $pic = scandir(dirname($pro_dir));
  foreach ($pic as $v){
    $n = explode('.',$v);
    if($n[0] == $filnam2){
      $in = $v;
    }
  }
  $i_dir = dirname($pro_dir) . '/'.$in;
  unlink($i_dir);
  echo "<script>alert('تم حذف المنتج');window.history.back();</script>";
?>