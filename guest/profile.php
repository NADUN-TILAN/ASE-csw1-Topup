<?php 
require_once("../includes/initialize.php");

  
$guest = New Guest();
$res = $guest->single_guest($_SESSION['GUESTID']);


?>

 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        My Account 
        <small>Account Details</small>
      </h1> 
    </section>

  <form class="form-horizontal" action="<?php echo WEB_ROOT; ?>guest/update.php" method="post" onsubmit="return personalInfo()" name="personal" >
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
                        "city">CITY:</label>

                        <div class="col-md-8">
                          <input name="city" type="text" value="<?php echo $res->G_CITY; ?>" class="form-control input-sm" id="city" />
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

                      <div class="form-group  ">
                      <div class="col-md-10">
                        <label class="col-md-4 control-label" for=
                        "dbirth">DATE OF BIRTH:</label>

                        <div class="col-md-8 input-group">
                           <input type="text" data-date="" data-date-format="yyyy-mm-dd" data-link-field="any" 
                                 data-link-format="yyyy-mm-dd"
                                 name="dbirth" id="dbirth" 
                                 value="<?php echo  date($res->DBIRTH); ?>" 
                                  readonly="true" class="dbirth form-control  input-sm">
                          <span class="input-group-btn">
                              <i class="fa  fa-calendar" ></i> 
                          </span> 
                        </div>
                      </div>
                    </div>

                     <div class="form-group">
                      <div class="col-md-10">
                        <label class="col-md-4 control-label" for=
                        "phone">PHONE:</label>

                        <div class="col-md-8">
                          <input name="phone" type="text" value="<?php echo $res->G_PHONE; ?>" class="form-control input-sm" id="phone" />
                        </div>
                      </div>
                     </div>

                     <div class="form-group">
                      <div class="col-md-10">
                        <label class="col-md-4 control-label" for=
                        "nationality">NATIONALITY:</label>

                        <div class="col-md-8">
                          <input name="nationality" type="text" value="<?php echo $res->G_NATIONALITY; ?>" class="form-control input-sm" id="nationality" />
                        </div>
                      </div>
                    </div>
                   
                       <div class="form-group">
                      <div class="col-md-10">
                        <label class="col-md-4 control-label" for=
                        "company">COMPANY:</label>

                        <div class="col-md-8">
                          <input name="company" type="text" value="<?php echo $res->G_COMPANY; ?>" class="form-control input-sm" id="company" />
                        </div>
                      </div>
                    </div>
                        <div class="form-group">
                      <div class="col-md-10">
                        <label class="col-md-4 control-label" for=
                        "caddress">ADDRESS:</label>

                        <div class="col-md-8">
                          <input name="caddress" type="text" value="<?php echo $res->G_CADDRESS; ?>" class="form-control input-sm" id="caddress" />
                        </div>
                      </div>
                    </div>
              
                   
                     <!--  <div class="form-group">
                      <div class="col-md-10">
                        <label class="col-md-4 control-label" for=
                        "username">USERNAME:</label>

                        <div class="col-md-8">
                          <input name="username" type="text" value="<?php echo $res->G_UNAME; ?>" class="form-control input-sm" id="username" />
                        </div>
                      </div>
                     </div>
            
                    <div class="form-group">
                      <div class="col-md-10">
                        <label class="col-md-4 control-label" for=
                        "password">PASSWORD:</label>

                        <div class="col-md-8">
                          <input name="pass" type="password" class="form-control input-sm" id="password" />
                        </div>
                      </div>
                    </div> -->


                    <div class="form-group">
                      <div class="col-md-10">
                        <label class="col-md-4 control-label" for=
                        "zip">ZIP CODE:</label>

                        <div class="col-md-8">
                          <input name="zip" type="text" value="<?php echo $res->ZIP; ?>" class="form-control input-sm" id="zip" />
                        </div>
                      </div>
                    </div> 
 
            </div>  
     
              </div>
              <!-- /.mail-box-messages -->
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
          </div>
          <!-- /. box --> 
    </section>
    <!-- /.content -->
  </form>
  <script type="text/javascript">
 $('.date_pickerfrom').datetimepicker({
  format: 'mm/dd/yyyy',
   startDate : '01/01/2000', 
    language:  'en',
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1, 
    startView: 2,
    minView: 2,
    forceParse: 0 

    });


$('.date_pickerto').datetimepicker({
  format: 'mm/dd/yyyy',
   startDate : '01/01/2000', 
    language:  'en',
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1, 
    startView: 2,
    minView: 2,
    forceParse: 0   

    });



$(document).ready( function() {

    $('.gallery-item').hover( function() {
        $(this).find('.img-title').fadeIn(400);
    }, function() {
        $(this).find('.img-title').fadeOut(100);
    });
  
});



$('.dbirth').datetimepicker({
  format: 'mm/dd/yyyy',
   startDate : '01/01/1960', 
    language:  'en',
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1, 
    startView: 2,
    minView: 2,
    forceParse: 0   

    });



  //Validates Personal Info
        function personalInfo(){
        var a=document.forms["personal"]["name"].value;
        var b=document.forms["personal"]["last"].value;
        var c=document.forms["personal"]["city"].value;
        var d=document.forms["personal"]["address"].value;
        var e=document.forms["personal"]["dbirth"].value;  
        var f=document.forms["personal"]["zip"].value; 
        var g=document.forms["personal"]["phone"].value;
        var h=document.forms["personal"]["username"].value;
        var i=document.forms["personal"]["password"].value;


        // var atpos=f.indexOf("@");
        // var dotpos=f.lastIndexOf(".");
        // if (atpos<1 || dotpos<atpos+2 || dotpos+2>=f.length)
        //   {
        //   alert("Not a valid e-mail address");
        //   return false;
        //   }
        // if( f != g ) {
        // alert("email does not match");
        //   return false;
        // }
         if (document.personal.condition.checked == false)
        {
        alert ('pls. agree the term and condition of this hotel');
        return false;
        }
        if ((a=="Firstname" || a=="") || (b=="lastname" || b=="") || (c=="City" || c=="") || (d=="address" || d=="") || (e=="dateofbirth" || e=="") || (f=="Zip" || f=="") || (g=="Phone" || g=="")|| (h=="username" || h=="") || (j=="password" || j==""))
          {
          alert("all field are required!");
          return false;
          }


   
        
        // else
        // {
        // return true;
        // }

        }
</script>