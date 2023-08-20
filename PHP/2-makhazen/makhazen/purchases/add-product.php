<?php require "../include/header.php"; ?>
<?php require "../config/config.php" ;?>

<?php

      $money_fund=$conn->query("SELECT * from money_fund ");
      $money_fund->execute();
      $money=$money_fund->fetchAll(PDO::FETCH_OBJ);

      if(isset($_GET['id'])&& $_GET['id'] != ""){
        $id = $_GET['id'];

      $products = $conn->query("SELECT * FROM products where id = '$id'");
      $products->execute();
      $product = $products->fetch(PDO::FETCH_OBJ);
      }else{
        header("location:".APPURL."/purchases/create-purchase.php");
      }

      


if(isset($_POST['submit'])){
  
  
    $price=$_POST['price'];
    $purchasing_price=$_POST['purchasing_price'];
    $quantity=(($product->quantity) + $_POST['quantity']);
    $purchasing_by=$_SESSION['username'];

    $insert=$conn->prepare("UPDATE products 
    set price=:price ,purchasing_price=:purchasing_price,quantity=:quantity where id = '$id'");
    $insert->execute([
      ':price'=>$price,
      ':purchasing_price'=>$purchasing_price,
      ':quantity'=>$quantity,      
      

    ]);

    
    $altred_money=  $_POST['quantity'] * $purchasing_price * (-1);
    $note="قام $purchasing_by بشراء {$_POST['quantity']} من $product->name";
    $alter_money=$conn->prepare("INSERT INTO money_fund(money,note,status)values(:money,:note,:status)");
                        $alter_money->execute([
                          ':money'=>$altred_money,
                          ':note'=>$note,
                          ':status'=>"purchasing"
                         ]);

    header("location:".APPURL."/purchases/create-purchase.php");
  

}


?>
            
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">اضافة منتج  </h5>
          <form method="POST" action="" enctype="multipart/form-data">

                <div class="form-outline mb-4 mt-4">
                <label for="purchasing_price"> الصنف</label>

                <label  id="" class="form-control"  ><?php echo $product->category_name;?></label>

                </div>

                <div class="form-outline mb-4 mt-4">
                <label for="purchasing_price">المنتج</label>

                  <label  id="" class="form-control"  ><?php echo $product->name;?></label>
                 
                </div>

                <div class="form-outline mb-4 mt-4">
                <label for="quan"> الكمية المتاحة</label>
                <label  id="quan" class="form-control"  ><?php echo $product->quantity;?></label>
                 
                </div> 
                  
                <div class="form-outline mb-4 mt-4">
                <label for="purchasing_price"> سعر الشراء </label>
                  <input type="text" name="purchasing_price" id="purchasing_price" value= "<?php echo $product->purchasing_price	;?>"
                   class="form-control" placeholder="<?php echo $product->purchasing_price	;?>" />
                 
                </div> 
                <div class="form-outline mb-4 mt-4">
                <label for="price"> سعر البيع </label>
                  <input type="text" name="price" id="price" value= "<?php echo $product->price;?>" class="form-control" placeholder="<?php echo $product->price;?>" />
                 
                </div> 
                 <div class="form-outline mb-4 mt-4">
                 <label for="quantity">الكمية</label>

                  <input type="text" name="quantity" id="quantity" class="form-control" placeholder="" />
                 
                </div> 

                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">اضافة</button>

          
              </form>
              <?php require "../include/footer.php"; ?>
