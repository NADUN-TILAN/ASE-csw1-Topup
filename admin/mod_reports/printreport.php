<?php
require_once("../../includes/initialize.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title><?php echo isset($title) ? $title   :  ' ' ; ?></title>


<link href="<?php echo WEB_ROOT; ?>admin/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo WEB_ROOT; ?>admin/css/dataTables.bootstrap.css" rel="stylesheet" media="screen">
<link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>admin/css/jquery.dataTables.css">
<link href="<?php echo WEB_ROOT; ?>admin/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>admin/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>admin/js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>admin/js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>admin/js/bootstrap-modal.js"></script>
<script type="text/javascript" src="<?php echo WEB_ROOT; ?>admin/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo WEB_ROOT; ?>admin/js/locales/bootstrap-datetimepicker.uk.js" charset="UTF-8"></script>
</head> 

 <body >
<div class="wrapper"> 
 
    <form action="" method="POST" >
    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i>  
            Dragon House
            <small class="pull-right">Date: <?php echo date('m/d/Y'); ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
    
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="">
            <i class="fa fa-globe"></i><?php echo (isset($_POST['categ'])) ? $_POST['categ'] : ''; ?>
            <small class="pull-right"> <?php echo (isset($_POST['start'])) ? 'Checkedin Date :' .$_POST['start'] : ''; ?> <?php echo (isset($_POST['end'])) ? ' Checkedout Date :' .$_POST['end'] : ''; ?> </small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
   

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12  table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Guest</th>
              <th>Room</th>
              <th>Price</th>
              <th>Arrival</th>
              <th>Departure</th>
              <th>Night(s)</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
             <?php 
	$sql ="SELECT * 
		 FROM  `tblaccomodation` A,  `tblroom` RM,  `tblreservation` RS,  `tblpayment` P,  `tblguest` G
		 WHERE A.`ACCOMID` = RM.`ACCOMID` 
		 AND RM.`ROOMID` = RS.`ROOMID` 
		 AND RS.`CONFIRMATIONCODE` = P.`CONFIRMATIONCODE` 
		 AND P.`GUESTID` = G.`GUESTID`  
		 AND DATE(`ARRIVAL`) >=  '".$_POST['start']."' 
     AND DATE(`DEPARTURE`) <=  '".$_POST['end']."' AND P.STATUS='" .$_POST['categ']."' 
     AND CONCAT( `ACCOMODATION`, ' ', `ROOM` , ' ' , `ROOMDESC`) LIKE '%" .$_POST['txtsearch'] ."%'";
	$mydb->setQuery($sql);
	$res = $mydb->executeQuery();
	$row_count = $mydb->num_rows($res);
	$cur = $mydb->loadResultList();

	   

		if ($row_count >0){
			foreach ($cur as $result) {
          $days =  dateDiff(date($result->ARRIVAL),date($result->DEPARTURE));
             ?>

            <tr> 
              <td><?php echo $result->G_FNAME . ' ' .  $result->G_LNAME;?></td>
              <td><?php echo $result->ACCOMODATION . ' [' .$result->ROOM.']' ;?></td>
              <td> &euro; <?php echo $result->PRICE;?></td>
              <td><?php echo date_format(date_create($result->ARRIVAL),'m/d/Y');?></td>
              <td><?php echo date_format(date_create($result->DEPARTURE),'m/d/Y');?></td>
              <td><?php echo ($days==0) ? '1' : $days;?></td>
              <td> &euro; <?php echo $result->RPRICE;?></td>
            </tr>
            
            
            <?php 
              @$tot += $result->RPRICE;
            } 

            } 
            ?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
       
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Total Amount</p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Total:</th>
                <td > &euro; <?php echo @$tot ; ?></td>
              </tr>
       
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
 
    </section>
    </form>
    <!-- /.content -->
    <div class="clearfix"></div>
 
</div>
<!-- ./wrapper --> 
<script>
  window.onload = function(){
    window.print()
    setTimeout(function(){
      window.close()
    },750)
  }
</script>
</body>
</html> 