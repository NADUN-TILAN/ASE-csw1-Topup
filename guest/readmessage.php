 <?php  
  require_once("../includes/initialize.php");


 
$sql = "UPDATE `tblpayment` SET `MSGVIEW`=1 WHERE `CONFIRMATIONCODE` ='" . $_GET['code'] ."'";
 $mydb->setQuery($sql);
 $mydb->executeQuery(); 



      $query ="SELECT g.`GUESTID`, `G_FNAME`, `G_LNAME`, `G_ADDRESS`,`CONFIRMATIONCODE`, `TRANSDATE`, `ARRIVAL`, `DEPARTURE`, `RPRICE`
               FROM `tblguest` g ,`tblreservation` r 
               WHERE g.`GUESTID`=r.`GUESTID` and `CONFIRMATIONCODE` ='".$_GET['code']."'";
      $mydb->setQuery($query);
      $result = $mydb->loadsingleResult(); 
     ?>
    <form action="<?php echo WEB_ROOT;; ?>guest/readprint.php?" method="POST" target="_blank">
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
             <i class="fa fa-globe"></i>
             <?php
                $query = "SELECT * FROM `tbltitle` WHERE TItleID=1";
                 $mydb->setQuery($query);
                $res = $mydb->executeQuery(); 
                $viewTitle = mysqli_fetch_assoc($res);
                echo $viewTitle['Title'];
            ?> 
            <small class="pull-right">Date: <?php echo date('m/d/Y'); ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong><?php
                 
                echo $viewTitle['Title'];
            ?>  </strong>
            <br>
            <?php
              $query = "SELECT * FROM `tbl_setting_contact` WHERE `SetCon_ID`=1";
              $mydb->setQuery($query);
              $res = $mydb->executeQuery(); 
              $viewContact = mysqli_fetch_assoc($res);
             
            ?> 
           <?php echo $viewContact['SetConLocation']; ?>
           <br>
            E-mail: <?php echo $viewContact['SetConEmail']; ?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong><?php echo $result->G_FNAME . ' ' .$result->G_LNAME; ?>
            </strong><br>
            <?php echo $result->G_ADDRESS; ?> 
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
        <br/>
        <br/>
          <!-- <b>Invoice #007612</b><br>
          <br> -->
          <b>Confirmation ID: </b> <p style="background-color:blue;color:white"> <?php echo $result->CONFIRMATIONCODE; ?></p> 
          <input type="hidden" name="code" value="<?php echo $result->CONFIRMATIONCODE; ?>">
<br>
          <b>Transaction Date:</b> <?php echo  Date($result->TRANSDATE); ?>
<br>
          <b>Account:</b> <?php echo $result->GUESTID; ?>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
  <?php 
 
 $query ="SELECT * 
          FROM `tblaccomodation` A,`tblroom`  RM, `tblreservation` RS  
          WHERE  A.`ACCOMID`=RM.`ACCOMID` AND RM.`ROOMID`=RS.`ROOMID` AND RS.`STATUS`<>'Cancelled' and `CONFIRMATIONCODE` ='".$_GET['code']."'";
  $mydb->setQuery($query);
 $res = $mydb->loadResultList(); 


     ?>
      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Room</th>
              <th>Description</th>
              <th>Price</th>
              <th>Arrival</th>
              <th>Departure</th>
              <th>Night(s)</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
            <?php   foreach ($res as $result) {
          $days =  dateDiff(date($result->ARRIVAL),date($result->DEPARTURE));
             ?>

            <tr> 
              <td><?php echo $result->ACCOMODATION . ' [' .$result->ROOM.']' ;?></td>
              <td><?php echo $result->ROOMDESC . ' <br/> Person: ' .  $result->NUMPERSON;?></td>
              <td> &euro;<?php echo $result->PRICE;?></td>
              <td><?php echo date_format(date_create($result->ARRIVAL),'m/d/Y');?></td>
              <td><?php echo date_format(date_create($result->DEPARTURE),'m/d/Y');?></td>
              <td><?php echo ($days==0) ? '1' : $days;?></td>
              <td> &euro;<?php echo $result->RPRICE;?></td>
            </tr>
            
            
            <?php 
             @$tot += $result->RPRICE;
            } ?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
         <!--  <p class="lead">Payment Methods:</p>
          <img src="../../dist/img/credit/visa.png" alt="Visa">
          <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="../../dist/img/credit/american-express.png" alt="American Express">
          <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
          </p> -->
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Total Amount</p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Total:</th>
                <td>$<?php echo @$tot ; ?></td>
              </tr>
         <!--      <tr>
                <th>Tax (9.3%)</th>
                <td>$10.34</td>
              </tr>
              <tr>
                <th>Shipping:</th>
                <td>$5.80</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>$265.24</td>
              </tr> -->
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <!-- <a href="<?php echo WEB_ROOT; ?>guest/readprint.php?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a> -->
          <button type="submit"  ><i class="fa fa-print"></i> Print</button>
  <!--         <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button> -->
        </div>
      </div>
    </section>
    </form>
    <!-- /.content -->
    <div class="clearfix"></div>
 

 