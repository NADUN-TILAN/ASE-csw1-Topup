<div class="container">
	<?php
		check_message();
			
		?>
		<!-- <div class="panel panel-primary"> -->
			<div class="panel-body">
				<h3 align="left">List of User</h3>
			    <form action="controller.php?action=delete" Method="POST">  					
					<table id="example" class="table table-striped" cellspacing="0">
					
				  <thead>
				  	<tr >
				  		<th>No.</th>
				  		<th>
				  		 <input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');"> 
				  		 Account Name</th>
				  		<th>Username</th>
				  		<th>Type</th>
						<th>Contact #</th>
				 
				  	</tr>	
				  </thead>
				  <tbody>
				  	<?php 
				  		$mydb->setQuery("SELECT * FROM `tbluseraccount`");
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>';
						echo '<td width="5%" align="center"></td>';
				  		echo '<td><input type="checkbox" name="selector[]" id="selector[]" value="'.$result->USERID. '"/>
				  				<a  href="index.php?view=edit&id='.$result->USERID.'">  <span class="glyphicon glyphicon-pencil">
				  				<a href="index.php?view=edit&id='.$result->USERID.'">' . ' '.$result->UNAME.'</a></td>';
				  		echo '<td>'. $result->USER_NAME.'</td>';
				  		echo '<td>'. $result->ROLE.'</td>';
				  		echo '<td>'. $result->PHONE.'</td>';
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
				
				</table>
				<div class="btn-group">
				  <a href="index.php?view=add" class="btn btn-default">New</a>
				  <button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>
				</div>
				</form>
	  		</div><!--End of Panel Body-->
	  	<!-- </div> -->
	  	<!--End of Main Panel-->

</div><!--End of container-->

