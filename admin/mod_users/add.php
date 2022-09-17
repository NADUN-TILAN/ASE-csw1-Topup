
<form class="form-horizontal well span6" action="controller.php?action=add" method="POST">

	<fieldset>
		<legend>New User Account</legend>
											
          
          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "UNAME">Name:</label>

              <div class="col-md-8">
              	<input name="deptid" type="hidden" value="">
                 <input class="form-control input-sm" id="UNAME" name="UNAME" placeholder=
									  "Account Name" type="text" value="">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "USERNAME">Username:</label>

              <div class="col-md-8">
              	<input name="deptid" type="hidden" value="">
                 <input class="form-control input-sm" id="USERNAME" name="USERNAME" placeholder=
									  "Username" type="text" value="">
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
                  <option value="Administrator">Administrator</option>
                    <option value="Guest In-charge">Guest In-charge</option>
                  <!-- <option value="Encoder">Encoder</option> -->
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
                  "Contact #:" type="text" value="">
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
 