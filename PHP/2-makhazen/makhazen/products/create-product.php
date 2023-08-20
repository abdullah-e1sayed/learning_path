<?php require "../include/header.php"; ?>
<?php require "../config/config.php" ;?>

<?php

      $categories = $conn->query("SELECT * FROM categories");
      $categories->execute();
      $allCategories = $categories->fetchAll(PDO::FETCH_OBJ);


if(isset($_POST['submit'])){
  if(empty($_POST['name']) or empty($_POST['price']) or empty($_POST['quantity'])
   or empty($_POST['category_name']) or empty($_POST['category_id'])){

    echo "<script> alert (' one or more input are empty ')</script>";          
  
  }else{
    $name=$_POST['name'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    $category_name=$_POST['category_name'];
    $category_id=$_POST['category_id'];
    $add_by=$_SESSION['username'];

    $insert=$conn->prepare("INSERT INTO products(name,price,quantity,category_name,category_id,add_by)
     values(:name,:price,:quantity,:category_name,:category_id,:add_by)");
    $insert->execute([
      ':name'=>$name,
      ':price'=>$price,
      ':quantity'=>$quantity,
      ':category_name'=>$category_name,
      ':category_id'=>$category_id,
      ':add_by'=>$add_by
    ]);
}
}


?>
            
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">اضافة منتج</h5>
          <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="الاسم" />
                 
                </div>
                  
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="price" id="form2Example1" class="form-control" placeholder="السعر" />
                 
                </div> 
                 <div class="form-outline mb-4 mt-4">
                  <input type="text" name="quantity" id="form2Example1" class="form-control" placeholder="الكمية" />
                 
                </div> 
                
                
               <select name = "category_name"class="form-control">
               <optgroup label="اختر الصنف">
                <?php foreach($allCategories as $category ):?>
                <option><?php  echo $category->name;?> </option>
                <?php endforeach; ?>
               </select>
               <br>
   
               <select name = "category_id"class="form-control">
               <optgroup label="اختر الصنف">
                <?php foreach($allCategories as $category ):?>
                <option value = "<?php  echo $category->id;?>"><?php  echo $category->name;?> </option>
                <?php endforeach; ?>
               </select>
               <br>

                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">انشاء</button>

          
              </form>

              <?php require "../include/footer.php"; ?>
