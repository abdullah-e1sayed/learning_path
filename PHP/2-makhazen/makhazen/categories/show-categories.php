<?php   require "../config/config.php";?>
<?php   require "../include/header.php";?>

<?php
      $categories = $conn->query("SELECT * from categories  ; ");
      $categories->execute();
      $allCategories = $categories->fetchAll(PDO::FETCH_OBJ);

?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">الأصناف</h5>
             <a  href="create-category.php" class="btn btn-primary mb-4 text-center float-right"><h2>+</h2></a>
                  <br>
                  <br>
                  <br>

                  <form method ="GET" action = "update-category.php">
                  <input list="categories" name="id">
                    
                    <datalist id="categories">

                      <?php foreach($allCategories as $category ):?>
                      <option value="<?php echo $category->id;?>"> <?php echo $category->name;?></option>
                      <?php  endforeach;?>  

                    </datalist>
                  <br>
                  <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">search</button>


                  </form>

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">الاسم</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php $counter=1; foreach($allCategories as $category ):?>
                  <tr>
                    <th scope="row"><?php echo $counter;  $counter++;?></th>
                    <td><a href="update-category.php?id=<?php echo $category->id;?>"><?php echo $category->name;?></a></td>
                    <td><a href="<?php echo APPURL?>/products/show-products.php?id=<?php echo $category->id;?>">المنتجات</a></td>
                  
                  </tr>
                 <?php  endforeach;?>
                </tbody>
              </table> 
              <?php   require "../include/footer.php";?>
