<?php require "./include/header.php" ?>
<?php require "./config/config.php" ?>

<?php

          $products=$conn->query("SELECT count(*)  as num from products ");
          $products->execute();
          $product=$products->fetch(PDO::FETCH_OBJ);


          $categories=$conn->query("SELECT count(*)  as num from categories ");
          $categories->execute();
          $category=$categories->fetch(PDO::FETCH_OBJ);

          




 ?>
            
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <a href="<?php  echo APPURL?>/categories/show-categories.php"><h5 class="card-title">الأصناف</h5></a>
              <p class="card-text">عدد الأصناف: <?php echo $category->num;?></p>
             
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
            <a href="<?php  echo APPURL?>/products/show-products.php"><h5 class="card-title">المنتجات</h5></a>
              
              <p class="card-text">عددالمنتجات: <?php echo $product->num;?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
            <a href="<?php  echo APPURL?>/bills/show-bills.php"><h5 class="card-title">المبيعات</h5></a>
              
              
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
          <div class="card">
            <div class="card-body">
            <a href="<?php  echo APPURL?>/fund/money_fund.php"><h5 class="card-title">الصندوق</h5></a>
              

              
            </div>
          </div>
        </div>

   
      <?php require "./include/footer.php" ?>
     