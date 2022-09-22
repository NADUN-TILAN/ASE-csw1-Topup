<?php
require_once("../includes/initialize.php");
$content='home.php';
$view = (isset($_GET['p']) && $_GET['p'] != '') ? $_GET['p'] : '';
$account = 'guest/update.php';
$small_nav = '../theme/small-navbar.php';
switch ($view) {

  case '1' :
    $title="Home";  
    $content='home.php';    
    break;
  case '2' :
    $title="Gallery"; 
    $content ='gallery.php';
    break;
  case '3' :
    $title="About Us";  
    $content = 'about.php';   
    break;
  case 'contact' :
    $title="Contacts";  
    $content ='contact.php';    
    break;
  case 'booking' :
    $title="Book A Room";  
    $content ='bookAroom.php';    
    break;
  case 'accomodation' :
    $title="Accomodation";  
    $content='accomodation.php';
    break;  
  case 'largeview' :
    $content ='largeimg.php';
    break;
  default :
    $title="Profile";  
    $content ='inbox.php';   
}

require_once '../theme/template.php';

?>