<div  id="menuSm"  class="navbar navbar-fixed-top  navbar-inverse">   
    <div class="navbar-collapse ">
      <div class="sm-ul navbar-custom-menu ">
          <ul class=" navbar-nav  tooltip-demo d-flex flex-row align-items-center justify-content-start pull-right">
            <li>
              <a  data-toggle="tooltip" data-placement="bottom"   title="Booking Cart"  href="<?php echo WEB_ROOT.'booking/index.php';  ?>" class="mx-1"> 
               <i class="fa fa-shopping-cart fa-fw"></i> <span class="px-1"><?php echo  isset($cart) ? $cart : '' ; ?></span>
             </a>
            </li>

            <?php if (isset($_SESSION['GUESTID'])) {
     
             $sql = "SELECT count(*) as MSG FROM `tblpayment` WHERE STATUS<>'Pending'  AND  `MSGVIEW`=0 AND `GUESTID`=" . $_SESSION['GUESTID'];
             $mydb->setQuery($sql);
              $res = $mydb->executeQuery(); 

               $msgCnt = mysqli_fetch_assoc($res);
              ?>
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle mx-1" data-toggle="dropdown" >
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success px-1"><?php echo $msgCnt['MSG'] ; ?></span> 
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <?php echo $msgCnt['MSG'] ; ?> messages</li>
              <?php 
                $sql = "SELECT  *  FROM `tblpayment` WHERE STATUS<>'Pending' AND `MSGVIEW`=0 AND `GUESTID`=" . $_SESSION['GUESTID'];
                $mydb->setQuery($sql);
                $res = $mydb->executeQuery(); 
                while ($row = mysqli_fetch_array($res)){
               ?>
              <li> 
                <ul class="">
                  <li> 
                    <a  class="read" href="<?php echo WEB_ROOT ;  ?>guest/readmessage.php?code=<?php echo  $row['CONFIRMATIONCODE']; ?>" data-toggle="lightbox"   data-id="<?php echo  $row['CONFIRMATIONCODE']; ?> " >
                      <div class="pull-left">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Admin 
                      </h4>
                      <p>Reservation is already <?php echo   $row['STATUS']; ?>.. </p> 
                    </a>
                  </li>
                </ul>
              </li> 
              <?php } ?>
            </ul>
          </li>

<?php 
$g = New Guest() ;
$result = $g->single_guest($_SESSION['GUESTID']);

?> 
            <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
            <i class="fa fa-user fa-fw"></i><?php echo $_SESSION['name']. ' ' . $_SESSION['last']; ?> 

            </a>
            <ul class="dropdown-menu nav nav-stacked">    
            <li class="widget-user-header bg-yellow">
              <div class="widget-user-image">
                <img class="img-circle" style="cursor:pointer;width:200px;height:100px;padding:0;"  data-target="#myModal" data-toggle="modal" src="<?php echo WEB_ROOT. $result->LOCATION;  ?>" alt="User Avatar">
              </div> 
              <h3 class="widget-user-username"><?php echo $_SESSION['name']. ' ' . $_SESSION['last']; ?> </h3> 
            </li> 
                <li><a style="color:#000;text-align:left;border-bottom:1px solid #fff;"
                    href="<?php echo WEB_ROOT ;  ?>guest/profile.php" data-toggle="lightbox" >Account </a></li> 
                <li><a style="color:#000;text-align:left;border-bottom:1px solid #fff;" 
                href="<?php echo WEB_ROOT ;  ?>guest/bookinglist.php" data-toggle="lightbox">Bookings </a></li>
                <li><a style="color:#000;text-align:left;border-bottom:1px solid #fff;" href="<?php echo WEB_ROOT.'logout.php';  ?>">Logout </a></li> 
            </ul>

          </li>
          <?php }else { ?>
            <li><a     data-target="#LoginModal" data-toggle="modal"  title="Login Guest"  href="">Login
             </a>
             </li>
        <?php  } ?>
          </ul>
      </div> 
      </div> 
</div>   

 <!-- Modal photo -->
          <div class="modal fade" id="LoginModal" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal" type=
                  "button">×</button> 
                </div> 

                                  
                <form action="" method="post"> 
                  <div class="modal-body">
                    <div class="form-group"> 
                        <div class="col-md-12"> 
                        <div id="ErrorMessage" style="background-color:red;color:#fff;" ></div> 
                                   <div class="form-group">
                                      <div class="col-md-12"> 
                                        <label class="control-label" for=
                                        "U_USERNAME">Username:</label> 
                                              <input   id="U_USERNAME" name="U_USERNAME" placeholder="Username" type="text" class="form-control input" >  
                                      </div> 
                     
                                      <div class="col-md-12">
                                        <label class="control-label" for=
                                        "U_PASS">Password:</label> 
                                         <input name="U_PASS" id="U_PASS" placeholder="Password" type="password" class="form-control input ">
                                 
                                      </div> 
                                      </div>  
                      </div> 
                  </div> 
                </div>
                  <div class="modal-footer">  
                         <button type="button" name="btnLogin" class="btnLoginModal button">Sign In</button> 
                  </div>  
                 </form>  
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->
 
 


 
 