
<?php

$_SESSION['id']=$_GET['id'];
$rm = new Accomodation();
$result = $rm->single_accomodation($_SESSION['id']);

?>
<form class="form-horizontal well span6" action="controller.php?action=edit" method="POST">

	<fieldset>
		<legend>Update Accomodation</legend>
											
          
          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "ACCOMODATION">Name:</label>

              <div class="col-md-8">
              		<input name="ACCOMID" type="hidden" value="<?php echo $result->ACCOMID; ?>">
                 <input class="form-control input-sm" id="ACCOMODATION" name="ACCOMODATION" placeholder=
									  "Account Name" type="text" value="<?php echo $result->ACCOMODATION; ?>">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "ACCOMDESC">Description:</label>

              <div class="col-md-8">
                   <input class="form-control input-sm" id="ACCOMDESC" name="ACCOMDESC" placeholder=
									  "Description" type="text" value="<?php echo $result->ACCOMDESC; ?>">
              </div>
            </div>
          </div>

		 <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "idno"></label>

              <div class="col-md-8">
                <button class="btn btn-primary" name="save" type="submit" >Save</button>
              </div>
            </div>
          </div>

			
	</fieldset>	


</form>


</div><!--End of container-->
			

<?php unset($_SESSION['id']) ?>