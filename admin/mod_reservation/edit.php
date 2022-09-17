<?php 
require_once("../../includes/initialize.php");


if (isset($_POST['submit'])) {
  # code...
      $sql = "UPDATE `tblreservation` SET `TRANSDATE`='".date_format(date_create($_POST['TRANSDATE']),'Y-m-d h:i')."', `CONFIRMATIONCODE`='".$_POST['CONFIRMATIONCODE']."', `STATUS`='".$_POST['STATUS']."' WHERE `CONFIRMATIONCODE` ='" . $_GET['code'] ."'";
      $mydb->setQuery($sql);
      $mydb->executeQuery(); 

      $guest = New Guest();
      $guest->G_FNAME          = $_POST['name'];    
      $guest->G_LNAME          = $_POST['last'];  
      $guest->G_ADDRESS        = $_POST['address'] ;   
      $guest->update($_GET['id']); 
      message("Reservation has been updated!", "success");
      redirect("index.php");
}
  
$guest = New Guest();
$res = $guest->single_guest($_GET['id']);

?>

<h1 align="center">Edit Reservation</h1>

<form class="form-horizontal" action="" method="post" onsubmit="return personalInfo()" name="personal" >
    <!-- Main content -->
    <section class="content">

      <div class="row">
 
        <!-- /.col -->
        <div class="col-md-12">
          <div class="box box-primary">
    <br/>
       
            <!-- /.box-header -->
            <div class="box-body no-padding">
 
              <div class="table-responsive mailbox-messages">
     <div><h2>Guest Information</h2></div>
                <div class="form-group">
                      <div class="col-md-10">
                        <label class="col-md-4 control-label" for=
                        "name">FIRST NAME:</label>

                        <div class="col-md-8">
                          <input name="" type="hidden">
                          <input name="name" type="text"  value="<?php echo $res->G_FNAME; ?>"class="form-control input-sm" id="name" />
                        </div>
                      </div>
                    </div>  

                      <div class="form-group">
                      <div class="col-md-10">
                        <label class="col-md-4 control-label" for=
                        "last">LAST NAME:</label>

                        <div class="col-md-8">
                          <input name="last" type="text" value="<?php echo $res->G_LNAME; ?>" class="form-control input-sm" id="last" />
                        </div>
                      </div>
                    </div> 

                     <div class="form-group">
                      <div class="col-md-10">
                        <label class="col-md-4 control-label" for=
                        "address">ADDRESS:</label>

                        <div class="col-md-8">
                          <input name="address" type="text" value="<?php echo $res->G_ADDRESS; ?>" class="form-control input-sm" id="address" />
                        </div>
                      </div>
                    </div> 

     <div><h2>Reservation Details</h2></div>
     <?php
$code = $_GET['code'];

$query="SELECT * 
        FROM  `tblreservation` WHERE  `CONFIRMATIONCODE` = '".$code."'";
$mydb->setQuery($query);
$res = $mydb->loadSingleResult();
?>
<!-- 3f84uq -->

                    <div class="form-group">
                      <div class="col-md-10">
                        <label class="col-md-4 control-label" for=
                        "TRANSDATE">Transaction Date:</label>
                        <div class="col-md-8">
                        <div class="input-group " >  
                        <div class="input-group-addon"> 
                              <i class="fa fa-calendar"></i>
                            </div>
                        <input id="datemask2" name="TRANSDATE"  value="<?php echo date_format(date_create($res->TRANSDATE),'m/d/Y H:m'); ?>" type="text" class="form-control input-sm datemask2"   data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required>
           
                        </div>     
 
                         </div>
                      </div>
                    </div> 
                    <div class="form-group">
                      <div class="col-md-10">
                        <label class="col-md-4 control-label" for=
                        "CONFIRMATIONCODE">Confirmation Code:</label>

                        <div class="col-md-8">
                          <input name="CONFIRMATIONCODE" type="text" value="<?php echo $res->CONFIRMATIONCODE; ?>" class="form-control input-sm" id="CONFIRMATIONCODE" />
                        </div>
                      </div>
                    </div> 
                    <div class="form-group">
                      <div class="col-md-10">
                        <label class="col-md-4 control-label" for=
                        "STATUS">Status:</label>

                        <div class="col-md-8">
                          <input name="STATUS" type="text" value="<?php echo $res->STATUS; ?>" class="form-control input-sm" id="STATUS" />
                        </div>
                      </div>
                    </div> 
                     <!-- /.box-body -->
            
            <div class="box-footer no-padding"> 
                <div class="pull-right"> 
                  <div class="btn-group">
                   <input name="submit" type="submit" value="Save"  class="btn btn-primary" onclick="return personalInfo();"/>
                     </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
   
     
              </div>
              <!-- /.mail-box-messages -->
            </div>
           
            </div>
          </div>
          <!-- /. box --> 
          </div>
    </section>
    <!-- /.content -->
  </form>