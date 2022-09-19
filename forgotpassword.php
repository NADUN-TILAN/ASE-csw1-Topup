<?php
require_once("includes/initialize.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">


    <title> <?php
                $query = "SELECT * FROM `tbltitle` WHERE TItleID=1";
                $res = mysql_query($query) or die(mysql_error());
                $viewTitle = mysql_fetch_assoc($res);
                echo $viewTitle['Title'];
            ?> 
            </title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo WEB_ROOT; ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo WEB_ROOT; ?>css/signin.css" rel="stylesheet"> 

    <style type="text/css">
      /*  #wrap {
            width: 100%;
            padding: 2px 2px 2px 2px;
        }*/
    
       .col-1  .img {
          width: 100%;
          height: auto;
          border: 1px #fff;

        }

        .btn{
          margin-left: -105%;
          float: left;
          margin-top: -20%;
        }
        .input{
          width: 100%;
          height: 50%;
          font-size: 23px;
        }
        .col-2{
          margin-top: -5%;
        }
       


    </style>
  </head>

 <?php
 if (isset($_POST['ResetPass'])) {
   # code...
    $sql = "Update `tblguest` Set `G_PASS`=sha1('".$_POST['password']."') WHERE  `GUESTID`=". $_POST['GUESTID'];
    $results = mysql_query($sql) or die(mysql_error());
     

   }

  // unset($_SESSION['GuestUsername']);
        if (isset($_POST['btnlogin'])){
            //form has been submitted1
            
            $uname = trim($_POST['username']); 

            //check if the email and password is equal to nothing or null then it will show message box
            if ($uname == '') {
         
                echo '<div style="background-color:red;color:#fff;padding:4px 5px 4px 5px;">Field is required.</div>';
            }else{
                $row = '';
                $query = "SELECT * FROM `tblguest` WHERE `G_UNAME`='" . $_POST['username']."'";
                $res = mysql_query($query) or die(mysql_error());
                $row = mysql_fetch_assoc($res);
                $maxrow = mysql_num_rows($res);

                if ($maxrow > 0) {
                    # code...
                  $_SESSION['GuestUsername'] = $_POST['username'];
                  redirect('forgotpassword.php');

                }else{
                    echo '<div style="background-color:red;color:#fff;padding:4px 5px 4px 5px;">Username is not found. Pls. contact administrator</div>';
                }

            }
            
        }else{

            if (isset($_SESSION['GuestUsername'])) {
                # code...
                // echo $_SESSION['GuestUsername'];
                 $query = "SELECT * FROM `tblguest` WHERE `G_UNAME`='" . $_SESSION['GuestUsername']."'";
                $res = mysql_query($query) or die(mysql_error());
                $row = mysql_fetch_assoc($res);
         ?>
            <div id="wrap">
                <div class="container" >
                <div class="row"> 
                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">Reset Password</h3>
                            </div> 
                            <div class="panel-body"> 
                              <div id="ErrorMSGpass"></div>
                              <form action="" method="POST">
                              <table>
                                <tr>
                                  <td rowspan="3"> 
                                    <img class="img"  src="<?php echo WEB_ROOT. $row['LOCATION']; ?>" alt="User Avatar">  
                                  </td>
                                  <td>
                                    <div class="col-2">
                                    <label>Enter your password :</label>
                                    <input type="hidden" id="GUESTID" value="<?php echo  $row['GUESTID']; ?>">
                                    <input type="password" class="input" id="ShaPass" /> 
                                    </div>
                                  </td> 
                                </tr>
                                <tr>
                                  <td colspan="2"></td>
                                  <td><button id="btnResetPassword" class="btnResetPass btn btn-primary">Password Reset</button></td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td></td>
                                </tr>
                              </table>
                               </form>
                            </div> 
                            </div>
                    </div>
                </div>
            </div> 
          </div>
        <?php
                unset($_SESSION['GuestUsername']); 

            }else{

             check_message();

             echo '<div id="wrap">
                <div class="container" >
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="login-panel panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Reset Password</h3>
                            </div>
                            
                            <div class="panel-body">
                                <form role="form" method="POST" action="">
                                    <fieldset>
                                        <div id="ErrorMessage"></div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Enter your Username" id="email"name="email" type="text" autofocus>
                                        </div>  
                                        <button type="button"   name="btnlogin" class="checkusername btn-lg btn-success btn-block">Proceed</button>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            </div>';  
            }
            
        }
  
?> 
    
     

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

  <script  src="<?php echo WEB_ROOT; ?>jquery/jquery.min.js"></script> 
  <!-- Bootstrap Core JavaScript -->
  <script src="<?php echo WEB_ROOT; ?>js/bootstrap.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){

      $("#btnResetPassword").click(function(){

         var pass = document.getElementById("ShaPass").value;
         var guestid = document.getElementById("GUESTID").value;
        // $("#ErrorMSGpass").html(pass); 

       $.ajax({ 
          type:"POST",
          url: "forgotpassword.php",             
          dataType: "text",   //expect html to be returned  
          data:{ResetPass:'',password:pass,GUESTID:guestid},               
          success: function(data){   
           alert("Password has been reset.");
          window.close();
          } 

             
        });  
    });

    });
</script>
  <script type="text/javascript">
     $(document).ready(function(){

        $(".checkusername").click(function(){

        var user_name = document.getElementById("email").value; 

               $.ajax({ 
                      type:"POST",
                      url: "forgotpassword.php",             
                      dataType: "text",   //expect html to be returned  
                      data:{btnlogin:'btnlogin',username:user_name},               
                      success: function(data){ 
                         $("#ErrorMessage").css({ 
                            "padding" : "4px 5px 4px 5px",
                            "margin-bottom" : "5px"
                         });
                         // $("#ErrorMessage").fadeOut("slow");
                         $("#ErrorMessage").fadeIn("slow");                 
                         $("#ErrorMessage").html(data);  
                         // alert(data);
                      }  
                });  
         });

    }); 
  </script>
  </body>
</html>