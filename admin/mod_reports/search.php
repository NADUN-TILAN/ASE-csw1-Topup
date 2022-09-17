
<div class="container">
	<div class="panel ">
		<div class="panel-body">
		     
		<form class="form-inline" action="" method="post">
		 <div class="form-group">
		 <input class="form-control" size="20" type="text" value="<?php echo isset($_POST['txtsearch']) ? $_POST['txtsearch'] :'' ?>" Placeholder="Search For...." name="txtsearch" id="txtsearch">
		 </div>
		<div class="form-group">
		<h4>Status :: </h4>
		</div>
		  <div class="form-group">
		  <select name="categ" class="form-control">
		  	<option value="Checkedin" <?php echo isset($_POST['categ']) && $_POST['categ'] == 'Checkedin' ? 'selected' :'' ?>>Checkedin</option>
		  	<option value="Checkedout" <?php echo isset($_POST['categ']) && $_POST['categ'] == 'Checkedout' ? 'selected' :'' ?>>Checkedout</option>
		  	<option value="Arrival" <?php echo isset($_POST['categ']) && $_POST['categ'] == 'Arrival' ? 'selected' :'' ?>>Arrival</option>
		  	<option value="Pending" <?php echo isset($_POST['categ']) && $_POST['categ'] == 'Pending' ? 'selected' :'' ?>>Pending</option>
		  	<option value="Confirmed" <?php echo isset($_POST['categ']) && $_POST['categ'] == 'Confirmed' ? 'selected' :'' ?>>Confirmed</option>
		  </select>
		  </div>
		 <div class="form-group">
		<h4>Date Filter :: </h4>
		</div>
		  <div class="form-group">
		 <input class="form-control date start " size="20" type="text" value="<?php echo (isset($_POST['start'])) ? $_POST['start'] : date('Y-m-d'); ?>" Placeholder="Check In" name="start" id="from" data-date="" data-date-format="yyyy-mm-dd" data-link-field="any" data-link-format="yyyy-mm-dd">
		 </div>
		  <div class="form-group">
		    <label class="sr-only" for="exampleInputPassword2">Check Out:</label>
		      <input class="form-control date end " size="20" type="text" value="<?php echo (isset($_POST['end'])) ? $_POST['end'] : date('Y-m-d'); ?>"  name="end" id="end" data-date="" data-date-format="yyyy-mm-dd" data-link-field="any" data-link-format="yyyy-mm-dd">
		  </div>
		  
		  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
		</form>
	


<form  method="post" action="list.php" target="_blank">
<span id="printout">

<table  class="table table-bordered" cellspacing="0">
<thead>
<tr><td colspan="9" align="center"><h1 class="page-header">Monbela Tourist Inn</h1></td></tr>
<tr bgcolor="#999999">
<td ><strong>Guest</strong></td>
<td ><strong>Arrival</strong></td>
<td ><strong>Departure</strong></td>
<td ><strong>Room</strong></td>
<td ><strong>Price</strong></td>
<td ><strong>Nights</strong></td>
<td ><strong>Subtotal</strong></td>
<td ><strong>Status</strong></td>
</tr>
</thead>
<tbody>		
<?php
if(isset($_POST['submit'])){
	// $_SESSION['start']=$_POST['start'];
	// $_SESSION['end']=$_POST['end'];	
	$sql ="SELECT  `G_FNAME`, `G_LNAME`,`ARRIVAL`, `DEPARTURE`,`ROOM`,`ROOMDESC` ,`PRICE` ,`RPRICE`,`STATUS`
	 FROM `tblguest` G,`tblreservation` R, `tblroom` RR 
	 WHERE  G.`GUESTID`=R.`GUESTID` AND R.`ROOMID`=RR.`ROOMID` AND DATE(`ARRIVAL`) >=  '".$_POST['start']."'
	AND DATE(`DEPARTURE`) <=  '".$_POST['end']."' AND STATUS='" .$_POST['categ']."' ";
	$mydb->setQuery($sql);
	$res = $mydb->executeQuery();
	$row_count = $mydb->num_rows($res);
	$cur = $mydb->loadResultList();

		if ($row_count >0){
			foreach ($cur as $result) {
			?>

				<tr >
				<td><?php echo $result->G_FNAME." ".$result->G_LNAME; ?></td>
				<td><?php echo date_format(date_create($result->ARRIVAL),'m/d/Y'); ?></td>
				<td><?php echo date_format(date_create($result->DEPARTURE),'m/d/Y'); ?></td>
				<td><?php echo $result->ROOM . ' ' . $result->ROOMDESC;?></td>
				<td> &#8369 <?php echo $result->PRICE; ?></td>
				<td><?php echo (dateDiff($result->ARRIVAL,$result->DEPARTURE)<=0) ? 1 : dateDiff($result->ARRIVAL,$result->DEPARTURE) ; ?></td>
				<td> &#8369 <?php echo $result->RPRICE; ?></td>
				<td><?php echo $result->STATUS; ?></td>
				</tr>

			<?php 
			@$tot += $result->RPRICE;


		}
			
		}else{

		echo '<tr><td colspan="8" align="center"><h2>Please Enter Then Dates</h2></td></tr>';

		}

	}
?>
</tbody>
<tfoot>
	<tr><b><td colspan="6" align="right"><h4>Total</h4></td><td colspan="2"><h4>  &#8369 <?php echo isset($tot) ? $tot : 0; ?></h4></td></b></tr>
</tfoot>
</table>
</span>
<input type="button" value="Print Report" onclick="tablePrint();" class="btn btn-primary">
</form>
</div>
</div> 

<script>
function tablePrint(){  
    var display_setting="toolbar=no,location=no,directories=no,menubar=no,";  
    display_setting+="scrollbars=no,width=500, height=500, left=100, top=25";  
    var content_innerhtml = document.getElementById("printout").innerHTML;  
    var document_print=window.open("","",display_setting);  
    document_print.document.open();  
    document_print.document.write('<body style="font-family:verdana; font-size:12px;" onLoad="self.print();self.close();" >');  
    document_print.document.write(content_innerhtml);  
    document_print.document.write('</body></html>');  
    document_print.print();  
    document_print.document.close();  
    return false;  
    } 
	$(document).ready(function() {
		oTable = jQuery('#list').dataTable({
		"bJQueryUI": true,
		"sPaginationType": "full_numbers"
		} );
	});		
</script>