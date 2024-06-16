<?php
  session_start();
  $name = $_SESSION['name'];
  $phone = $_SESSION['phone'];
  $user = $name . $phone;
  $pro = $_GET['pro'];
  $by = $_GET['by'];
  
  $basn = explode('.',basename($pro));
  $pd = $basn[0] .'.text';
  
  $buy = '../users/seller/'.$by.'/mybuys_tem/';
  $mybuys = '../users/seller/'.$by.'/mybuys';
  $ms =  '../users/seller/'.$user.'/mysels';
  
  if(is_dir($ms)){
    copy($buy.$pd,$ms.'/'.$pd);
    $pdt = explode('seller : ',file_get_contents($ms.'/'. $pd));
    $din = explode("\n",$pdt[1]);
    $pd_c = $pdt[0].'buyer : '.$by."\n".$din[1]."\n".$din[2];
    file_put_contents($ms.'/'. $pd,$pd_c);

    $all = explode(' : ', file_get_contents($ms.'/'. $pd));
    $pr_n = explode("\n",$all[1]);
    $pr_n = $pr_n[0];
    $pr_p = explode("\n",$all[2]);
    $pr_p = $pr_p[0];
    $qu = explode("\n",$all[4]);
    $qu = $qu[0];
    $date = end($all);
  }
  else {
    mkdir('../users/seller/'.$user.'/mysels');
    copy($buy.$pd,$ms.'/'.$pd);
    $pdt = explode('seller : ',file_get_contents($ms.'/'. $pd));
    $din = explode("\n",$pdt[1]);
    $pd_c = $pdt[0].'buyer : '.$by."\n".$din[1]."\n".$din[2];
    file_put_contents($ms.'/'. $pd,$pd_c);
    $all = explode(' : ', file_get_contents($ms.'/'. $pd));
    $pr_n = explode("\n",$all[1]);
    $pr_n = $pr_n[0];
    $pr_p = explode("\n",$all[2]);
    $pr_p = $pr_p[0];
    $qu = explode("\n",$all[4]);
    $qu = $qu[0];
    $date = end($all);
  }
  
  if(is_dir($mybuys)){
    rename($buy.$pd,$mybuys.'/'.$pd);
  }
  else {
    mkdir($mybuys);
    rename($buy.$pd,$mybuys.'/'.$pd);
  }
  
  //push_noti
  $mb = '../users/seller/'.$by;
  if(file_exists($mb.'/push_noti.text')){
    $n_ts = file_get_contents($mb.'/push_noti.text');
    $nd = $n_ts . "seller : " . $user . "\npr_name : " . $pr_n. "\npr_priz : " . $pr_p . "\npr_coun : " . $qu ."\ndate : " . $date  ."\n***\n"; 
    file_put_contents($mb.'/push_noti.text', $nd);
  }
  else {
    $nd = $n_ts . "seller : " . $user . "\npr_name : " . $pr_n. "\npr_priz : " . $pr_p . "\npr_coun : " . $qu ."\ndate : " . $date ."\n***\n"; 
    file_put_contents($mb.'/push_noti.text', $nd);
  }
  
  //notification
  $not = $mb.'/notification.text';
  if(file_exists($not)){
    $not_d = file_get_contents($not);
    $not_d++;
    file_put_contents($not,$not_d);
  }
  else {
    file_put_contents($not,1);
  }
  
  echo "<script>alert('تم تأكيد البيع');window.history.back();</script>";
?>