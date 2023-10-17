<?php $nav_item = basename(__FILE__);?>
<?php require "../config/config.php" ;?>
<?php require "../include/header.php" ;

if (isset($_SESSION['id'])){


$select_props = $conn->prepare("SELECT * FROM props JOIN fav ON props.id = fav.home_id where fav.client_id={$_SESSION['id']} AND fav.status=1;");
$select_props->execute();
$props=$select_props->fetchAll(PDO::FETCH_OBJ );
}else {
    header("location:".APPURL);
    exit;
}

?>

<div class ="site-wrap">

        <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?php echo APPURL?>images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <h1 class="mb-2">your Favorites</h1>
                </div>
                </div>
            </div>
        </div>


        <div class="site-section site-section-sm pb-0">
        <div class="container">
        <div class="row">
        <div class="row mb-5">

           <?php 
           if($select_props->rowCount()==0){

            echo "<h1 class='col-md-10'>you don't have any fevorites home yet .</h1>";

           }
           
           foreach($props as $prop):?>

          <div class="col-md-6 col-lg-4 mb-4">
            <div class="property-entry h-100">
              <a href="<?php echo APPURL ."property-details.php?id=$prop->home_id"?>" class="property-thumbnail">
                <div class="offer-type-wrap">
                  <span class="offer-type bg-<?php ($prop->offers == "RENT")? print "success":(($prop->offers == "SALE")? 
                          print "danger" : print"info");?>"><?php echo $prop->offers?> </span>
                 
                </div>
                <img src="<?php  echo  APPURL ?>images/<?php echo $prop->image ;?>" alt="Image" class="img-fluid">
              </a>
              <div class="p-4 property-body">
                
                <h2 class="property-title"><a href="<?php echo APPURL ."property-details.php?id=$prop->id"?>"><?php echo $prop->name;?></a></h2>
                <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> <?php echo $prop->location ;?></span>
                <strong class="property-price text-primary mb-3 d-block text-success">$<?php echo number_format($prop->price,2,'.',',') ;?></strong>
                <ul class="property-specs-wrap mb-3 mb-lg-0">
                  <li>
                    <span class="property-specs">Beds</span>
                    <span class="property-specs-number"><?php echo $prop->beds ;?> <sup>+</sup></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">Baths</span>
                    <span class="property-specs-number"><?php echo $prop->baths ;?></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">SQ FT</span>
                    <span class="property-specs-number"><?php echo $prop->sq_ft ;?></span>
                    
                  </li>
                </ul>

              </div>
            </div>
          </div>
            <?php endforeach;?>

            
        </div>
        </div>
        </div>
        </div>
     
        

</div>
    

    <?php require "../include/footer.php" ;?>
