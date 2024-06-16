<?php
  session_start();
  $_SESSION['name'] = $_POST['name'];
  $_SESSION['phone'] = $_POST['phone'];
  $name = $_POST['name'];
  $password = $_POST['password'];
  $phone = $_POST['phone'];
  $se_or_by = $_POST['se_or_by'];
  $which_sell = $_POST['which_sell'];
  $ws = '';
  foreach ($which_sell as $e){
    $ws .= $e;
  }
	//$data_singin =  'name : ' . $name . "\nphone : " . $phone . "\npassword : " . $password . "\nid : " . 'b' . "\nwhich_sell : " . $ws;
	if (is_dir('../users')){
	  if (is_dir('../users/buyer')){
  	  if (is_dir('../users/buyer/' . $name . $phone)){
        echo "<script>alert('your account is already exists !!! change your name');window.history.back();</script>";
      }
  	  else if (is_dir('../users/seller/' . $name . $phone)){
        echo "<script>alert('your account is already exists !!! change your name');window.history.back();</script>";
      }
      else {
        mkdir('../users/buyer/' . $name . $phone);
        $all = file_get_contents('../users/1_allbuyer.text');
        $all++;
        $data_singin =  'name : ' . $name . "\nphone : " . $phone . "\npassword : " . $password . "\nid : " . 'b' . $all . "\nwhich_sell : " . $ws;
        file_put_contents('../users/1_allbuyer.text',$all);
        $file = "../users/buyer/" . $name . $phone . "/singin.text";
        file_put_contents($file , $data_singin);
        echo "<script>window.location.href = '../html/privite/mainpage_b.php'</script>";
      }
	  }
	  else {
	    if (is_dir('../users/seller/' . $name . $phone)){
        echo "<script>alert('your account is already exists !!! change your name');window.history.back();</script>";
      }
      else {
  	    mkdir('../users/buyer');
        mkdir('../users/buyer/' . $name . $phone);
        file_put_contents('../users/1_allbuyer.text',1);
        $file = "../users/buyer/" . $name . $phone . "/singin.text";
    	  $data_singin =  'name : ' . $name . "\nphone : " . $phone . "\npassword : " . $password . "\nid : " . 'b1' . "\nwhich_sell : " . $ws;
        file_put_contents($file,$data_singin);
        echo "<script>window.location.href = '../html/privite/mainpage_b.php'</script>";	 
      }
    }
	}
  else{
    mkdir("../users");
    mkdir('../users/buyer');
    mkdir('../users/buyer/' . $name . $phone);
    file_put_contents('../users/1_allbuyer.text',1);
    $file = "../users/buyer/" . $name . $phone . "/singin.text";
    $data_singin =  'name : ' . $name . "\nphone : " . $phone . "\npassword : " . $password . "\nid : " . 'b1' . "\nwhich_sell : " . $ws;
    file_put_contents($file,$data_singin);
    /*
    session_start();
    $_SESSION['name'] = $name;
    $_SESSION['phone'] = $phone;
    $value = $_SESSION['key'];
    unset($_SESSION['key']);
    session_unset();
    session_destroy();
    */
    echo "<script>window.location.href = '../html/privite/mainpage_b.php'</script>";
  }
?>