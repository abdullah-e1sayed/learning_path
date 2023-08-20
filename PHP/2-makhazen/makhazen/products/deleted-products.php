<?php  require "../include/header.php";?>
<?php  require "../config/config.php";?>
<?php
      $products = $conn->query("SELECT * from products  where status = 0 ; ");
      $products->execute();
      $allProducts = $products->fetchAll(PDO::FETCH_OBJ);




?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">المحذوفات</h5>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">المنتج</th>
                    <th scope="col">اكمية</th>
                    <th scope="col">السعر</th>
                    
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($allProducts as $product ):?>
                  <tr>
                    <td><?php echo $product->name;?></td>
                    <td><?php echo $product->quantity;?></td>
                    <td><?php echo $product->price;?></td>
                    
                   <td> <form method="POST" action="recovery.php?id=<?php  echo $product->id;?>" enctype="multipart/form-data">
                <select name = "status" style="margin-top: 15px;" class="form-control">
                    <option>Choose </option>
                    <option value="1">استرجاع</option>
                    <option value="0">عدم الاسترجاع</option>
                </select>

      
                <button style="margin-top: 10px;" type="submit" name="submit" class="btn btn-primary  mb-4 text-center">تحديث</button>

          
              </form></td>
                  </tr>
                 <?php  endforeach;?>
                </tbody>
              </table> 
              <?php  require "../include/footer.php";?>
