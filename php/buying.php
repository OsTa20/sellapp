<?php
  session_start();
  $name = $_SESSION['name'];
  $phone = $_SESSION['phone'];
  $user = $name . $phone;
  
  date_default_timezone_set("Asia/Damascus");
  $dd = date('d-m-Y');
  $hh = date('h:i');
  
  $seller = $_POST['seller'];  // البائع
  $seller = '../users/seller/' . basename($seller);
  $prod_loc = $_POST['prod_loc'];  // عنوان المنتج
  $prod_loc = explode('.', basename($prod_loc));
  $prod_loc = $prod_loc[0] . '.text';
  $prod_loc = "$seller/products/" . $prod_loc;
  $prod_pri = $_POST['prod_pri'];  // سعر القطعة
  $prod_tot = $_POST['prod_tot'];  // المبلغ الإجمالي
  $qmya = $prod_tot/$prod_pri; // الكمية
  
  $usd = '../users/buyer/'.$user;
  $myb = $usd . '/mybuys_tem';
  
  if(is_dir($myb)){
    copy($prod_loc , $myb.'/'.basename($prod_loc));
    $pd_c = file_get_contents($myb.'/'.basename($prod_loc));
    $pn1 = explode("\n" , $pd_c);
    $pn2 = explode(' : ' , $pn1[0]);
    $pr_name = $pn2[1];
    file_put_contents($myb.'/'.basename($prod_loc) , $pd_c."\nprod_q : ".$qmya."\nseller : ".$seller. "\npr_dir : " .$prod_loc. "\ndate : " . $dd .' '. $hh );
  }
  else {
    mkdir($myb);
    copy($prod_loc , $myb.'/'.basename($prod_loc));
    $pd_c = file_get_contents($myb.'/'.basename($prod_loc));
    $pn1 = explode("\n" , $pd_c);
    $pn2 = explode(' : ' , $pn1[0]);
    $pr_name = $pn2[1];
    file_put_contents($myb.'/'.basename($prod_loc) , $pd_c."\nprod_q : ".$qmya."\nseller : ".$seller. "\npr_dir : " .$prod_loc. "\ndate : " . $dd .' '. $hh );
  }
  
  if(file_exists($seller.'/push_noti.text')){
    $n_ts = file_get_contents($seller.'/push_noti.text');
    $nd = $n_ts . "buyer : " . $user . "\npr_name : " . $pr_name . "\npr_priz : " . $prod_pri . "\npr_coun : " . $qmya . "\nbu_l : " . $prod_tot . "\npr_dir : " . $prod_loc ."\ndate : " . $dd .' '. $hh  ."\n***\n"; 
    file_put_contents($seller.'/push_noti.text', $nd);
  }
  else {
    $nd = $n_ts . "buyer : " . $user . "\npr_name : " . $pr_name . "\npr_priz : " . $prod_pri . "\npr_coun : " . $qmya . "\nbu_l : " . $prod_tot . "\npr_dir : " .$prod_loc. "\ndate : " . $dd .' '. $hh  . "\n***\n"; 
    file_put_contents($seller.'/push_noti.text', $nd);
  }
  
  $not = $seller.'/notification.text';
  if(file_exists($not)){
    $not_d = file_get_contents($not);
    $not_d++;
    file_put_contents($not,$not_d);
  }
  else {
    file_put_contents($not,1);
  }
  echo "<script>alert('تم إرسال طلبك يرجى انتظار تأكيد البيع');window.history.back();</script>";
  
?>