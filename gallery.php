
<style type="text/css">
	#background {
		width: 100%;
		height: 100%;
		padding:1px;	
	}
	#background .stretch {
		width: 100%;
		height: 100%;
		border: 1px solid #ddd; 

	}
</style>


<div id="accom-title"  > 
    <div  class="pagetitle">   
            <h1  ><?php print $title ; ?> 
                 
            </h1> 
        </div> 
  </div>

<div id="bread">
   <ol class="breadcrumb">
      <li><a href="<?php echo WEB_ROOT ;?>index.php">Home</a>
      </li>
      <li class="active"><?php print $title  ; ?></li>
  </ol> 
</div>
<div id="main" class="site-main clr"> 
    <div id="primary" class="content-area clr"> 
        <div id="content-wrap">
        	<div class="row">
				<div class="col-lg-4">
					<div id="background">
						<img class="stretch" src="<?php echo WEB_ROOT; ?>images/SlideShow/images.jpg">
					</div>
				</div>
				<div class="col-lg-4">
					<div id="background">
						<img class="stretch img-hover" src="<?php echo WEB_ROOT; ?>images/SlideShow/header-bg1.jpg">
					</div>
				</div> 
				<div class="col-lg-4">
					<div id="background">
						<img class="stretch img-hover" src="<?php echo WEB_ROOT; ?>images/SlideShow/images.jpg">
					</div>
				</div>
				<div class="col-lg-4">
					<div id="background">
						<img class="stretch img-hover" src="<?php echo WEB_ROOT; ?>images/SlideShow/header-bg1.jpg">
					</div>
				</div>
				<div class="col-lg-4">
					<div id="background">
						<img class="stretch img-hover" src="<?php echo WEB_ROOT; ?>images/SlideShow/images.jpg">
					</div>
				</div>
				<div class="col-lg-4">
					<div id="background">
						<img class="stretch img-hover" src="<?php echo WEB_ROOT; ?>images/SlideShow/header-bg1.jpg">
					</div>
				</div>
			</div>		
        </div>
    </div>
</div>
