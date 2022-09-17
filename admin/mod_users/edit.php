<?php

$_SESSION['id']=$_GET['id'];
$user = new User();
$res = $user->single_user($_SESSION['id']);


 
?>

<form class="form-horizontal well span6" action="controller.php?action=edit" method="POST">

	<fieldset>
		<legend>New User Account</legend>
											
          
          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "UNAME">Name:</label>

              <div class="col-md-8">
              	<input name="USERID" type="hidden" value="<?php echo $res->USERID; ?>">
                 <input class="form-control input-sm" id="UNAME" name="UNAME" placeholder=
									  "Account Name" type="text" value="<?php echo $res->UNAME; ?>">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "USERNAME">Username:</label>

              <div class="col-md-8"> 
                 <input class="form-control input-sm" id="USERNAME" name="USERNAME" placeholder=
									  "Username" type="text" value="<?php echo $res->USER_NAME; ?>">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "UPASS">Password:</label>

              <div class="col-md-8">
              	<input name="deptid" type="hidden" value="">
                 <input class="form-control input-sm" id="UPASS" name="UPASS" placeholder=
									  "Account Password" type="Password" value="">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "ROLE">Role:</label> 
              <div class="col-md-8">
                <select class="form-control input-sm" name="ROLE" id="ROLE">
                  <option <?php echo ($res->ROLE=='Administrator') ? 'SELECTED' : '';  ?> value="Administrator">Administrator</option>
                  <option <?php echo ($res->ROLE=='Guest In-charge') ? 'SELECTED' : ''; ?> value="Guest In-charge">Guest In-charge</option>
                 </select> 
              </div>
            </div>
          </div>

        <div class="form-group">
          <div class="col-md-8">
            <label class="col-md-4 control-label" for=
            "Contact #:">Contact #::</label>

            <div class="col-md-8">
              <input name="deptid" type="hidden" value="">
               <input class="form-control input-sm" id="PHONE" name="PHONE" placeholder=
                  "Contact #:" type="text" value="<?php echo $res->PHONE; ?>">
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
 