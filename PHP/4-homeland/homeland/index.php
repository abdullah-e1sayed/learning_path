
<?php $nav_item = basename(__FILE__);?>
<?php require "./config/config.php" ;?>
<?php require "./include/header.php" ;?>
<?php 

    if(isset($_GET['price'])){
      foreach($_GET as $key=> $price_sort ){
        $order = $key;       

        $sort =$price_sort ;
      }

    }else{
      $order = 'name';
      $sort= '';

    }

    if(isset($_GET['offers'])){

      $offers_type = $_GET['offers'];
      
      $select_props = $conn->prepare("SELECT * from props where offers = '$offers_type'order by $order $sort   ;");
      $select_props->execute();
      $props=$select_props->fetchAll(PDO::FETCH_OBJ );

    }elseif(isset($_GET['home_type'])){
      $home_type = $_GET['home_type'];
      
      $select_props = $conn->prepare("SELECT * from props where home_type = '$home_type'order by $order $sort   ;");
      $select_props->execute();
      $props=$select_props->fetchAll(PDO::FETCH_OBJ );


    }elseif(isset($_POST['submit'])){
      if(isset($_POST['home_type']) AND isset($_POST['offers']) AND isset($_POST['city'])){
        
        $home_type=$_POST['home_type'];
        $offers=$_POST['offers'];
        $city=$_POST['city'];

        $select_props=$conn->prepare("SELECT * from props 
        where home_type	like '%$home_type$'or offers like '%$offers%'  or location like'%$city%' order by $order $sort ; ");
        $select_props->execute();
        $props=$select_props->fetchAll(PDO::FETCH_OBJ);

      }
    }else{
      $select_props = $conn->query("SELECT * from props order by $order $sort ;");
      $select_props->execute();
      $props=$select_props->fetchAll(PDO::FETCH_OBJ );
    }

    

?>


    <div class="slide-one-item home-slider owl-carousel">
<?php  foreach($props as $prop): ?>

      <div class="site-blocks-cover overlay" style="background-image: url(images/thumbnail/<?php echo $prop->image; ?>);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
              <span class="d-inline-block bg-<?php ($prop->offers == "RENT")? print "success":(($prop->offers == "SALE")? 
              print "danger" : print"info");?> text-white px-3 mb-3 property-offer-type rounded">For <?php echo $prop->offers; ?></span>
              <h1 class="mb-2"><?php echo $prop->name; ?></h1>
              <p class="mb-5"><strong class="h2 text-success font-weight-bold">$<?php echo number_format($prop->price , 2, '.' , ',' ); ?></strong></p>
              <p><a href="<?php echo APPURL ."property-details.php?id=$prop->id"?>" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2">See Details</a></p>
            </div>
          </div>
        </div>
      </div>  
      <?php endforeach;?> 

    </div>


    <div class="site-section site-section-sm pb-0">
      <div class="container">
        <div class="row">

          <form class="form-search col-md-12" method="POST" action="index.php" style="margin-top: -100px;">
            <div class="row  align-items-end">

              <div class="col-md-3">
                <label for="list-types">Listing Types</label>
                <div class="select-wrap">
                  <span class="icon icon-arrow_drop_down"></span>
                  <select name="home_type" id="list-types" class="form-control d-block rounded-0">
                    
                  <?php foreach($allProperties as $property):?>

                    <option value="<?php echo $property->name;?>"><?php echo str_replace('-',' ',$property->name);?></option>
                    <?php endforeach ;?>

                    
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <label for="offer-types">Offer Type</label>
                <div class="select-wrap">
                  <span class="icon icon-arrow_drop_down"></span>
                  <select name="offers" id="offer-types" class="form-control d-block rounded-0">
                    
                  <?php foreach($allSearchOffer as $item):?>

                    <option value="<?php echo $item->name;?>"><?php echo $item->name;?></option>
                    
                    <?php endforeach ;?>

                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <label for="select-city">Select City</label>
                <div class="select-wrap">
                  <span class="icon icon-arrow_drop_down"></span>
                  <select name="city" id="select-city" class="form-control d-block rounded-0">

                  <?php foreach($allSearchCity as $select_city):?>

                    <option value="<?php echo $select_city->name;  ?>"><?php echo $select_city->name;  ?></option>
                    
                    <?php endforeach ;?>

                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <input type="submit" name ="submit" class="btn btn-success text-white btn-block rounded-0" value="Search">
              </div>
            </div>
          </form>
        </div>  

        <div class="row">
          <div class="col-md-12">
            <div class="view-options bg-white py-3 px-3 d-md-flex align-items-center">
              
             <div class="ml-auto d-flex align-items-center">
                <div>
                  <a href="./" class="view-list px-3 border-right <?php if(empty($_GET )){echo 'active';}?>">All</a>
                  <a href="index.php?offers=RENT" class="view-list px-3 border-right <?php if(isset($_GET['offers'] )
                   AND $_GET['offers'] == "RENT"){echo 'active';}?>">Rent</a>
                  <a href="index.php?offers=SALE" class="view-list px-3 <?php if(isset($_GET['offers'] )
                   AND $_GET['offers'] == "SALE"){echo 'active';}?>">Sale</a>
                  <a href="<?php (basename($_SERVER['REQUEST_URI'])==='index.php' OR basename($_SERVER['REQUEST_URI'])=='homeland' )?print $_SERVER['REQUEST_URI'].'?price=ASC'
                  : print $_SERVER['REQUEST_URI'].'&price=ASC';?>" class="view-list px-3 <?php if(isset($_GET['price'] )
                  AND $_GET['price'] === "ASC"){echo 'active';}?>">Price Ascending</a>
                  <a href="<?php (basename($_SERVER['REQUEST_URI'])=='index.php' OR basename($_SERVER['REQUEST_URI'])=='homeland' )?print $_SERVER['REQUEST_URI'].'?price=ASC'
                  : print $_SERVER['REQUEST_URI'].'&price=DESC';?>" class="view-list px-3 <?php if(isset($_GET['price'] )
                  AND $_GET['price'] === "DESC"){echo 'active';}?>">Price Descending</a>
                </div>


              </div>
            </div>
          </div>
        </div>
       
      </div>
    </div>

    <div class="site-section site-section-sm bg-light">
      <div class="container">
      
        <div class="row mb-5">

           <?php  foreach($props as $prop):?>

          <div class="col-md-6 col-lg-4 mb-4">
            <div class="property-entry h-100">
              <a href="<?php echo APPURL ."property-details.php?id=$prop->id"?>" class="property-thumbnail">
                <div class="offer-type-wrap">
                  <span class="offer-type bg-<?php ($prop->offers == "RENT")? print "success":(($prop->offers == "SALE")? 
                          print "danger" : print"info");?>"><?php echo $prop->offers?> </span>
                 
                </div>
                <img src="images/thumbnail/<?php echo $prop->image ;?>" alt="Image" class="img-fluid">
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

    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 text-center">
            <div class="site-section-title">
              <h2>Why Choose Us?</h2>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis maiores quisquam saepe architecto error corporis aliquam. Cum ipsam a consectetur aut sunt sint animi, pariatur corporis, eaque, deleniti cupiditate officia.</p>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-4">
            <a href="#" class="service text-center">
              <span class="icon flaticon-house"></span>
              <h2 class="service-heading">Research Subburbs</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt iure qui natus perspiciatis ex odio molestia.</p>
              <p><span class="read-more">Read More</span></p>
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <a href="#" class="service text-center">
              <span class="icon flaticon-sold"></span>
              <h2 class="service-heading">Sold Houses</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt iure qui natus perspiciatis ex odio molestia.</p>
              <p><span class="read-more">Read More</span></p>
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <a href="#" class="service text-center">
              <span class="icon flaticon-camera"></span>
              <h2 class="service-heading">Security Priority</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt iure qui natus perspiciatis ex odio molestia.</p>
              <p><span class="read-more">Read More</span></p>
            </a>
          </div>
        </div>
      </div>
    </div>

<?php require "./include/footer.php" ;?>
    