<?php $nav_item = basename(__FILE__);?>
<?php require "./config/config.php" ;?>
<?php //require "./include/header.php" ;             //when i put header her and dont put id i show this message  :  Cannot modify header information - headers already sent by (output started at C:\xampp\htdocs\homeland\include\header.php:90) in  ?>

<?php 

      if (isset($_GET['id']) AND $_GET['id']!=""){
        
        
        $id = $_GET['id'];
        if(filter_var($id, FILTER_VALIDATE_INT)){
          $details = $conn->prepare("SELECT * FROM props where id = '$id'");
          $details->execute();
          if($details->rowCount()){
  
            // so i put header her 
          require "./include/header.php" ;
          
          $allDetails = $details->fetch(PDO::FETCH_OBJ);
  
  
          $gallery=$conn->query("SELECT * from home_images where prop_id = '$allDetails->id'");
          $gallery ->execute();
          $allImages= $gallery->fetchAll(PDO::FETCH_OBJ);
  
  
            
            $related = $conn->query("SELECT * FROM props where home_type = '$allDetails->home_type'
             AND id != $allDetails->id ");
            $related->execute();
            $allRelated = $related->fetchAll(PDO::FETCH_OBJ);
          }else{
            header("location:".APPURL."404.php");
            exit;
          }

        }else{
        header("location:".APPURL); 
     }
       

      }else{

        header("location:".APPURL."404.php");
        exit;

      }




?>

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?php echo APPURL ;?>/images/thumbnail/<?php echo $allDetails->image;?>);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded">Property Details of</span>
            <h1 class="mb-2"><?php echo $allDetails->name;?></h1>
            <p class="mb-5"><strong class="h2 text-success font-weight-bold">$<?php echo number_format($allDetails->price,2,'.',',');?></strong></p>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section site-section-sm">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div>
              <div class="slide-one-item home-slider owl-carousel">
                <?php foreach($allImages as $images):?>
                <div><img src="images/gallery/<?php echo $images->image; ?>" alt="Image" class="img-fluid"></div>
                <?php endforeach ;?>
                
              </div>
            </div>
            <div class="bg-white property-body border-bottom border-left border-right">
              <div class="row mb-5">
                <div class="col-md-6">
                  <strong class="text-success h1 mb-3">$<?php echo number_format($allDetails->price,2,'.',',');?></strong>
                </div>
                <div class="col-md-6">
                  <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
                  <li>
                    <span class="property-specs">Beds</span>
                    <span class="property-specs-number"><?php echo $allDetails->beds;?> <sup>+</sup></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">Baths</span>
                    <span class="property-specs-number"><?php echo $allDetails->baths;?></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">SQ FT</span>
                    <span class="property-specs-number"><?php echo $allDetails->sq_ft;?></span>
                    
                  </li>
                </ul>
                </div>
              </div>
              <div class="row mb-5">
                <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                  <span class="d-inline-block text-black mb-0 caption-text">Home Type</span>
                  <strong class="d-block"><?php echo $allDetails->home_type ;?></strong>
                </div>
                <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                  <span class="d-inline-block text-black mb-0 caption-text">Year Built</span>
                  <strong class="d-block"><?php echo $allDetails->year_built;?></strong>
                </div>
                <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                  <span class="d-inline-block text-black mb-0 caption-text">Price/Sqft</span>
                  <strong class="d-block">$<?php echo $allDetails->price_sqft;?></strong>
                </div>
              </div>
              <h2 class="h4 text-black">More Info</h2>
              <p><?php echo $allDetails->description;?></p>
              
              <div class="row no-gutters mt-5">
                <div class="col-12">
                  <h2 class="h4 text-black mb-3">Gallery</h2>
                </div>

                <?php foreach($allImages as $images):?>
                <div class="col-sm-6 col-md-4 col-lg-3">
                  <a href="images/gallery/<?php echo $images->image; ?>" class="image-popup gal-item"><img src="images/gallery/<?php echo $images->image; ?>" alt="Image" class="img-fluid"></a>
                </div>
                <?php endforeach ;?>

              </div>
            </div>
          </div>
          <div class="col-lg-4">
           

            <div class="bg-white widget border rounded">

        
              <h3 class="h4 text-black widget-title mb-3">Contact Agent</h3>
              <?php 

                if(isset($_SESSION['id'])):
                  
                  $check = $conn->query("SELECT * from contact where home_id= {$_GET['id']} AND user_id = {$_SESSION['id']} ");
                $check->execute();
                $fetch=$check->fetch(PDO::FETCH_OBJ);
                if($check->rowCount() ):
                  echo "<p> you have being contact us . </p>";

                else:
            
            
              ?>
              <form action="<?php echo APPURL ?>requests/contact.php" method="POST" class="form-contact-agent">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name ="name" value = "<?php (isset($_SESSION['username']))? print $_SESSION['username']:print'';?> " id="name" class="form-control">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" value = "<?php (isset($_SESSION['username']))? print $_SESSION['email']:print'';?>" id="email" class="form-control">
                </div>
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" name="phone"  id="phone" class="form-control">
                </div>
                <input type="hidden"  name="id" value="<?php echo $allDetails->id;?>" >
                <input type="hidden"  name="admin_name" value="<?php echo $allDetails->admin_name;?>" >

                <div class="form-group">
                  <input type="submit"  name="submit" id="phone" class="btn btn-primary" value="Send Message">
                </div>
              </form>
               <?php 
                endif;

                else :
                  echo "<p> Login first to contact the owner . </p>";

                endif;
            
            
                ?>
            </div>

            
            <div class="bg-white widget border rounded">
              <h3 class="h4 text-black widget-title mb-3 ml-0">Share</h3>
                  <div class="px-3" style="margin-left: -15px;">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo APPURL ."property-details.php?id=$id"?>&quote=Wonderful house " class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                    <a  href="https://twitter.com/intent/tweet?text=Wonderful house  &url=<?php echo APPURL ."property-details.php?id=$id"?>" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo APPURL ."property-details.php?id=$id"?>" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>    
                  </div>            
            </div>

            <?php if(isset($_SESSION['id'])):

              $check = $conn->query("SELECT * from fav where home_id= {$_GET['id']} AND client_id = {$_SESSION['id']} ");
              $check->execute();
              $fetch=$check->fetch(PDO::FETCH_OBJ);
              if($check->rowCount() AND $fetch->status ):
            ?>
              
                <div class="bg-white widget border rounded">

                  <form action="<?php echo APPURL ?>requests/fav.php" method="POST" class="form-contact-agent">
                  
                      <input type="hidden"  name="id" value="<?php echo $allDetails->id;?>" >
                    <div class="form-group">
                      <input type="submit" name="submit" class="btn btn-primary" value="Delete from favorite">
                    </div>
                  </form>
                </div>
            <?php else:?>
                
                <div class="bg-white widget border rounded">

                  <form action="<?php echo APPURL ?>requests/fav.php" method="POST" class="form-contact-agent">
                  
                    <div class="form-group">
                      <input type="hidden"  name="id" value="<?php echo $allDetails->id;?>" >
                    </div>
                    <div class="form-group">
                      <input type="submit" name="submit" class="btn btn-primary" value="Add to favorite">
                    </div>
                  </form>
                </div>
            <?php   endif;
                  endif;
            ?>


          
        </div>
      </div>
    </div>

    <div class="site-section site-section-sm bg-light">
      <div class="container">
        

        <div class="row">
          <div class="col-12">
            <div class="site-section-title mb-5">
              <h2>Related Properties</h2>
            </div>
          </div>
        </div>
      
        <div class="row mb-5">

              <?php foreach($allRelated as $item):?>
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="property-entry h-100">
              <a href="<?php echo APPURL ."property-details.php?id=$item->id"?>" class="property-thumbnail">
                <div class="offer-type-wrap">
                  <span class="offer-type bg-<?php ($item->offers == "RENT")? print "success":(($item->offers == "SALE")? 
                          print "danger" : print"info");?>"><?php echo $item->offers?></span>
                </div>
                <img src="images/<?php echo $item->image?>" alt="Image" class="img-fluid">
              </a>
              <div class="p-4 property-body">
                <h2 class="property-title"><a href="<?php echo APPURL ."property-details.php?id=$item->id"?>"><?php echo $item->name; ?>"</a></h2>
                <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> <?php echo $item->location;?></span>
                <strong class="property-price text-primary mb-3 d-block text-success">$<?php echo number_format($item->price,2,'.',',')?></strong>
                <ul class="property-specs-wrap mb-3 mb-lg-0">
                  <li>
                    <span class="property-specs">Beds</span>
                    <span class="property-specs-number"><?php echo $item->beds;?> <sup>+</sup></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">Baths</span>
                    <span class="property-specs-number"><?php echo $item->baths;?></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">SQ FT</span>
                    <span class="property-specs-number"><?php echo $item->sq_ft;?></span>
                    
                  </li>
                </ul>

              </div>
            </div>
          </div>
          <?php endforeach;?>

        </div>
      </div>

<?php require "./include/footer.php" ;?>
