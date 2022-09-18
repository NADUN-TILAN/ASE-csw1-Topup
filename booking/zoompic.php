<?php
require_once '../config/config.php';
if(isset($_GET['id'])){	
	$id=$_GET['id'];
	$result = mysql_query("SELECT * FROM room WHERE roomNo = $id");

while($row = mysql_fetch_array($result))
extract($row);
  {
         if ($roomImage) {
			$image = WEB_ROOT . 'admin/room/' . $roomImage;
                }
                        else {
			$image = WEB_ROOT . 'admin/room/no-image-small.png';
		}
  echo "<img width=300 height=300 alt='Unable to View' src='" .$image."'>";
  }
}
?>
			
