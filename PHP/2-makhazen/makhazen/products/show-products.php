<?php  require "../include/header.php";?>
<?php  require "../config/config.php";?>
<?php

      if(isset($_GET['id']) && $_GET['id'] != ""){
        $id = $_GET['id'] ;
        
      $products = $conn->query("SELECT * from products where status = 1 and category_id ='$id' ; ");
      $products->execute();
      $allProducts = $products->fetchAll(PDO::FETCH_OBJ);

      }else{
      $products = $conn->query("SELECT * from products where status = 1 ; ");
      $products->execute();
      $allProducts = $products->fetchAll(PDO::FETCH_OBJ);
      }

?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">المنتجات</h5>              
             <a  href="create-product.php" class="btn btn-primary mb-4 text-center float-right"><h2>+</h2></a>
             <br>
             <br>
             <br>

            <form method ="GET" action = "modify-product.php">
             <input list="products" name="id">
              
              <datalist id="products">

                <?php foreach($allProducts as $product ):?>
                <option value="<?php echo $product->id;?>"> <?php echo $product->name;?></option>
                <?php  endforeach;?>  

              </datalist>
             <br>
             <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">search</button>


            </form>


              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">المنتج</th>
                    <th scope="col">اكمية</th>
                    <th scope="col">السعر</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php $counter =1 ;foreach($allProducts as $product ):?>
                  <tr>
                    <th scope="row"><?php echo $counter;  $counter++;?></th>
                    <td><a href="modify-product.php?id=<?php echo $product->id;?>" ><?php echo $product->name;?></a></td>
                    <td><?php echo $product->quantity;?></td>
                    <td><?php echo $product->price;?></td>
                    
                  </tr>
                 <?php  endforeach;?>
                </tbody>
              </table> 
              <?php  require "../include/footer.php";?>
