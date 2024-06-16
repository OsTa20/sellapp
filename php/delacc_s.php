<?php
  session_start();
  $name = $_SESSION['name'];
  $phone = $_SESSION['phone'];
  $user = $name . $phone;
  //$userdir = $_POST['userdir'];
  $userdir = "../users/seller/{$user}"; 
  delTree($userdir);
  function delTree($dir) {
    $files = array_diff(scandir($dir), array('.','..'));
    foreach ($files as $file) {
      (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
    }
    rmdir($dir);
  }
  echo "<script>alert('تم حذف حسابك');window.location.href='../index.html';</script>";
?>