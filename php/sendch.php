<?php
  session_start();
  $name = $_SESSION['name'];
  $phone = $_SESSION['phone'];
  $user = $name . $phone;
  $to = $_POST['to'];
  $chat = $_POST['chat'];
  date_default_timezone_set("Asia/Damascus");
  $dd = date('d-m-Y');
  $hh = date('h:i');
  
  if(is_dir('../users/buyer/'.$user)){
    if(is_dir('../users/buyer/'.$user.'/chats')){
      if(file_exists('../users/buyer/'.$user.'/chats/'.$to.'.text')){
        // me
        $mych = file_get_contents('../users/buyer/'.$user.'/chats/'.$to.'.text');
        file_put_contents('../users/buyer/'.$user.'/chats/'.$to.'.text',$mych."\n".$user.' : '.$chat.'*'.$dd.' '.$hh);
        toyou();
      }
      else {
        // me
        file_put_contents('../users/buyer/'.$user.'/chats/'.$to.'.text',$user.' : '.$chat.'*'.$dd.' '.$hh);
        toyou();
      }
    }
    else {
      // me
      mkdir('../users/buyer/'.$user.'/chats');
      file_put_contents('../users/buyer/'.$user.'/chats/'.$to.'.text',$user.' : '.$chat.'*'.$dd.' '.$hh);
      toyou();
    }
  }
  else {
    if(is_dir('../users/seller/'.$user.'/chats')){
      if(file_exists('../users/seller/'.$user.'/chats/'.$to.'.text')){
        // me
        $mych = file_get_contents('../users/seller/'.$user.'/chats/'.$to.'.text');
        if($mych != ''){
          file_put_contents('../users/seller/'.$user.'/chats/'.$to.'.text',$mych."\n".$user.' : '.$chat.'*'.$dd.' '.$hh);
        }
        else {
          file_put_contents('../users/seller/'.$user.'/chats/'.$to.'.text',$user.' : '.$chat.'*'.$dd.' '.$hh);
        }
        toyou();
      }
      else {
          // me
          file_put_contents('../users/seller/'.$user.'/chats/'.$to.'.text',$user.' : '.$chat.'*'.$dd.' '.$hh);
          toyou();
      }
    }
    else {
      // me
      mkdir('../users/seller/'.$user.'/chats');
      file_put_contents('../users/seller/'.$user.'/chats/'.$to.'.text' , $user.' : '.$chat.'*'.$dd.' '.$hh);
      toyou();
    }
  }
  
  function toyou(){
    $to = $GLOBALS['to'];
    $user = $GLOBALS['user'];
    $chat = $GLOBALS['chat'];
    $dd = $GLOBALS['dd'];
    $hh = $GLOBALS['hh'];
    if(is_dir('../users/buyer/'.$to)){
      if(is_dir('../users/buyer/'.$to.'/chats')){
        if(file_exists('../users/buyer/'.$to.'/chats/'.$user.'.text')){
          // to you
          $mych = file_get_contents('../users/buyer/'.$to.'/chats/'.$user.'.text');
          file_put_contents('../users/buyer/'.$to.'/chats/'.$user.'.text',$mych."\n".$user.' : '.$chat.'*'.$dd.' '.$hh);
        }
        else {
          // to you
          file_put_contents('../users/buyer/'.$to.'/chats/'.$user.'.text',$user.' : '.$chat.'*'.$dd.' '.$hh);
        }
      }
      else {
        // to you
        mkdir('../users/buyer/'.$to.'/chats');
        file_put_contents('../users/buyer/'.$to.'/chats/'.$user.'.text',$user.' : '.$chat.'*'.$dd.' '.$hh);
      }
      
      re2 :
      $chyn = '../users/buyer/'.$to.'/chatsnum';
      if(is_dir($chyn)){
        $alycvar = '../users/buyer/'.$to.'/chatsnum/'.$user.'.text';
        if(file_exists($alycvar)){
          $alyc_n = file_get_contents($alycvar) +1;
          file_put_contents($alycvar,$alyc_n);
        }
        else {
          file_put_contents($alycvar,1);
        }
      }
      else {
        mkdir($chyn);
        goto re2;
      }
      
      $alyc = '../users/buyer/'.$to.'/allchat.text';
      if(file_exists($alyc)){
        $chnto = file_get_contents('../users/buyer/'.$to.'/chatsnum/'.$user.'.text');
        if($chnto == 0){
          $alyc_n = file_get_contents($alyc) +1;
          file_put_contents($alyc,$alyc_n);
        }
      }
      else {
        file_put_contents($alyc,1);
      }
    }
    else {
      if(is_dir('../users/seller/'.$to.'/chats')){
        if(file_exists('../users/seller/'.$to.'/chats/'.$user.'.text')){
            // to you
            $mych = file_get_contents('../users/seller/'.$to.'/chats/'.$user.'.text');
            file_put_contents('../users/seller/'.$to.'/chats/'.$user.'.text', $mych."\n".$user.' : '.$chat.'*'.$dd.' '.$hh);
          }
        else {
            // to you
            file_put_contents('../users/seller/'.$to.'/chats/'.$user.'.text',$user.' : '.$chat.'*'.$dd.' '.$hh);
        }
      }
      else {
        // to you
        mkdir('../users/seller/'.$to.'/chats');
        file_put_contents('../users/seller/'.$to.'/chats/'.$user.'.text',$user.' : '.$chat.'*'.$dd.' '.$hh);
      }
      
      
      re3 :
      $chyn = '../users/seller/'.$to.'/chatsnum';
      if(is_dir($chyn)){
        $alycvar = '../users/seller/'.$to.'/chatsnum/'.$user.'.text';
        if(file_exists($alycvar)){
          $alyc_n = file_get_contents($alycvar) +1;
          file_put_contents($alycvar,$alyc_n);
        }
        else {
          file_put_contents($alycvar,1);
        }
      }
      else {
        mkdir($chyn);
        goto re3;
      }
      
      $alyc = '../users/seller/'.$to.'/allchat.text';
      if(file_exists($alyc)){
        $chnto = '../users/seller/'.$to.'/chatsnum';
        $nc = scandir($chnto);
        file_put_contents($alyc,0);
        foreach ($nc as $fi){
          $tf= file_get_contents($chnto.'/'.$fi);
          if($tf > 0){
            $alyc_n = file_get_contents($alyc) +1;
            file_put_contents($alyc,$alyc_n);
          }
        }
      }
      else {
        file_put_contents($alyc,1);
      }
    }
    echo "<script>window.history.back();</script>";
  }
?>