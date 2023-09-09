<?php  $nav_item= basename(__FILE__);?>
<?php require "./includes/header.php";?>
<?php require "./config/config.php"?>

    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/image_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.php">Home <i class="fa fa-chevron-right"></i></a></span> <span>Services <i class="fa fa-chevron-right"></i></span></p>
            <h1 class="mb-0 bread">Services</h1>
          </div>
        </div>
      </div>
    </section>
   
    <section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row">
          <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
            <div class="d-block services-wrap text-center">
              <div class="img" style="background-image: url(images/services-1.jpg);"></div>
              <div class="media-body py-4 px-3">
                <h3 class="heading">Map Direction</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                <p><a href="#" class="btn btn-primary">Read more</a></p>
              </div>
            </div>      
          </div>
          <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
            <div class="d-block services-wrap text-center">
              <div class="img" style="background-image: url(images/services-2.jpg);"></div>
              <div class="media-body py-4 px-3">
                <h3 class="heading">Accomodation Services</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                <p><a href="#" class="btn btn-primary">Read more</a></p>
              </div>
            </div>    
          </div>
          <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
            <div class="d-block services-wrap text-center">
              <div class="img" style="background-image: url(images/image_2.jpg);"></div>
              <div class="media-body py-4 px-3">
                <h3 class="heading">Great Experience</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                <p><a href="#" class="btn btn-primary">Read more</a></p>
              </div>
            </div>      
          </div>
        </div>
    	</div>
    </section>

    <section class="ftco-section bg-light ftco-no-pt">
			<div class="container">
				<div class="row no-gutters justify-content-center pb-5 mb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2>Amenities</h2>
          </div>
        </div>
				<div class="row">
        <?php  foreach ($allUtilities as $utility):?>
          <div class="services-2 col-md-3 d-flex w-100 ftco-animate">
            <div class="icon d-flex justify-content-center align-items-center">
          		<span class="<?php echo $utility->icon;?>"></span>
            </div>
            <div class="media-body pl-3">
              <h3 class="heading"><?php echo $utility->name;?></h3>
              <p><?php echo $utility->description;?></p>
            </div>
          </div> 
         <?php  endforeach;?>
        </div>  
			</div>
		</section>
		<?php require "./includes/footer.php";?>
