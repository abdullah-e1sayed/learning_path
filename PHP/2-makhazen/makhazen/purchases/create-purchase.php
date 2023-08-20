<?php  require "../include/header.php" ;?>
<?php  require "../config/config.php" ;?>


<?php  
          $products = $conn->query("SELECT * from products where status = 1 ; ");
          $products->execute();
          $allProducts = $products->fetchAll(PDO::FETCH_OBJ);
?>

       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline"> اضافة فاتورة شراء </h5>



              
              <br>
              <br>
              <form method="GET" action="add-product.php" enctype="multipart/form-data">
                  <input list="products" name="id">
                    
                    <datalist id="products">

                      <?php foreach($allProducts as $product ):?>
                      <option value="<?php echo $product->id;?>"> <?php echo $product->name;?></option>
                      <?php  endforeach;?>  

                    </datalist>
                  <br>
                  <br>
                  <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">search</button>


                  </form>




          
 <?php  require "../include/footer.php" ;?>
