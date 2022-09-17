<?php 
require_once("../../includes/initialize.php");
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;
	
	case 'delete' :
	doDelete();
	break;


	}
function doInsert(){
		
	if ($_POST['ACCOMODATION'] == "" OR $_POST['ACCOMDESC'] == "") {
		message("All fields required!", "error");
		redirect("index.php?view=add");

	}else{

		$accomodation = new Accomodation();
		$name	= $_POST['ACCOMODATION'];
		$desc    = $_POST['ACCOMDESC'];

		
		$accomodation->ACCOMODATION =$_POST['ACCOMODATION'];
		$accomodation->ACCOMDESC =  $_POST['ACCOMDESC'];
		
		
		 $istrue = $accomodation->create(); 
		 if ($istrue == 1){
		 	message("New [". $name ."] created successfully!", "success");
		 	redirect('index.php');
		 	
		 }


	}	
}
function doEdit(){
	if ($_POST['ACCOMODATION'] == "" OR $_POST['ACCOMDESC'] == "") {
			message("All fields required!", "error");
			redirect("index.php?view=edit");
		
	}else{

		$accomodation = new Accomodation();
		 
	
		$accomodation->ACCOMODATION =$_POST['ACCOMODATION'];
		$accomodation->ACCOMDESC =  $_POST['ACCOMDESC'];
			
			
			$accomodation->update($_POST['ACCOMID']); 
			
		 	message("New [". $_POST['ACCOMODATION'] ."] Updated successfully!", "success");
		 	redirect('index.php');
			 	
	
		
	}	
		
}

function doDelete(){
	 @$id=$_POST['selector'];
		  $key = count($id);
		//multi delete using checkbox as a selector
		
	for($i=0;$i<$key;$i++){
	 
		$accomodation = new Accomodation();
		$accomodation->delete($id[$i]);
	}

		message("Accomodation already Deleted!","info");
		redirect('index.php');

}

?>