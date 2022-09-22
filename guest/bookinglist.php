
<?php
require_once ("../includes/initialize.php");
  if (!isset($_SESSION['GUESTID'])){
      redirect("index.php");
     }

 ?>

 
 
		<table>
			<tr>
			<!-- 	<td align="center"> 
				<img src="../images/images/5page-img1.png"  height="90px" style="-webkit-border-radius:5px; -moz-border-radius:5px;" alt="Image">
        		</td> -->
				<td width="87%" align="center">
				<!-- <h3 >Monbela Tourist Inn</h3> -->
				<h2>List Booked Rooms 
				</h2>
				</td>
			</tr>
		</table>
		<!-- <h2 class="modal-title" id="myModalLabel">Billing Details </h2> -->
		
 
<?php 

		
?> 
		<table id="table" class="fixnmix-table">
			<thead>
				<tr>
					<th align="center" width="120">Room</th>
		              <th align="center" width="120">Check In</th>
		              <th align="center" width="120">Check Out</th> 
		              <th  width="120">Price</th> 
		              <th align="center" width="120">Nights</th>
		              <th align="center" width="90">Amount</th>
				</tr>
				</thead>
				<tbody>
 
				<?php
				 
			 $query="SELECT * 
				FROM  `tblreservation` r,   `tblroom` rm, tblaccomodation a
				WHERE r.`ROOMID` = rm.`ROOMID` 
				AND a.`ACCOMID` = rm.`ACCOMID`  
				AND  r.`GUESTID` = ".$_SESSION['GUESTID'];
				$mydb->setQuery($query);
				$res = $mydb->loadResultList();

foreach ($res as $result) {
		 $day = (dateDiff($result->ARRIVAL,$result->DEPARTURE)>0)?dateDiff($result->ARRIVAL,$result->DEPARTURE):'1';
			 
						echo '<tr>';  
				  		 echo '<td>'. $result->ROOM.' '. $result->ROOMDESC.' </td>';
                        echo '<td>'.date_format(date_create($result->ARRIVAL),"m/d/Y").'</td>';
                        echo '<td>'.date_format(date_create($result->DEPARTURE),"m/d/Y").'</td>';
                        echo '<td > &euro; '. $result->PRICE.'</td>'; 
                        echo '<td>'.$day.'</td>';
                        echo '<td > &euro; '. $result->RPRICE.'</td>';
				  		
				  		echo '</tr>';
				 
				}
				?> 
			</tbody>
	 
       </table>  
 
  