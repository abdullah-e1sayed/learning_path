<?php require "../include/header.php"; ?>
<?php require "../config/config.php" ;?>

<?php

      if(isset($_GET['id'])&& $_GET['id'] != ""){
        $id = $_GET['id'];

      $products = $conn->query("SELECT * FROM products where id = '$id'");
      $products->execute();
      $product = $products->fetch(PDO::FETCH_OBJ);
      }else{
        header("location:".APPURL."/products/show-products.php");
      }

      $categories = $conn->query("SELECT * FROM categories");
      $categories->execute();
      $allCategories = $categories->fetchAll(PDO::FETCH_OBJ);


if(isset($_POST['submit'])){
  
    $name=$_POST['name'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    $category_name=$_POST['category_name'];
    $category_id=$_POST['category_id'];
    $add_by=$_SESSION['username'];

    $insert=$conn->prepare("UPDATE products 
    set name =:name ,price=:price ,quantity=:quantity,category_name=:category_name,category_id=:category_id,add_by=:add_by  where id = '$id'");
    $insert->execute([
      ':name'=>$name,
      ':price'=>$price,
      ':quantity'=>$quantity,
      ':category_name'=>$category_name,
      ':category_id'=>$category_id,
      ':add_by'=>$add_by

    ]);

    header("location:".APPURL."/products/show-products.php");

}


?>
            
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">تعديل المنتج </h5>
          <form method="POST" action="" enctype="multipart/form-data">

                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" value= "<?php echo $product->name;?>" placeholder="<?php echo $product->name;?>" />
                 
                </div>
                  
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="price" id="form2Example1" value= "<?php echo $product->price;?>" class="form-control" placeholder="<?php echo $product->price;?>" />
                 
                </div> 
                 <div class="form-outline mb-4 mt-4">
                  <input type="text" name="quantity" id="form2Example1"value= "<?php echo $product->quantity;?>" class="form-control" placeholder="<?php echo $product->quantity;?>" />
                 
                </div> 
                
                
                <select name = "category_name"class="form-control">
                <option value = "<?php  echo $product->category_name;?>"> <?php echo $product->category_name;?></option>
                <?php foreach($allCategories as $category ):?>
                <option ><?php  echo $category->name;?> </option>
                <?php endforeach; ?>
               </select>
               <br>
   
               <select name = "category_id"class="form-control">
                <option value = "<?php  echo $product->category_id;?>"> <?php echo $product->category_name;?></option>
                <?php foreach($allCategories as $category ):?>
                <option value = "<?php  echo $category->id;?>"><?php  echo $category->name;?> </option>
                <?php endforeach; ?>
               </select>
               <br>

                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">تعديل</button>

          
              </form>
              <a href="delete.php?id=<?php echo $product->id;?>" class="btn btn-danger  text-center ">حذف</a>
              <?php require "../include/footer.php"; ?>
