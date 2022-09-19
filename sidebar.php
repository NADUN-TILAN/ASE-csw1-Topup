 <style type="text/css">
 .a a {
  color:white;
 }
  .a li {
  list-style: none;
 }
 /* .a  a:hover{
      color: blue;
    }*/
 </style>
<form method="POST" action="index.php?p=accomodation&q=<?php echo isset($_GET['q']) ? $_GET['q'] : ''; ?>">
<div id="sidebarRight-wrap">   
        <div class="row">
          <div class="col-md-10 block">
            <h3> Book a Room</h3> 
          </div> 
        </div> 

        <div class="row">
          <div class="col-md-10">
            
                <div class="form-group input-group"> 
                  <label>Arrival</label> 
                  <input type="text" data-date="" data-date-format="yyyy-mm-dd" data-link-field="any" 
                           data-link-format="yyyy-mm-dd"
                           name="arrival" id="date_pickerfrom"  
                           value="<?php echo isset($_POST['arrival']) ? $_POST['arrival'] : date('m/d/Y');?>"
                            readonly="true" class="date_pickerfrom input-sm form-control">
                  <span class="input-group-btn">
                      <i class="date_pickerto fa  fa-calendar" ></i> 
                  </span>
                </div>

          </div> 
        </div>

        <div class="row">
          <div class="col-md-10">
             <div class="form-group input-group"> 
                <label>Departure</label> 
                <input type="text" data-date="" data-date-format="yyyy-mm-dd" data-link-field="any" 
                       data-link-format="yyyy-mm-dd"
                       name="departure" id="date_pickerto" 
                       value="<?php echo isset($_POST['departure']) ? $_POST['departure'] : date('m/d/Y');?>" 
                        readonly="true" class="date_pickerto form-control  input-sm">
                <span class="input-group-btn">
                    <i class="date_pickerto fa  fa-calendar" ></i> 
                </span> 
             </div>
          </div> 
        </div> 

        <div class="row">
          <div class="col-md-10">
                <div class="form-group input-group">
                   <label>Person</label> 
                   <select class=" form-control input-sm " name="person" id="person">
                  <?php $sql ="SELECT distinct(`NUMPERSON`) as 'NumberPerson' FROM `tblroom`";
                     $mydb->setQuery($sql);
                   $cur = $mydb->loadResultList(); 
                      foreach ($cur as $result) { 
                        echo '<option value='.$result->NumberPerson.'>'.$result->NumberPerson.'</option>';
                      }
                  ?>
                      

                  </select> 
              </div>
          </div> 
        </div> 


        <div class="row">
          <div class="col-md-10">
             <button class="btn dragonhouse-btn  btn-primary btn-sm " name="booknowA" type="submit" id="booknowA" >Check Availability </button>
             
          </div> 
        </div>  
 
</div> 
</form> 
<br/>
<div id="sidebarRight-wrap">  
   <div class="descRoom">
           <div class="row">
          <div class="col-md-10 block">
            <h3>Types of Rooms</h3> 
          </div> 
        </div> 
              <ul  class="a"> 
                <?php
                    $query = "SELECT distinct(ROOM) FROM `tblroom` ";
                   $mydb->setQuery($query);
                   $cur = $mydb->loadResultList();  
                      ?>
                      
                <?php  foreach ($cur as $result) { ?>
                 <li><a href="<?php echo WEB_ROOT; ?>index.php?p=rooms&q=<?php echo $result->ROOM; ?>" ><p ><?php echo $result->ROOM; ?></p></a></li> 
                <?php  } ?>
                          
             
              </ul>
          </div>
     </div>