<?php
 require_once ("includes/initialize.php"); 

 if(isset($_POST['gsubmit'])){

  $email = trim($_POST['username']);
  $upass  = trim($_POST['pass']);
  $h_upass = sha1($upass);
  
   if ($email == '' OR $upass == '') { 
      message("Invalid Username and Password!", "error");
       redirect(WEB_ROOT."booking/index.php?view=logininfo");
         
    } else {   
        $guest = new Guest();
        $res = $guest::guest_login($email,$h_upass);

        if ($res==true){
           redirect(WEB_ROOT."booking/index.php?view=payment");
        }else{
             message("Invalid Username and Password! Please contact administrator", "error");
             redirect(WEB_ROOT."booking/index.php?view=logininfo");
        }
 
 }
 }
?>
