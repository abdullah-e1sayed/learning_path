<?php $nav_item = basename(__FILE__);?>
<?php require "../config/config.php" ;?>
<?php require "./h&f/header.php"?>
<?php 

$props = $conn->query("SELECT count(*) as num_props from props");
$props->execute();
$prop = $props->fetch(PDO::FETCH_OBJ);

$properties = $conn->query("SELECT count(*) as num_properties from properties");
$properties->execute();
$property = $properties->fetch(PDO::FETCH_OBJ);

$admins = $conn->query("SELECT count(*) as num_admins from admins");
$admins->execute();
$admin = $admins->fetch(PDO::FETCH_OBJ);



?> 
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Properties</h5>
              <p class="card-text">number of properties: <?php echo $prop->num_props;?></p>
             
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Categories</h5>
              
              <p class="card-text">number of categories: <?php echo $property->num_properties;?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admins</h5>
              
              <p class="card-text">number of admins: <?php echo $admin->num_admins;?></p>
              
            </div>
          </div>
        </div>
      </div>
 
        <?php require "./h&f/footer.php";?>